<?php
require_once("database.php");
class Admin extends Database
{
    private $email;
    private $nombre;
    private $clave;

    public function login($email, $password)
    {
        $consulta = $this->db->prepare("SELECT * FROM admin WHERE correo LIKE '$email' and clave LIKE '$password'");
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }
    }
}
