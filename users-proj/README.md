Instalación de Proyecto Laravel Este es un breve tutorial sobre cómo instalar y configurar el proyecto Laravel de Descuentos después de clonarlo desde el repositorio de GitHub.

Requisitos previos: Asegúrate de tener instalado lo siguiente en tu sistema: PHP (versión recomendada: 7.4 o superior) Versiones Utilizadas: PHP 8.1.23 Laravel 10.48.4 Composer MySQL o cualquier otra base de datos compatible con Laravel

Pasos de instalación:

Clona el repositorio desde la terminal git clone https://github.com/rfinamor/users-roles.git

Instala las dependencias de Composer ejecutando el siguiente comando en la terminal composer install

Copia el archivo de entorno 
Crea una copia del archivo .env.example y nómbralo como .env. Este archivo contiene la configuración de tu aplicación. cp .env.example .env

Configura la base de datos 
Abre el archivo .env en un editor de texto y configura los detalles de tu base de datos:


DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=nombre_de_tu_base_de_datos DB_USERNAME=usuario_de_tu_base_de_datos DB_PASSWORD=contraseña_de_tu_base_de_datos

Cada vez que modificamos este archivo recomendamos ejecutar el siguiente comando en la terminal 
php artisan config:cache

Ejecuta las migraciones 
php artisan migrate 
Este comando creará las tablas necesarias en la base de datos.

Ejecuta los seeders (datos de ejemplo) 
php artisan db:seed 
Esto insertará datos de ejemplo en la base de datos. Puedes modificar estos seeders según tus necesidades.

Inicia el servidor de desarrollo 
php artisan serve
Ahora puedes acceder a tu aplicación Laravel en http://localhost:8000 en tu navegador web.

Usuario generado de pruebas en los seeders:
admin@example.com
password
El mismo ya posee rol administrador para poder generar, editar y eliminar usuarios

Este proyecto en una primera iteracion contempla un CRUD de Usuarios con login y autenticacion, con Roles y permisos para cada uno de ellos. En una segunda iteracion se puede agregar un CRUD de permisos y roles, donde sea autogestionable la asignacion y el manejo de estas respecto a los usuarios. Actualmente la asignacion se hace al crear y editar los usuarios.

Información adicional Migraciones y Seeders: Las migraciones te permiten definir la estructura de la base de datos de tu aplicación, mientras que los seeders te permiten poblar la base de datos con datos de prueba. Documentación de Laravel: Para obtener más información sobre cómo trabajar con Laravel, consulta la documentación oficial de Laravel. Soporte y contribución: Si encuentras algún problema o tienes sugerencias para mejorar este proyecto, no dudes en crear un issue o enviar una solicitud de extracción.

Recuerda reemplazar <URL_del_repositorio>, nombre_de_tu_base_de_datos, usuario_de_tu_base_de_datos y contraseña_de_tu_base_de_datos con los valores correspondientes para tu proyecto. Además, asegúrate de proporcionar instrucciones adicionales específicas si tu proyecto tiene requisitos especiales.
