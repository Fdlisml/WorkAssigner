<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/user/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif
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
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Work</span>
                    </a>
                </li>

                <li>
                    <a href="laporan">
                        <span class="icon">
                            <ion-icon name="checkmark-done-outline"></ion-icon>
                        </span>
                        <span class="title">Working Result</span>
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

                <!-- ======================= Cards ================== -->
                <div class="cardBox" id="myCardBox">
                    <div class="card1" id="card1">
                        <div class="card-left">
                            <div class="container-text">
                                <div class="say"><span id="say"></span>, {{ session('name') }}</div>
                                <div class="desc">Good luck with your work. Spirit!</div>
                                <div id="txt"></div>
                                <div class="left2">
                                    <p id="day"></p>
                                    <p id="date"></p>/
                                    <p id="month"></p>
                                    <p></p>
                                    <p id="year"></p>
                                </div>
                            </div>
                        </div>

                        <div class="imgBx">
                            <img src="../image/Telecommuting-pana-removebg-preview.png">
                        </div>
                    </div>

                    <div class="card2">
                        <div class="container2">
                            <!-- day -->
                            <div class="day" id="day">
                                <div class="container-day">
                                    <div class="cloud front">
                                        <span class="left-front"></span>
                                        <span class="right-front"></span>
                                    </div>
                                    <span class="sun sunshine"></span>
                                    <span class="sun"></span>
                                    <div class="cloud back">
                                        <span class="left-back"></span>
                                        <span class="right-back"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- end day -->

                            <!-- night -->
                            <div class="night" id="night">
                                <div class="content">
                                    <div class="planet">
                                        <div class="ring"></div>
                                        <div class="cover-ring"></div>
                                        <div class="spots">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================ Order Details List ================= -->
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Jobs Today</h2>
                            <a href="laporan" class="btn">History Kerja</a>
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
                                <form action="../api/laporan.php" method="POST">
                                    <div class="center-form">
                                        <label for="">Report Name</label><br>
                                        <input type="text" name="nama_laporan" placeholder="Masukan Nama Laporan"
                                            required>
                                        <br>
                                        <br>
                                        <label for="">Report Description</label><br>
                                        <textarea name="deskripsi" id="" cols="30" rows="5" placeholder="Masukan Laporan" required></textarea>
                                        <br>
                                        <br>
                                        <label for="">Complaint</label><br>
                                        <textarea name="keluhan" id="" cols="30" rows="5" placeholder="Masukan Keluhan" required></textarea>
                                        <br>
                                        <br>
                                        <label for="">Progress</label><br>
                                        <div class="field">
                                            <div class="range-active">
                                                <input class="range" type="range" name="progres" min="0"
                                                    max="100" value="0" steps="1">
                                            </div>

                                            <div class="value">
                                                <span class="rangeValue">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-form">
                                        <input type="hidden" name="id_tugas" value="<?php // $data_tugas['id']
                                        ?>">
                                        <input type="hidden" name="id_user" value="<?php // $id_user
                                        ?>">
                                        <button class="learn-more" type="submit">
                                            <span class="circle" aria-hidden="true">
                                                <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text">Send, !</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- loader --}}

        <div class="loader" id="loader">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
            <div class="dot dot-4"></div>
            <div class="dot dot-5"></div>
          </div>

          <button id="start-button">Mulai Loading</button>
          


        <!-- =========== Scripts =========  -->
        <script src="../js/script.js"></>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
