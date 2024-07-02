<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Beneficiarios</h4>
    <table id="DataTablePersona" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nro</th>
          <th>Nombres</th>
          <th>C. I.</th>
          <th>Cod. Asegurado</th>
          <th>Fecha Nacimiento</th>
          <th>Género</th>
          <th>Celular</th>

          <td>
            <button class="btn btn-primary" onclick="MNuevoPersona()"><i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $cont = 0;
        foreach ($personas as $key => $persona) {
          $cont = $cont + 1;
        ?>
        <tr>
          <td><?php echo $cont ?></td>
          <td><?php echo $persona['nombre_persona'] . " " . $persona['ap_paterno'] . " " . $persona['ap_materno'] ?></td>
          <td><?php echo $persona['ci_persona'] ?></td>
          <td><?php echo $persona['cod_asegurado'] ?></td>
          <td><?php echo $persona['fecha_nacimiento'] ?></td>
          <td><?php echo $persona['sexo'] ?></td>
          <td><?php echo $persona['contactos_persona'] ?></td>

          <td>
            <div class="btn-group text-sm">
              <button class="btn btn-sm btn-info rounded-pill" onclick="MVerPersona(<?php echo $persona['id_persona'] ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-secondary btn-sm rounded-pill" onclick="MEditPersona(<?php echo $persona['id_persona'] ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger btn-sm rounded-pill" onclick="MEliPersona(<?php echo $persona['id_persona'] ?>)">
                <i class="fas fa-trash"></i>
              </button>
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

<!-- ====================================================================================================== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">

<?php
if (session('message')) {
?>
<script>
  Swal.fire({
    icon: 'success',
    showConfirmButton: false,
    title: 'El Registro fue creado exitosamente',
    timer: 2500
  })
</script>
<?php
}
?>
<!-- <?php
if (session('eliminado')) {
?>
<script>
Swal.fire({
icon: 'success',
showConfirmButton: false,
title: 'El Registro fue eliminado exitosamente',
timer: 2000,
})
setTimeout(function() {
window.location.href = "/VPersona";
}, 2000)
</script>
<?php
}
?> -->
<?php
if (session('actualizado')) {
?>
<script>
  Swal.fire({
    icon: "success",
    showConfirmButton: false,
    title: "El Registro fue actualizado exitosamente",
    timer: 2000,
  });
  /*  setTimeout(function() {
            window.location.href = "/VPersona";
        }, 2000); */
</script>;
<?php
}
?>