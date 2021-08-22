<div>
    <div class="grid-kelas">
        @forelse ($list_kelas as $item)
            <a href="{{ route('home.siswa', [
                'kelas' => urlencode($item->nama),
                'id_kelas' => $item->id_kelas
            ]) }}" class="text-decoration-none">
                <div class="card td-none text-dark h-100" style="border-radius: 1rem">
                    <div class="card-body">
                        <h5 class="text-uppercase">
                            {{ $item->nama }}
                        </h5>
                        <div>
                            Wali Kelas: {{ optional($item->guru)->nama ?? "-" }}
                        </div>
                        <div class="small text-muted">
                            NIP.{{ optional($item->guru)->nip }}
                        </div>
                        <small>
                            {{ $item->siswa_count }} Siswa
                        </small>
                    </div>
                </div>
            </a>
        @empty
            
        @endforelse
    </div>
</div>