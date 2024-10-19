<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Exhibition</title>
  </head>
  <body>
    <div class="container">
    <h1>Edit Exhibition</h1>
    <form method="POST" action="{{route('exhibition.update', ['exhibition' => $exhibitions->obra_id])}}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="id" class="form-label">Code</label>
          <input type="text" class="form-control" id="id" aria-describedby="idHelp"
          name="id" desabled='disabled' value="{{$exhibition->id}}">
          <div id="idHelp" class="form-text"> Code</div>
        </div>



        
          <label for="obras_id">works</label>
          <select class="form-select" id='works'  name='obra_id' required>
            <option selected disabled value="">choose one...</option>
            @foreach ($work as $works)
            @if ($work->obra_id == $exhibition->obra_id)
            <option selected value="{{$works->obra_id}}">{{$works->obra_id}}</option>
            @endif
            <option value="{{$works->obra_id}}">{{$works->obra_id}}</option>
                
            @endforeach
          </select>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">start date </label>
            <input type="text" class="form-control" id="fecha_inicio" aria-describedby="fecha_inicioHelp"
            name="fecha_inicio" placeholder='start exhibition' value="{{$exhibitions->fecha_inicio}}">
          </div>

          <div class="mb-3">
            <label for="fecha_fin" class="form-label">end date</label>
            <input type="text" class="form-control" id="fecha_fin" aria-describedby="fecha_finHelp"
            name="fecha_fin" placeholder="end exhibition" value="{{$exhibitions->fecha_fin}}">
          </div>

          <div class="mb-3">
            <label for="ubicacion" class="form-label">location</label>
            <input type="text" class="form-control" id="ubicacion" aria-describedby="ubicacionHelp"
            name="ubicacion" placeholder="exhibition location" value="{{$exhibitions->ubicacion}}">
          </div>

          <div class="mb-3">
            <label for="nombre_evento" class="form-label">event name</label>
            <input type="text" class="form-control" id="nombre_evento" aria-describedby="nombre_eventoHelp"
            name="nombre_evento" placeholder="exhibition event name" value="{{$exhibitions->nombre_evento}}">
          </div>


          
        <div class="mb-3">

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('exhibition.index')}}" class="btn btn-warning">Cancel</a>
        </div>
      </form>
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