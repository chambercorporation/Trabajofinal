***Chamber Corporation***

Claudio Guerra / Bryan Jara

Programación Orientada a Objetos + Base de Datos

Versión 1.0

Estudiantes 3er semestre Tecnico Computación e Informatica CFT Lota Arauco

Creación: 17-06-2022
Ultima edición: 30-06-2022

-----------

Es una página que esta diseñado con CSS, PHP, HTML y SweetAlert2 para ayudar a almacenar unas determinadas preferencias de un jugador en phpmyadmin.
En esta página se pueden crear usuarios, llenar un formulario y devolverle un juego que esté adaptado a sus preferencias.

# ¿Como Funciona?

CSS
Bootstrap
PHPMyAdmin
HTML
PHP
SweetAlert2
-------------------------------------------------------------
Carpeta: Clases

Archivo: conexionbd.php
Descripción: Archivo el cual nos conectará a la base de datos llamada "juegos"

Archivo: juegos.php
Descripción: Archivo donde encontraremos el constructor el cual trae los datos del formulario y una query la cual insertará los datos a
la base de datos.

Archivo: usuario.php
Descripción: Este archivo tiene la query para poder registrar el usuario a la base.
-------------------------------------------------------------
Carpeta: css

Archivo: style.css
Descripción: En nuestra hoja de estilos estarán varias ediciones según la id correspondiente, como por ejemplo la imagen de la página,
colores de las id, posiciones, tamaño y colores de texto, ente otros.
-------------------------------------------------------------
Carpeta: home

Archivo: index.php
Descripción: Es nuestra página inicial, en la cual podremos Iniciar sesión, si tenemos un usuario creado obviamente, registrar nuevos usuarios.
Además en el footer encontraremos dos links, los cuales rediccionarán a los Terminos y Condiciones + la Política de Seguridad, y también
unos datos para que así puedan contactarnos.

- En el Head ingresaremos nuestros links para darle diseños a la página, los que ingresamos son:
	- Links de fuentes para la página.
	- Link de nuestro CSS
	- Link de Bootstrap 5.0.2
	- Script de JS

- En el body, como paso principal le daremos una id, la cual será "body".

# ACOTACIÓN: Las id's que ingresemos serán para el diseño, los cuales serán explicados en el CSS.

- Creamos unos divs, los cuales contendrán lo necesario para iniciar sesión, además un botón para poder registrarnos si no lo estamos.
- Al presionarlo, nos abrirá un modal el cual está dentro de este archivo.
- Encontraremos un Carousel, el cual mostrará 3 juegos específicos (FIFA 21, STARWARS Battlefront II e It Takes Two).
- Creamos un footer, el cual tendrá id "pie" e ingresamos unos div los cuales contendrán los Términos y Contacto directo hacia nosotros.


Archivo: home.php
Descripción: Será nuestra home, es decir, una vez el usuario haya iniciado sesión, accederá a esta página.
	- En el tema del head (links) y el body (id) serán los mismos que el index.

- Usamos un include_once para añadir el archivo "seguridad.php", esto hará que el usuario no pueda acceder de manera forzada a la home sin antes
ser logeado.
- Dentro encontraremos un mensaje de bienvenida con su respectiva funcion para mostrar el nombre del usuario.
- Habrá una función, la cual consultará a nuestra base de datos si el usuario posee un juego definido o no.
	- Según el resultado de la query, habrán 2 opciones:
	1. No posee juego: Alerta con fondo rojo, la cual tendrá un texto y habilitará el acceso a un modal con el formulario.
	2. Posee juego: Alerta con fondo verde, con texto y el nombre del juego definido.
- Por último encontraremos unos scripts, los cuales contienen la libreria js de bootstrap, popper y popover
Estas 2 últimas nos serviran para nuestro popover dentro del modal.


Archivo: registrar.php
Descripción: Este archivo nos almacenará los datos pasados por el usuario en un array, después habrán unas consultas
las cuales traerán los valores solicitados en el formulario y le damos una variable a la consulta, las cuales serán sumadas
para concluir en un resultado final. El resultado final traerá el juego definido en la base de datos, hacemos una validación
la cual será que si el juego está o no ingresado en nuestra base de datos, según el resultado, mostrará una alerta con que se ha registrado el juego 
o ha habido un error (El juego no está registrado).
-------------------------------------------------------------
Carpeta: img

Dentro de esta carpeta encontraremos todas las imágenes que usaremos en nuestra página (Imágenes del Carousel, logo, fondo de la página).
-------------------------------------------------------------
Carpeta: LoginPHP

Archivo: cerrarsesion.php
Descripción: Dentro de este archivo encontraremos un session destroy, el cual deslogeará al usuario añadido de una alerta.


Archivo: registrarusuarios.php
Descripción: En este archivo validaremos el botón "registrar_persona", almacenamos los datos en un array y enviamos los datos
a la base de datos con nuestro "insertarusuario", seguido mostramos una alerta de que se ha registrado correctamente.

Archivo: seguridad.php
Descripción: Validamos si el usuario está logeado o no, de ser contrario lo enviará al index, asi evitaremos un acceso forzado a la home.


Archivo: validar.php
Descripción: En este archivo validaremos si los datos ingresados al inciar sesión son válidos con los de nuestra base de datos, es decir
si los datos son correctos con el usuario registrado, podrá acceder a la home, de no ser así, mostrará una alerta y se mantendrá en el index.
