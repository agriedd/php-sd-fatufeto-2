<div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>No.</th>
                    <th>Waktu Mulai</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $kelas)
                @php
                    $waktu_counter = 0;
                    $nomor = 0;
                    $last_key_waktu = 0;
                @endphp
                @foreach ($kelas as $key_waktu => $waktu)
                    @php
                        $nomor++;
                    @endphp
                        @foreach ($waktu as $item)
                            @php
                                $waktu_counter++;
                            @endphp
                                @if($waktu_counter == 1)
                                    <tr>
                                        <td rowspan="{{ count($kelas) }}" class="text-center">
                                            <h5>
                                                @php
                                                    $nama_kelas = preg_replace("/kelas\s/i", "", $item->kelas->nama);
                                                @endphp
                                                {{ $nama_kelas }}
                                            </h5>
                                        </td>
                                @endif
                                @if($last_key_waktu != $key_waktu)
                                @php
                                    $last_key_waktu = $key_waktu;
                                @endphp    
                                @if($waktu_counter != 1)
                                    <tr>
                                @endif
                                        <td>{{ $nomor }}</td>
                                        <td>{{ $item->waktu_mulai }}</td>
                                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $hari_item)
                                            @php
                                                /**
                                                 * check if an items hari contains $hari_item 
                                                 */
                                                $exist = collect($waktu)->where('hari', $hari_item)->first();
                                            @endphp
                                            @if($exist)
                                                <td>
                                                    <div>
                                                        {{ $exist->mata_pelajaran }}
                                                    </div>
                                                    <div class="text-muted">
                                                        <small>
                                                            Hingga:
                                                            {{ $exist->waktu_berakhir }}
                                                        </small>
                                                    </div>
                                                </td>
                                            @else
                                                <td>-</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endif
                        @endforeach
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>