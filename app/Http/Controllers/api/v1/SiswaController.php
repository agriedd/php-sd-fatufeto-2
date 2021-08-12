<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSiswaStore;
use App\Http\Requests\RequestSiswaUpdate;
use App\Http\Resources\SiswaCollection;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiswaController extends Controller{
    public function index(){
        $data = Siswa::when(request('sortBy'), function($query, $sorts){
                foreach ($sorts as $i => $sort) {
                    $query->orderBy($sort, 
                        request('sortDesc') 
                        && request('sortDesc')[$i] == 'true' 
                            ? 'DESC' 
                            : 'ASC' );
                }
            })
            ->paginate(request('itemsPerPage') ?? 10);
        return SiswaCollection::collection($data);
    }

    public function store(RequestSiswaStore $request){
        $data = collect($request->validated());
        $siswa = Siswa::create($data->all());
        $collection = new SiswaCollection($siswa);
        return new Response($collection, $siswa ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Siswa $siswa){
        return new SiswaCollection($siswa);
    }

    public function update(RequestSiswaUpdate $request, Siswa $siswa){
        $data = collect($request->validated());
        $result = $siswa->update($data->all());
        $collection = new SiswaCollection($siswa);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
