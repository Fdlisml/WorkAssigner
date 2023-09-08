<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/admin/style.css">
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

                

                <!-- ================ Order Details List ================= -->
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Data Project</h2>
                            <a href="#" class="btn">View All</a>
                        </div>

                        <div class="form">
                            <form action="project/store" method="post">
                                @csrf
                                <label for="nama_project">
                                    Nama Project
                                </label>
                                <input type="text" name="nama_project">

                                <label for="tugas">
                                    Tugas
                                </label>
                                <input type="text" name="tugas">

                                <label for="deskripsi">
                                    Deskripsi
                                </label>
                                <textarea name="deskripsi" id="" cols="10" rows="10"></textarea>

                                <label for="tgl_mulai"><br>
                                    Tgl Mulai
                                </label>
                                <input type="date" name="tgl_mulai">

                                <label for="tgl_selesai">
                                    Tgl Selesai
                                </label>
                                <input type="date" name="tgl_selesai" class="datee">

                                <button class="cta">
                                    <span>Send Work !</span>
                                    <svg viewBox="0 0 13 10" height="10px" width="15px">
                                        <path d="M1,5 L11,5"></path>
                                        <polyline points="8 1 12 5 8 9"></polyline>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- ================= New Customers ================ -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Data Project</h2>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>NAMA PROJECT</th>
                                    <th>TUGAS</th>
                                    <th>DESKRIPSI</th>
                                    <th>TANGGAL MULAI</th>
                                    <th>TANGGAL SELESAI</th>
                                </tr>
                                @foreach ($project as $p)
                                    <div class="wadah-table">
                                        <tr>
                                            <td>{{ $p['nama_project'] }}</td>
                                            <td>{{ $p['tugas'] }}</td>
                                            <td>{{ $p['deskripsi'] }}</td>
                                            <td>{{ $p['tgl_mulai'] }}</td>
                                            <td>{{ $p['tgl_selesai'] }}</td>
                                        </tr>
                                    </div>
                                @endforeach
                            </thead>
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

        <!-- =========== Scripts =========  -->
        <script src="../js/script.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
