@extends('main')
@section('content')
    <!-- ================= New Customers ================ -->
    <div class="details">
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Data Laporan</h2>
            </div>

            <table id="table">
                <thead>
                    <tr>
                        <th>NAMA LAPORAN</th>
                        <th>NAMA PEKERJAAN</th>
                        <th>NAMA KARYAWAN</th>
                        <th>DESKRIPSI</th>
                        <th>KELUHAN</th>
                        <th>PROGRES</th>
                        <th>TANGGAL LAPORAN</th>
                        <th>NAMA PROYEK</th>
                        <th>ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($laporanData as $l)
                        <div class="wadah-table">
                            <tr>
                                <td>{{ $l['laporan']['nama_laporan'] }}</td>
                                <td>{{ $l['proyek']['nama_proyek'] }}</td>
                                <td>{{ $l['pekerjaan']['nama_pekerjaan'] }}</td>
                                <td>{{ $l['laporan']['deskripsi'] }}</td>
                                <td>{{ $l['laporan']['keluhan'] }}</td>
                                <td>{{ $l['laporan']['progres'] }}</td>
                                <td>{{ $l['laporan']['tgl_laporan'] }}</td>
                                <td>{{ $l['user']['name'] }}</td>
                                <td>
                                    <div class="flex-btn">
                                        <a href="{{ url('admin/laporan/destroy/' . $l['laporan']['id']) }}">HAPUS</a>
                                    </div>
                                </td>
                            </tr>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
