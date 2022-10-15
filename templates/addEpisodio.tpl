{include file="navbar.tpl"}
    <form action="addEpisodioo" method="POST"> 

        <select name="serie" class="form-select mb-4 mt-2" aria-label="Default select example">
            <option selected>Serie del episodio:</option>
            {foreach from=$series item=$serie}
                <option value="{$serie->Nombre}">{$serie->Nombre}</option>
            {/foreach}
        </select>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label text-muted">Titulo</label>
            <input type="text" name="titulo" class="form-control" id="formGroupExampleInput">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Duracion</label>
            <input type="text" name="duracion" class="form-control" id="formGroupExampleInput2">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Temporada</label>
            <input type="number" name="temporada" class="form-control" id="formGroupExampleInput2">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="formGroupExampleInput2">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Puntuacion</label>
            <input type="number" name="puntuacion" class="form-control" step=".01" id="formGroupExampleInput2">
        </div>


        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>

{include file="footer.tpl"}

