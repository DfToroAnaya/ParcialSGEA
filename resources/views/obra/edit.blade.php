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
              <label for="codigo" class="form-label">Id</label>
              <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
                  disabled="disabled" value="{{ $obra->id}}">
              <div id="codigoHelp" class="form-text">obra Id</div>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Obra</label>
              <input type="text" class="form-control" id="name"  placeholder="Obra name" name="name"
              value="{{ $obra->título}}">
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