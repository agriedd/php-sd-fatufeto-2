<div class="mb-3 py-3" id="misi">
    <h4 class="mb-0">
        Misi
    </h4>
</div>
<div class="mb-3">
    <div class="card border-0 p-3" style="border-radius: 1.5rem; background: rgba(0,0,0,.025)">
        <div class="card-body">
            @if (count($list_misi) > 0)
                <ol>
                    @foreach ($list_misi as $misi)
                        <li>
                            {{ $misi }}
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
</div>