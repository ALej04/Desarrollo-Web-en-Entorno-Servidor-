<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

</head>

<body>
    <table>
        <?php
        $url = 'http://localhost/WebServer/JSON_Agenda/verjson.php';
        $datos = file_get_contents($url);
        if ($datos === false) {
            echo "Error al obtener los datos JSON.";
        } else {
            $contactos = json_decode($datos, true);
            if ($contactos === null) {
                echo "Error al decodificar el JSON.";
            } else {
                echo "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                </tr>";
                foreach ($contactos as $contacto) {
                    echo "<tr>
                    <td>" . $contacto['Nombre'] . "</td>
                    <td>" . $contacto['Apellido'] . "</td>
                    <td>" . $contacto['Telf'] . "</td>
                  </tr>";
                }

                echo "</table>";
            }
        }
        ?>

    </table>
</body>

</html>