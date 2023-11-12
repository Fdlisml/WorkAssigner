@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div id="myModal" class="modal" @if (Request::is('admin/pekerjaan/create/*') || Request::is('admin/pekerjaan/edit/*')) style='display: block' @endif>

            <!-- Modal content -->
            <div class="modal-content">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Form Pekerjaan</h2>
                        <span class="close">&times;</span>
                    </div>
                    @if (Request::is('admin/pekerjaan/edit/*'))
                        @php
                            $data = [
                                'url' => 'admin/pekerjaan/update/' . $pekerjaanDataF['id'],
                                'nama_pekerjaan' => $pekerjaanDataF['nama_pekerjaan'],
                                'deskripsi' => $pekerjaanDataF['deskripsi'],
                                'prioritas' => $pekerjaanDataF['prioritas'],
                                'tenggat' => $pekerjaanDataF['tenggat'],
                                'id_proyek' => $pekerjaanDataF['id_proyek'],
                                'id_user' => $pekerjaanDataF['id_user'],
                            ];
                        @endphp
                    @elseif (Request::is('admin/pekerjaan/create/*'))
                        @php
                            $data = [
                                'url' => 'admin/pekerjaan/store',
                                'nama_pekerjaan' => '',
                                'deskripsi' => '',
                                'prioritas' => '',
                                'tenggat' => '',
                                'id_proyek' => $pekerjaanDataF['id'],
                                'id_user' => '',
                            ];
                        @endphp
                    @else
                        @php
                            $data = [
                                'url' => 'admin/pekerjaan/store',
                                'nama_pekerjaan' => '',
                                'deskripsi' => '',
                                'prioritas' => '',
                                'tenggat' => '',
                                'id_proyek' => '',
                                'id_user' => '',
                            ];
                        @endphp
                    @endif

                    <div class="form">
                        <form action="{{ url($data['url']) }}" method="POST">
                            @csrf
                            <label for="id_proyek">
                                Nama Proyek
                            </label>
                            <select id="id_proyek" name="id_proyek">
                                <option></option>
                                @foreach ($proyekData as $p)
                                    @if ($p['id'] == $data['id_proyek'])
                                        <option value="{{ $p['id'] }}" selected>
                                            {{ $p['nama_proyek'] }}
                                        </option>
                                    @else
                                        <option value="{{ $p['id'] }}">{{ $p['nama_proyek'] }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="id_user">
                                Nama Karyawan
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
                            <label for="nama_pekerjaan">Pekerjaan</label>
                            <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="pekerjaan" value="{{ $data['nama_pekerjaan'] }}">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>
                            <label for="prioritas">Prioritas</label>
                            <input type="number" id="prioritas" name="prioritas" max="3" min="1" class="prioritas" value="{{ $data['prioritas'] }}">
                            <label for="tenggat">Tenggat</label>
                            <input type="date" id="tenggat" name="tenggat" class="tenggat" value="{{ $data['tenggat'] }}">
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
                <h2>Data Pekerjaan</h2>
                <a id="myBtn" class="btn">Form Pekerjaan</a>
            </div>

            <table id="table">
                <thead>
                    <tr>
                        <th>NAMA PEKERJAAN</th>
                        <th>NAMA PROYEK</th>
                        <th>NAMA KARYAWAN</th>
                        <th>DESKRIPSI</th>
                        <th>PRIORITAS</th>
                        <th>TENGGAT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pekerjaanData as $t)
                        <div class="wadah-table">
                            <tr>
                                <td>{{ $t['pekerjaan']['nama_pekerjaan'] }}</td>
                                <td>{{ $t['proyek']['nama_proyek'] }}</td>
                                <td>{{ $t['user']['name'] }}</td>
                                <td>{{ $t['pekerjaan']['deskripsi'] }}</td>
                                <td>{{ $t['pekerjaan']['prioritas'] }}</td>
                                <td>{{ $t['pekerjaan']['tenggat'] }}</td>
                                <td>
                                    <div class="flex-btn">
                                        <a href="{{ url('admin/pekerjaan/destroy/' . $t['pekerjaan']['id']) }}">HAPUS</a>
                                        |
                                        <a href="{{ url('admin/pekerjaan/edit/' . $t['pekerjaan']['id']) }}">Edit</a>
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
