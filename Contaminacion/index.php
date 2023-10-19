<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Datos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$archivo_csv = 'horario.csv';


if (file_exists($archivo_csv)) {

    $datos = array_map(function($linea) {
        return explode(';', $linea);
    }, file($archivo_csv, FILE_SKIP_EMPTY_LINES));

    
    $encabezados = array_shift($datos);

    
    $columnasMostrar = ['ESTACION', 'MAGNITUD', 'H01', 'V01', 'H02', 'V02', 'H03', 'V03', 'H04', 'V04', 'H05', 'V05', 'H06', 'V06', 'H07', 'V07', 'H08', 'V08', 'H09', 'V09', 'H10', 'V10', 'H11', 'V11', 'H12', 'V12', 'H13', 'V13', 'H14', 'V14', 'H15', 'V15', 'H16', 'V16', 'H17', 'V17', 'H18', 'V18', 'H19', 'V19', 'H20', 'V20', 'H21', 'V21', 'H22', 'V22', 'H23', 'V23', 'H24', 'V24'];

    
    $contadorFilas = 0;

    
    echo '<table>';
    echo '<tr>';
    foreach ($columnasMostrar as $columna) {
        echo '<th>' . $columna . '</th>';
    }
    echo '</tr>';

    foreach ($datos as $fila) {
    
        $contadorFilas++;

    
        if ($contadorFilas > 5) {
            break;
        }

        echo '<tr>';
        foreach ($columnasMostrar as $columna) {
            $indice = array_search($columna, $encabezados);

    
            if ($columna == 'ESTACION' && $fila[$indice] == 4) {
                echo '<td>Pza. de España</td>';
            }
            elseif ($columna == 'MAGNITUD' && $fila[$indice] == 1) {
                echo '<td>Dióxido de Azufre</td>';
            } elseif ($columna == 'MAGNITUD' && $fila[$indice] == 6) {
                echo '<td>Monóxido de Carbono</td>';
            } elseif ($columna == 'MAGNITUD' && $fila[$indice] == 7) {
                echo '<td>Monóxido de Nitrógeno</td>';
            } elseif ($columna == 'MAGNITUD' && $fila[$indice] == 8) {
                echo '<td>Dióxido de Nitrógeno</td>';
            } elseif ($columna == 'MAGNITUD' && $fila[$indice] == 12) {
                echo '<td>Óxidos de Nitrógeno</td>';
            } else {
                echo '<td>' . $fila[$indice] . '</td>';
            }
        }
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'El archivo CSV no existe.';
}
?>

</body>
</html>
