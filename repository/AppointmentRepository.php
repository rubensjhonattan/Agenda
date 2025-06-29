<?php
require_once 'db/Database.php';
require_once 'models/Appointment.php';

// Classe com métodos CRUD para os compromissos
class AppointmentRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function add(Appointment $a) {
        $stmt = $this->conn->prepare("INSERT INTO appointments (title, description, date) VALUES (?, ?, ?)");
        return $stmt->execute([$a->title, $a->description, $a->date]);
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM appointments ORDER BY date ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Appointment $a) {
        $stmt = $this->conn->prepare("UPDATE appointments SET title=?, description=?, date=? WHERE id=?");
        return $stmt->execute([$a->title, $a->description, $a->date, $a->id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM appointments WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM appointments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
