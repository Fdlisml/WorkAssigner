<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ url('css/admin/style.css') }}">
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
                                    <img src="{{ url('image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png') }}">
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
                        <img src="public/image/customer01.jpg" alt="">
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
                        <h2>Tugas</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    @if (Request::is('admin/tugas/edit/*'))
                            @php
                                $data = [
                                    'url' => 'admin/tugas/update/' . $tugasEdit['id'],
                                    'nama_tugas' => $tugasEdit['nama_tugas'],
                                    'deskripsi' => $tugasEdit['deskripsi'],
                                    'tgl_mulai' => $tugasEdit['tgl_mulai'],
                                    'tgl_selesai' => $tugasEdit['tgl_selesai'],
                                    'id_project' => $tugasEdit['id_project'],
                                    'id_user' => $tugasEdit['id_user'],
                                ];
                            @endphp
                        @else
                            @php
                                $data = [
                                    'url' => 'admin/tugas/store',
                                    'nama_tugas' => '',
                                    'deskripsi' => '',
                                    'tgl_mulai' => '',
                                    'tgl_selesai' => '',
                                    'id_project' => '',
                                    'id_user' => '',,
                                ];
                            @endphp
                        @endif

                        <div class="form">
                            <form action="{{ url($data['url']) }}" method="POST">
                                @csrf
                                <label>
                                    Tugas <input type="text" name="nama_tugas" class="tugas"
                                        value="{{ $data['nama_tugas'] }}">
                                </label>
                                <label>
                                    Deskripsi <input type="text" name="deskripsi" class="deskripsi"
                                        value="{{ $data['deskripsi'] }}">
                                </label>
                                <label>
                                    Tanggal Mulai <input type="date" name="tgl_mulai" class="tgl_mulai"
                                        value="{{ $data['tgl_mulai'] }}">
                                </label>
                                <label>
                                    Tanggal Selesai <input type="date" name="tgl_selesai" class="tgl_selesai"
                                        value="{{ $data['tgl_selesai'] }}">
                                </label>
                                <label>
                                    Nama Project
                                    <select name="id_project">
                                        <option></option>
                                        @foreach ($projectData as $p)
                                            @if ($p['id'] == $data['id_project'])
                                                <option value="{{ $p['id'] }}" selected>{{ $p['nama_project'] }}</option>
                                            @else
                                                <option value="{{ $p['id'] }}">{{ $p['nama_project'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    Nama Developer
                                    <select name="id_user">
                                        <option></option>
                                        @foreach ($userData as $u)
                                            @if ($u['id'] == $data['id_user'])
                                                <option value="{{ $u['id'] }}" selected>{{ $u['name'] }}</option>
                                            @else
                                                <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <button type="submit" class="cta">
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
                        <h2>Data Tugas</h2>
                    </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>NAMA TUGAS</th>
                                    <th>DESKRIPSI</th>
                                    <th>TANGGAL MULAI</th>
                                    <th>TANGGAL SELESAI</th>
                                    <th>NAMA PROJECT</th>
                                    <th>NAMA DEVELOPER</th>
                                    <th>ACTION</th>
                                </tr>
                                @foreach ($tugasData as $t)
                                    <div class="wadah-table">
                                        <tr>
                                            <td>{{ $t['tugas']['nama_tugas'] }}</td>
                                            <td>{{ $t['tugas']['deskripsi'] }}</td>
                                            <td>{{ $t['tugas']['tgl_mulai'] }}</td>
                                            <td>{{ $t['tugas']['tgl_selesai'] }}</td>
                                            <td>{{ $t['project']['nama_project'] }}</td>
                                            <td>{{ $t['user']['name'] }}</td>
                                            <td>
                                                <a href="{{ url('admin/tugas/destroy/' . $t['tugas']['id']) }}">HAPUS</a>
                                                <a href="{{ url('admin/tugas/edit/' . $t['tugas']['id']) }}">Edit</a>
                                            </td>
                                        </tr>
                                    </div>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="{{ url('js/script.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
