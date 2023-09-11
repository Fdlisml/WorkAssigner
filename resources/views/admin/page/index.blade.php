@extends('admin.main')
@section('content')
<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Data Project</h2>
            <a href="#" class="btn">View All</a>
        </div>
        @if (Request::is('admin/project/edit/*'))
            @php
                $data = [
                    'url' => 'admin/project/update/' . $projectEdit['id'],
                    'nama_project' => $projectEdit['nama_project'],
                    'tugas' => $projectEdit['tugas'],
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
                    'tugas' => '',
                    'deskripsi' => '',
                    'tgl_mulai' => '',
                    'tgl_selesai' => '',
                ];
            @endphp
        @endif
        <div class="form">
            <form action="{{ url($data['url']) }}" method="post">
                @csrf
                <label>
                    Nama Project
                </label>
                <input type="text" name="nama_project" value="{{ $data['nama_project'] }}">
                <label>
                    Tugas
                </label>
                <input type="text" name="tugas" value="{{ $data['tugas'] }}">
                <label>
                    Deskripsi
                </label>
                <textarea name="deskripsi" id="" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>
                <label><br>
                    Tgl Mulai
                </label>
                <input type="date" name="tgl_mulai" value="{{ $data['tgl_mulai'] }}">
                <label>
                    Tgl Selesai
                </label>
                <input type="date" name="tgl_selesai" value="{{ $data['tgl_selesai'] }}">
                <button class="cta">
                    <span>Send Work !</span>
                    <svg viewBox="0 0 13 10" height="10px" width="15px">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <!-- ================= New Customers ================ -->
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Data Project</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NAMA PROJECT</th>
                    <th>TUGAS</th>
                    <th>DESKRIPSI</th>
                    <th>TANGGAL MULAI</th>
                    <th>TANGGAL SELESAI</th>
                    <th>ACTION</th>
                </tr>
                @foreach ($project as $p)
                    <div class="wadah-table">
                        <tr>
                            <td>{{ $p['nama_project'] }}</td>
                            <td>{{ $p['tugas'] }}</td>
                            <td>{{ $p['deskripsi'] }}</td>
                            <td>{{ $p['tgl_mulai'] }}</td>
                            <td>{{ $p['tgl_selesai'] }}</td>
                            <td>
                                <div class="btn-action">
                                    <a href="{{ url('admin/project/destroy/' . $p['id']) }}">Delete</a>
                                    |
                                    <a href="{{ url('admin/project/edit/' . $p['id']) }}">Update</a>
                                </div>
                            </td>
                        </tr>
                    </div>
                @endforeach
            </thead>
        </table>
    </div>
</div>
@endsection