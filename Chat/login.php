<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    text-align: center;
    margin: 20% auto;
}

h2 {
    color: #333;
}

form {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4285f4;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #1a73e8;
}
button{
    background-color: #4285f4;
    color: #fff;
    cursor: pointer;
}
button:hover {
    background-color: #1a73e8;
}
    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="login_process.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <button onclick='location.href="index.html"'>Volver al inicio</button>
</body>
</html>
