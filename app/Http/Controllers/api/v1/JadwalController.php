<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestJadwalStore;
use App\Http\Requests\RequestJadwalUpdate;
use App\Http\Resources\JadwalCollection;
use App\Jadwal;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller{

    public function index(){
        $data = Jadwal::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('hari'), function($query, $search){
            $query->where('hari', '=', "{$search}");
        })
        ->when(request('id_kelas'), function($query, $search){
            $query->whereHas('kelas', function($query) use ($search){
                // dd($search);
                $query->where('jadwal_kelas.id_kelas', '=', $search);
            });
            // $query->where('id_kelas', '=', "{$search}");
        })
        ->when(request('search'), function($query, $search){
            $query->where('mata_pelajaran', 'like', "%{$search}%");
        })
        // dd($data);
        ->paginate(request('itemsPerPage') ?? 10);
        return JadwalCollection::collection($data);
    }

    public function store(RequestJadwalStore $request){
        
        $data = collect($request->validated());
        $jadwal = Jadwal::create($data->all());
        
        $kelas = Kelas::find($data->get('id_kelas'));
        $kelas_trimmed = preg_replace("/[^0-9]/i", "", $kelas->nama);
        $kelas_sama_tingkat = Kelas::whereRaw("SUBSTRING(`nama`, 6) = {$kelas_trimmed}")->pluck('id_kelas')->toArray();
        $jadwal->kelas()->attach($kelas_sama_tingkat);

        $collection = new JadwalCollection($jadwal);
        return new Response($collection, $jadwal ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Jadwal $jadwal){
        return new JadwalCollection($jadwal);
    }

    public function update(RequestJadwalUpdate $request, Jadwal $jadwal){
        $data = collect($request->validated());
        $result = $jadwal->update($data->all());
        $collection = new JadwalCollection($jadwal);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Jadwal $jadwal){
        $result = $jadwal->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
