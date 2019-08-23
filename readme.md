
<p  align="center"><img  src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Running
Para correr el proyecto es necesario tener Laravel instalado en el equipo, para esto siga los pasos indicados en la **[documentación](https://laravel.com/docs/5.8)**. También se requiere tener un servidor local donde se puedan correr bases de datos (MAMP, WAMP, XAMPP). Luego de instalado siga lo siguientes pasos:

 1. Cree una base de datos (se recomienda en MySQL o PostgreSQL).
 2. Edite el archivo .env de acuerdo a los credenciales de su base de datos y del nombre que le dio a esta.
 3. Ejecute ``composer install`` para instalar las dependencias del proyecto.
 4. Ejecute ``php artisan migrate --seed`` para crear las tablas en la base de datos y llenarlas con algunos datos de prueba.
 5. Finalmente, ejecute ``php artisan serve`` para levantar un servidor local en el que el proyecto correrá.