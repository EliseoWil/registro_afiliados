<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <h4>Lista de Estudiantes</h4>

        <table id="DataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Reg. Universitario</th>
                    <th>Curso</th>
                    <th>cod. Asegurado</th>
                    <th>Pais</th>
                    <th>Universidad</th>
                    <td>
                        <button class="btn btn-primary" onclick="MNuevoEstudiante()"><i class="fas fa-plus"></i> Nuevo</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                $cont = 0;
                foreach ($estudiantes as $key => $estudiante) {
                    $cont = $cont + 1;
                ?>
                    <tr>
                        <td><?php echo $cont ?></td>
                        <td><?php echo $estudiante['nombre_estu'] . " " . $estudiante['ap_paterno_estu'] . " " . $estudiante['ap_materno_estu'] ?></td>
                        <td><?php echo $estudiante['ru'] ?></td>
                        <td><?php echo $estudiante['curso'] ?></td>
                        <td><?php echo $estudiante['cod_asegurado'] ?></td>
                        <td><?php echo $estudiante['nombre_pais'] ?></td>
                        <td><?php echo $estudiante['nombre_universidad'] ?></td>
                        <td>
                            <div class="btn-group text-sm ">
                                <button class="btn btn-sm btn-info rounded-pill mr-1" onclick="MVerEstudiante(<?php echo $estudiante['id_estudiante'] ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm rounded-pill mr-1" onclick="MEditEstudiante(<?php echo $estudiante['id_estudiante'] ?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm rounded-pill mr-1" onclick="MEliEstudiante(<?php echo $estudiante['id_estudiante'] ?>)">
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