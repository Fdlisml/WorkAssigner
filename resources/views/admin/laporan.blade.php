<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/admin/laporan.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <div class="logo-flex">
                            <span class="icon">
                                <div class="logo-bg">
                                    <img src="../image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png"
                                        alt="">
                                </div>
                            </span>
                            <span class="title">WorkAssigner</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="index">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Project</span>
                    </a>
                </li>

                <li>
                    <a href="laporan">
                        <span class="icon">
                            <ion-icon name="folder-open-outline"></ion-icon>
                        </span>
                        <span class="title">Report</span>
                    </a>
                </li>

                <li>
                    <a href="tugas">
                        <span class="icon">
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Work</span>
                    </a>
                </li>

                <li>
                    <a href="/logout">
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
                                </tr>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../js/script.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
