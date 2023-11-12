@extends('main')
@section('content')
    <div class="details">
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Working Result</h2>
                <a href="index" class="btn">Work</a>
            </div>
            <div class="wadah-table">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Nama Laporan</th>
                            <th>Deskripsi</th>
                            <th>Keluhan</th>
                            <th>Progres</th>
                            <th>Tanggal Laporan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $l)
                            <tr>
                                <td>{{ $l['nama_laporan'] }}</td>
                                <td>{{ $l['deskripsi'] }}</td>
                                <td>{{ $l['keluhan'] }}</td>
                                <form action="{{ url('/user/laporan/update/' . $l['id']) }}" method="POST">
                                    @csrf
                                    <td>
                                        <div class="field">
                                            <div class="range-active">
                                                <input class="range" type="range" name="progres" min="0"
                                                    max="100" value="{{ $l['progres'] }}" steps="1"
                                                    @if ($l['progres'] === 100) disabled @endif>
                                            </div>
                                            <div>
                                                <span class="rangeValue">{{ $l['progres'] }}%</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $l['tgl_laporan'] }}</td>
                                    <td>
                                        <div class="btn-update">
                                            <input type="hidden" name="id_pekerjaan" value="{{ $l['id_pekerjaan'] }}">
                                            <input type="hidden" name="id_laporan" value="{{ $l['id'] }}">
                                            <div class="tooltip">
                                                <button type="submit" id="myBtn" class="btn"
                                                    @if ($l['progres'] === 100) disabled @endif>Change</button>
                                                <span class="tooltiptext">Progres sudah 100%</span>
                                            </div>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
