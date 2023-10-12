<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Esta línea asegura que la codificación sea UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloc de Notas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class= container>
  <nav id="bloc" class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="index.php">Bloc de Nota</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#index.php"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#directorio"><b>Directorio</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>


<div class="container">
  <br>
  <h5 class= "p-3 mb-2 bg-secondary text-white">Crear Archivos o Carpetas</h5>
  <br>
    <form method="post" action="index.php">
    <div class="form-group">
        <label for="type"><b>Tipo:</b></label>
        <select class="form-control" id="type" name="type">
          <option value="file">Archivo</option>
          <option value="folder">Carpeta</option>
        </select>
      </div>
      <br>
      <div  class="form-group">
        <label for="name"><b>Nombre:</b></label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <br>
      <div class="mb-3" id="content-group">
        <label class="form-label"><b>Escribe tu nota:</b></label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
      </div>
      <button type="submit" name="create" class="btn btn-primary">Crear</button>
    </form>
  </div>
  <br>
  <hr>

  <h5 id="directorio" class="container p-3 mb-2 bg-secondary text-white">Directorio</h5>
<div class="container">
    <div class="row">
        <?php
        // Obtener lista de archivos y carpetas
        $files = glob($dir . '*');
        foreach ($files as $file) {
            $name = basename($file);
            $size = is_file($file) ? filesize($file) : '';
            $type = is_file($file) ? 'Archivo' : 'Carpeta';
            $created = date('Y-m-d H:i:s', filectime($file));
            $modified = date('Y-m-d H:i:s', filemtime($file));
        ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <p class="card-text"><strong>Tipo:</strong> <?php echo $type; ?></p>
                        <?php if ($size !== '') { ?>
                            <p class="card-text"><strong>Tamaño:</strong> <?php echo $size; ?> bytes</p>
                        <?php } ?>
                        <p class="card-text"><strong>Creado:</strong> <?php echo $created; ?></p>
                        <p class="card-text"><strong>Modificado:</strong> <?php echo $modified; ?></p>
                        <a href="index.php?delete=<?php echo $file; ?>" class="btn btn-danger">Eliminar</a>
                        <?php if (is_file($file)) { ?>
                            <a href="edit.php?file=<?php echo $file; ?>" class="btn btn-primary">Editar</a>
                            <a href="view.php?file=<?php echo $file; ?>" class="btn btn-secondary">Ver</a>
                        <?php } else { ?>
                            <a href="browse.php?dir=<?php echo $file; ?>" class="btn btn-primary">Abrir</a>
                            <a href="create.php?dir=<?php echo $file; ?>" class="btn btn-success">Crear</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

    <div class="container">
      <a href="#bloc" class="btn btn-primary">Volver</a>
    </div>
    <br>

  <script>
    document.getElementById('type').addEventListener('change', function() {
      var contentGroup = document.getElementById('content-group');
      if (this.value === 'file') {
        contentGroup.style.display = 'block';
      } else {
        contentGroup.style.display = 'none';
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>