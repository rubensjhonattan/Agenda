<?php
require_once 'repository/AppointmentRepository.php';

$repo = new AppointmentRepository();
$appointments = $repo->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h1 class="mb-4">Compromissos da Agenda</h1>
    <a href="form.php" class="btn btn-success mb-3">Novo compromisso</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['title']) ?></td>
                    <td><?= htmlspecialchars($a['description']) ?></td>
                    <td><?= htmlspecialchars($a['date']) ?></td>
                    <td>
                        <a href="form.php?id=<?= $a['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?= $a['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
