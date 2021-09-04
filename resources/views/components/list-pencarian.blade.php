<div class="p-3">
    <div class="card mb-4 bg-light border-0" style="border-radius: 1.5rem">
        <div class="card-body">
            Pencarian dengan kata kunci <b>{{ request("q") }}</b>
        </div>
    </div>
    @forelse ($items as $item)
        @if($item->type == "App\\Berita")
            <a href="{{ route('home.pengumuman.info', ['pengumuman' => $item->id]) }}" class="text-dark text-decoration-none">
                <div class="card mb-2">
                    <div class="d-flex">
                        <div class="ps-4 pe-2">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                                    <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div class="card-body pb-0">
                                <span class="text-muted">
                                    <small>
                                        Berita
                                    </small>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                <span class="text-success">
                                    {{ $item->kategori }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                <span class="text-muted">
                                    {{ Carbon\Carbon::make($item->created_at)->diffForHumans() }}
                                </span>
                                <h5>
                                    {{ $item->judul }}
                                </h5>
                            </div>
                            <div class="card-body pt-0">
                                {{ $item->deskripsi }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @else
            <a href="{{ route('home.kegiatan.show', ['id_kegiatan' => $item->id]) }}" class="text-dark text-decoration-none">
                <div class="card mb-2">
                    <div class="d-flex">
                        <div class="ps-4 pe-2">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ps-4 pe-2">
                            <div class="d-flex flex-column justify-content-center h-100 text-center">
                                <div>
                                    {{ Carbon\Carbon::make($item->tanggal_terbit)->locale('id-ID')->translatedFormat('M') }}
                                </div>
                                <div>
                                    <h5 class="mb-0">
                                        {{ Carbon\Carbon::make($item->tanggal_terbit)->translatedFormat('d') }}
                                    </h5>
                                </div>
                                <div class="text-muted">
                                    <small>
                                        {{ Carbon\Carbon::make($item->tanggal_terbit)->translatedFormat('Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-body pb-0">
                                <span class="text-muted">
                                    <small>
                                        Berita
                                    </small>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                <span class="text-success">
                                    {{ $item->kategori }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                <span class="text-muted">
                                    {{ Carbon\Carbon::make($item->created_at)->diffForHumans() }}
                                </span>
                                <h5>
                                    {{ $item->judul }}
                                </h5>
                            </div>
                            <div class="card-body pt-0">
                                {{ $item->isi }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endif
    @empty
        <div class="card mb-4 bg-warning border-0" style="border-radius: 1.5rem">
            <div class="card-body">
                Tidak ada hasil pencarian dengan kata kunci <b>{{ request("q") }}</b>
            </div>
        </div>
    @endforelse
</div>