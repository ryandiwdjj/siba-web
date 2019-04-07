<template>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item">
        <img src="../../../../public/AA_logo_2.png">
        ATMA AUTO
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
   <div class="navbar-start">
    <div class="navbar-item has-dropdown is-hoverable">
      <a class="navbar-link">
        Kelola Data
      </a>
      
      <div class="navbar-dropdown">
          <a class="navbar-item">
            Role
          </a>
          <a class="navbar-item">
            <router-link to="/jasa_service" class="nav-link">Jasa Service</router-link>
          </a>
          <a class="navbar-item">
            Pegawai
          </a>
          <a class="navbar-item">
            Sparepart
          </a>
          <a class="navbar-item">
            Supplier
          </a>
          <a class="navbar-item">
            Pelanggan
          </a>
          <a class="navbar-item">
            Kendaraan
          </a>
          <a class="navbar-item">
            Cabang
          </a>
      </div>
    </div>
    
      

      <a class="navbar-item">
        Pemesanan
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Laporan
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>
     </div>
    

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
</template>

<script>

    export default{
    }
</script>