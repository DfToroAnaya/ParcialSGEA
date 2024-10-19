<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>List of Exhibition</title>
  </head>
  <body>
    <div class="container">
    <h1>List of Exhibition</h1>
    <a href="{{route('exhibition.create')}}" class="btn btn-success">Add</a>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">Obra</th>
            <th scope="col">fecha Inicio</th>
            <th scope="col">fecha Fin</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Nombre del Evento</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($exhibitions as $exhibition )
          <tr>
            <th scope="row">{{$exhibition->id}}</th>
            <td>{{$exhibition->obra_id}}</td>
            <td>{{$exhibition->fecha_inicio}}</td>
            <td>{{$exhibition->fecha_fin}}</td>
            <td>{{$exhibition->ubicacion}}</td>
            <td>{{$exhibition->nombre_evento}}</td>
            <td>
              <a href="{{route('exhibition.edit',['exhibition' =>$exhibition->obra_id])}}"
                class="btn btn-info">Edit</a>
              <form action="{{route('exhibition.destroy',['exhibition' => $exhibition->obra_id ])}}"
                method="POST" style="display: inline-block">
              @method('delete')
              @csrf
              <input class="btn btn-danger" type="submit" value="Delete">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>