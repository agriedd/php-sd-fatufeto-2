<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSekolahStore;
use App\Http\Requests\RequestSekolahUpdate;
use App\Http\Resources\SekolahCollection;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller{

    public function index(){
        $data = Sekolah::get();
        return SekolahCollection::collection($data);
    }

    public function store(RequestSekolahStore $request){
        $data = collect($request->validated());
        $data = $data->except(['struktur_organisasi']);

        $data->put('struktur_organisasi', $request->file('struktur_organisasi')->store('sekolah'));
        
        $sekolah = Sekolah::create($data->all());
        $collection = new SekolahCollection($sekolah);
        return new Response($collection, $sekolah ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Sekolah $sekolah){
        return new SekolahCollection($sekolah);
    }

    public function update(RequestSekolahUpdate $request, Sekolah $sekolah){
        $data = collect($request->validated());
        $data = $data->except(['struktur_organisasi']);

        if($request->file('struktur_organisasi')){
            if(Storage::exists($sekolah->getOriginal('struktur_organisasi')))
                Storage::delete($sekolah->getOriginal('struktur_organisasi'));
            $data->put('struktur_organisasi', $request->file('struktur_organisasi')->store('sekolah'));
        }

        $result = $sekolah->update($data->all());
        $collection = new SekolahCollection($sekolah);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Sekolah $sekolah){
        if(Storage::exists($sekolah->getOriginal('struktur_organisasi')))
            Storage::delete($sekolah->getOriginal('struktur_organisasi'));
        $result = $sekolah->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
