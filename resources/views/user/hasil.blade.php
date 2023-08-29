<?php

session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['role']) && $_SESSION['role'] !== "user")) {
   header('Location: ../login.php');
   exit;
}

$id_user = $_SESSION['id_user'];
$name = $_SESSION['name'];

require_once '../api/laporan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
   <link rel="stylesheet" href="public/css/hasil.css">
</head>

<body>
   <div class="container">
      <div class="navigation">
         <ul>
            <li>
               <a href="#">
                  <div class="logo-flex">
                     <span class="icon">
                        <div class="logo-bg">
                           <img src="public/image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png" alt="">
                        </div>
                     </span>
                     <span class="title">WorkAssigner</span>
                  </div>
               </a>
            </li>
            <li><a href="index.php"><span class="icon"><ion-icon name="reader-outline"></ion-icon></span><span class="title">Work</span></a></li>
            <li><a href="#"><span class="icon"><ion-icon name="checkmark-done-outline"></ion-icon></span><span class="title">Working Result</span></a></li>
            <li><a href="../logout.php"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span><span class="title">Sign Out</span></a></li>
         </ul>
      </div>

      <div class="main">
         <div class="secMain">
            <div class="topbar">
               <div class="toggle">
                  <ion-icon name="menu-outline"></ion-icon>
               </div>

               <!-- <div class="user">
                  <img src="public/image/customer01.jpg" alt="">
               </div> -->
            </div>

            <div class="cardBox">
               <div class="card1">
                  <div class="card-left">
                     <div class="container-text">
                        <div class="say">Good Morning, <?= $name ?></div>
                        <div class="desc">Selamat Mengerjakan Pekerjaannya. Semangat!</div>
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
                     <img src="public/image/Telecommuting-pana-removebg-preview.png">
                  </div>
               </div>

               <div class="card2">
                  <div class="container2">
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
            </div>

            <div class="details">
               <div class="recentOrders">
                  <div class="cardHeader">
                     <h2>Working Result</h2>
                     <a href="index.php" class="btn">Pekerjaan</a>
                  </div>
                  <?php foreach ($data_laporan as $laporan) : ?>
                     <div class="wadah-table">
                        <div class="table-flex">
                           <table>
                              <tbody>
                                 <tr>
                                    <td>Name Laporan</td>
                                    <td><?= $laporan["nama_laporan"] ?></td>
                                 </tr>
                                 <tr>
                                    <td>Deskripsi</td>
                                    <td><?= $laporan["deskripsi"] ?></td>
                                 </tr>
                                 <tr>
                                    <td>Keluhan</td>
                                    <td><?= $laporan["keluhan"] ?></td>
                                 </tr>
                                 <form action="../api/laporan.php" method="POST">
                                    <tr>
                                       <td>Progres</td>
                                       <td>
                                          <div class="field">
                                             <div class="range-active">
                                                <input class="range" type="range" name="progres" min="0" max="100" value="<?= $laporan["progres"] ?>" steps="1">
                                             </div>
                                             <div class="value">
                                                <span class="rangeValue"><?= $laporan["progres"] ?>%</span>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Tanggal Laporan</td>
                                       <td><?= $laporan["tgl_laporan"] ?></td>
                                    </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="btn-update">
                           <input type="hidden" name="id_laporan" value="<?= $laporan["id"] ?>">
                           <input type="hidden" name="_method" value="PUT">
                           <button type="submit" class="btn" id="myBtn">Ubah</button>
                           </form>
                        </div>
                     </div>
                  <?php endforeach ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="public/js/hasil.js"></script>
</body>

</html>