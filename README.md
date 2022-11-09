ENDPOINTS:
(GET) http://localhost/WEB2/tpEspecial2/series --> Muestra todas las series en la db |CONSIGNA 2|
(GET) http://localhost/WEB2/tpEspecial2/episodios --> Muestra todos los episodios en la db

(GET) http://localhost/WEB2/tpEspecial2/series?sortBy=ASC -->  Muestra las series ordenadas por nombre(En este caso ASC, puede ser DESC)  |CONSIGNA 3|

(GET) http://localhost/WEB2/tpEspecial2/serie/:ID --> Muestra la serie con ese nombre(ID) |CONSIGNA 4|
(GET) http://localhost/WEB2/tpEspecial2/episodios/:ID --> Muestra los episodios de la serie con ese nombre(ID)

(GET) http://localhost/WEB2/tpEspecial2/series?select=Descripcion --> Trae todas las series con el campo especificado (En este caso Descripcion) |CONSIGNA 8|
(GET) http://localhost/WEB2/tpEspecial2/episodios?select=Titulo --> Trae todos los episodios con el campo especificado (En este caso Titulo)

(GET) http://localhost/WEB2/tpEspecial2/series?select=Descripcion&sortBy=ASC --> Trae todas las series ordenadas (En este caso ASC) por un campo de la tabla (En este caso Descripcion) |CONSIGNA 9|

(DELETE) http://localhost/WEB2/tpEspecial2/serie/:ID --> Elimina la serie con ese nombre (ID)
(DELETE) http://localhost/WEB2/tpEspecial2/episodio/:ID --> Elimina el episodio con ese nombre(ID)

(POST) http://localhost/WEB2/tpEspecial2/episodio --> Agrega un episodio con los datos especificados en el body. Ej: |CONSIGNA 5|
{
    "Titulo" : "titulaso",
    "Duracion" : "3",
    "Temporada" : "3",
    "Descripcion" : "desc",
    "Puntuacion" : "3",
    "Serie" : "Dark"
}
(POST) http://localhost/WEB2/tpEspecial2/serie --> Agrega una serie con los datos especificados en el body. Ej:
{
    "Nombre" : "Rick_And_Morty",
    "Descripcion" : "las aventudsada",
    "Puntuacion" : "9.9",
    "Creadores" : "justin roiland",
    "Genero" : "cyfi"
}
