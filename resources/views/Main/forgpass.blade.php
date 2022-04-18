<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Traveland - Temukan Dreamland-mu di Traveland!</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/login.css" rel="stylesheet">

</head>
<body class="text-center"> 
    <main class="form-signin">
        <p class="h1">Registrasi</p><br>
        <br>
        <form action="/register" method="post">
            @csrf
          <div class="form-floating">
            <input type="text" name = 'nama' class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" >
            <label for="nama">Nama</label>
            @error('nama')
              <div class="invalid-feedback">
                  Nama minimal 3
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name = 'username' class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username">
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">
                  Username minimal 3
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name = 'email' id="email" placeholder="name@example.com">
            <label for="email">Email</label>
            @error('email')
              <div class="invalid-feedback">
                  Email tidak sesuai
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name = 'reg-telp' class="form-control @error('reg-telp') is-invalid @enderror" id="reg-telp" placeholder="reg-telp">
            <label for="reg-telp">Nomor Telepon</label>
            @error('telp')
              <div class="invalid-feedback">
                  Nomor telepon tidak sesuai
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name = "password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password">
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                  Password minimal 6
              </div>
            @enderror
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </form>
        <div>
          <small class="text-center">Sudah punya akun? <a href="/login">Login</a></small>
        </div>
      </main>
      
      
</body>
</html>