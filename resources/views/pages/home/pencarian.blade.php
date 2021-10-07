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
            <div class="col-2">

            </div>
            <div class="col-md">
                <div class="p-3">
                    <div class="mb-3" id="daftar-kelas">
                        <x-list-pencarian></x-list-pencarian>
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