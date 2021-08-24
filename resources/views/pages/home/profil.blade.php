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
            <div class="col-lg-3">
                <x-nav-content-profil></x-nav-content-profil>
            </div>
            <div class="col-md">
                <div class="p-3">
                    <div class="mb-3" id="breadcrumb">
                        <div class="p-3" style="background: rgba(0, 0, 0, 0.025); border-radius: 1.5rem">
                            <div class="content-middle align-items-start px-3">
                                <div class="d-flex w-100">
                                    <div class="flex-grow-1">
                                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="ps-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                                            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" id="sejarah">
                        <x-sejarah-profil></x-sejarah-profil>
                    </div>
                    <x-visi-profil></x-visi-profil>
                    <x-misi-profil></x-misi-profil>
                    <x-kontak-home></x-kontak-home>
                    <x-alamat-home></x-alamat-home>
                </div>
            </div>

            <div class="col-lg-4 col-md-5" >
                <x-pengumuman-home></x-pengumuman-home>
            </div>
        </div>
    </div>
    <div class="" style="background: linear-gradient(45deg, rgb(101 116 205 / 90%) 70%, transparent), url('{{ asset('img/index.jpg') }}'); background-position: 0%; background-size: cover; background-attachment: fixed">
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