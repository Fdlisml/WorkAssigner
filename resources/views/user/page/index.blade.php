@extends('main')

@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Jobs Today</h2>
                <a href="laporan" class="btn">Working Result</a>
            </div>

            <div class="wadah-table">
                <table>
                    <tbody>
                        <tr>
                            <td>Name Task</td>
                            <td>{{ $tugas['nama_tugas'] }}</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Description</td>
                            <td>{{ $tugas['deskripsi'] }}</td>
                        </tr>

                        <tr>
                            <td>Start Date</td>
                            <td>{{ $tugas['tgl_mulai'] }}</td>
                        </tr>

                        <tr>
                            <td>Date of completion</td>
                            <td>{{ $tugas['tgl_selesai'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Job Report</h2>
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
                            <label>Report Name</label><br>
                            <input type="text" name="nama_laporan" placeholder="Masukan Nama Laporan" required>
                            <br>
                            <br>
                            <label>Report Description</label><br>
                            <textarea name="deskripsi" cols="30" rows="5" placeholder="Masukan Laporan" required></textarea>
                            <br>
                            <br>
                            <label>Complaint</label><br>
                            <textarea name="keluhan" cols="30" rows="5" placeholder="Masukan Keluhan" required></textarea>
                            <br>
                            <br>
                            <label>Progress</label><br>
                            <div class="field">
                                <div class="range-active">
                                    <input class="range" type="range" name="progres" min="0" max="100"
                                        value="0" steps="1">
                                </div>

                                <div class="value">
                                    <span class="rangeValue">0%</span>
                                </div>
                            </div>
                        </div>
                        <div class="btn-form">
                            <input type="hidden" name="tgl_laporan" value="{{ date('Y/M/D') }}">
                            <input type="hidden" name="id_tugas" value="{{ $tugas['id'] }}">
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
@endsection
