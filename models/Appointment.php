<?php
// Classe que representa um compromisso
class Appointment {
    public $id;
    public $title;
    public $description;
    public $date;

    public function __construct($title = '', $description = '', $date = '') {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
    }
}
