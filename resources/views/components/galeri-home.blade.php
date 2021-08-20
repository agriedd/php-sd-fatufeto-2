<div class="mb-3 py-3" id="galeri">
    <h4>
        Galeri
    </h4>
</div>
<div class="mb-3">
    @php
        $list = ['large', null, 'wide', null, 'large'];
    @endphp
    <div class="galery-home">
        @foreach ($list_galeri as $index => $galeri)
            <div class="{{ isset($list[$index]) && $list[$index] != null ? $list[$index] : null }}" style="background-image: url('{{ $galeri->foto->url }}');"></div>
        @endforeach
    </div>
</div>