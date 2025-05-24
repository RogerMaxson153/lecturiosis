<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Usuarios</h1>

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <form action="/App/Actions/SearchUser.php" method="POST" class="d-flex w-100 w-md-50 me-md-3 mb-2 mb-md-0">
                <div class="input-group w-100">
                    <input type="text" class="form-control" name="searchInput"
                        placeholder="Buscar usuario por id, nombre o correo">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </form>

            <a href="/App/Actions/EditUser.php" class="btn btn-primary">Crear Usuario</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaUsuarios">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['nombre']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td>
                                    <a href="/App/Actions/EditUser.php?id=<?= $user['id'] ?>" class="btn btn-primary">Editar</a>
                                    <form action="/App/Actions/DeleteUser.php" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <button type="submit" class="btn btn-warning">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>