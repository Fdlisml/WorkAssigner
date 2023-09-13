<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ url('css/admin/laporan.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="{{ url('/admin/index') }}">
                        <div class="logo-flex">
                            <span class="icon">
                                <div class="logo-bg">
                                    <img
                                        src="{{ url('image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png') }}">
                                </div>
                            </span>
                            <span class="title">WorkAssigner</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/index') }}">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Project</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/laporan') }}">
                        <span class="icon">
                            <ion-icon name="folder-open-outline"></ion-icon>
                        </span>
                        <span class="title">Report</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/tugas') }}">
                        <span class="icon">
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Work</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/logout') }}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="secMain">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>

                    <div class="user">
                        <img src="">
                    </div>

                    <div class="toggleWrapper">
                        <input type="checkbox" class="dn" id="dn">
                        <label for="dn" class="toggleBtn">
                            <span class="toggle__handler">
                                <span class="crater crater--1"></span>
                                <span class="crater crater--2"></span>
                                <span class="crater crater--3"></span>
                            </span>
                            <div class="star-c">
                                <span class="star star--1"></span>
                                <span class="star star--2"></span>
                                <span class="star star--3"></span>
                                <span class="star star--4"></span>
                                <span class="star star--5"></span>
                                <span class="star star--6"></span>
                            </div>
                        </label>
                    </div>
                </div>



                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Data Laporan</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>NAMA LAPORAN</th>
                                <th>DESKRIPSI</th>
                                <th>KELUHAN</th>
                                <th>PROGRES</th>
                                <th>TANGGAL LAPORAN</th>
                                <th>NAMA TUGAS</th>
                                <th>NAMA DEVELOPER</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($laporanData as $l)
                                <div class="wadah-table">
                                    <tr>
                                        <td>{{ $l['laporan']['nama_laporan'] }}</td>
                                        <td>{{ $l['laporan']['deskripsi'] }}</td>
                                        <td>{{ $l['laporan']['keluhan'] }}</td>
                                        <td>{{ $l['laporan']['progres'] }}</td>
                                        <td>{{ $l['laporan']['tgl_laporan'] }}</td>
                                        <td>{{ $l['tugas']['nama_tugas'] }}</td>
                                        <td>{{ $l['user']['name'] }}</td>
                                        <td>
                                            <div class="flex-btn">
                                                <a href="{{ url('admin/laporan/destroy/' . $l['laporan']['id']) }}">HAPUS</a>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-loader">
        <div class="loader" id="loader">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
            <div class="dot dot-4"></div>
            <div class="dot dot-5"></div>
        </div>
    </div>

    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @elseif (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @endif


    <!-- =========== Scripts =========  -->
    <script src="{{ url('js/script.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
