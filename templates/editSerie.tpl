{include file="navbar.tpl"}

    <form action="editSerieForm" method="POST" enctype="multipart/form-data"> 
 
        <select name="serie" class="form-select mb-4 mt-2 " aria-label="Default select example">
            <option selected>Seleccionar serie a Editar</option>
            {foreach from=$series item=$serie}
                <option value="{$serie->Nombre}">{$serie->Nombre}</option>
            {/foreach}


        </select>
        <div class="mb-4">
            <label for="formGroupExampleInput" class="form-label text-muted">Cambiar Nombre(Se borran los episodios)</label>
            <input type="text" name="nombre" class="form-control" id="formGroupExampleInput" placeholder="Ej: Stranger Things">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="formGroupExampleInput2" placeholder="Ej: Esta serie se trata de...">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar Puntuacion</label>
            <input type="number" name="puntuacion" class="form-control" id="formGroupExampleInput2" step=".01" placeholder="Ej: 4.5">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar Creadores</label>
            <input type="text" name="creadores" class="form-control" id="formGroupExampleInput2" placeholder="Ej: Justin Roiland">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Cambiar Genero</label>
            <input type="text" name="genero" class="form-control" id="formGroupExampleInput2" placeholder="Ej: Terror">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Imagen</label>
            <input type="file" name="imagen" class="form-control" id="formGroupExampleInput2">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>
{include file="footer.tpl"}