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
            <div class="col-12 mb-5">
                <div class="mx-auto text-center pb-5 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                        <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                    </svg>
                </div>
                <div class="mx-auto" style="max-width: 500px">
                    <h3 class="text-center">
                        {{ $kegiatan->nama_kegiatan }}
                    </h3>
                    <div class="text-center text-muted">
                        {{ $kegiatan->tanggal->locale('id-ID')->translatedFormat('l, d F Y') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sticky-top px-3 pb-3" style="z-index: 0; top: 80px">
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                            </svg>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Nama Kegiatan
                            </div>
                            <div class="h5">
                                {{ $kegiatan->nama_kegiatan }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center position-relative">
                            <div class="text-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </div>
                            <div class="position-absolute text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Tanggal Kegiatan
                            </div>
                            <div class="h5">
                                @if($kegiatan->hari)
                                    Setiap hari {{ $kegiatan->hari }}
                                @else
                                    {{ $kegiatan->tanggal->locale('id-ID')->translatedFormat('l, d F Y') }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Waktu Kegiatan
                            </div>
                            <div class="h5">
                                {{ $kegiatan->waktu }} WITA
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-3 mb-2" style="background: rgba(0,0,0,.025); border-radius: 1rem">
                        <div class="pe-4 d-flex flex-column justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="small text-muted">
                                Lokasi
                            </div>
                            <div class="h5">
                                {{ $kegiatan->lokasi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="px-3 pb-3">
                    @isset($galeri)
                        <div class="mb-3" id="galeri">
                            <img src="{{ optional($galeri->foto)->url }}" alt="Foto Galeri" class="shadow-sm" style="max-width: 100%; max-height: 100%; border-radius: 1rem">
                            {{-- <div class="mb-2 text-muted">
                                <small>
                                    {{ optional($galeri->foto)->src }}
                                </small>
                            </div> --}}
                        </div>
                    @endif
                    <x-galeri-home :idKegiatan="$kegiatan->id_kegiatan"></x-galeri-home>
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