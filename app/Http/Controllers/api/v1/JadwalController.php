<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestJadwalStore;
use App\Http\Requests\RequestJadwalUpdate;
use App\Http\Resources\JadwalCollection;
use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JadwalController extends Controller{

    public function index(){
        $data = Jadwal::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('hari'), function($query, $search){
            $query->where('hari', '=', "{$search}");
        })
        ->when(request('id_kelas'), function($query, $search){
            $query->where('id_kelas', '=', "{$search}");
        })
        ->when(request('search'), function($query, $search){
            $query->where('mata_pelajaran', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return JadwalCollection::collection($data);
    }

    public function store(RequestJadwalStore $request){
        $data = collect($request->validated());
        $jadwal = Jadwal::create($data->all());
        $collection = new JadwalCollection($jadwal);
        return new Response($collection, $jadwal ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Jadwal $jadwal){
        return new JadwalCollection($jadwal);
    }

    public function update(RequestJadwalUpdate $request, Jadwal $jadwal){
        $data = collect($request->validated());
        $result = $jadwal->update($data->all());
        $collection = new JadwalCollection($jadwal);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
