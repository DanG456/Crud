<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    <!-- Data tables -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" rel="stylesheet">

    <!-- Estilos Css-->
    <link rel="stylesheet" href="css/estilos.css">

    <title>Crud con PHP y Ajax</title>
  </head>
  <body>
    <div class="container fondo">
        <h1 class="text-center">CRUD con PHP y Ajax</h1>
        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#userModal"> 
                        <i class="bi bi-plus-circle"></i> Crear
                    </button>
                </div>
            </div>
        </div>
        
        <br>
        <br>

        <div class="table-responsive">
          <table id="datos_usuario" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Imagen</th>
                  <th>Fecha de creacion</th>
                  <th>Editar</th>
                  <th>Borrar</th>
              </tr>
            </thead>
          </table>
        </div>

    </div>

    <!--Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
            <form method="POST" id="formulario" enctype="multipart/form-data">
              <div class="modal-content">
                <div class="modal-body">
                  <label for="nombre">Ingrese el (los) nombre(s)</label>
                  <input type="text" name="nombre" id="nombre" class="form-control">
                  <br>

                  <label for="nombre">Ingrese los apellidos</label>
                  <input type="text" name="apellidos" id="apellidos" class="form-control">
                  <br>

                  <label for="nombre">Ingrese el telefono</label>
                  <input type="text" name="telefono" id="telefono" class="form-control">
                  <br>

                  <label for="nombre">Ingrese el email</label>
                  <input type="text" name="email" id="email" class="form-control">
                  <br>

                  <label for="nombre">Seleccione una imagen</label>
                  <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                  <span id="imagen-subida"></span>
                  <br>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id_usuario" id="id_usuario">
                  <input type="hidden" name="operacion" id="operacion">
                  <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                
                </div>
              </div>
            </form>
          
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  </body>
</html>