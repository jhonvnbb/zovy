<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zovy</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/styles.css">

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

  </head>
  <body>
    <nav>
      <div class="sidebar-header">
        <a class="logo-wrapper">
          <img src="../../assets/img/zovy.png" alt="">
          <h2 class="hidden">Zovy</h2>
        </a>
        <button class="toggle-btn">
          <img src="../../assets/svg/expand.svg" alt="">
        </button>
      </div>

      <div class="sidebar-links">
        <a href="../dashboard/" class="link">
          <img src="../../assets/svg/dashboard.svg" alt="">
          <span class="hidden">Dashboard</span>
        </a>
        <a class="link active">
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
          <span class="hidden">Tasks</span>
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
            <p class="username">jhonvnbb</p>
            <p class="copyright">&copy; 2024 jhonvnbb.coder</p>
          </div>
        </div>
      </div>
    </nav>

    <div class="main-content">
      <header>
        <div class="dropdown" style="float: right; margin: 10px;">
          <button class="dropbtn">Menu</button>
          <div class="dropdown-content">
            <a href="#">Barang</a>
            <a href="#">Pesanan</a>
            <a href="#">Logout</a>
          </div>
        </div>
      </header>
      <!-- Isi halaman barang -->
      <section id="barang">
        <div class="header-barang">
          <h1>Daftar Jam</h1>
          <button class="tambah-jam">
            <i class="fas fa-plus"></i> Tambah Jam
          </button>
        </div>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Model</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Jam A</td>
              <td>Rp 500.000</td>
              <td>10</td>
              <td>Deskripsi Jam A</td>
              <td><img src="../../assets/img/jam_a.jpg" alt="Jam A" class="table-img"></td>
              <td>
                <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                <button class="action-btn delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jam B</td>
              <td>Rp 750.000</td>
              <td>5</td>
              <td>Deskripsi Jam B</td>
              <td><img src="../../assets/img/jam_b.jpg" alt="Jam B" class="table-img"></td>
              <td>
                <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                <button class="action-btn delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Jam C</td>
              <td>Rp 1.000.000</td>
              <td>2</td>
              <td>Deskripsi Jam C</td>
              <td><img src="../../assets/img/jam_c.jpg" alt="Jam C" class="table-img"></td>
              <td>
                <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                <button class="action-btn delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
  </body>
</html>