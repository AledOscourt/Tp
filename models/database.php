<?php

class database {

    protected $db = null;

    public function __construct()
    {
        try {
            return $this->db = new PDO('mysql:host=localhost; dbname=collectingpop; charset=UTF8', 'root', 'Aled2525');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
}
