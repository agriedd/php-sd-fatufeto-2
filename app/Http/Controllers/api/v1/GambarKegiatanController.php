<?php

namespace App\Http\Controllers\api\v1;

use App\GambarKegiatan;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGambarKegiatanStore;
use App\Http\Resources\GambarKegiatanCollection;
use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GambarKegiatanController extends Controller{

    public function index(Kegiatan $kegiatan){
        $gambar_kegiatan = GambarKegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)
            ->when(request('sortBy'), function($query, $sorts){
                foreach ($sorts as $i => $sort) {
                    $query->orderBy($sort, 
                        request('sortDesc') 
                        && request('sortDesc')[$i] == 'true' 
                            ? 'DESC' 
                            : 'ASC' );
                }
            })
            ->paginate(request('itemsPerPage') ?? 10);
        return GambarKegiatanCollection::collection($gambar_kegiatan);
    }

    public function store(RequestGambarKegiatanStore $request, Kegiatan $kegiatan){
        $data = collect($request->validated())->except(['foto']);
        /**
         * encript password
         * 
         */
        $data->put('id_kegiatan', $kegiatan->id_kegiatan);
        $kegiatan = GambarKegiatan::create($data->all());
        if($request->file('foto') != null){
            $foto = $request->file('foto')->store('kegiatan');
            $foto = $kegiatan->foto()->create(['src' => $foto]);
        }

        $collection = new GambarKegiatanCollection($kegiatan);
        return new Response($collection, $kegiatan ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(GambarKegiatan $gambar){
    }

    public function update(Request $request, GambarKegiatan $gambar){
    }

    public function destroy(GambarKegiatan $gambar){
    }
}
