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
                    <th>Matrícula</th>
                    <th>Fecha Nacimiento</th>
                    <th>Sexo</th>
                    <th>Celular</th>
                    <th>Empresa</th>
                    <td>
                        <button class="btn btn-primary" onclick="MNuevoPersona()"><i class="fas fa-plus"></i> Nuevo Registro</button>
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
                        <td><?php echo $persona['nombre_persona']. " " . $persona['ap_paterno'] ?></td>
                        <td><?php echo $persona['matricula'] ?></td>
                        <td><?php echo $persona['fecha_nacimiento'] ?></td>
                        <td><?php echo $persona['sexo'] ?></td>
                        <td><?php echo $persona['celular'] ?></td>
                        <td><?php echo $persona['id_empresa'] ?></td>
                        <td>
                            <div class="btn-group text-sm">
                                <button class="btn btn-info" onclick="MVerPersona()">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" onclick="MEditPersona()">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="MEliPersona()">
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