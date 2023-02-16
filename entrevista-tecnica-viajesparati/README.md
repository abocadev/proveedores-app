# Bienvenidos al proyecto de ALBERT BOCANEGRA

Primero de todo, voy a presentarme un poco.

Mi nombre es Albert Bocanegra Barreiro, tengo 19 años y soy de Roda de Bara.
Estoy estudiando un grado superior de Desarrollo de Aplicaciones Multiplataforma, actualmente estoy en el 2n curso.
A parte, de estudiar el grado superior, estoy estudiando por mi cuenta un curso para convertirme en un futuro desarrollador de PHP, trabajando con PHP, Laravel y Symfony. Este curso lo estoy estudiando en Open-Bootcamp.

## EL PROYECTO

Este proyecto trabaja de desarrollar una aplicación con el framework de Symfony.
Lo que se pedía en este proyecto, es que el departamento de contabilidad, necesita poder introducir en su sistema los datos de los proveedores con los que trabajamos habitualmente, asi que han solicitado una aplicación que les permita hacerlo de forma rápida.

Los proveedores tendrán los siguientes datos:

* Nombre
* Correo electrónico
* Telefóno de contacto
* Tipo de proveedor (hotel, pista o complemento).
* Si están activos o no.

Además he añadido un par de datos más, que es cuando se creo el proveedor y la última vez que se actualizo el proveedor.

En esta aplicación, tienes diferentes funcionaliades:

  - Visualizar listado completo de proveedores
  - Crear un nuevo proveedor
  - Editar un proveedor
  - Eliminar un proveedor

### REQUISITOS

  * **Desarrollar la aplicación utilizando Symfony 4**: Cuando creaba el proyecto con composer me indicaba que no existía ninguna versión de Symfony 4 y entonces no encontre ninguna forma. Entonces, decidi desarrollar este proyecto con la última versión de Symfony.
    <br />
  * **No utilizar el comando de symfony para generar un CRUD automáticamente:** Como antes indicaba, intentaba crear el proyecto con Symfony 4 utilizando Composer, pero no me funcionaba ya que no encontraba la versión. Y entonces cree el proyecto con el siguiente comando:

    > composer create-project symfony/website-skeleton 

  * **Utilizar Twig para las vistas**

  * **Crear una base de datos con MySQL**: Para utilizar la base de datos existen dos opciones, ejecutar los siguientes comandos o ejecutar el script SQL que se llama "database.sql".

    > php bin/console doctrine:database:drop --force
    > php bin/console doctrine:database:create
    > php bin/console doctrine:migrations:diff
    > php bin/console doctrine:migrations:migrate
    > php bin/console doctrine:fixtures:load

    * **Crear un repositorio accesible con Git:** A continuación tienes el enlace al repositorio: [Repositorio de GitHub](https://github.com/abocadev/proveedores-app).


### HERRAMIENTAS UTILIZADAS:

  * **Laragon:** Una de las herramientas mas importantes para poder desarrollar esta aplicación, ya que este programa es un ***servidor web local***.
  * **PHPStorm:** Entorno de desarrollo.
  * **MySQL:** BBDD relacional, utilizando HeidiSQL que es un programa con interfaz gráfica que se utilizaba para administrar las bases de datos MySQL.
  * **PHP v8.1.10**
  * **Symfony 6.1.12**
  * **Bootstrap**: Libreria de CSS utlizada para desarrollar la interfaz gráfica.

## INICIAR EL PROYECTO:

Para poder iniciar el proyecto, lo que tenemos que hacer ejecutar el siguiente comando: 

> php -S 127.0.0.1:8080 -t public/

Para poder visualizar este proyecto, lo que tenemos que hacer es poner arriba del todo la URL "http://127.0.0.1:8080/".