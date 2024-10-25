<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $usuarioCorrecto="alvaro";
    $contrasenaCorrecta="123456";
    if ($usuario===$usuarioCorrecto && $contrasena===$contrasenaCorrecta) {
        header("Location: index.php");
        exit;
    }else
        {
            echo "<script>
            alert('VERIFIQUE BIEN SU USUARIO O CONTRASEÑA');
            window.location.href = 'login.php'; // Redirige de nuevo a la página de login
          </script>";
            
        }
}
/*if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['alumno'];
    $contrasena = $_POST['contrasena'];
    $usuarioCorrecto="alumno";
    $contrasenaCorrecta="654321";
    if ($usuario===$usuarioCorrecto && $contrasena===$contrasenaCorrecta) {
        header("Location: index2.php");
        exit;
    }else
        {
            echo "<script>
            alert('VERIFIQUE BIEN SU USUARIO O CONTRASEÑA');
            window.location.href = 'login.php'; // Redirige de nuevo a la página de login
          </script>";
            
        }
}*/

