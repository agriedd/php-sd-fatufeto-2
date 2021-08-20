<div class="mb-3 py-3 text-center" id="misi">
    <h3 class="mb-0">
        Misi
    </h3>
    <small class="text-muted">
        Misi {{ env('APP_NAME') }}
    </small>
    <div class="mx-auto my-2" style="border-bottom: 3px solid var(--bs-teal); max-width: 2rem"></div>
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