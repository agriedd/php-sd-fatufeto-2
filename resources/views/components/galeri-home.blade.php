<div class="mb-3 py-5 text-center" id="galeri">
    <h3 class="mb-0">
        Galeri
    </h3>
    <small class="text-muted">
        Galeri Kegiatan {{ env('APP_NAME') }}
    </small>
    <div class="mx-auto my-2" style="border-bottom: 3px solid var(--bs-teal); max-width: 2rem"></div>
</div>
<div class="mb-3">
    @php
        $list = ['large', 'large', 'large', 'large', 'large', 'large', 'large', 'large', 'wide', 'wide'];
    @endphp
    <div class="galery-home" style="gap: .25rem">
        @foreach ($list_galeri as $index => $galeri)
            <a href="{{ route('home.kegiatan.show', ['id_galeri' => $galeri->id_gambar_kegiatan, 'id_kegiatan' => $galeri->id_kegiatan ]) }}" class="{{ isset($list[$index]) && $list[$index] != null ? $list[$index] : null }}" style="background-image: url('{{ $galeri->foto->url }}');"></a>
        @endforeach
    </div>
</div>