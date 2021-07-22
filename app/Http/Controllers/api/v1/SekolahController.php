<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SekolahCollection;
use App\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller{

    public function index(){
        $data = Sekolah::get();
        return SekolahCollection::collection($data);
    }

    public function store(Request $request){
    }

    public function show($id){
    }

    public function update(Request $request, $id){
    }

    public function destroy($id){
    }
}
