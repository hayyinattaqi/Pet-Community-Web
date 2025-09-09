<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to bottom, #e0f7fa, #b2ebf2);

        }
        
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h1 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e1e1;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background: #b2ebf2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .alert-danger {
            background-color:rgb(206, 135, 141);
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .register-link a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Login</h1>
            <p>Silakan Login dengan Akun Anda</p>
        </div>
        
        <?php
        include_once("config.php");

        // echo "<pre>Session saat ini: ";
        // print_r($_SESSION);
        // echo "</pre>";
        
        // echo "<pre>Data user dari database: ";
        // print_r($user); // Cek apakah 'id' dan 'full_name' ada
        // echo "</pre>";
        
        if (isLoggedIn()) {
            header("Location: dashboard.php");
            exit();
        }
        
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password'];
            
            $query = "SELECT * FROM members WHERE username = '$username' OR email = '$username'";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password_hash'])) {
                    $_SESSION['user_id'] = $user['id_anggota'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['nama'] = $user['nama_anggota'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error = "Username atau password salah!";
                }
            } else {
                $error = "Username atau password salah!";
            }
        }
        ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="username">Username atau Email</label>
                <input type="text" name="username" id="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            
            <button type="submit" name="login" class="btn">Login</button>
        </form>
        
        <div class="register-link">
            <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>