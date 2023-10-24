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

        th,
        td {
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

    $estacionDiccionario = array(
        "1" => "Pº. Recoletos Baja",
        "2" => "Glta. de Carlos V Baja",
        "3" => "Pza. del Carmen",
        "4" => "Pza. de España",
        "5" => "Barrio del Pilar",
        "6" => "Pza. Dr. Marañón Baja",
        "7" => "Pza. M. de Salamanca Baja",
        "8" => "Escuelas Aguirre",
        "9" => "Pza. Luca de Tena Baja",
        "10" => "Cuatro Caminos",
        "11" => "Av. Ramón y Cajal",
        "12" => "Pza. Manuel Becerra Baja",
        "13" => "Vallecas",
        "14" => "Pza. Fdez. Ladreda Baja",
        "15" => "Pza. Castilla Baja",
        "16" => "Arturo Soria",
        "17" => "Villaverde Alto",
        "18" => "C/ Farolillo",
        "19" => "Huerta Castañeda Baja",
        "20" => "Moratalaz",
        "21" => "Pza. Cristo Rey Baja",
        "22" => "Pº. Pontones Baja",
        "23" => "Final C/ Alcalá Baja",
        "24" => "Casa de Campo",
        "25" => "Santa Eugenia Baja",
        "26" => "Urb. Embajada (Barajas) Baja",
        "27" => "Barajas",
        "47" => "Méndez Álvaro Alta",
        "48" => "Pº. Castellana Alta",
        "49" => "Retiro Alta",
        "50" => "Pza. Castilla Alta",
        "54" => "Ensanche Vallecas Alta",
        "55" => "Urb. Embajada (Barajas) Alta",
        "56" => "Plaza Elíptica Alta",
        "57" => "Sanchinarro Alta",
        "58" => "El Pardo Alta",
        "59" => "Parque Juan Carlos I Alta",
        "60" => "Tres Olivos Alta"
    );
    
    $magnitudDiccionario = array(
        "1" => "Dióxido de Azufre SO2",
        "6" => "Monóxido de Carbono CO",
        "7" => "Monóxido de Nitrógeno NO",
        "8" => "Dióxido de Nitrógeno NO2",
        "9" => "Partículas < 2.5 µm PM2.5",
        "10" => "Partículas < 10 µm PM10",
        "12" => "Óxidos de Nitrógeno NOx",
        "14" => "Ozono O3",
        "20" => "Tolueno TOL",
        "30" => "Benceno BEN",
        "35" => "Etilbenceno EBE",
        "37" => "Metaxileno MXY",
        "38" => "Paraxileno PXY",
        "39" => "Ortoxileno OXY",
        "43" => "Metano CH4"
    );
    if (file_exists($archivo_csv)) {
        $datos = array_map(function ($linea) {
            return explode(';', $linea);
        }, file($archivo_csv, FILE_SKIP_EMPTY_LINES));
        $encabezados = array_shift($datos);
        $columnasMostrar = ['ESTACION', 'MAGNITUD', 'H01', 'V01', 'H02', 'V02', 'H03', 'V03', 'H04', 'V04', 'H05', 'V05', 'H06', 'V06', 'H07', 'V07', 'H08', 'V08', 'H09', 'V09', 'H10', 'V10', 'H11', 'V11', 'H12', 'V12', 'H13', 'V13', 'H14', 'V14', 'H15', 'V15', 'H16', 'V16', 'H17', 'V17', 'H18', 'V18', 'H19', 'V19', 'H20', 'V20', 'H21', 'V21', 'H22', 'V22', 'H23', 'V23', 'H24', 'V24'];
        foreach ($columnasMostrar as $columna) {
            $indice = array_search($columna, $encabezados);
            $valoresColumna = array_column($datos, $indice);

            if (in_array('N', $valoresColumna) || in_array('V', $valoresColumna)) {
                $columnasMostrar = array_diff($columnasMostrar, [$columna]);
            }
        }
        $contadorFilas = 0;
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
        echo 'El archivo CSV no existe.';
    }
    ?>

</body>

</html>