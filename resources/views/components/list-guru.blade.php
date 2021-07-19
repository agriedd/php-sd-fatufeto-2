<div class="mb-3 sticky-top pt-3" style="top: 55px;">
    <div class="card border-0 bg-white shadow-sm mx-auto" style="border-radius: .5rem; max-width: 400px">
        <div class="card-body">
            <div class="d-flex">
                <input type="search" class="form-control w-100 outline-none shadow-none border-0" placeholder="Temukan..">
                <div class="ps-3 text-muted">
                    <div class="content-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($table = true)
<div class="mb-3">
    <div class="card mb-2 bg-dark text-light border-0" style="border-radius: 1rem;">
        <div class="card-body">
            <div class="row g-0">
                <div class="col" style="max-width: 4rem;">
                </div>
                <div class="col">
                    Nama
                </div>
                <div class="col-3">
                    Jenis Kelamin
                </div>
                <div class="col-3 d-none d-sm-block">
                    Keterangan
                </div>
            </div>
        </div>
    </div>
    @for($i = 0; $i < 10; $i++)
    <div class="card mb-2 bg-light border-0" style="border-radius: 1rem;">
        <div class="card-body">
            <div class="row g-0">
                <div class="col" style="max-width: 4rem;">
                    <div class="foto-profil flex-grow-1 shadow-sm" style="height: 3rem; width: 3rem; background-image: url('{{ asset('img/mihai-moisa-CaVEetK-bIY-unsplash.jpg') }}');"></div>
                </div>
                <div class="col">
                    <div class="content-middle align-items-start">
                        <div class="text-uppercase small fw-bold">
                            Lorem Ipsum
                        </div>
                        <div class="text-muted small">
                            319239192392112313
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="content-middle align-items-start">
                        <small>
                            Laki-Laki
                        </small>
                    </div>
                </div>
                <div class="col-3 d-none d-sm-block">
                    <div class="content-middle align-items-start">
                        <small>
                            Lorem ipsum dolor
                        </small>
                    </div>
                </div>
            </div class="row g-0">
        </div>
    </div>
    @endfor
</div>
@else
<div class="mb-3">
    <div class="grid-guru">
        @for($i = 0; $i < 20; $i++)
        <div class="p-3 bg-blue-grey-dark" style="border-radius: 1rem;">
            <div class="d-flex flex-column justify-content-between h-100 w-100">
                <div class="foto-profil flex-grow-1 shadow-sm" style="background-image: url('{{ asset('img/mihai-moisa-CaVEetK-bIY-unsplash.jpg') }}');"></div>
                <div class="pt-2">
                    <div class="text-dark" style="transform: translateY(0rem);">
                        <div class="d-flex">
                            <div class="pe-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0 text-uppercase">
                                    Lorem ipsum dolor sit.
                                </h6>
                                <div class="small text-muted text-truncate">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, facere!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 bg-blue-grey-dark" style="border-radius: 1rem;">
            <div class="d-flex flex-column justify-content-between h-100 w-100">
                <div class="foto-profil flex-grow-1 shadow-sm" style="background-image: url('{{ asset('img/ryan-ancill-aJYO8JmVodY-unsplash.jpg') }}');"></div>
                <div class="pt-2">
                    <div class="text-dark" style="transform: translateY(0rem);">
                        <div class="d-flex">
                            <div class="pe-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0">
                                    Lorem ipsum dolor sit.
                                </h6>
                                <div class="small text-muted text-truncate">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, facere!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endif