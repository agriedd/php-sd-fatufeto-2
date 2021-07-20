<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow" style="position: sticky; top: 0px; z-index: 10">
    <div class="container">
        <div></div>
        <button class="btn btn-md btn-link text-white d-lg-none d-block" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : null }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profil*') ? 'active' : null }}" href="{{ route('home.profil') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guru*') ? 'active' : null }}" href="{{ route('home.guru') }}">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('siswa*') ? 'active' : null }}" href="{{ route('home.siswa') }}">Siswa</a>
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
                @auth()
                <li class="nav-item d-flex">
                    <div>
                        <a class="nav-link {{ request()->is('admin*') ? 'active' : null }}" href="{{ route('admin') }}">Panel Admin</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link ps-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Panel Admin</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Tambah Pengumuman</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Keluar</a></li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('login*') ? 'active' : null }}" href="{{ route('login') }}">Login</a>
                </li>
                @endauth
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