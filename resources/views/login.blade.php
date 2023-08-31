<?php
// session_start();

// require_once 'api/sendRequest.php';

// if (isset($_POST['login'])) {
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $url = "https://klikyuk.com/ngankngonk/fadli/project-pkl/api/user.php?username=$username&password=$password";
//    $response = sendRequest($url, 'GET');
//    $data = json_decode($response, true);

//    if (!isset($data['data_user'])) {
//       $error = '<script>alert("Username atau password salah!");</script>';
//       echo $error;
//    } else {
//       $user = $data['data_user'];
//       $_SESSION['id_user'] = $user['id'];
//       $_SESSION['username'] = $user['username'];
//       $_SESSION['name'] = $user['name'];
//       $_SESSION['role'] = $user['role'];
//       if ($user['role'] === "user") {
//          header('location:user/index.php');
//          exit();
//       } elseif ($user['role'] === "admin") {
//          header('location:admin/index.php');
//          exit();
//       }
//    }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user/login.css">

    <title>Login Page</title>
</head>

<body>

    <div class="container">

        <div class="left">
            <div class="wadah-img">
                <img src="/image/Two factor authentication-pana.png" alt="login">
            </div>
        </div>

        <div class="right">
            <div class="wadah">
                <h3>Welcome back,</h3>
                <h2>Sign In,</h2>

                <div class="img-mobile">
                    <img src="/image/Two factor authentication-pana.png" alt="login-mobile">
                </div>
                <form method="post" action="/login_check">
                    @csrf
                    <label for="">Username</label><br>
                    <div class="boxx">
                        <input class="user" type="text" name="username" placeholder="Enter Username" required>
                    </div>
                    <br>
                    <label for="">Password</label><br>
                    <div class="box">
                        <input class="pw" type="password" id="fakePassword" name="password"
                            placeholder="Enter Password" required>
                        <ion-icon name="eye-outline" id="toggler"></ion-icon>
                    </div>
                    <br>

                    <div class="btn">
                        <input type="submit" name="login" value="Sign In,">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/login.js"></script>
</body>

</html>