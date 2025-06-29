<?php
require_once 'repository/AppointmentRepository.php';

$repo = new AppointmentRepository();
$id = $_GET['id'] ?? null;

if ($id) {
    $repo->delete($id);
}

header("Location: index.php");
exit;
