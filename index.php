<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marig-On</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b20e5faf37.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <nav>
        <div class="nav-left">
            <div class="brand-container">
                <span class="brand-prm">MARIG-ON</span>
                <span class="brand-sec">Inventory</span>
            </div>
        </div>
    </nav>

    <div class="login-container">
        <div class="login-header">
            <span class="login-header-text">SIGN-IN</span>
        </div>
        <div class="login-body">
            <form action='./actions/validateUser.php' method="POST">
                <div class="login-form">
                    <div class="login-form-group"><input type="text" placeholder="Username" id="username"
                            name="username">
                    </div>
                    <div class="login-form-group"><input type="password" placeholder="Password" id="password"
                            name="password"></div>
                </div>
                <div class="login-button-container"><button class="login-button" type="submit">LOGIN</button>
                </div>
        </div>
        </form>
        <?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']===0) echo '<div class="login-feedback">Invalid username or password.</div>'?>
    </div>
</body>

</html>