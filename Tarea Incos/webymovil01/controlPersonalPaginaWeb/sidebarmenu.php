

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Control de Empleados</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Usuario Administrador</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        

        <!-- Gestión de Empleados -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p> Gestión de Empleados </p>
            <i class="right fas fa-angle-left"></i> <!-- Arrow for submenu -->
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="agregar.php" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p> Agregar Empleado </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="eliminar.php" class="nav-link">
                <i class="nav-icon fas fa-user-times"></i>
                <p> Eliminar Empleado </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Registro de Entradas y Salidas -->
        <li class="nav-item">
          <a href="pages/entradas_salidas.html" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p> Registro de Entradas y Salidas </p>
          </a>
        </li>

        <!-- Permisos y Comisiones -->
        <li class="nav-item">
          <a href="pages/permisos_comisiones.html" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p> Permisos y Comisiones </p>
          </a>
        </li>

        <!-- Reportes -->
        <li class="nav-item">
          <a href="pages/reportes.html" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p> Reportes </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
