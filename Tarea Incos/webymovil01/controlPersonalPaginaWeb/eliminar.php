<?php 
session_start(); // Asegúrate de iniciar la sesión para manejar mensajes
include "header.php";
include "sidebarmenu.php";
include "conexionBD.php"; // Asegúrate de incluir tu archivo de conexión

$conexion = new conexionBD();
$conexion->conectar();

// Verificar si se ha enviado una solicitud para eliminar un empleado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id_empleado = $_POST['id'];

    // Consulta para eliminar el empleado
    $sql = "DELETE FROM empleados WHERE id_empleado = ?";
    
    // Ejecutar la consulta
    if ($conexion->ejecutarConsultaPreparada($sql, "i", $id_empleado)) {
        $_SESSION['mensaje'] = "Empleado eliminado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el empleado.";
    }
}

// Consultar empleados activos
$sql = "SELECT * FROM empleados WHERE estado = 'Activo'";
$resultado = $conexion->datos($sql);

// Verifica si hay empleados
if ($resultado->num_rows == 0) {
    $empleados = []; // No hay empleados
} else {
    $empleados = $resultado->fetch_all(MYSQLI_ASSOC); // Obtener todos los empleados activos
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Empleados Activos</h3>
                        </div>
                        <div class="card-body">
                            <?php if (isset($_SESSION['mensaje'])): ?>
                                <div class="alert alert-info">
                                    <?= $_SESSION['mensaje']; ?>
                                    <?php unset($_SESSION['mensaje']); ?>
                                </div>
                            <?php endif; ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Categoría</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($empleados)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No hay empleados activos registrados.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($empleados as $empleado): ?>
                                            <tr>
                                                <td><?= $empleado['id_empleado']; ?></td>
                                                <td><?= $empleado['nombre']; ?></td>
                                                <td><?= $empleado['apellido_paterno']; ?></td>
                                                <td><?= $empleado['apellido_materno']; ?></td>
                                                <td><?= $empleado['categoria']; ?></td>
                                                <td><?= $empleado['fecha_ingreso']; ?></td>
                                                <td><?= $empleado['estado']; ?></td>
                                                <td>
                                                    <form method="POST" action="">
                                                        <input type="hidden" name="id" value="<?= $empleado['id_empleado']; ?>">
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
include "footer.php";
?>
