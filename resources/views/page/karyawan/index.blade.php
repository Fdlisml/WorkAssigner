@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Pekerjaan Hari Ini</h2>
            </div>

            <div class="wadah-table">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Nama Pekerjaan</th>
                            <th>Nama Proyek</th>
                            <th>Nama Karyawaan</th>
                            <th>Deskripsi</th>
                            <th>Prioritas</th>
                            <th>Tenggat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobsToday as $jt)
                            <tr>
                                <td>{{ $jt['pekerjaan']['nama_pekerjaan'] }}</td>
                                <td>{{ $jt['proyek']['nama_proyek'] }}</td>
                                <td>{{ $jt['user']['name'] }}</td>
                                <td>{{ $jt['pekerjaan']['deskripsi'] }}</td>
                                <td>
                                    <div class="status">
                                        <div class="work-status" id="status-div">
                                            {{ $jt['pekerjaan']['prioritas'] }}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $jt['pekerjaan']['tenggat'] }}</td>
                                <td>
                                    <div class="tooltip">
                                        <a id="myBtn" class="btn" data-id="{{ $jt['pekerjaan']['id'] }}" href="/karyawan/laporan" @if ($jt['laporan'] == !null) disabled @endif>Laporan</a>
                                        <span class="tooltiptext">Laporan sudah dibuat</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= New Customers ================ -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Laporan Pekerjaan</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="wadah-form">
                        <div class="container-form">
                            <p>
                                <ion-icon name="business-outline"></ion-icon>
                            </p>
                            <hr>
                            <form action="{{ url('karyawan/laporan/store') }}" method="POST">
                                @csrf
                                <div class="center-form">
                                    <label for="nama_laporan">Nama Laporan</label><br>
                                    <input type="text" id="nama_laporan" name="nama_laporan" placeholder="Masukkan Nama Laporan" required>
                                    <br>
                                    <br>
                                    <label for="nama_laporan">Deskripsi</label><br>
                                    <textarea id="deskripsi" name="deskripsi" cols="30" rows="5" placeholder="Masukkan Laporan" required></textarea>
                                    <br>
                                    <br>
                                    <label for="keluhan">Keluhan</label><br>
                                    <textarea id="keluhan" name="keluhan" cols="30" rows="5" placeholder="Masukkan Keluhan" required></textarea>
                                    <br>
                                    <br>
                                    <label for="progres">Progres</label><br>
                                    <div class="field">
                                        <div class="range-active">
                                            <input class="range" type="range" id="progres" name="progres" min="0" max="100" value="0" steps="1">
                                        </div>

                                        <div class="value">
                                            <span class="rangeValue">0%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-form">
                                    <input type="hidden" name="tgl_laporan"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <input type="hidden" name="id_pekerjaan" value="">
                                    <input type="hidden" name="id_user" value="{{ session('id') }}">
                                    <button class="learn-more" type="submit">
                                        <span class="circle" aria-hidden="true">
                                            <span class="icon arrow"></span>
                                        </span>
                                        <span class="button-text">Send!</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection