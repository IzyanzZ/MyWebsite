<?php
    session_start();
    include "koneksi.php";
?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
</head>
<body>
    <form method="post">
        <label>Username</label>
        <input type="text" name="fusername"><br>
        <label>Password</label>
        <input type="password" name="fpassword"><br>
        <button class="btn btn-primary" type="submit" name="fmasuk">SUBMIT</button>
    </form>

    <?php
        if (isset($_POST['fmasuk'])){
            $username = $_POST['fusername'];
            $password = $_POST['fpassword'];
            $qry = mysqli_query($koneksi,"SELECT * FROM tab_login WHERE username = '$username' AND password = md5('$password')");
            $cek = mysqli_num_rows($qry);
            if ($cek==1){
                $_SESSION['userweb']=$username;
                header('location:pages/');
                exit;
            }  else{
                echo "<div class='alert alert-succes' role='alert'>Password Dan Username Salah!</div>";
            }
        }
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>
