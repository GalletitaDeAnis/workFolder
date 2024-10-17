
<?php 
include "header.php";
include "sidebarmenu.php";
include "conexionBD.php";

$conexion = new conexionBD();
$conexion->conectar();

$totalEmpleadosActivos = $conexion->datos("SELECT COUNT(*) as total FROM empleados WHERE estado = 'Activo'")->fetch_assoc()['total'];
$totalPermisosPendientes = $conexion->datos("SELECT COUNT(*) as total FROM permisos WHERE aprobado = 'Pendiente'")->fetch_assoc()['total'];
$totalNuevosEmpleados = $conexion->datos("SELECT COUNT(*) as total FROM empleados WHERE fecha_ingreso >= CURDATE() - INTERVAL 30 DAY")->fetch_assoc()['total'];
$totalEmpleadosComision = $conexion->datos("SELECT COUNT(*) as total FROM comisiones WHERE aprobado = 'Pendiente'")->fetch_assoc()['total'];
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
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Empleados Activos -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $totalEmpleadosActivos; ?></h3>
              <p>Empleados Activos</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Permisos Pendientes -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $totalPermisosPendientes; ?></h3>
              <p>Permisos Pendientes</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Nuevos Registros -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $totalNuevosEmpleados; ?></h3>
              <p>Nuevos Empleados</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Empleados en Comisión -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $totalEmpleadosComision; ?></h3>
              <p>Empleados en Comisión</p>
            </div>
            <div class="icon">
              <i class="fas fa-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Aquí puedes agregar gráficos personalizados o reportes sobre la asistencia, rendimiento, etc. -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Aquí puedes agregar información adicional, por ejemplo, los empleados que cumplieron años este mes o próximos eventos -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
$conexion->cerrarconexion();
include "footer.php"
?>
