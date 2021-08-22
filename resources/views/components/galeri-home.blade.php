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
        $list = ['large', null, null, 'wide', null, null, 'large'];
    @endphp
    <div class="galery-home">
        @foreach ($list_galeri as $index => $galeri)
            <a href="#" class="{{ isset($list[$index]) && $list[$index] != null ? $list[$index] : null }}" style="background-image: url('{{ $galeri->foto->url }}');"></a>
        @endforeach
    </div>
</div>