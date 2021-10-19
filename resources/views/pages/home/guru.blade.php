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
            <div class="col-lg-1">
                <x-nav-content-guru></x-nav-content-guru>
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
                                                <li class="breadcrumb-item active" aria-current="page">Guru</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="ps-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" id="daftar-guru">
                        <x-list-guru></x-list-guru>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5" >
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