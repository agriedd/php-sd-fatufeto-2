<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSaranaStore;
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
        $guru = Sarana::create($data->all());
        $collection = new SaranaCollection($guru);
        return new Response($collection, $guru ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sarana $sarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sarana $sarana)
    {
        //
    }
}
