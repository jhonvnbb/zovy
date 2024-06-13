<?php require_once "../controller-data.php"; ?>

<?php 
  $username = $_SESSION['username'];

  if($username != false && isset($_SESSION['username'])){
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $username = $fetch_info['username'];
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
    <link rel="stylesheet" href="../../assets/css/barang.css">
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
            <a href="../dashboard/">Dashboard</a>
            <a href="">Barang</a>
            <a href="#">Pesanan</a>
            <a href="#">User</a>
            <a href="#" onclick="return confirmLogout()" style="color: #c90101"><i class="fas fa-lock" style="margin-right: 5px;"></i>Logout</a>
          </div>
        </div>
      </header>

      <section id="barang" class="barang">
        <div class="header-barang">
          <h1>Daftar Jam</h1>
          <button class="tambah-jam" id="btn-tambah-jam">
            <i class="fas fa-plus"></i> Tambah Jam
          </button>
        </div>

        <!-- Tambah Barang -->
        <div id="form-tambah-barang"class="hidden">
          <h2 style="text-align: center;">Tambah Barang</h2>
          <hr>
          <form action="./" method="POST" enctype="multipart/form-data">
            <div class="form-left">
              <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>
              </div>
              <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" required>
              </div>
              <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" required>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
              </div>
            </div>
            <div class="form-right">
              <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" onchange="previewImage(event)" />
                <img id="preview_gambar" class="preview-tambah" src="#" alt="Preview Image" style="display: none;">
              </div>
              <button type="submit" class="btn-submit" name="tambah-barang">Tambah</button>
            </div>
          </form>
          <hr>
        </div>

        <!-- Edit Barang -->
        <div id="editModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Barang</h2>
            <hr>
            <form action="./" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="edit_id" name="id_barang">
              <div class="form-group">
                <label for="edit_model">Model :</label>
                <input type="text" id="edit_model" name="model" required>
              </div>
              <div class="form-group">
                <label for="edit_harga">Harga :</label>
                <input type="number" id="edit_harga" name="harga" required>
              </div>
              <div class="form-group">
                <label for="edit_stok">Stok :</label>
                <input type="number" id="edit_stok" name="stok" required>
              </div>
              <div class="form-group">
                <label for="edit_deskripsi">Deskripsi :</label>
                <textarea id="edit_deskripsi" name="deskripsi" required></textarea>
              </div>
              <div class="form-group">
                <label for="edit_gambar">Gambar :</label>
                <input type="file" name="gambar" id="edit_gambar" accept="image/*" onchange="previewEditImage(event)" />
                <img id="preview_edit_gambar" class="table-img" src="#" alt="Preview Image" style="display: none;">
              </div>
              <button type="submit" class="btn-submit" name="edit-barang">Simpan</button>
            </form>
          </div>
        </div>

        <?php
          $result = mysqli_query($con, "SELECT * FROM barang");

          if ($result) {
              if (mysqli_num_rows($result) > 0) {
                  echo "<table>
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
                          <tbody>";
              
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>
                              <td>" . $row['id'] . "</td>
                              <td>" . $row['model'] . "</td>
                              <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                              <td>" . $row['stok'] . "</td>
                              <td>" . $row['deskripsi'] . "</td>
                              <td><img src='" . $row['gambar'] . "' alt='" . $row['model'] . "' class='table-img'></td>
                              <td>
                                <form action='./' method='POST'>
                                  <input type='hidden' name='id_barang' value='" . $row['id'] . "'>
                                  <button type='button' class='action-btn edit' onclick='openEditModal(" . json_encode($row) . ")'><i class='fas fa-edit'></i></button>
                                  <button type='submit' class='action-btn delete' name='hapus'><i class='fas fa-trash-alt'></i></button>
                                </form>
                              </td>
                            </tr>";
                  }
                  echo "</tbody>
                      </table>";
              } else {
                  echo "Tidak ada data yang ditemukan.";
              }
          } else {
              echo "Query tidak berhasil dijalankan.";
          }
          mysqli_close($con);
        ?>

      </section>

      <footer>
        <div class="social-icons">
            <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2024 <span>jhonvnbb.coder</span>. Zovy. All Rights Reserved.</p>
      </footer>
    </div>

    <!-- Preview Tambah Barang -->
    <script>
      function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
          var output = document.getElementById('preview_gambar');
          output.src = reader.result;
          output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
      }
    
      document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btn-tambah-jam').addEventListener('click', function() {
          var formTambahBarang = document.getElementById('form-tambah-barang');
          formTambahBarang.classList.toggle('hidden');
        });
      });
    </script>

    <!-- Edit Barang -->
    <script>
      function openEditModal(row) {
        document.getElementById('edit_id').value = row.id;
        document.getElementById('edit_model').value = row.model;
        document.getElementById('edit_harga').value = row.harga;
        document.getElementById('edit_stok').value = row.stok;
        document.getElementById('edit_deskripsi').value = row.deskripsi;
        if (row.gambar) {
          var previewImage = document.getElementById('preview_edit_gambar');
          previewImage.src = row.gambar;
          previewImage.style.display = 'block';
        }
        document.getElementById('editModal').style.display = 'block';
      }

      function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
      }

      function previewEditImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
          var output = document.getElementById('preview_edit_gambar');
          output.src = reader.result;
          output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>

    <!-- Log out -->
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

    <!-- Upload File Error -->
    <?php
      if(isset($_SESSION['upload_error'])): ?>
          <script>
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?php echo $_SESSION['upload_error']; ?>'
              });
          </script>
          <?php
        unset($_SESSION['upload_error']);
      endif;
    ?>

    <!-- Notif -->
    <?php
      if (isset($_SESSION['upload_error'])): ?>
          <script>
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?php echo $_SESSION['upload_error']; ?>'
              });
          </script>
          <?php
          unset($_SESSION['upload_error']);
      endif;

      if (isset($_SESSION['db_error'])): ?>
          <script>
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?php echo $_SESSION['db_error']; ?>'
              });
          </script>
          <?php
          unset($_SESSION['db_error']);
      endif;

      if (isset($_SESSION['info'])): ?>
          <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: '<?php echo $_SESSION['info']; ?>'
              });
          </script>
          <?php
          unset($_SESSION['info']);
      endif;
    ?>

  </body>
</html>