@extends('layouts.app')

@section('content')
<div style="min-height: 100vh;" class="d-flex flex-column">
    {{--
        
        ⚠⚠⚠⚠⚠⚠⚠⚠⚠⚠⚠
        file komponen cek di resources/views/components/header-home.blade.php 

    --}}
    <x-header-home></x-header-home>
    <x-navbar-home></x-navbar-home>
    <div class="container-fluid bg-white flex-grow p-3 py-5" style="flex-grow: 1;">
        <div class="row g-0">
            <div class="col-md">
                <div class="p-3">
                    <div class="mb-3" id="breadcrumb">
                        <div class="p-3" style="background: rgba(0, 0, 0, 0.025); border-radius: 1.5rem">
                            <div class="content-middle align-items-start px-3">
                                <div class="d-flex w-100">
                                    <div class="flex-grow-1">
                                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="ps-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" id="daftar-kelas">
                        <x-list-jadwal></x-list-jadwal>
                    </div>
                </div>
            </div>
            <div class="col-4" >
                <x-pengumuman-home></x-pengumuman-home>
            </div>
        </div>
    </div>
    <div class=" bg-gradients">
        <div class="row g-0">
            <div class="col-2"></div>
            <div class="col-md">
                <x-footer-home></x-footer-home>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
@endsection