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
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <?php
    $archivo_csv = "AccidentesBicicletas_2023.csv";
    if (file_exists($archivo_csv)) {
        $datos = array_map(function ($linea) {
            return explode(';', $linea);
        }, file($archivo_csv, FILE_SKIP_EMPTY_LINES));
        $encabezados = array_shift($datos);
        $columnasMostrar = ['fecha', 'tipo_vehiculo', 'lesividad'];
        foreach ($columnasMostrar as $columna) {
            $indice = array_search($columna, $encabezados);
            $valoresColumna = array_column($datos, $indice);
        }
        echo '<table>';
        echo '<tr>';
        foreach ($columnasMostrar as $columna) {
            echo '<th>' . $columna . '</th>';
        }
        echo '</tr>';

        foreach ($datos as $fila) {
            echo '<tr>';
            foreach ($columnasMostrar as $columna) {
                $indice = array_search($columna, $encabezados);
                $valor = $fila[$indice];
                switch ($columna) {
                    case 'ESTACION':
                        $valor = $estacionDiccionario[$valor] ?? $valor;
                        break;
                    case 'MAGNITUD':
                        $valor = $magnitudDiccionario[$valor] ?? $valor;
                        break;
                }

                echo '<td>' . $valor . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "El archivo CSV no existe.";
    }
    ?>
</body>

</html>