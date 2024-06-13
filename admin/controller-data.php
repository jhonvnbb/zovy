<?php
    require 'connection.php';
    session_start();
    $username = "";
    $errors = array();

    // Login Button
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql_admin = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
        $cek_admin = mysqli_num_rows($sql_admin);

        if ($cek_admin > 0) {
            $_SESSION['username'] = $username;
            header('Location: ./dashboard/?username=' . urlencode($_SESSION['username']));
            exit();
        } else {
            $errors['username'] = "Incorrect username or password!";
        }
    }

    // Unggah gambar
    function uploadFile($file) {
        $target_dir = "../upload-barang/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $maxFileSize = 2000000;
    
        // Format file yang diizinkan
        $allowedFormats = array('jpg', 'jpeg', 'png');
    
        // Format file
        if (!in_array($imageFileType, $allowedFormats)) {
            $_SESSION['upload_error'] = "Sorry, only JPG, JPEG, & PNG files are allowed.";
            return false;
        }
    
        // Cek apakah benar file gambar
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            $_SESSION['upload_error'] = "File is not an image.";
            return false;
        }
    
        // Cek ukuran file
        if ($file["size"] > $maxFileSize) {
            $_SESSION['upload_error'] = "Sorry, your file is too large.";
            return false;
        }
    
        // Unggah file
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            $_SESSION['upload_error'] = "Sorry, there was an error uploading your file.";
            return false;
        }
    }    

    // Tambah Barang Button
    if (isset($_POST['tambah-barang'])) {
        $model = mysqli_real_escape_string($con, $_POST['model']);
        $harga = mysqli_real_escape_string($con, $_POST['harga']);
        $stok = mysqli_real_escape_string($con, $_POST['stok']);
        $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
        $gambar = "";
    
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $gambar = uploadFile($_FILES['gambar']);
            if (strpos($gambar, 'Sorry') !== false) {
                $_SESSION['upload_error'] = $gambar;
                header('Location: ./');
                exit();
            }
        }
    
        if ($gambar != "") {
            $insert_sql = "INSERT INTO barang (model, harga, stok, deskripsi, gambar) VALUES ('$model', '$harga', '$stok', '$deskripsi', '$gambar')";
            if (mysqli_query($con, $insert_sql)) {
                $_SESSION['info'] = "Barang berhasil ditambahkan!";
                header('Location: ./');
                exit();
            } else {
                $_SESSION['db_error'] = "Gagal menambahkan barang! " . mysqli_error($con);
                header('Location: ./');
                exit();
            }
        }
    }

    // Hapus Button 
    if (isset($_POST['hapus'])) {
        $id_barang = $_POST['id_barang'];
        $query = "DELETE FROM barang WHERE id = $id_barang";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['info'] = "Barang berhasil dihapus.";
        } else {
            $_SESSION['info'] = "Terjadi kesalahan saat menghapus barang: " . mysqli_error($con);
        }
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Edit Barang Button
    if (isset($_POST['edit-barang'])) {
        $id_barang = mysqli_real_escape_string($con, $_POST['id_barang']);
        $model = mysqli_real_escape_string($con, $_POST['model']);
        $harga = mysqli_real_escape_string($con, $_POST['harga']);
        $stok = mysqli_real_escape_string($con, $_POST['stok']);
        $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
        $gambar = "";
    
        if (!empty($_FILES['gambar']['name']) && $_FILES['gambar']['error'] == 0) {
            $gambar = uploadFile($_FILES['gambar']);
            if ($gambar === false) {
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                $query = "UPDATE barang SET model = '$model', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi', gambar = '$gambar' WHERE id = $id_barang";
            }
        } else {
            $query = "UPDATE barang SET model = '$model', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE id = $id_barang";
        }
    
        $result = mysqli_query($con, $query);
    
        if ($result) {
            $_SESSION['info'] = "Barang berhasil diedit.";
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['db_error'] = "Terjadi kesalahan saat mengedit barang: " . mysqli_error($con);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }

?>