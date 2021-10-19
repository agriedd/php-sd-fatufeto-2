@extends('layouts.app')

@section('content')
<div style="min-height: 100vh;" class="d-flex flex-column">
    {{-- 
        file komponen cek di resources/views/components/header-home.blade.php 
    --}}
    <x-header-home></x-header-home>
    <x-navbar-home></x-navbar-home>
    <div class="container-fluid bg-white flex-grow p-3 py-5" style="flex-grow: 1;">
        <div class="row g-0">
            {{-- <div class="col-lg-1">
            </div> --}}
            <div class="col-md">
                <h3 class="text-center mb-5">
                    Kegiatan
                </h3>
                <div class="px-3 pb-3 grid-kegiatan">
                    @forelse ($kegiatan as $item)
                        <div class="p-4" style="background: rgba(0, 0, 0, .025); border-radius: 1.5rem">
                            <div class="mb-5 text-center">
                                <a href="{{ route('home.kegiatan.show', [
                                    'id_kegiatan'   => $item->id_kegiatan,
                                ]) }}" class="text-decoration-none link-dark">
                                    <h5 class="">
                                        {{ $item->nama_kegiatan }}
                                    </h5>
                                </a>
                                <div class="">
                                    {{ $item->tanggal->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                </div>
                            </div>
                            <x-galeri-home :idKegiatan="$item->id_kegiatan" :hideGaleri="true" :max="3"></x-galeri-home>
                        </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
            <div class="col-lg-4 col-md-5" >
                <x-pengumuman-home></x-pengumuman-home>
            </div>
        </div>
    </div>
    <div class="row g-0 bg-gradients">
        <div class="col-8 offset-2">
            <x-footer-home></x-footer-home>
        </div>
    </div>
</div>
@endsection