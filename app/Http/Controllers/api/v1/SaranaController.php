<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSaranaStore;
use App\Http\Requests\RequestSaranaUpdate;
use App\Http\Resources\SaranaCollection;
use App\Sarana;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaranaController extends Controller{

    public function index(){
        $data = Sarana::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return SaranaCollection::collection($data);
    }

    public function store(RequestSaranaStore $request){
        $data = collect($request->validated());
        $sarana = Sarana::create($data->all());
        $collection = new SaranaCollection($sarana);
        return new Response($collection, $sarana ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Sarana $sarana){
        return new SaranaCollection($sarana);
    }

    public function update(RequestSaranaUpdate $request, Sarana $sarana){
        $data = collect($request->validated());
        $result = $sarana->update($data->all());
        $collection = new SaranaCollection($sarana);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Sarana $sarana){
        $result = $sarana->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
