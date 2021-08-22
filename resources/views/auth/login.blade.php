@extends('layouts.app')

@section('content')
<div style="min-height: 100vh;" class="d-flex flex-column">
    {{-- 
        file komponen cek di resources/views/components/header-home.blade.php 
    --}}
    <x-header-home></x-header-home>
    <x-navbar-home></x-navbar-home>
    <div class="container-fluid bg-grey-dark flex-grow p-3 py-5" style="flex-grow: 1; background-position: bottom; background-size: containt; background-repeat: no-repeat">
        <div class="row g-0 justify-content-center py-5">
            <div class="col-lg-4" >
                <login-panel action="{{ route('login') }}">
                    <template #csrf>
                        @csrf
                    </template>
                </login-panel>
            </div>
        </div>
    </div>
</div>
@endsection
