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
                    <a href="{{ url('/admin/user') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">User</span>
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
                            <h2>Form User</h2>
                        </div>

                        @if (Request::is('admin/user/edit/*'))
                            @php
                                $data = [
                                    'url' => 'admin/user/update/' . $userEdit['id'],
                                    'name' => $userEdit['name'],
                                    'username' => $userEdit['username'],
                                    'password' => $userEdit['password'],
                                    'role' => $userEdit['role'],
                                ];
                            @endphp
                        @else
                            @php
                                $data = [
                                    'url' => 'admin/user/register',
                                    'name' => '',
                                    'username' => '',
                                    'password' => '',
                                    'role' => '',
                                ];
                            @endphp
                        @endif
                        <div class="form">
                            <form action="{{ url($data['url']) }}" method="post">
                                @csrf
                                <label>
                                    Name
                                </label>
                                <input type="text" name="name" value="{{ $data['name'] }}">

                                <label>
                                    Username
                                </label>
                                <input type="text" name="username" value="{{ $data['username'] }}">

                                <label>
                                    Password
                                </label>
                                <input type="password" name="password" value="{{ $data['password'] }}">

                                <label>
                                    Role
                                </label>
                                <select name="role">
                                    @if ($data['role'] === 'user')
                                        <option value="user" selected>User</option>
                                        <option value="admin">Admin</option>
                                    @elseif($data['role'] === 'admin')
                                        <option value="user">User</option>
                                        <option value="admin" selected>Admin</option>
                                    @else
                                        <option></option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    @endif
                                </select>

                                {{-- <label><br>
                                    Tgl Mulai
                                </label>
                                <input type="date" name="tgl_mulai" value="{{ $data['tgl_mulai'] }}">

                                <label>
                                    Tgl Selesai
                                </label>
                                <input type="date" name="tgl_selesai" value="{{ $data['tgl_selesai'] }}"> --}}

                                <button type="submit" class="cta">
                                    <span>Send Work !</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- ================= New Customers ================ -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Data User</h2>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>USERNAME</th>
                                    <th>PASSWORD</th>
                                    <th>ROLE</th>
                                    <th>ACTION</th>
                                </tr>
                                @foreach ($user as $u)
                                    <div class="wadah-table">
                                        <tr>
                                            <td>{{ $u['name'] }}</td>
                                            <td>{{ $u['username'] }}</td>
                                            <td>{{ $u['password'] }}</td>
                                            <td>{{ $u['role'] }}</td>
                                            <td>
                                                <div class="flex-btn">
                                                    <a href="{{ url('admin/user/destroy/' . $u['id']) }}">HAPUS</a>
                                                    |
                                                    <a href="{{ url('admin/user/edit/' . $u['id']) }}">Edit</a>
                                                </div>
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
