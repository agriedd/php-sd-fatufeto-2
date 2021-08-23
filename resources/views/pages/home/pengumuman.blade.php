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
            <div class="col-lg-3">
                <div class="sticky-top px-3 pb-3" style="z-index: 0; top: 80px">
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Judul Pengumuman
                            </div>
                            <div class="h5">
                                {{ $pengumuman->judul }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Diterbitkan pada
                            </div>
                            <div class="h5">
                                {{ $pengumuman->tanggal_terbit->locale('id-ID')->translatedFormat('l, d F Y H.i') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Berakhir pada
                            </div>
                            <div class="h5">
                                {{ $pengumuman->expired_at->locale('id-ID')->translatedFormat('l, d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-5">
                    <div class="mx-auto text-center pb-5 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                        </svg>
                    </div>
                    <div class="mx-auto" style="max-width: 500px">
                        <h3 class="text-center">
                            {{ $pengumuman->judul }}
                        </h3>
                        <div class="text-center text-muted">
                            {{ $pengumuman->tanggal_terbit->locale('id-ID')->translatedFormat('l, d F Y') }}
                        </div>
                    </div>
                </div>
                <div class="px-3 pb-3">
                    {!! $pengumuman->isi !!}
                </div>
                <div class="px-3 pb-3">
                    {{-- <x-galeri-home :id_kegiatan="$pengumuman"></x-galeri-home> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-5" >
                <x-pengumuman-home></x-pengumuman-home>
            </div>
        </div>
    </div>
    <div class="row g-0 bg-primary">
        <div class="col-8 offset-2">
            <x-footer-home></x-footer-home>
        </div>
    </div>
</div>
@endsection