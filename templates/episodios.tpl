{include file="navbar.tpl"}
      <h1 class="text-light">EPISODIOS DE {$titulo|upper}</h1>
      <div class="align-items-start">
      {foreach from=$episodios item=$episodio}
        <div class="accordion accordion-flush col mb-1" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading{$acordeon[$i]}">
              <button class="accordion-button collapsed aria-expanded  bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{$acordeon[$i]}" aria-expanded="false" aria-controls="flush-collapse{$acordeon[$i]}">
              <p class="text-white">{$episodio->Titulo}</p>
              </button>
            </h2>
            <div id="flush-collapse{$acordeon[$i]}" class="accordion-collapse collapse bg-secondary" aria-labelledby="flush-heading{$acordeon[$i]}" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body text-light">
              {if $bool}                
                <a href="borrarEpisodio/{$episodio->Titulo}"><i class="fa-solid fa-trash"></i></a>
                <a href="editEpisodio/{$episodio->ID_episodio}"><i class="fa-solid fa-pen-to-square"></i></a>
              {/if}
                <p class="c-light">Pertenece a la temporada {$episodio->Temporada}</p>
                <p>Descripcion: </p>
                <p>{$episodio->Descripcion}</p>
                <p>Duracion: {$episodio->Duracion} min</p>
                <p>Puntuacion: {$episodio->Puntuacion}<i class="fa-regular fa-star"></i></p>
              </div>
            </div>
          </div>
        </div>
        {$i = $i + 1}
      {/foreach}
      </div>
    
{include file="footer.tpl"}
