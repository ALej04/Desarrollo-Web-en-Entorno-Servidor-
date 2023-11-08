<?php
session_start();

// Función para validar el usuario y redirigir a login.php si no está autenticado
function validateUser() {
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
}

// Validar el usuario antes de mostrar el chat
validateUser();

// Guardar el mensaje en el archivo mensajes.csv
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["men"];
    $date = date('d-m-Y H:i:s');
    $username = $_SESSION["username"];

    $line = "$username,$date,$message\n";
    file_put_contents("mensajes.csv", $line, FILE_APPEND);

    // Redirigir para evitar envío de formulario nuevamente al recargar la página
    header("Location: chat.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat PHP</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    text-align: center;
    margin: 20px auto;
}

.text {
    background-color: #1a73e8;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
}

.mensaje {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    width: 80%;
    height: 100px;
    margin-bottom: 10px;
    padding: 10px;
    font-size: 16px;
}

input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4285f4;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #1a73e8;
}

a {
    color: #4285f4;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <h1>CHAT PHP</h1>
    <div class='mensaje'>
        <h3>Mensajes</h3>
        <?php
        if (file_exists("mensajes.csv")) {
            $lines = file("mensajes.csv");
            foreach ($lines as $line) {
                $word = explode(",", $line);
                if (count($word) >= 3) {
                    echo "<br>
                    <b>Usuario: </b>{$word[0]}
                    <br>
                    <b>Fecha: </b>{$word[1]}
                    <br>
                    <b>Mensaje: </b>{$word[2]}
                    <br>";
                }
            }
        } else {
            echo "No hay mensajes disponibles.";
        }
        ?>
    </div>
    <div class='text'>
        <p>Bienvenido <?php echo $_SESSION['username']; ?> <a href='login.php?logout=1' style="color: yellow;">Cerrar sesión</a></p>
        <br>
        <form action='chat.php' method='POST'>
            <textarea name='men' placeholder='Mensaje' required></textarea>
            <br>
            <br>
            <input type='submit' value='Enviar'>
        </form>
    </div>
</body>
</html>
