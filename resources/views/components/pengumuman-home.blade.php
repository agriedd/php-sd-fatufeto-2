<div class="py-3" style="position: sticky; bottom: 0px; top: calc(55px + 1rem);">
    <div class="p-3 h-100" style="border-radius: 1.5rem; background-image: url('/img/asfalt-light.png'), linear-gradient(45deg, rgba(177, 65, 177, 0.135), rgba(255, 135, 87, 0.135)); min-height: calc(100vh - 55px - 3rem)">
        <div class="mb-3 d-flex py-3">
            <div class="px-3">
                <div class="content-middle">
                    <div class="ringing-bell">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                        </svg>
                    </div>
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
        @if($list_pengumuman->count() > 0)
        @foreach ($list_pengumuman as $item)
            <div class="mb-3">
                <div class="card border-0 p-3 shadow-lg" style="border-radius: 1.5rem; background: rgba(255, 217, 0, 0.235)">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="pb-3 text-muted">
                                    {{ $item->created_at->diffForHumans() }}
                                </div>
                                <div class="text-success small pb-2">
                                    <small>
                                        terbaru
                                    </small>
                                </div>
                                <a href="{{ route('home.pengumuman.info', [ "pengumuman" => $item->id_berita ]) }}" class="text-decoration-none link-dark">
                                    <h5>
                                        {{ $item->judul }}
                                    </h5>
                                </a>
                            </div>
                            <div class="ps-3">
                                <div class="position-relative">
                                    <div class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2.1rem" height="2.1rem" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                                        </svg>
                                    </div>
                                    <div class="position-absolute top-0">
                                        {{-- <div class="animation-pulse">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                                <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                                            </svg>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        {{ $item->deskripsi }}
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="mb-3">
            <div class="card border-0 alert-warning m-0" style="border-radius: 1.5rem;">
                <div class="card-body">
                    Tidak ada pengumuman terbaru sepekan terakhir
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- <div class="p-3 text-muted">
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
    </div> --}}
</div>