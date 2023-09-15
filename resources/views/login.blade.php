<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user/login.css">

    <title>Login Page</title>
</head>

<body>
    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif
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
