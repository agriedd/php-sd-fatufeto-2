<div class="mb-3 py-3" id="kontak">
    <h4>
        Kontak
    </h4>
</div>
<div class="mb-3">
    <div class="card border-0 p-3" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
        <div class="card-body">
            @forelse($kontak as $item)
                <li>
                    {{ $item }}
                </li>
            @empty
                
            @endforelse
        </div>
    </div>
</div>