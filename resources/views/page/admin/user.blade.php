@extends('main')
@section('content')
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div id="myModal" class="modal" @if (Request::is('admin/user/edit/*')) style='display: block' @endif>

            <!-- Modal content -->
            <div class="modal-content">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Form User</h2>
                        <span class="close">&times;</span>
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
                            <button type="submit" class="cta">
                                <span>Send Work !</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= New Customers ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Data User</h2>
                <a id="myBtn" class="btn">Form User</a>
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
                    @endforeach
                </thead>
            </table>
        </div>
    </div>
@endsection
