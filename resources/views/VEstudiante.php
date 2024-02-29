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
                    <th>Estado Civil</th>
                    <th>Pais</th>
                    <th>Universidad</th>
                    <td>
                        <button class="btn btn-primary" onclick="MNuevoEstudiante()"><i class="fas fa-plus"></i> Nuevo Registro</button>
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
                        <td><?php echo $estudiante['id_persona'] ?></td>
                        <td><?php echo $estudiante['ru'] ?></td>
                        <td><?php echo $estudiante['curso'] ?></td>
                        <td><?php echo $estudiante['estado_civil'] ?></td>
                        <td><?php echo $estudiante['id_pais'] ?></td>
                        <td><?php echo $estudiante['id_universidad'] ?></td>
                        <td>
                            <div class="btn-group text-sm">
                                <button class="btn btn-info" onclick="MVerEstudiante()">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" onclick="MEditEstudiante()">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="MEliEstudiante()">
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