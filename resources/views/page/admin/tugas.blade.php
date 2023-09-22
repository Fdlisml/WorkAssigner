@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div id="myModal" class="modal" @if (Request::is('admin/tugas/create/*') || Request::is('admin/tugas/edit/*')) style='display: block' @endif>

            <!-- Modal content -->
            <div class="modal-content">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Form Tugas</h2>
                        <span class="close">&times;</span>
                    </div>
                    @if (Request::is('admin/tugas/edit/*'))
                        @php
                            $data = [
                                'url' => 'admin/tugas/update/' . $tugasDataF['id'],
                                'nama_tugas' => $tugasDataF['nama_tugas'],
                                'deskripsi' => $tugasDataF['deskripsi'],
                                'tgl_mulai' => $tugasDataF['tgl_mulai'],
                                'tgl_selesai' => $tugasDataF['tgl_selesai'],
                                'id_project' => $tugasDataF['id_project'],
                                'id_user' => $tugasDataF['id_user'],
                            ];
                        @endphp
                    @elseif (Request::is('admin/tugas/create/*'))
                        @php
                            $data = [
                                'url' => 'admin/tugas/store',
                                'nama_tugas' => '',
                                'deskripsi' => '',
                                'tgl_mulai' => '',
                                'tgl_selesai' => '',
                                'id_project' => $tugasDataF['id'],
                                'id_user' => '',
                            ];
                        @endphp
                    @else
                        @php
                            $data = [
                                'url' => 'admin/tugas/store',
                                'nama_tugas' => '',
                                'deskripsi' => '',
                                'tgl_mulai' => '',
                                'tgl_selesai' => '',
                                'id_project' => '',
                                'id_user' => '',
                            ];
                        @endphp
                    @endif

                    <div class="form">
                        <form action="{{ url($data['url']) }}" method="POST">
                            @csrf
                            <label>
                                Nama Project
                                <select name="id_project">
                                    <option></option>
                                    @foreach ($projectData as $p)
                                        @if ($p['id'] == $data['id_project'])
                                            <option value="{{ $p['id'] }}" selected>
                                                {{ $p['nama_project'] }}
                                            </option>
                                        @else
                                            <option value="{{ $p['id'] }}">{{ $p['nama_project'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </label>
                            <label>
                                Nama Developer
                                <select name="id_user">
                                    <option></option>
                                    @foreach ($userData as $u)
                                        @if ($u['id'] == $data['id_user'])
                                            <option value="{{ $u['id'] }}" selected>
                                                {{ $u['name'] }}
                                            </option>
                                        @else
                                            <option value="{{ $u['id'] }}">{{ $u['name'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </label>
                            <label>
                                Tugas <input type="text" name="nama_tugas" class="tugas"
                                    value="{{ $data['nama_tugas'] }}">
                            </label>
                            <label>
                                Deskripsi
                                <textarea name="deskripsi" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>
                            </label>
                            <label>
                                Tanggal Mulai <input type="date" name="tgl_mulai" class="tgl_mulai"
                                    value="{{ $data['tgl_mulai'] }}">
                            </label>
                            <label>
                                Tanggal Selesai <input type="date" name="tgl_selesai" class="tgl_selesai"
                                    value="{{ $data['tgl_selesai'] }}">
                            </label>
                            <button type="submit" class="cta">
                                <span>Send Work !</span>
                                <svg viewBox="0 0 13 10" height="10px" width="15px">
                                    <path d="M1,5 L11,5"></path>
                                    <polyline points="8 1 12 5 8 9"></polyline>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Data Tugas</h2>
                <a id="myBtn" class="btn">Form Tugas</a>
            </div>

            <table id="table">
                <thead>
                    <tr>
                        <th>NAMA TUGAS</th>
                        <th>NAMA PROJECT</th>
                        <th>NAMA DEVELOPER</th>
                        <th>DESKRIPSI</th>
                        <th>TANGGAL MULAI</th>
                        <th>TANGGAL SELESAI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugasData as $t)
                        <div class="wadah-table">
                            <tr>
                                <td>{{ $t['tugas']['nama_tugas'] }}</td>
                                <td>{{ $t['project']['nama_project'] }}</td>
                                <td>{{ $t['user']['name'] }}</td>
                                <td>{{ $t['tugas']['deskripsi'] }}</td>
                                <td>{{ $t['tugas']['tgl_mulai'] }}</td>
                                <td>{{ $t['tugas']['tgl_selesai'] }}</td>
                                <td>
                                    <div class="flex-btn">
                                        <a href="{{ url('admin/tugas/destroy/' . $t['tugas']['id']) }}">HAPUS</a>
                                        |
                                        <a href="{{ url('admin/tugas/edit/' . $t['tugas']['id']) }}">Edit</a>
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
