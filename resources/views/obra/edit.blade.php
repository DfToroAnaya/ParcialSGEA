<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Comuna</title>
  </head>
  <body>

    <div class="container">
        <h1>Edit Comuna</h1>
        <form method="POST" action="{{ route('obras.update', ['obra' => $obra->id])}}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="id" class="form-label">Code</label>
              <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                  disabled="disabled">
              <div id="idHelp" class="form-text">Obra code</div>
            </div>
            
            <div class="mb-3">
              <label for="título" class="form-label">Titulo </label>
              <input type="text" class="form-control" id="título" aria-describedby="títuloHelp"
              name="título" placeholder='título name' value="{{$obra->título}}"
            </div>
            
            <div class="mb-3">
              <label for="año" class="form-label">Año </label>
              <input type="text" class="form-control" id="año" aria-describedby="añoHelp"
              name="año" placeholder='Año' value="{{$obra->año}}">
            </div>

            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Open this select menu</option>
              <option value="1">Largo</option>
              <option value="2">Ancho</option>
              <option value="3">Alto</option>
            </select>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion </label>
              <input type="text" class="form-control" id="descripcion" aria-describedby="descripcionHelp"
              name="descripcion" placeholder='descripcion' value="{{$obra->descripcion}}">
            </div>

            <label for="artist">Artista</label>
            <select class="form-select" id="artist" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($artista as $artista)
                 @if ($artista->id == $artista->id)
                 <option selected value="{{ $artista->id}}">{{ $artista->nombre}}</option>                  
                 @else
                 <option value="{{ $artista->id}}">{{ $artista->nombre}}</option>                     
                 @endif                    
                @endforeach
            </select>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('obras.index')}}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
    </div>
  </body>
</html>