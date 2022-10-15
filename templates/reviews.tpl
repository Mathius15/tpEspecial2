{include file="navbar.tpl"}

  <div class="card-columns" style="display: flex;">
    {foreach from=$series item=$serie}
        <div class="card mb-3 mt-3 mx-2 border-danger" style="width: 18rem;">
          <img src="{$serie->img}" class="card-img-top" style="height: 450px;">
          <div class="card-body">
            <h2 class="card-title">{$serie->Nombre}</h2>
            {if $bool}              
              <form action="borrarSerie/{$serie->Nombre}">
                <button type="submit"> <i class="fa-solid fa-trash"></i></button>
              </form>
            {/if}
            <h6 class="card-info">Puntuacion: {$serie->Puntuacion}<i class="fa-solid fa-star"></i></h6>
            <h6 class="card-info">Creadores: {$serie->Creadores}</h6>
            <h6 class="card-info">Genero: {$serie->Genero}</h6>

            <p class="card-text">{$serie->Descripcion}</p>
            <a href='serie/{$serie->Nombre}' class="btn btn-primary">Episodios</a>
          </div>
        </div>
      {/foreach}
  </div>
    
{include file="footer.tpl"}