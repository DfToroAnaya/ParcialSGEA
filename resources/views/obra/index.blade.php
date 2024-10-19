<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado Obras</title>
  </head>
  <body>
    <div class="container">
      <h1>Listado Obras</h1>
      <a href="{{ route('departamentos.create')}}" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Titulo</th>
                <th scope="col">Año</th>
                <th scope="col">Tecnica</th>
                <th scope="col">Dimensiones</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($obras as $obra)
                <tr>
                    <th scope="row">{{ $obra->id }}</th>
                    <td>{{ $obra->título }}</td>
                    <td>{{ $obra ->año }}</td>
                    <td>{{ $obra ->dimensiones }}</td>
                    <td>{{ $obra ->tecnica }}</td>
                    <td>{{ $obra ->descripcion }}</td>
                    <td>
                      <a href="{{route('obras.edit', ['obra' => $obra->id])}}"
                        class="btn btn-info"> Edit </a></li>

                      <form action="{{ route('obras.destroy', ['obra' => $obra->id])}}"
                        method="POST" style="display: inline-block">
                      @method('delete')
                      @csrf
                      <input  class="btn btn-danger" type="submit" value="Delete">
                      </form>
                    </td>
                  </tr> 
                @endforeach
            </tbody>
          </table>
    </div>
    

  </body>
</html>