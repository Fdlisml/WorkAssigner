@extends('main')
@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Working Result</h2>
                <a href="index" class="btn">Work</a>
            </div>
            @foreach ($laporan as $l)
                <div class="wadah-table">
                    <div class="table-flex">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Report Name</td>
                                    <td>{{ $l['nama_laporan'] }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $l['deskripsi'] }}</td>
                                </tr>
                                <tr>
                                    <td>Complaint</td>
                                    <td>{{ $l['keluhan'] }}</td>
                                </tr>
                                <form action="{{ url('/user/laporan/update/' . $l['id']) }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>Progress</td>
                                        <td>
                                            <div class="field">
                                                <div class="range-active">
                                                    <input class="range" type="range" name="progres" min="0"
                                                        max="100" value="{{ $l['progres'] }}" steps="1">
                                                </div>
                                                <span class="rangeValue">{{ $l['progres'] }}%</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date Report</td>
                                        <td>{{ $l['tgl_laporan'] }}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-update">
                        <input type="hidden" name="id_laporan" value="{{ $l['id'] }}">
                        <input type="submit" class="btn" id="myBtn" value="Change"></input>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
