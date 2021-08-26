@extends('layouts.app')

@section('content')
<div style="min-height: 100vh;" class="d-flex flex-column">
    {{-- 
        file komponen cek di resources/views/components/header-home.blade.php 
    --}}
    <x-header-home></x-header-home>
    <x-navbar-home></x-navbar-home>
    <div class="container-fluid flex-grow p-3 py-5 position-relative" style="background-image: linear-gradient(45deg, #0005, #0003), url('{{ asset('img/dua.jpg') }}'); flex-grow: 1; background-position: bottom; background-size: containt; background-repeat: no-repeat">
        <div style="background: rgba(0, 0, 0, .2); backdrop-filter: blur(.15rem)" class="h-100 w-100 position-absolute top-0 start-0"></div>
        <div class="row g-0 justify-content-center py-5">
            <div class="col-lg-4" style="max-width: 400px">
                <login-panel :action="{ admin: '{{ route('login') }}', guru: '{{ route('login.guru') }}'}">
                    <template #csrf>
                        @csrf
                    </template>
                </login-panel>
            </div>
        </div>
    </div>
</div>
@endsection
