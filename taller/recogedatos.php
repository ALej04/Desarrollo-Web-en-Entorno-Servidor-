<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto; /* Centra la tabla en el centro de la página */
            border: 2px solid blue; /* Establece el borde azul */
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<?php
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $ficha= fopen("taller.csv", "w");
    $brands = isset($_POST["brands"]) ? $_POST["brands"] : "";
    $seguro = isset($_POST["seguro"]) ? $_POST["seguro"] : "";
    $mañana = isset($_POST["mañana"]) ? ($_POST["mañana"] == "si" ? "si" : "no") : "no";
    $tarde = isset($_POST["tarde"]) ? ($_POST["tarde"] == "si" ? "si" : "no") : "no";
    $noche = isset($_POST["noche"]) ? ($_POST["noche"] == "si" ? "si" : "no") : "no";
    if($brands == "SE"){
        $fila="SEAT, $brands\n";
        fwrite($ficha, $fila);
    }else if ($brands == "CI"){
        $fila="CITROEN, $brands\n";
        fwrite($ficha, $fila);
    }elseif ($brands == "ME"){
        $fila="MERCEDES, $brands\n";
        fwrite($ficha, $fila);
    }
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <td><?php echo $name;?></td>
        </tr>
        <tr>
            <th>Matricula</th>
            <td><?php echo $matricula;?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email;?></td>
        </tr>
        <tr>
            <th>Marca</th>
            <td><?php
                $ficha = fopen("taller.csv", "r");
                echo fread($ficha, filesize("taller.csv"));
                fclose($ficha); 
            ?></td>
        </tr>
        <tr>
            <th>Seguro</th>
            <td><?php echo $seguro;?></td>
        </tr> 
        <tr>
            <th>Hora Llamada</th>
            <td><?php echo "¿Por la mañana?  $mañana"?></td>
            <td><?php echo "¿Por la tarde? $tarde"?></td>
            <td><?php echo "¿Por la noche? $noche"?></td>
        </tr>
    </table>
</body>

</html>