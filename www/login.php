<?php
require_once ('../src/utils.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // In a real-world scenario, you should securely validate and hash the password
    // and perform database queries to check the user's credentials.
    // For demonstration purposes, let's check for a hardcoded username and password.
    if ($username === 'odense'  && $password === 'jAc4D9Ug4XH3') {
        echo "Login successful!";
        session_start();
        setcookie('username', $username, time() + 86400, '/');

        $_SESSION['username'] = $username;
        $_SESSION['setfolder'] = getFolderForUserFiles($username);
        $_SESSION['img'] = 0;
        $_SESSION['doc'] = 0;

        header("Location: /");
    }
    else {
        // Invalid login
        echo "Invalid username or password. Please try again.";
        header("Location: /login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>please, login - image and documents uploader</title>
    <link rel="stylesheet" href="assets/bulma.min.css">
    <style>
        /* Custom styles */
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="login-container">
                    <h1 class="title is-4">Login</h1>
                    <form id="loginform" method="POST" action="login.php">
                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control">
                                <input class="input" name="username" type="text" value="odense" placeholder="Your username">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" name="password" type="password" value="jAc4D9Ug4XH3" placeholder="Your password">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


