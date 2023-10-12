<!DOCTYPE html>
<html>
<head>
    <title>Ver Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['file'])) {
            $filePath = $_GET['file'];
            if (is_file($filePath)) {
                $fileContent = file_get_contents($filePath);
                echo '<h2>Contenido de la Nota:</h2>';
                echo '<hr>';
                echo '<pre>' . htmlspecialchars($fileContent) . '</pre>';
                echo '<a href="index.php" class="btn btn-primary">Volver</a>';
            } else {
                echo 'El archivo no existe.';
            }
        } else {
            echo 'No se especificó ningún archivo para visualizar.';
        }
        ?>
    </div>
</body>
</html>
