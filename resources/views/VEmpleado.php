<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <h4>Lista de Empleados Asegurados</h4>
        <table id="DataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Cod. Asegurado</th>
                    <th>Nombre</th>
                    <th>Fecha de ingreso</th>
                    <th>Empresa</th>
                    <th>Cargo</th>
                    <td>
                        <button class="btn btn-primary" onclick="MNuevoEmpleado()"><i class="fas fa-plus"></i>Nuevo Registro</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                $cont = 0;
                foreach ($empleados as $key => $value) {
                    $cont = $cont + 1;
                ?>
                    <tr>
                        <td><?php echo $value["cod_asegurado"]; ?></td>
                        <td><?php echo $value['nombre_empleado'] . " " . $value['ap_paterno'] . " " . $value['ap_materno']; ?></td>
                        <td><?php echo $value['fecha_ingreso_laboral']; ?></td>
                        <td><?php echo $value['nombre_empresa']; ?></td>
                        <td><?php echo $value['cargo']; ?></td>
                        <td>
                            <div class="btn-group text-sm ">
                                <button class="btn btn-sm btn-info rounded-pill mr-1" onclick="MVerEmpleado(<?php echo $value['id_empleado'] ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm rounded-pill mr-1" onclick="MEditEmpleado(<?php echo $value['id_empleado'] ?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm rounded-pill mr-1" onclick="MEliEmpleado(<?php echo $value['id_empleado'] ?>)">
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