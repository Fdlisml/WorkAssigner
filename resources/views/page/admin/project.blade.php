@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Data Project</h2>
                <a id="myBtn" class="btn">Form Project</a>
            </div>

            <table id="table">
                <thead>
                    <tr>
                        <th>NAMA PROJECT</th>
                        <th>DESKRIPSI</th>
                        <th>TANGGAL MULAI</th>
                        <th>TANGGAL SELESAI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $p)
                        <div class="wadah-table">
                            <tr>
                                <td>{{ $p['nama_project'] }}</td>
                                <td>{{ $p['deskripsi'] }}</td>
                                <td>{{ $p['tgl_mulai'] }}</td>
                                <td>{{ $p['tgl_selesai'] }}</td>
                                <td>
                                    <div class="flex-btn">
                                        <a href="{{ url('admin/project/destroy/' . $p['id']) }}">HAPUS</a>
                                        |
                                        <a href="{{ url('admin/project/edit/' . $p['id']) }}">Edit</a>
                                        |
                                        <a href="{{ url('admin/tugas/create/' . $p['id']) }}">Tambah
                                            Tugas</a>
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
    <div id="myModal" class="modal" @if (Request::is('admin/project/edit/*')) style='display: block' @endif>

        <!-- Modal content -->
        <div class="modal-content">
            <div class="recentOrders">
                <div class="cardHeader">
                    <span class="close">&times;</span>
                    <h2>Form Project</h2>
                </div>

                @if (Request::is('admin/project/edit/*'))
                    @php
                        $data = [
                            'url' => 'admin/project/update/' . $projectEdit['id'],
                            'nama_project' => $projectEdit['nama_project'],
                            'deskripsi' => $projectEdit['deskripsi'],
                            'tgl_mulai' => $projectEdit['tgl_mulai'],
                            'tgl_selesai' => $projectEdit['tgl_selesai'],
                        ];
                    @endphp
                @else
                    @php
                        $data = [
                            'url' => 'admin/project/store',
                            'nama_project' => '',
                            'deskripsi' => '',
                            'tgl_mulai' => '',
                            'tgl_selesai' => '',
                        ];
                    @endphp
                @endif
                <div class="form">
                    <form action="{{ url($data['url']) }}" method="post">
                        @csrf
                        <label for="nama_project">Nama Project</label>
                        <input type="text" id="nama_project" name="nama_project" value="{{ $data['nama_project'] }}">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>
                        <label for="tgl_mulai"><br>Tanggal Mulai</label>
                        <input type="date" id="tgl_mulai" name="tgl_mulai" value="{{ $data['tgl_mulai'] }}">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" id="tgl_selesai" name="tgl_selesai" value="{{ $data['tgl_selesai'] }}">
                        <button type="submit" class="cta">
                            <span>Send Work !</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
