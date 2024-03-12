<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <h4>Lista de Usuarios</h4>
        <table id="DataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Login</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <td>
                        <button class="btn btn-primary" onclick="MNuevoUsuario()"><i class="fas fa-plus"></i> Nuevo Registro</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                $cont = 0;
                foreach ($users as $key => $user) {
                    $cont = $cont + 1;
                ?>
                    <tr>
                        <td><?php echo $cont ?></td>
                        <td><?php echo $user['nombre_usuario'] ?></td>
                        <td><?php echo $user['login_usuario'] ?></td>
                        <td><?php echo $user['rol_usuario'] ?></td>
                        <td class="text-center">
                            <?php
                            if ($user["estado_usuario"] == 1) {
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
                                <button class="btn btn-secondary btn-sm rounded-pill" onclick="MEditUsuario(<?php echo $user['id_usuario'] ?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm rounded-pill" onclick="MEliUsuario(<?php echo $user['id_usuario'] ?>)">
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
    </script>;
<?php
}
?>