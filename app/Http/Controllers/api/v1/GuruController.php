<?php

namespace App\Http\Controllers\api\v1;

use App\Gambar;
use App\Guru;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGuruStore;
use App\Http\Requests\RequestGuruUpdate;
use App\Http\Resources\GuruCollection;
use App\Http\Resources\SekolahCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
            ->paginate(request('itemsPerPage') ?? 10);
        return GuruCollection::collection($data);
    }

    public function store(RequestGuruStore $request){
        $data = collect($request->validated())->except(['foto', 'password']);
        /**
         * encript password
         * 
         */
        $data->put('password', bcrypt($request->input('password')));
        $guru = Guru::create($data->all());
        /**
         * update foto guru
         * 
         */
        if($request->file('foto') != null){
            $foto = $request->file('foto')->store('guru');
            $foto = $guru->foto()->create(['src' => $foto]);
        }

        $collection = new GuruCollection($guru);
        return new Response($collection, $guru ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Guru $guru){
        return new GuruCollection($guru);
    }

    public function update(RequestGuruUpdate $request, Guru $guru){
        $data = collect($request->validated())->except(['foto']);
        $result = $guru->update($data->all());

        /**
         * update foto guru
         * 
         */
        if($request->file('foto') != null){
            /**
             * hapus foto guru lama
             * 
             */
            if($guru->foto && Storage::exists($guru->foto->src)){
                Storage::delete($guru->foto->src);
                $guru->foto->delete();
            }
            $foto = $request->file('foto')->store('guru');
            $foto = $guru->foto()->create(['src' => $foto]);
        }

        $collection = new SekolahCollection($guru);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function reset(Request $request, Guru $guru){
        /**
         * make new password encypted
         * 
         */
        $data = collect(['password' => bcrypt('password')]);
        $result = $guru->update($data->all());
        $collection = new SekolahCollection($guru);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Guru $guru){
        $result = $guru->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
