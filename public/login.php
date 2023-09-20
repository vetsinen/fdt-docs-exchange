<?php
require_once ('../src/utils.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // In a real-world scenario, you should securely validate and hash the password
    // and perform database queries to check the user's credentials.
    // For demonstration purposes, let's check for a hardcoded username and password.
    if ($username === 'fdtuser'  && $password === 'g4wfs94sbe94xg62') {
        echo "Login successful!";
        setcookie('username', $username, time() + 86400, '/');
        setcookie('imgs', '0', time() + 86400, '/');
        setcookie('docs', '0', time() + 86400, '/');

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['setfolder'] = getFolderForUserFiles($username);

        header("Location: /");
    } else {
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
    <!-- Add the Bulma CSS CDN link here or download and link it locally -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
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
                                <input class="input" name="username" type="text" value="fdtuser" placeholder="Your username">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" name="password" type="password" value="g4wfs94sbe94xg62" placeholder="Your password">
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


