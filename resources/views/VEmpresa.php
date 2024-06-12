<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Empresas</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th># Patronal</th>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Contactos</th>
          <th>Observacion</th>
          <th>Estado</th>
          <td>
            <?php
            if(session("rol")!="consultor"){
            ?>
            <button class="btn btn-primary" onclick="MNuevoEmpresa()"> Nuevo</button>
            <?php
            }
            ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php

        foreach ($Empresas as $key => $value) {

        ?>
        <tr>
          <td><?php echo $value["nro_patronal"]; ?></td>
          <td><?php echo $value['nombre_empresa']; ?></td>
          <td><?php echo $value['direccion_empresa']; ?></td>
          <td><?php echo $value['telefono_empresa']." | ".$value['email_empresa']; ?></td>
          <td><?php echo $value['observacion']; ?></td>
          <td class="text-center">
            <?php
          if ($value['estado_empresa'] == 1) {
            ?>
            <span class="badge bg-success">Activo</span>
            <?php
          } else {
            ?>
            <span class="badge bg-danger">Inactivo</span>
            <?php
          }
            ?>
          </td>
          <td>
            <div class="btn-group text-sm">
              <?php
              if(session("rol")!="Consultor"){
              ?>
              <button class="btn btn-secondary btn-sm rounded-pill mr-1" onclick="MEditEmpresa(<?php echo $value['id_empresa'] ?>)">
                <i class="fas fa-edit"></i>
              </button>

              <button class="btn btn-danger btn-sm rounded-pill mr-1" onclick="MEliEmpresa(<?php echo $value['id_empresa'] ?>)">
                <i class="fas fa-trash"></i>
              </button>
              <?php
              }
              ?>
            </div>
          </td>
        </tr>
        <?php
        }
        ?>

      </tbody>
    </table>

  </section>
</div>