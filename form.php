<?php
require_once 'repository/AppointmentRepository.php';

$repo = new AppointmentRepository();

$id = $_GET['id'] ?? null;
$appointment = ['title' => '', 'description' => '', 'date' => ''];

if ($id) {
    $appointment = $repo->getById($id);
}

if ($_POST) {
    $a = new Appointment($_POST['title'], $_POST['description'], $_POST['date']);
    if ($id) {
        $a->id = $id;
        $repo->update($a);
    } else {
        $repo->add($a);
    }
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'New' ?> Compromisso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h1 class="mb-4"><?= $id ? 'Edit' : 'New' ?> Compromisso</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($appointment['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" required><?= htmlspecialchars($appointment['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($appointment['date']) ?>" required>
        </div>
        <button class="btn btn-primary">Alterar</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
