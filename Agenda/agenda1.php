<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
        $agenda=fopen("agenda.csv","w") or die("No se puede crear el archivo");
        $P1= "Pepe, Perez, 688978456";
        $P2= "Ana,González,622325447";
        fwrite($agenda,$P1 . PHP_EOL);
        fwrite($agenda,$P2 . PHP_EOL);
        fclose($agenda);
    ?>
    <form method="post" action=agenda2.php>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Introduce aquí el nombre" required><br>
        <label for="surname">Apellido:</label>
        <input type="text" name="surname" id="surname" placeholder="Introduce aquí el apellido" required><br>
        <label for="phone">Teléfono:</label>
        <input type="tel" name="phone" id="phone" pattern="[0-9]{9}" placeholder="Introduce aquí el teléfono (sin espacios)" required>
        <br>
        <input type="submit">
    </form>
</body>
</html>