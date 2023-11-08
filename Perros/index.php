<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perros JSON</title>
</head>
<body>
    <?php
        $url = "https://dog.ceo/api/breeds/image/random";

        $json = file_get_contents($url);

        $data = json_decode($json, true);

        if ($data && $data['status'] === "success") {
            $image_url = $data['message'];
            echo "<img src='$image_url' alt='perro'>";
        } else {
            echo "No se pudo cargar la imagen del perro aleatorio.";
        }
    ?>
</body>
</html>