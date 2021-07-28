<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestKelasStore;
use App\Http\Requests\RequestKelasUpdate;
use App\Http\Resources\KelasCollection;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KelasController extends Controller{
    public function index(){
        $data = Kelas::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('search'), function($query, $search){
            $query->where('nama', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return KelasCollection::collection($data);
    }

    public function store(RequestKelasStore $request){
        $data = collect($request->validated());
        $kelas = Kelas::create($data->all());
        $collection = new KelasCollection($kelas);
        return new Response($collection, $kelas ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Kelas $kela){
        return new KelasCollection($kela);
    }

    public function update(RequestKelasUpdate $request, Kelas $kela){
        $data = collect($request->validated());
        $result = $kela->update($data->all());
        $collection = new KelasCollection($kela);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function destroy(Kelas $kela){
        $result = $kela->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
