ENDPOINTS:
(GET) http://localhost/WEB2/tpEspecial2/api/series --> Muestra todas las series en la db |CONSIGNA 2|
(GET) http://localhost/WEB2/tpEspecial2/api/episodios --> Muestra todos los episodios en la db

(GET) http://localhost/WEB2/tpEspecial2/api/series?sortBy=ASC -->  Muestra las series ordenadas por nombre(En este caso ASC, puede ser DESC)  |CONSIGNA 3|

(GET) http://localhost/WEB2/tpEspecial2/api/serie/:ID --> Muestra la serie con ese nombre(ID) |CONSIGNA 4|
(GET) http://localhost/WEB2/tpEspecial2/api/episodios/:ID --> Muestra los episodios de la serie con ese nombre(ID)

(GET) http://localhost/WEB2/tpEspecial2/api/series?select=Descripcion --> Trae todas las series con el campo especificado (En este caso Descripcion) |CONSIGNA 8|
(GET) http://localhost/WEB2/tpEspecial2/api/episodios?select=Titulo --> Trae todos los episodios con el campo especificado (En este caso Titulo)

(GET) http://localhost/WEB2/tpEspecial2/api/series?select=Descripcion&sortBy=ASC --> Trae todas las series ordenadas (En este caso ASC) por un campo de la tabla (En este caso Descripcion) |CONSIGNA 9|

(GET) http://localhost/WEB2/tpEspecial2/api/episodios?startAt=2&endAt=5 --> Pagina los episodios entre 2 y 5|CONSIGNA 7|

(DELETE) http://localhost/WEB2/tpEspecial2/api/serie/:ID --> Elimina la serie con ese nombre (ID)
(DELETE) http://localhost/WEB2/tpEspecial2/api/episodio/:ID --> Elimina el episodio con ese nombre(ID)

(POST) http://localhost/WEB2/tpEspecial2/api/episodio --> Agrega un episodio con los datos especificados en el body. Ej: |CONSIGNA 5|
{
    "Titulo" : "titulaso",
    "Duracion" : "3",
    "Temporada" : "3",
    "Descripcion" : "desc",
    "Puntuacion" : "3",
    "Serie" : "Dark"
}
(POST) http://localhost/WEB2/tpEspecial2/api/serie --> Agrega una serie con los datos especificados en el body. Ej:
{
    "Nombre" : "Rick_And_Morty",
    "Descripcion" : "las aventudsada",
    "Puntuacion" : "9.9",
    "Creadores" : "justin roiland",
    "Genero" : "cyfi"
}

(GET) http://localhost/WEB2/tpEspecial2/api/users/token --> Poniendo el usuario y contraseña correctos devuelve un token |CONSIGNA 10|
