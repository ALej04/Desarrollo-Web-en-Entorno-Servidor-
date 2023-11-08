<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $user = [$username, $password];

    if (!file_exists("users.csv")) {
        $header = ["username", "password"];
        if (($handle = fopen("users.csv", "w")) !== FALSE) {
            fputcsv($handle, $header);
            fclose($handle);
        } else {
            die("Error al crear el archivo users.csv");
        }
    }

    $users = [];

    if (($handle = fopen("users.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $users[] = $data[0];
        }
        fclose($handle);
    }

    if (!in_array($username, $users)) {
        $users[] = $username;

        if (($handle = fopen("users.csv", "a")) !== FALSE) {
            fputcsv($handle, $user);
            fclose($handle);
            echo "Usuario registrado con éxito.";
            echo "<button onclick='location.href=\"login.php\"'>Pulse aquí para continuar</button>";
        } else {
            echo "Error al registrar el usuario.";
            echo "<button onclick='location.href=\"index.html\"'>Volver al inicio</button>";
        }
    } else {
        echo "El nombre de usuario ya está en uso.";
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