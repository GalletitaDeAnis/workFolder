<?php
session_start();
include "conexionBD.php"; // Incluir la clase de conexión

$conexion = new conexionBD();
$conexion->conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta preparada para obtener el hash de la contraseña del usuario
    $sql = "SELECT * FROM usuarios WHERE username = ? AND activo = 1";
    $result = $conexion->ejecutarConsultaPreparada($sql, "s", $username);

    if ($result && $result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $password_hash = $usuario['password_hash'];

        // Verificamos si la contraseña ingresada es correcta
        if (password_verify($password, $password_hash)) {
            // Almacenamos la sesión del usuario
            $_SESSION['username'] = $username;
            $_SESSION['rol'] = $usuario['rol'];
            
            // Redirigimos a la página principal
            header('Location: principal.php');
            exit();
        } else {
            // Contraseña incorrecta
            $error_message = 'Usuario o contraseña incorrectos.';
        }
    } else {
        // Usuario no encontrado o inactivo
        $error_message = 'Usuario no encontrado o inactivo.';
    }
}

$conexion->cerrarconexion();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SISTEMA DE CONTROL DE PERSONAL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <form action="login.php" method="post">
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="username" placeholder="USUARIO" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-user"></span>
      </div>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block ">Ingresar</button>
    </div>
  </div>
</form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
</body>
</html>
