<?php

namespace App\Http\Controllers\api\v1;

use App\Berita;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestBeritaStore;
use App\Http\Resources\BeritaCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BeritaController extends Controller
{
    public function index(){
        $data = Berita::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return BeritaCollection::collection($data);
    }

    public function store(RequestBeritaStore $request){
        $data = collect($request->validated())->except([
            'terbit'
        ]);
        if(request('terbit'))
            $data->put('tanggal_terbit', now());
        $berita = Berita::create($data->all());
        $collection = new BeritaCollection($berita);
        return new Response($collection, $berita ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Berita $beritum){
        return new BeritaCollection($beritum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
