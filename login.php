<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Litra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


    <div class="container">
        <div class="navbar">
            <nav>
                <ul>
                    <li style=" height: 100%;  margin-left: 1240px; margin-top:10px; list-style: none; ">
                    <a href="Home.html" style="text-decoration: none; color: black; font-size:13px; ">HOME</a></li>
                </ul>
            </nav>
        </div>
        <div class="signup">
            <h3 style="margin-left: 800px; font-weight:700;">Sign In</h3>

            <form action="#" method="POST" style="margin-left: 800px;  margin-bottom:130px;">
                <input name="email" style="margin-top: 50px; margin-bottom:0px;" class="input"
                    placeholder="Enter Your Email" required>

                <input name="password" class="input" type="password" style="margin-top: 30px"
                    placeholder="Enter Your Password" required>
<br>
<br>
            <a style="font-weight:300; color: black; text-decoration:none; margin-left:40px;" href="registrasi.php">Forgot Password?</a>
                

                <!-- <label for="peran">Masuk Sebagai:</label> -->
                <!-- <select name="peran" id="peran" class="form-control"
        style="width: 90%; margin-left:0px; padding: 10px 60px 15px 40px;">
        <option value="" disabled selected hidden>Masuk Sebagai</option>
        <option value="admin">Admin</option>
        <option value="penyuluh">Penyuluh</option>
    </select> -->
                <button type="submit" name="submit" class="submit"
                    style="margin-left: 0px; margin-top: 50px; margin-bottom: 20px; color:white; font-weight:500;">Sign
                    Up</button>
            </form>
            <center>
                <p style="font-weight: 700; color: black; margin-left:800px; margin-top:-80px;">Don't have an account? <span><a
                            style="font-weight:600; color: #E86A33; text-decoration:none;" href="registrasi.php">Sign
                            Up</a></span></p>
            </center>
        </div>
        <div class="right">
            <img src="gambar/LOGINN.png" alt="" style="margin-top: -650px;">>
            <div class="banner-text" style=" position: relative; top: -800px;">
                <h3
                    style="color: #E86A33; font-size: 30px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                    Welcome!</h3>
                <p
                    style="width: 100%; height: 100%; color: white; font-size: 40px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                    Land Suitability Classification</p>
                <p
                    style="width: 100%; height: 100%; color: white; font-size: 40px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                    System of Selaawi Sub-district</p>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


    <?php
    session_start();

    // Fungsi untuk memeriksa email, kata sandi, dan peran pengguna
    function checkUserStatus($email, $password, $conn) {
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            return true; // Pengguna ditemukan dalam database
        }
        
        return false; // Pengguna tidak ditemukan
    }
    
    if (isset($_POST['submit'])) {
        include('./helper/koneksi.php');
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $peran = $_POST['peran'];

        if (checkUserStatus($email, $password, $conn)) {
            header('Location:dashboard.html');
            echo "Login berhasil!";
            // Set session atau arahkan ke halaman sesuai peran
            $_SESSION['email'] = $email;
            // $_SESSION['peran'] = $peran;
            
            // if ($peran == 'admin') {
            //     header('Location:home.html'); // Ganti dengan halaman admin
            //     exit;
            // } elseif ($peran == 'penyuluh') {
            //     header('Location:home.html'); // Ganti dengan halaman penyuluh
            //     exit;
            // }
        } else {
            echo "<script> alert('Email atau kata sandi salah. Silakan coba lagi.')</script>";
        }
        // if ($peran) {
        
           
        //     // Set session atau arahkan ke halaman sesuai peran
        //     $_SESSION['email'] = $email;
        //     $_SESSION['peran'] = $peran;
            
        //     if ($peran == 'admin') {
        //         echo "ini admin woii";
        //         die;
        //         header('Location: admin_home.php'); // Ganti dengan halaman admin
        //         exit;
        //     } elseif ($peran == 'penyuluh') {
        //         echo "ini penyuluh woii";
        //         die;
        //         header('Location: penyuluh_home.php'); // Ganti dengan halaman penyuluh
        //         exit;
        //     }
        // } else {
        //     echo "<script> alert('Email atau kata sandi salah. Silakan coba lagi.')</script>";
        // }
        $conn->close();
    }
    ?>
</body>

</html>
