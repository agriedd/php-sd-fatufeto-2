@extends('layouts.app')

@section('content')
<div style="min-height: 100vh;" class="d-flex flex-column">
    <div class="shadow-sm bg-white">
        <div class="container">
            <header class="header">
                <div class="px-3">
                    <div class="content-middle">
                        <img src="{{ asset('img/83790f2b43f00be.png') }}" alt="Logo tut wuri handayani" class="header-logo">
                    </div>
                </div>
                <div class="py-3">
                    <div class="divider-vertical"></div>
                </div>
                <div class="flex-grow">
                    <div class="content-middle px-4">
                        <h1>
                            Website Profil SD Inpres Fatufeto 2
                        </h1>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="position: sticky; top: 0px; z-index: 10">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Home</a> -->
            <button class="btn btn-md btn-link text-white d-md-none d-block" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sarana /Prasarana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-white flex-grow p-3 py-5" style="flex-grow: 1;">
        <div class="row g-0">
            <div class="col-3">
                <div class="p-3" style="position: sticky; top: 55px; bottom: 0px">
                    <a href="#sambutan" class="card border-0 p-3 mb-3 text-dark" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-3">
                                    <div class="content-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
                                            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="content-middle">
                                        <h5 class="mb-0">
                                            Sambutan
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#galeri" class="card border-0 p-3 mb-3 text-dark" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-3">
                                    <div class="content-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="content-middle">
                                        <h5 class="mb-0">
                                            Galeri
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#kontak" class="card border-0 p-3 mb-3 text-dark" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-3">
                                    <div class="content-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                                            <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="content-middle">
                                        <h5 class="mb-0">
                                            Kontak
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#alamat" class="card border-0 p-3 mb-3 text-dark" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-3">
                                    <div class="content-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="content-middle">
                                        <h5 class="mb-0">
                                            Alamat
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md">
                <div class="p-3">
                    <div class="mb-3" id="sambutan">
                        <div class="card border-0 p-3" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>
                                            Selamat datang di ...
                                        </h4>
                                        <div class="text-muted">
                                            <small>
                                                Sambutan
                                            </small>
                                        </div>
                                    </div>
                                    <div class="ps-3 text-danger">
                                        <div class="content-middle justify-content-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
                                                <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <small>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique beatae iure delectus earum. Accusantium eaque ea laudantium sapiente unde nisi, iusto dicta corrupti commodi recusandae aperiam maxime assumenda enim quia.
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 py-3" id="galeri">
                        <h4>
                            Galeri
                        </h4>
                    </div>
                    <div class="mb-3">
                        <div class="galery-home">
                            <div class="large" style="background-image: url('{{ asset('img/kyle-swaneveld-UdvuaATBaAU-unsplash.jpg') }}');"></div>
                            <div style="background-image: url('{{ asset('img/liz-weddon-Ia31KncEMpo-unsplash.jpg') }}');"></div>
                            <div style="background-image: url('{{ asset('img/mihai-moisa-CaVEetK-bIY-unsplash.jpg') }}');"></div>
                            <div class="wide" style="background-image: url('{{ asset('img/mitchell-orr-_0qSYr-IRbg-unsplash.jpg') }}');"></div>
                            <div style="background-image: url('{{ asset('img/ryan-ancill-aJYO8JmVodY-unsplash.jpg') }}');"></div>
                            <div class="large" style="background-image: url('{{ asset('img/samuel-regan-asante-4UWfXZpQM4k-unsplash.jpg') }}');"></div>
                        </div>
                    </div>
                    <div class="mb-3 py-3" id="kontak">
                        <h4>
                            Kontak
                        </h4>
                    </div>
                    <div class="mb-3">
                        <div class="card border-0 p-3" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                            <div class="card-body">
                                <li>
                                    Telepon:
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 py-3" id="alamat">
                        <h4>
                            Alamat
                        </h4>
                    </div>
                    <div class="mb-3">
                        <div class="card border-0 p-3" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="pe-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                    </div>
                                    <div>
                                        {{ env('ALAMAT', '') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card border-0 p-3 text-muted" style="border-radius: 1.5rem;">
                            <div class="card-body">
                                <div class="content-middle">
                                    2021-2021 &copy; {{ env("APP_NAME") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4" style="max-width: 400px;">
                <div class="p-3" style="position: sticky; bottom: 0px; top: 55px">
                    <div class="mb-3 d-flex py-3">
                        <div class="px-3">
                            <div class="content-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div class="content-middle">
                                <h5 class="mb-0">
                                    Pengumuman
                                </h5>
                            </div>
                        </div>
                    </div>
                    @if(true)
                    <div class="mb-3">
                        <div class="card border-0 p-3 bg-white" style="border-radius: 1.5rem; background: rgba(0,0,0,.01)">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="text-success small">
                                            <small>
                                                terbaru
                                            </small>
                                        </div>
                                        <strong>
                                            Pengumuman penting!
                                        </strong>
                                    </div>
                                    <div class="text-primary ps-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis odio vero earum molestiae praesentium saepe qui velit consequatur iure nostrum.
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="mb-3">
                        <div class="card border-0 alert-warning m-0" style="border-radius: 1.5rem;">
                            <div class="card-body">
                                Tidak ada pengumuman terbaru sepekan terakhir
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="p-3 text-muted">
                        Bulan lalu
                    </div>
                    <div class="ps-3 border-start ms-3 py-3">
                        <div class="mb-3">
                            <div class="card border-0" style="border-radius: 1.5rem; background: rgba(0,0,0,.01)">
                                <div class="card-body">
                                    <strong>
                                        Pengumuman penting!
                                    </strong>
                                </div>
                                <div class="card-body pt-0">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis odio vero earum molestiae praesentium saepe qui velit consequatur iure nostrum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 text-muted">
                        2 bulan lalu
                    </div>
                    <div class="ps-3 border-start ms-3 py-3">
                        <div class="mb-3">
                            <div class="card border-0" style="border-radius: 1.5rem; background: rgba(0,0,0,.01)">
                                <div class="card-body">
                                    <div class="text-muted small">
                                        <small>
                                            {{ now()->format('d-M-Y') }}
                                        </small>
                                    </div>
                                    <strong>
                                        Pengumuman penting!
                                    </strong>
                                </div>
                                <div class="card-body pt-0">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis odio vero earum molestiae praesentium saepe qui velit consequatur iure nostrum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-3 ms-3 pt-3">
                        <div>
                            <a href="#" class="card text-dark" style="border-radius: 1.5rem;">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="content-middle">
                                                Lihat semua Pengumuman
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection