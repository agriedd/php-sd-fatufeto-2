<div class="mb-3 sticky-top pt-3" style="top: calc(55px + 1rem);">
    <div class="card border-0 bg-white shadow-sm mx-auto" style="border-radius: .5rem; max-width: 400px">
        <div class="card-body">
            <div class="d-flex">
                <input type="search" class="form-control w-100 outline-none shadow-none border-0" placeholder="Temukan.." v-model="search">
                <div class="ps-3 text-muted">
                    <div class="content-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($table = true)
    <list-siswa v-model="search"/>
@else
@endif