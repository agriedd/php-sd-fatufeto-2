<?php

namespace App\View\Components;

use App\Berita;
use App\Kegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ListPencarian extends Component{

    private $data;

    public function __construct(){

        $request = request();

        $berita_static = addslashes(Berita::class);
        $kegiatan_static = addslashes(Kegiatan::class);
        // $guru_static = addslashes(Renungan::class);

        $berita = Berita::select([
                DB::raw("id_berita as id"), 
                'judul', 'isi', 'deskripsi', 'tbl_berita.created_at', 'tbl_berita.tanggal_terbit',
                DB::raw("tbl_kategori.nama_kategori as kategori"),
                DB::raw("'{$berita_static}' as type")
            ])
            ->whereNotNull('tanggal_terbit')
            ->leftJoin('tbl_kategori', 'tbl_berita.id_kategori', '=', 'tbl_kategori.id_kategori')
            ->where(function($query)use($request){
                $query->where('judul', 'like', "%{$request->q}%")
                    ->orWhere('isi', 'like', "%{$request->q}%");
            });

        $this->data = DB::table('tbl_kegiatan')
            ->select([
                DB::raw("id_kegiatan as id"), 
                DB::raw("nama_kegiatan as judul"),
                DB::raw("waktu as isi"),
                DB::raw("NULL as deskripsi"),
                "created_at",
                DB::raw("tanggal as tanggal_terbit"),
                DB::raw("NULL as kategori"),
                DB::raw("'{$kegiatan_static}' as type")
            ])
            ->where(function($query)use($request){
                $query->where('nama_kegiatan', 'like', "%{$request->q}%");
            })
            ->union($berita)
            ->limit(20)
            ->orderByDesc('created_at')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.list-pencarian', [
            'items' => $this->data
        ]);
    }
}
