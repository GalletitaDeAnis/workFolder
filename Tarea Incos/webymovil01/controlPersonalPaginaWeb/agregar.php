<?php 
session_start(); // Iniciar la sesión
include "header.php";
include "sidebarmenu.php";
include "conexionBD.php"; // Asegúrate de incluir tu archivo de conexión

$conexion = new conexionBD();
$conexion->conectar();

$mensaje = ""; // Variable para almacenar el mensaje de éxito o error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $categoria = $_POST['categoria'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estado = $_POST['estado'];

    // Preparar la consulta para insertar el nuevo empleado
    $sql = "INSERT INTO empleados (nombre, apellido_paterno, apellido_materno, categoria, fecha_ingreso, estado) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    // Ejecutar la consulta preparada
    if ($conexion->ejecutarConsultaPreparada($sql, "ssssss", $nombre, $apellido_paterno, $apellido_materno, $categoria, $fecha_ingreso, $estado)) {
        $mensaje = "Empleado agregado exitosamente."; // Guardar mensaje de éxito
    } else {
        $mensaje = "Empleado agregado exitosamente."; // Guardar mensaje de error
    }
}

$conexion->cerrarconexion(); // Cerrar la conexión
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Control de Empleados</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <!-- Mostrar mensaje de éxito o error -->
            <?php if (!empty($mensaje)): ?>
            <div class="alert alert-success" id="mensajeExito">
                <?php echo $mensaje; ?>
            </div>
            <?php endif; ?>

            <!-- Formulario para agregar empleado -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Agregar Empleado</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="agregar.php" id="formAgregarEmpleado">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido_materno">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoria">Categoría:</label>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <option value="Administrativo">Administrativo</option>
                                        <option value="Obrero">Obrero</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado:</label>
                                    <select class="form-control" id="estado" name="estado" required>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar Empleado</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Script para limpiar el formulario después de enviar -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("formAgregarEmpleado");
        form.addEventListener("submit", function(event) {
            if (document.getElementById("mensajeExito")) {
                setTimeout(() => {
                    form.reset(); // Limpiar el formulario después de enviar
                }, 500); // Esperar un poco para mostrar el mensaje antes de limpiar
            }
        });
    });
</script>

<?php 
include "footer.php";
?>
