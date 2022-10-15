{include file="navbar.tpl"}

    <form action="editEpisodioForm/{$idEp}" method="POST"> 

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label text-muted">Cambiar titulo</label>
            <input type="text" name="titulo" class="form-control" id="formGroupExampleInput" placeholder="Titulo actual: {$titulo}">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar duracion</label>
            <input type="text" name="duracion" class="form-control" id="formGroupExampleInput2" placeholder="Duracion actual: {$duracion}">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar temporada</label>
            <input type="number" name="temporada" class="form-control" id="formGroupExampleInput2" placeholder="Temporada Actual: {$temporada}">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="formGroupExampleInput2" placeholder="Descripcion actual: {$descripcion|truncate:20}">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar puntuacion</label>
            <input type="text" name="puntuacion" class="form-control" id="formGroupExampleInput2" step=".01" placeholder="Puntuacion actual: {$puntuacion}">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>
{include file="footer.tpl"}