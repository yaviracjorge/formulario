<h1>se van a crear los cursos</h1>

<form action="/curso" method="POST">
    @csrf
    <label for="name">Nombre del curso
        <input type="text" name="name">
    </label>
    <br>
    <br>
    <label for="name">Nombre del descripcion
        <input type="text" name="descripcion">
    </label>
    <br>
    <br>
    <label for="name">Nombre del categoria
        <input type="text" name="categoria">
    </label>
    <br>
    <br>
    <button type="submit"> Crear </button>
       
</form>