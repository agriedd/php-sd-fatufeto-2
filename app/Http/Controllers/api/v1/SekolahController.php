<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSekolahStore;
use App\Http\Resources\SekolahCollection;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return new Response($collection, $sekolah ? 201 : 500);
    }

    public function show(Sekolah $sekolah){
        return new SekolahCollection($sekolah);
    }

    public function update(Request $request, $id){
    }

    public function destroy($id){
    }
}
