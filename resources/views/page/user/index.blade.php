@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Jobs Today</h2>
            </div>

            <div class="wadah-table">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Name Task</th>
                            <th>Name Project</th>
                            <th>Description</th>
                            <th>Prioritas</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobsToday as $jt)
                            <tr>
                                <td>{{ $jt['tugas']['nama_tugas'] }}</td>
                                <td>{{ $jt['project']['nama_project'] }}</td>
                                <td>{{ $jt['tugas']['deskripsi'] }}</td>
                                <td>
                                    <div class="status">
                                        <div class="work-status" id="status-div">
                                            {{ $jt['tugas']['prioritas'] }}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $jt['tugas']['tgl_selesai'] }}</td>
                                <td>
                                    <div class="tooltip">
                                        <a id="myBtn" class="btn" data-id="{{ $jt['tugas']['id'] }}" href="/user/laporan" @if ($jt['laporan'] == !null) disabled @endif>Laporan</a>
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
                        <h2>Job Report</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="wadah-form">
                        <div class="container-form">
                            <p>
                                <ion-icon name="business-outline"></ion-icon><span>Job Management</span>
                            </p>
                            <hr>
                            <form action="{{ url('user/laporan/store') }}" method="POST">
                                @csrf
                                <div class="center-form">
                                    <label for="nama_laporan">Report Name</label><br>
                                    <input type="text" id="nama_laporan" name="nama_laporan" placeholder="Masukan Nama Laporan" required>
                                    <br>
                                    <br>
                                    <label for="nama_laporan">Report Description</label><br>
                                    <textarea id="deskripsi" name="deskripsi" cols="30" rows="5" placeholder="Masukan Laporan" required></textarea>
                                    <br>
                                    <br>
                                    <label for="keluhan">Complaint</label><br>
                                    <textarea id="keluhan" name="keluhan" cols="30" rows="5" placeholder="Masukan Keluhan" required></textarea>
                                    <br>
                                    <br>
                                    <label for="progres">Progress</label><br>
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
                                    <input type="hidden" name="id_tugas" value="">
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
    {{-- @include('partials.dataTable') --}}
@endsection
