<?php
$esEdicion = isset($user);
$accion = $esEdicion ? '/App/Actions/UpdateUser.php' : '/App/Actions/CreateUser.php';
$titulo = $esEdicion ? 'Editar Usuario' : 'Crear Usuario';

$nombre = $esEdicion ? $user->getNombre() : '';
$email = $esEdicion ? $user->getEmail() : '';
$password = $esEdicion ? $user->getPassword() : '';
$id = $esEdicion ? $user->getId() : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1><?= $titulo ?></h1>
    <form action="<?= $accion ?>" method="POST">
        <?php if ($esEdicion): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $nombre ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" value="<?= $password ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>