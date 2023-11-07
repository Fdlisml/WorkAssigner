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
                                'prioritas' => $tugasDataF['prioritas'],
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
                                'prioritas' => '',
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
                                'prioritas' => '',
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
                            <label for="id_project">
                                Nama Project
                            </label>
                            <select id="id_project" name="id_project">
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
                            <label for="id_user">
                                Nama Developer
                            </label>
                            <select id="id_user" name="id_user">
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
                            <label for="nama_tugas">Tugas</label>
                            <input type="text" id="nama_tugas" name="nama_tugas" class="tugas" value="{{ $data['nama_tugas'] }}">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>
                            <label for="prioritas">Prioritas</label>
                            <input type="number" id="prioritas" name="prioritas" max="3" min="1" class="prioritas" value="{{ $data['prioritas'] }}">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="tgl_mulai" value="{{ $data['tgl_mulai'] }}">
                            <label for="tgl_selesai">Tanggal Selesai</label>
                            <input type="date" id="tgl_selesai" name="tgl_selesai" class="tgl_selesai" value="{{ $data['tgl_selesai'] }}">
                            <button type="submit" class="cta">
                                <span>Send!</span>
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
                        <th>PRIORITAS</th>
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
                                <td>{{ $t['tugas']['prioritas'] }}</td>
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
