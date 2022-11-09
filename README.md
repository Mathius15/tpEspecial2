ENDPOINTS:
(GET) http://localhost/WEB2/tpEspecial2/series --> Muestra todas las series en la db
(GET) http://localhost/WEB2/tpEspecial2/episodios --> Muestra todos los episodios en la db

(GET) http://localhost/WEB2/tpEspecial2/serie/:ID --> Muestra la serie con ese nombre(ID)
(GET) http://localhost/WEB2/tpEspecial2/episodios/:ID --> Muestra los episodios de la serie con ese nombre(ID)

(GET) http://localhost/WEB2/tpEspecial2/series?sortBy=ASC -->  Muestra las series ordenadas de forma ascendiente
(GET) http://localhost/WEB2/tpEspecial2/series?sortBy=DESC --> Muestra las series ordenadas de forma descendiente

(DELETE) http://localhost/WEB2/tpEspecial2/serie/:ID --> Elimina la serie con ese nombre (ID)
(DELETE) http://localhost/WEB2/tpEspecial2/episodio/:ID --> Elimina el episodio con ese nombre(ID)

(POST) http://localhost/WEB2/tpEspecial2/episodio--> Agrega un episodio con los datos especificados en el body ej:
{
    "Titulo" : "titulaso",
    "Duracion" : "3",
    "Temporada" : "3",
    "Descripcion" : "desc",
    "Puntuacion" : "3",
    "Serie" : "Dark"
}
