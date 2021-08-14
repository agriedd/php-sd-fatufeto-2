<?php

namespace App\Http\Controllers\api\v1;

use App\Berita;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestBeritaStore;
use App\Http\Requests\RequestBeritaUpdate;
use App\Http\Resources\BeritaCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        if(request('terbit') && request('terbit') == '1')
            $data->put('tanggal_terbit', now());
        $berita = Berita::create($data->all());
        $collection = new BeritaCollection($berita);
        return new Response($collection, $berita ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Berita $beritum){
        return new BeritaCollection($beritum);
    }

    public function update(RequestBeritaUpdate $request, Berita $beritum){
        $data = collect($request->validated())->except([
            'terbit'
        ]);
        if(request('terbit') && request('terbit') == '1')
            $data->put('tanggal_terbit', now());
        else
            $data->put('tanggal_terbit', DB::raw("NULL"));
        $result = $beritum->update($data->all());
        $collection = new BeritaCollection($beritum);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Berita $beritum){
        $beritum->delete();
        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
