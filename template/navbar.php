<?php if (Session::exists()) : ?>
  <?php
    $usuarioDAO = new UsuarioDAO($conn);
    $usuario = $usuarioDAO->find(Session::getSessionUserId());
  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-light navbar-light mb-4 fw-bold">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="index.php">BibliogrApp</a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= str_contains($pageTitle, "Inicio") ? "active" : "" ?>" href="index.php">Inicio</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
      <!-- Right elements -->
      <div class="d-flex align-items-center justify-content-center">
        <div class="dropdown mx-2 profile-picture" style="background-image: url('https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');"></div>
        <div class="text-center">
          <a class="text-reset font-weight-bold"><?= $usuario->getNombre() ?></a><br>
          <a class="btn btn-danger btn-rounded py-1 px-3 fw-bold" href="logout.php">salir <i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
<?php else : ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-link navbar-light mb-4 fw-bold">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="index.php">BibliogrApp</a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= str_contains($pageTitle, "Inicio") ? "active" : "" ?>" href="index.php">Inicio</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <div>
          <a class="btn btn-info btn-rounded py-1 px-3 m-0 mb-1 w-100 fw-bold" href="index.php">Iniciar sesión<i class="fa-solid fa-right-to-bracket ps-1"></i></a><br>
          <a class="btn btn-dark btn-rounded py-1 px-3 w-100 fw-bold" href="registro.php">Registrarse<i class="fa-solid fa-user-plus ps-1"></i></a>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
<?php endif; ?>