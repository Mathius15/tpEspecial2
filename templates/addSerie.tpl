{include file="navbar.tpl"}
    <form action="addSerieForm" method="POST" enctype="multipart/form-data"> 
        <div class="mb-4">
            <label for="formGroupExampleInput" class="form-label text-muted">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="formGroupExampleInput" placeholder="Ej: Stranger Things">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="formGroupExampleInput2" placeholder="Ej: Esta serie se trata de...">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label text-muted">Puntuacion</label>
            <input type="number" name="puntuacion" class="form-control" step=".01" id="formGroupExampleInput2" placeholder="Ej: 4.5">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Creadores</label>
            <input type="text" name="creadores" class="form-control" id="formGroupExampleInput2" placeholder="Ej: Justin Roiland">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Genero</label>
            <input type="text" name="genero" class="form-control" id="formGroupExampleInput2" placeholder="Ej: Terror">
        </div>

        <div class="mb-4">
            <label for="formGroupExampleInput2" class="form-label text-muted">Imagen</label>
            <input type="file" name="imagen" class="form-control" id="formGroupExampleInput2" placeholder="Ej: https://imagen.jpg" >
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>

{include file="footer.tpl"}
