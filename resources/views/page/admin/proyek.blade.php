@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Data Proyek</h2>
                <a id="myBtn" class="btn">Form Proyek</a>
            </div>

            <table id="table">
                <thead>
                    <tr>
                        <th>NAMA PROYEK</th>
                        <th>DESKRIPSI</th>
                        <th>TANGGAL MULAI</th>
                        <th>TANGGAL SELESAI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyek as $p)
                        <div class="wadah-table">
                            <tr>
                                <td>{{ $p['nama_proyek'] }}</td>
                                <td>{{ $p['deskripsi'] }}</td>
                                <td>{{ $p['tgl_mulai'] }}</td>
                                <td>{{ $p['tgl_selesai'] }}</td>
                                <td>
                                    <div class="flex-btn">
                                        <a href="{{ url('admin/proyek/destroy/' . $p['id']) }}">HAPUS</a>
                                        |
                                        <a href="{{ url('admin/proyek/edit/' . $p['id']) }}">Edit</a>
                                        |
                                        <a href="{{ url('admin/pekerjaan/create/' . $p['id']) }}">Tambah Pekerjaan</a>
                                    </div>
                                </td>
                            </tr>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal" @if (Request::is('admin/proyek/edit/*')) style='display: block' @endif>

        <!-- Modal content -->
        <div class="modal-content">
            <div class="recentOrders">
                <div class="cardHeader">
                    <span class="close">&times;</span>
                    <h2>Form Proyek</h2>
                </div>

                @if (Request::is('admin/proyek/edit/*'))
                    @php
                        $data = [
                            'url' => 'admin/proyek/update/' . $proyekEdit['id'],
                            'nama_proyek' => $proyekEdit['nama_proyek'],
                            'deskripsi' => $proyekEdit['deskripsi'],
                            'tgl_mulai' => $proyekEdit['tgl_mulai'],
                            'tgl_selesai' => $proyekEdit['tgl_selesai'],
                        ];
                    @endphp
                @else
                    @php
                        $data = [
                            'url' => 'admin/proyek/store',
                            'nama_proyek' => '',
                            'deskripsi' => '',
                            'tgl_mulai' => '',
                            'tgl_selesai' => '',
                        ];
                    @endphp
                @endif
                <div class="form">
                    <form action="{{ url($data['url']) }}" method="post">
                        @csrf
                        <label for="nama_proyek">Nama Proyek</label>
                        <input type="text" id="nama_proyek" name="nama_proyek" value="{{ $data['nama_proyek'] }}">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>
                        <label for="tgl_mulai"><br>Tanggal Mulai</label>
                        <input type="date" id="tgl_mulai" name="tgl_mulai" value="{{ $data['tgl_mulai'] }}">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" id="tgl_selesai" name="tgl_selesai" value="{{ $data['tgl_selesai'] }}">
                        <button type="submit" class="cta">
                            <span>Send!</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
