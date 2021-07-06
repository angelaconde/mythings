# My Things

![Preview](https://github.com/angelaconde/mythings/blob/main/preview.jpg)

------------
## Documentación:
### Puedes descargar el documento del proyecto en PDF aquí: [Documento](https://github.com/angelaconde/mythings/tree/main/docs/Proyecto.pdf).
### También puedes descargar la presentación aquí: [Presentación](https://github.com/angelaconde/mythings/tree/main/docs/Presentacion.pdf).
### Tienes la documentación en la ruta [docs/html/index.html](https://github.com/angelaconde/mythings/tree/main/docs/html), tendrás que descargar el proyecto para poder visualizarla correctamente.
------------
## Cómo instalar la aplicación de forma local:
### 1. Descarga o clona el repositorio
`git clone https://github.com/angelaconde/mythings.git`

### 2. Crea en la raiz del proyecto un archivo .env a partir del archivo .env.example:
`cp .env.example .env`

### 3. Cambia los valores del archivo .env para adaptarlos a tu entorno:
1. Genera y añade la clave de aplicación:

    `php artisan key:generate`

    APP_KEY:
2. Añade los valores para la paginación:

	PAGINATION_GAMES=8

	PAGINATION_WISHLIST=12

3. Crea una aplicación en Google e introduce los datos necesarios para la autenticación OAuth:

	GOOGLE_CLIENT_ID=

	GOOGLE_CLIENT_SECRET=

	GOOGLE_REDIRECT=

4. Crea una cuenta de Twitch, activa la autenticación en dos pasos y registra una nueva aplicación.

    Con los datos de la aplicación de Twitch realiza una petición POST a https://id.twitch.tv/oauth2/token con los siguientes parámetros:

	client_id=

	client_secret=

	grant_type=client_credentials

    La petición POST te devolverá un objeto JSON con tu token para la API de IGDB.

    Introduce en el fichero .env los datos para la API:

	IGDB_CLIENT_ID= (ID de cliente de Twitch)

	IGDB_TOKEN= (Token de la API)

### 4. Ejecuta la migración de las tablas:
`php artisan migrate`

### 5. Arranca el proyecto:
`php artisan serve`