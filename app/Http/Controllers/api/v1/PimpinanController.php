<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPimpinanStore;
use App\Http\Requests\RequestPimpinanUpdate;
use App\Http\Resources\PimpinanCollection;
use App\Pimpinan;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PimpinanController extends Controller{
    public function index(){
        $data = Pimpinan::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return PimpinanCollection::collection($data);
    }

    public function store(RequestPimpinanStore $request){
        $data = collect($request->validated())->except(['foto']);
        if(!request('id_profil')){
            $sekolah = Sekolah::latest()->first();
            $data->put('id_profil', $sekolah->id_profil);
        }
        $pimpinan = Pimpinan::create($data->all());
        
        /**
         * update foto pimpinan
         * 
         */
        if($request->file('foto') != null){
            $foto = $request->file('foto')->store('pimpinan');
            $foto = $pimpinan->foto()->create(['src' => $foto]);
        }

        $collection = new PimpinanCollection($pimpinan);
        return new Response($collection, $pimpinan ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Pimpinan $pimpinan){
        return new PimpinanCollection($pimpinan);
    }

    public function update(RequestPimpinanUpdate $request, Pimpinan $pimpinan){
        $data = collect($request->validated())->except(['foto']);
        $result = $pimpinan->update($data->all());
        
        /**
         * update foto pimpinan
         * 
         */
        if($request->file('foto') != null){
            /**
             * hapus foto pimpinan lama
             * 
             */
            if($pimpinan->foto && Storage::exists($pimpinan->foto->src)){
                Storage::delete($pimpinan->foto->src);
                $pimpinan->foto->delete();
            }
            $foto = $request->file('foto')->store('pimpinan');
            $foto = $pimpinan->foto()->create(['src' => $foto]);
        }
        $collection = new PimpinanCollection($pimpinan);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy($id){
        $pimpinan = Pimpinan::findOrFail($id);
        $result = $pimpinan->delete();
        return new Response(null, $result ? Response::HTTP_NO_CONTENT : Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
