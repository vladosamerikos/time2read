<?php
require "models/admin.php";
require "models/usuario.php";

class LoginController
{

    public function index()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin') {
            header('Location: index.php?controller=Libro&action=mostrarLibros');
        } else if (isset($_SESSION['email']) && $_SESSION['role'] == 'user') {
            header('Location: index.php?controller=Principal&action=mostrarPaginaPrincipal');
        } else {
            header('Location: index.php?controller=Principal&action=mostrarPaginaPrincipal');
        }
    }

    public function mostrarLoginAdmin()
    {
        require "views/loginAdmin/formulario.php";
    }

    public function loginAdmin()
    {
        $admin = new Admin();
        $_email = trim($_POST['email']);
        $_password = md5(trim($_POST['password']));

        $_result = $admin->login($_email, $_password);
        if ($_result) {
            $_SESSION['email'] = $_email;
            $_SESSION['role'] = 'admin';
            echo "login correcto";
            header('Location: index.php?controller=Libro&action=mostrarLibros');
            die();
        } else {
            echo "login incorrecto";
        }
    }

    public function loginUser()
    {
        $user = new Usuario();
        $_email = trim($_POST['email']);
        $_password = md5(trim($_POST['password']));

        $_result = $user->login($_email, $_password);
        if ($_result) {
            $_SESSION['email'] = $_email;
            $_SESSION['role'] = 'user';
            $_foto=$user->getFoto($_email)[0]['foto'];
            $_SESSION['foto']=$_foto;
            $_nombre=$user->getNombre($_email)[0]['nombre'];
            $_SESSION['nombre']=$_nombre;
            echo "login correcto";
            header('Location: index.php?controller=Login&action=index');
            die();
        } else {
            echo "login incorrecto";
        }
    }

    public function signupUser()
    {
        $user = new Usuario();
        $_email = trim($_POST['email']);
        $_password = md5(trim($_POST['password']));
        $_nombre = $_POST['nombre'];
        $_apellidos = $_POST['apellidos'];
        $_direccion = $_POST['direccion'];

        $emailExist = $user->comprobarEmail($_email);

        if ($emailExist){
            echo "Este correo ya esta registrado";
        }else{
            $result = $user->signin($_email, $_password, $_nombre, $_apellidos, $_direccion);
            if ($result) {
                echo "Usuario creado correctamente";
                header('Location: index.php?controller=Login&action=mostrarLoginUser');
                die();
            } else {
                echo "Error al crear al usuario";
            }
        }
    }

    public function mostrarSignupUser()
    {
        require "views/loginSignupUser/formularioSignup.php";
    }

    public function mostrarLoginUser()
    {
        require "views/loginSignupUser/formularioLogin.php";
    }

    public function destroySesion()
    {
        session_destroy();
        echo "<p>Cerrando sesion...</p>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=index.php'>";
    }

}