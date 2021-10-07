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
                    <div class="card" style="border-radius: 1.5rem">
                        <div class="card-body py-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="small">
                                        Jumlah prasarana
                                    </div>
                                    <div class="display-4">
                                        {{ $prasarana->total() }}
                                    </div>
                                </div>
                                <div class="ps-3 text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <form action="" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Temukan..." name="search" value="{{ request('search') }}">
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered rounded-lg table-striped">
                        <thead class="text-center">
                            <th>
                                No.
                            </th>
                            <th>
                                Prasarana
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th>
                                Kondisi
                            </th>
                        </thead>
                        <tbody>
                            @forelse ($prasarana as $i => $item)
                                <tr>
                                    <td>
                                        <div class="text-end">
                                            {{ $i + (((request('page') ?? 1) - 1) * 10) + 1 }}.
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $nama = $item->nama;
                                            if(request('search') && !empty(request('search'))){
                                                /**
                                                 * replace search query with span tag
                                                 */
                                                $nama = preg_replace('/(' . request('search') . ')/i', '<span class="bg-warning">$1</span>', $nama);
                                            }
                                        @endphp
                                        {!! $nama !!}
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            {{ number_format($item->jumlah) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            {{ $item->kondisi }}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="p-3">
                                            <div class="alert bg-warning" style="border-radius: 1.5rem">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-column justify-content-center pe-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                                                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                        </svg>
                                                    </div>
                                                    <small>
                                                        Tidak ada data
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="py-2">
                    {{ $prasarana->appends(request()->query())->links() }}
                </div>
            </div>
            <div class="col-lg-4 col-md-5" >
                <x-pengumuman-home></x-pengumuman-home>
            </div>
        </div>
    </div>
    <div class="row g-0 bg-gradients">
        <div class="col-8 offset-2">
            <x-footer-home></x-footer-home>
        </div>
    </div>
</div>
@endsection