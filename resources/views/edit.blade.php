<h1>Aqui se actualiza</h1>

<form action="/curso/{{$dato->id}}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nombre del curso
        <input type="text" name="name" value="{{$dato->name}}">
    </label>
    <br>
    <br>
    <label for="name">Nombre del descripcion
        <input type="text" name="descripcion" value="{{$dato->descripcion}}">
    </label>
    <br>
    <br>
    <label for="name">Nombre del categoria
        <input type="text" name="categoria" value="{{$dato->categoria}}">
    </label>
    <br>
    <br>
    <button type="submit"> Actualizar </button>
       
</form>