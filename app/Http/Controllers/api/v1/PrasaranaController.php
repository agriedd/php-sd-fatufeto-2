<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPrasaranaStore;
use App\Http\Requests\RequestPrasaranaUpdate;
use App\Http\Resources\PrasaranaCollection;
use App\Prasarana;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrasaranaController extends Controller{

    public function index(){
        $data = Prasarana::when(request('sortBy'), function($query, $sorts){
                foreach ($sorts as $i => $sort) {
                    $query->orderBy($sort, 
                        request('sortDesc') 
                        && request('sortDesc')[$i] == 'true' 
                            ? 'DESC' 
                            : 'ASC' );
                }
            })
            ->paginate(request('itemsPerPage') ?? 10);
        return PrasaranaCollection::collection($data);
    }

    public function store(RequestPrasaranaStore $request){
        $data = collect($request->validated());
        $guru = Prasarana::create($data->all());
        $collection = new PrasaranaCollection($guru);
        return new Response($collection, $guru ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Prasarana $prasarana){
        return new PrasaranaCollection($prasarana);
    }

    public function update(RequestPrasaranaUpdate $request, Prasarana $prasarana){
        $data = collect($request->validated());
        $result = $prasarana->update($data->all());
        $collection = new PrasaranaCollection($prasarana);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Prasarana $prasarana){
        $result = $prasarana->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
