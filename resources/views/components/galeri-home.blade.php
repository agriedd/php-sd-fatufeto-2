@if(!$hideGaleri)
    <div class="mb-3 py-5 text-center" id="galeri">
        <h3 class="mb-0">
            Galeri
        </h3>
        <small class="text-muted">
            Galeri Kegiatan {{ optional($kegiatan)->nama_kegiatan ?? env('APP_NAME') }}
        </small>
        <div class="mx-auto my-2" style="border-bottom: 3px solid var(--bs-teal); max-width: 2rem"></div>
    </div>
@endif
<div class="mb-3">
    @php
        $list = ['large', null, null, null, null, 'large', null, null, 'wide', 'wide'];
    @endphp
    <div class="galery-home" style="gap: .25rem">
        @foreach ($list_galeri as $index => $galeri)
            <a href="{{ route('home.kegiatan.show', [
                'id_kegiatan'   => $galeri->id_kegiatan,
                'id_galeri'     => $galeri->id_gambar_kegiatan,
            ]) }}" class="{{ isset($list[$index]) && $list[$index] != null ? $list[$index] : null }}" style="background-image: url('{{ $galeri->foto->url }}');"></a>
        @endforeach
        @if(count($list_galeri) < $max)
        {{-- 
            kalo max 3
            list = 0
            harusnya 0, 1, 2  i dimulai dari 0; i < 3 [3 - (3 - 0)]
            kalo max 3
            list 1
            harusnya 1, 2 i dimulai dari 1 [3 - (3 - 1)]
            kalo max 3
            list 2
            harusnya 2 i dimulai dari 2 [3 - (3 - 2)]
            kalo max 3
            list 3
            harusnya [kosong] i dimulai dari 3 [3 - (3 - 3)]
        --}}
            @for ($i = $max - ($max - count($list_galeri)) ; $i < $max; $i++)
                <a href="#" class="{{ isset($list[$i]) && $list[$i] != null ? $list[$i] : null }}" style="background: rgba(0,0,0,.025)"></a>
            @endfor
        @endif
    </div>
</div>