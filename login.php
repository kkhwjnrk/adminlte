<?php include 'templates/top.php' ?>

<head>
  <title>AdminLTE 3 | Log In</title>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="./" class="h3">Sistem Persediaan Barang</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to access your account</p>

        <form method="post" id="loginForm">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="icheck-primary mb-1">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>

        <p class="mt-2 mb-0">
          <a href="#" class="text-center">Register a new user</a>
        </p>
      </div>
    </div>
  </div>

  <footer class="mt-4">
    <p>Prodi Sistem Informasi - Universitas Pamulang</p>
  </footer>

  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Toastr -->
  <script src="vendor/toastr/toastr.min.js"></script>
  <!-- Custom JS -->
  <script type="module" src="assets/js/login.js"></script>
</body>