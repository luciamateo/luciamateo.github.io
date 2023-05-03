<?php
session_start();
require_once('master.php');
$master = new Master();
$json_data = $master->get_all_data();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formulario multiple</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <style>
        html,
        body {
            min-height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger bg-gradient">
        <div class="container">
            <a class="navbar-brand" href="./">INICIO</a>
           </div>
    </nav>
        <h2 class="text-center">Creación, lectura, actualización y eliminación de datos JSON en PHP</h2>
             <!-- Page Content Container -->
                <div class="container-fluid">
                    <!-- Handling Messages Form Session -->
                    <?php if (isset($_SESSION['msg_success']) || isset($_SESSION['msg_error'])) : ?>
                        <?php if (isset($_SESSION['msg_success'])) : ?>
                            <div class="alert alert-success rounded-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['msg_success'] ?></div>
                                    <div class="col-auto">
                                        <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                                            <i class="fa-solid fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION['msg_success']); ?>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['msg_error'])) : ?>
                            <div class="alert alert-danger rounded-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['msg_error'] ?></div>
                                    <div class="col-auto">
                                        <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                                            <i class="fa-solid fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION['msg_error']); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <!--END of Handling Messages Form Session -->
                    <a class="btn btn-danger btn-sm btn-flat" href="member_form.php"><i class="fa fa-plus-square"></i> Agregar Usuario</a>
                                <table class="table table-stripped table-bordered">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="35%">
                                        <col width="20%">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Domicilio</th>
                                            <th class="text-center">Telefono</th>
                                            <th class="text-center">Movil</th>
                                            <th class="text-center">Nombre Familia</th>
                                            <th class="text-center">Email Familia</th>
                                            <th class="text-center">Parentezco</th>
                                            <th class="text-center">enfermedad</th>
                                            <th class="text-center">tiempo</th>
                                            <th class="text-center">detalles</th>
                                            <th class="text-center">fechas</th>
                                            <th class="text-center">centro medico</th>
                                            <th class="text-center">diagnostico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($json_data as $data) : ?>
                                            <tr>
                                                <td class="text-center"><?= $data->id ?></td>
                                                <td><?= $data->nombre ?></td>
                                                <td><?= $data->email ?></td>
                                                <td><?= $data->domicilio ?></td>
                                                <td><?= $data->telefono ?></td>
                                                <td><?= $data->movil ?></td>
                                                <td><?= $data->nombre_familiar ?></td>
                                                <td><?= $data->email_familiar ?></td>
                                                <td><?= $data->parentezco ?></td>
                                                <td><?= $data->enfermedad ?></td>
                                                <td><?= $data->tiempo ?></td>
                                                <td><?= $data->detalles ?></td>
                                                <td><?= $data->fechas ?></td>
                                                <td><?= $data->centro_medico ?></td>
                                                <td><?= $data->diagnostico ?></td>
                                                <td class="text-center">
                                                    <a href="member_form.php?id=<?= $data->id ?>" class="btn btn-sm btn-outline-info rounded-0">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                    <a href="delete_data.php?id=<?= $data->id ?>" class="btn btn-sm btn-outline-danger rounded-0" onclick="if(confirm(`¿Deseas eliminar del registro a <?= $data->name ?>?`) === false) event.preventDefault();">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
        </div>
</body>

</html>