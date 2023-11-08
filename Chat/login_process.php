<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = [];

    if (file_exists("users.csv")) {
        if (($handle = fopen("users.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $users[$data[0]] = $data[1];
            }
            fclose($handle);

            if (isset($users[$username]) && password_verify($password, $users[$username])) {
                $_SESSION["username"] = $username; // Guardar el nombre de usuario en la sesión
                echo "Inicio de sesión exitoso.";
                echo "<button onclick='location.href=\"chat.php\"'>Pulse aquí para continuar</button>";
            } else {
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        } else {
            echo "Error al abrir el archivo users.csv.";
        }
    } else {
        echo "Usted no se ha registrado todavía. Pulse el botón para registrarse.<br>";
        echo "<button onclick='location.href=\"index.html\"'>Volver al inicio</button>";
    }
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
    margin: 20% auto;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4285f4;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #1a73e8;
}
    </style>
</head>
<body>
    
</body>
</html>
