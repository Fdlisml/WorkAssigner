@extends('main')
@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Working Result</h2>
                <a href="index" class="btn">Work</a>
            </div>
            <div class="wadah-table">
                <div class="table-flex">
                    <table id="table">
                        <thead>
                            <th>Report Name</th>
                            <th>Description</th>
                            <th>Complaint</th>
                            <th>progress</th>
                            <th>Date Report</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $l)
                                <tr>
                                    <td>{{ $l['nama_laporan'] }}</td>
                                    <td>{{ $l['deskripsi'] }}</td>
                                    <td>{{ $l['keluhan'] }}</td>
                                    <form action="{{ url('/user/laporan/update/' . $l['id']) }}" method="POST">
                                        @csrf
                                        <td>
                                            <div class="field">
                                                <div class="range-active">
                                                    <input class="range" type="range" name="progres" min="0"
                                                        max="100" value="{{ $l['progres'] }}" steps="1">
                                                </div>
                                                <div>
                                                    <span class="rangeValue">{{ $l['progres'] }}%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $l['tgl_laporan'] }}</td>
                                        <td>
                                            <div class="btn-update">
                                                <input type="hidden" name="id_laporan" value="{{ $l['id'] }}">
                                                <input type="submit" class="btn" id="myBtn" value="Change"></input>
                                            </div>
                                        </td>
                                </tr>
                        </tbody>
                        @endforeach
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
