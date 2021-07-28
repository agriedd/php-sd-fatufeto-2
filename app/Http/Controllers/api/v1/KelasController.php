<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestKelasStore;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
