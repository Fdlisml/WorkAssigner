<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
   <!-- ======= Styles ====== -->
   <link rel="stylesheet" href="css/user/style.css">
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
                           <img src="image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png" alt="">
                        </div>
                     </span>
                     <span class="title">WorkAssigner</span>
                  </div>
               </a>
            </li>

            <li>
               <a href="index.php">
                  <span class="icon">
                     <ion-icon name="reader-outline"></ion-icon>
                  </span>
                  <span class="title">Work</span>
               </a>
            </li>

            <li>
               <a href="user/hasil.php">
                  <span class="icon">
                     <ion-icon name="checkmark-done-outline"></ion-icon>
                  </span>
                  <span class="title">Working Result</span>
               </a>
            </li>

            <li>
               <a href="logout.php">
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

               <!-- <div class="user">
                  <img src="public/image/customer01.jpg" alt="">
               </div> -->
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
               <div class="card1">
                  <div class="card-left">
                     <div class="container-text">
                        <div class="say">Good Morning, <?php //$name ?></div>
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
                     <img src="image/Telecommuting-pana-removebg-preview.png">
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

            <!-- ================ Order Details List ================= -->
            <div class="details">
               <div class="recentOrders">
                  <div class="cardHeader">
                     <h2>Jobs Today</h2>
                     <a href="hasil.php" class="btn">History Kerja</a>
                  </div>
                  <?php //foreach ($data_tugas as $tugas) : 
                  ?>
                  <div class="wadah-table">
                     <table>
                        <tbody>
                           <tr>
                              <td>Name Tugas</td>
                              <td><?php // $data_tugas["nama_tugas"] ?></td>
                           </tr>
                        </tbody>

                        <tbody>
                           <tr>
                              <td>Deskripsi</td>
                              <td><?php // $data_tugas["deskripsi"] ?></td>
                           </tr>

                           <tr>
                              <td>Tanggal Mulai</td>
                              <td><?php // $data_tugas["tgl_mulai"] ?></td>
                           </tr>

                           <tr>
                              <td>Tanggal Selesai</td>
                              <td><?php // $data_tugas["tgl_selesai"] ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <?php //endforeach 
                  ?>
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
                              <label for="">Nama Laporan</label><br>
                              <input type="text" name="nama_laporan" placeholder="Masukan Nama Laporan" required>
                              <br>
                              <br>
                              <label for="">Deskripsi Laporan</label><br>
                              <textarea name="deskripsi" id="" cols="30" rows="5" placeholder="Masukan Laporan" required></textarea>
                              <br>
                              <br>
                              <label for="">Keluhan</label><br>
                              <textarea name="keluhan" id="" cols="30" rows="5" placeholder="Masukan Keluhan" required></textarea>
                              <br>
                              <br>
                              <label for="">Progres</label><br>
                              <div class="field">
                                 <div class="range-active">
                                    <input class="range" type="range" name="progres" min="0" max="100" value="0" steps="1">
                                 </div>

                                 <div class="value">
                                    <span class="rangeValue">0%</span>
                                 </div>
                              </div>
                           </div>
                           <div class="btn-form">
                              <input type="hidden" name="id_tugas" value="<?php // $data_tugas['id']?>">
                              <input type="hidden" name="id_user" value="<?php // $id_user ?>">
                              <button class="learn-more" type="submit">
                                 <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                 </span>
                                 <span class="button-text">Simpan</span>
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!-- =========== Scripts =========  -->
      <script src="js/script.js"></script>

      <!-- ====== ionicons ======= -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>