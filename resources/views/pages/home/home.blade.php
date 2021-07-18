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
            <div class="col-3">
                <x-nav-content-home></x-nav-content-home>
            </div>
            <div class="col-md">
                <div class="p-3">
                    <div class="mb-3" id="sambutan">
                        <x-sambutan-home></x-sambutan-home>
                    </div>
                    <x-galeri-home></x-galeri-home>
                    <x-kontak-home></x-kontak-home>
                    <x-alamat-home></x-alamat-home>
                    <x-footer-home></x-footer-home>
                </div>
            </div>

            <div class="col-4" style="max-width: 400px;">
                <x-pengumuman-home></x-pengumuman-home>
            </div>
        </div>
    </div>
</div>
@endsection