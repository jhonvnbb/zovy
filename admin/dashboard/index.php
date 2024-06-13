<?php require_once "../controller-data.php"; ?>

<?php 
  $username = $_SESSION['username'];

  if($username != false && isset($_SESSION['username'])){
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $username = $fetch_info['username'];

        $total_barang_query = "SELECT COUNT(*) as total_barang FROM barang";
        $total_admin_query = "SELECT COUNT(*) as total_admin FROM admin";
        $total_stok_query = "SELECT SUM(stok) as total_stok FROM barang";

        $total_barang_result = mysqli_fetch_assoc(mysqli_query($con, $total_barang_query))['total_barang'];
        $total_admin_result = mysqli_fetch_assoc(mysqli_query($con, $total_admin_query))['total_admin'];
        $total_stok_result = mysqli_fetch_assoc(mysqli_query($con, $total_stok_query))['total_stok'];

    }
  }else{
    header('Location: ../');
  }
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zovy</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- JS -->
    <script src="../../assets/js/script.js" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" 
    />

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <nav>
      <div class="sidebar-header">
        <a class="logo-wrapper">
          <img src="../../assets/img/zovy-logo.png" alt="">
          <h2 class="hidden">Zovy</h2>
        </a>
        <button class="toggle-btn">
          <img src="../../assets/svg/expand.svg" alt="">
        </button>
      </div>

      <div class="sidebar-links">
        <a class="link active">
          <img src="../../assets/svg/dashboard.svg" alt="">
          <span class="hidden">Dashboard</span>
        </a>
        <a href="../barang/" class="link">
          <img src="../../assets/svg/barang.svg" alt="">
          <span class="hidden">Barang</span>
        </a>
        <a class="link">
          <img src="../../assets/svg/pesanan.svg" alt="">
          <span class="hidden">Pesanan</span>
        </a>
        </li>
        <a class="link">
          <img src="../../assets/svg/tasks.svg" alt="">
          <span class="hidden">User</span>
        </a>
      </div>


      <div class="sidebar-bottom">
        <div class="sidebar-links">
          <a class="link">
            <img src="../../assets/svg/settings.svg" alt="">
            <span class="hidden">Settings</span>
          </a>
        </div>

        <div class="admin-profile">
          <div class="admin-avatar">
            <img src="../../assets/img/admin.png" alt="">
          </div>
          <div class="admin-details hidden">
            <p class="username"><?php echo $fetch_info['username'] ?></p>
            <p class="copyright">&copy; 2024 jhonvnbb.coder</p>
          </div>
        </div>
      </div>
    </nav>

    <div class="main-content">
      <header>
        <div class="dropdown" style="float: right; margin: 10px;">
          <button class="dropbtn"><i class="fas fa-user" style="padding-right: 10px;"></i><?php echo $fetch_info['username'] ?></button>
          <div class="dropdown-content">
            <a href="">Dashboard</a>
            <a href="../barang/">Barang</a>
            <a href="#">Pesanan</a>
            <a href="#">User</a>
            <a href="#" onclick="return confirmLogout()" style="color: #c90101"><i class="fas fa-lock" style="margin-right: 5px;"></i>Logout</a>
          </div>
        </div>
      </header>

      <div class="dashboard">
        <div class="dashboard-desk">
          <h1>Dashboard</h1>
          <p>Wellcome! <span>Zovy Admin</span></p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-box"></i></div>
            <h3>Total Model Barang</h3>
            <p><?php echo $total_barang_result; ?></p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-users"></i></div>
            <h3>Total User</h3>
            <p>-</p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
            <h3>Total Pesanan</h3>
            <p>-</p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-user-shield"></i></div>
            <h3>Total Admin</h3>
            <p><?php echo $total_admin_result; ?></p>
        </div>
        <div class="dashboard-card total-stok">
        <div class="icon"><i class="fas fa-boxes-packing"></i></div>
          <h3>Total Stok</h3>
          <p><?php echo $total_stok_result; ?></p>
        </div>
      </div>

      <footer>
        <div class="social-icons">
            <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2024 <span>jhonvnbb.coder</span>. Zovy. All Rights Reserved.</p>
      </footer>
    </div>

    <script>
      function confirmLogout() {
          Swal.fire({
              title: 'Apakah Anda yakin?',
              text: "Anda akan keluar dari sesi ini!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, keluar!',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "../logout.php";
              }
          });
          return false;
      }
    </script>
  </body>
</html>