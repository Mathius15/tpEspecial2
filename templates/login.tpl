{include file="navbar.tpl"}
    
    <form method="POST" action="validacion">
        <div class="mb-3 text-muted">
            <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 text-muted">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

{include file="footer.tpl"}
