<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="{{ asset('assets/icon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
</head>

<body>
  @include('partials.sidebar')
  <section class="home-section">
    <nav>
      <!-- <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
      </div> -->
      <div class="profile-details">
        <!-- Removed the name of the user -->
      </div>
    </nav>

    <div class="home-content">
      @yield('content')
    </div>
  </section>

  <!-- Modal or Section to Show Details -->
  <div id="detailsSection" style="display:none;">
    <h4>Details</h4>
    <p id="detailTanggal"></p>
    <p id="detailNama"></p>
    <p id="detailKategori"></p>
    <div id="detailFoto"></div> <!-- For Image -->
  </div>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    };

    // Function to Show Item Details
    function showDetails(tanggal_barang_masuk, nama_barang, kategori, foto) {
      // Display the details in a section
      document.querySelector("#detailTanggal").innerText = `Tanggal Masuk: ${tanggal_barang_masuk}`;
      document.querySelector("#detailNama").innerText = `Nama Barang: ${nama_barang}`;
      document.querySelector("#detailKategori").innerText = `Kategori: ${kategori}`;
      
      // Check if the foto exists and display the image
      const photoSection = document.querySelector("#detailFoto");
      if (foto) {
        photoSection.innerHTML = `<img src="${foto}" alt="Foto" width="100">`;
      } else {
        photoSection.innerHTML = 'No Image Available';
      }
      
      // Show the details section
      document.getElementById('detailsSection').style.display = 'block';
    }
  </script>
</body>

</html>
