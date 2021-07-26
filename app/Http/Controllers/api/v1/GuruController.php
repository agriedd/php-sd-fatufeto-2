<?php

namespace App\Http\Controllers\api\v1;

use App\Guru;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGuruStore;
use App\Http\Requests\RequestGuruUpdate;
use App\Http\Resources\GuruCollection;
use App\Http\Resources\SekolahCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuruController extends Controller{

    public function index(){
        $data = Guru::when(request('sortBy'), function($query, $sorts){
                foreach ($sorts as $i => $sort) {
                    $query->orderBy($sort, 
                        request('sortDesc') 
                        && request('sortDesc')[$i] == 'true' 
                            ? 'DESC' 
                            : 'ASC' );
                }
            })
            ->paginate(request('itemPerpage') ?? 10);
        return GuruCollection::collection($data);
    }

    public function store(RequestGuruStore $request){
        $data = collect($request->validated());
        $guru = Guru::create($data->all());
        $collection = new GuruCollection($guru);
        return new Response($collection, $guru ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Guru $guru){
        return new GuruCollection($guru);
    }

    public function update(RequestGuruUpdate $request, Guru $guru){
        $data = collect($request->validated());
        $result = $guru->update($data->all());
        $collection = new SekolahCollection($guru);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
