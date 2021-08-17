<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestKegiatanStore;
use App\Http\Resources\KegiatanCollection;
use App\Kegiatan;
use App\Sekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller{
    public function index(){
        $data = Kegiatan::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('hari') || request('date'), function($query){
            /**
             * jika hari tidak kosong dan sama dengan inputan
             * 
             * atau
             * 
             * jika hari kosong dan tanggal sama dengan inputan
             * 
             */
            $query->where(function($query){
                $query->where(function($query){
                    $query->whereNotNull('hari');
                    $query->where('hari', '=', request('hari'));
                });
                $query->orWhere(function($query){
                    $query->whereNull('hari');
                    $query->whereDate("tanggal", "=", request('date'));
                });
            });
        })
        ->when(request('search'), function($query, $search){
            $query->where('nama_kegiatan', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return KegiatanCollection::collection($data);
    }

    public function store(RequestKegiatanStore $request){
        $data = collect($request->validated());
        $sekolah = Sekolah::first();
        $data->put('id_profil', $sekolah->id_profil);
        $guru = Kegiatan::create($data->all());
        $collection = new KegiatanCollection($guru);
        return new Response($collection, $guru ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Kegiatan $kegiatan){
        return new KegiatanCollection($kegiatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
