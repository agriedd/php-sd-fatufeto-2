<div class="card border-0 p-3 mb-4" style="border-radius: 1.5rem; background: #a59c6838">
    <div class="d-flex">
        <div>
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h4>
                            Selamat datang di Website {{ config('app.name') }}
                        </h4>
                        <div class="text-muted">
                            <small>
                                Sambutan
                            </small>
                        </div>
                    </div>
                    <div>
                        <div class="ps-3" style="color: #6cb2eb">
                            <div class="content-middle rounded-circle" style="height: 3rem; width: 3rem; background: #6cb2eb38">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
                                    <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <small>
                    {{ $sambutan }}
                </small>
            </div>
        </div>
        <div>
            <div style="height: 200px; width: 200px; border-radius: 1rem; background-image: url('{{ asset('img/kepala.jpeg') }}'); background-position: 340px 250px; background-size: 400px">
            </div>
        </div>
    </div>
</div>
<div class="card border-0 p-3" style="border-radius: 1.5rem; background: #a59c6838">
    <div class="card-body">
        <div class="d-flex">
            <h5>
                Identitas Sekolah
            </h5>
        </div>
    </div>
    <div class="card-body pt-0">
        <div>
            Berdiri sejak {{ \Carbon\Carbon::make($tgl_berdiri)->format("d-m-Y") }}
        </div>
        <div>
            NPSN {{ $npsn }}
        </div>
        <div>
            Luas Tanah {{ $luas_tanah }}m<sup>2</sup>
        </div>
        <div>
            Jenjang {{ $jenjang }}
        </div>
    </div>
</div>