<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestKategoriStore;
use App\Http\Requests\RequestKategoriUpdate;
use App\Http\Resources\KategoriCollection;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KategoriController extends Controller{

    public function index(){
        $data = Kategori::when(request('sortBy'), function($query, $sorts){
                foreach ($sorts as $i => $sort) {
                    $query->orderBy($sort, 
                        request('sortDesc') 
                        && request('sortDesc')[$i] == 'true' 
                            ? 'DESC' 
                            : 'ASC' );
                }
            })
            ->paginate(request('itemsPerPage') ?? 10);
        return KategoriCollection::collection($data);
    }

    public function store(RequestKategoriStore $request){
        $data = collect($request->validated());
        $kategori = Kategori::create($data->all());
        $collection = new KategoriCollection($kategori);
        return new Response($collection, $kategori ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Kategori $kategori){
        return new KategoriCollection($kategori);
    }

    public function update(RequestKategoriUpdate $request, Kategori $kategori){
        $data = collect($request->validated());
        $result = $kategori->update($data->all());
        $collection = new KategoriCollection($kategori);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
