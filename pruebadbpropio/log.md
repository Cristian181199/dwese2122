# LOG

Registro de cosas que voy haciendo para que cuando llegue a perderme poder mirar esto.

***29/10/21***

## Se ha creado los directorios y archivos que se necesitan

Estos directorios o archivos pueden cambiar cuando meta las cookies / sesiones.

- index.php
- register.php
- login.php
- logout.php
- emple
  - index.php
  - delete.php
  - create.php
  - update.php
- depart
  - index.php
  - delete.php
  - create.php
  - update.php
- comunes
  - auxiliar.php
  - style.css
- prueba.sql

## Home

- Se ha hecho ***session_start()*** al principio del todo.

- Se ha creado el navbar y se ha metido en una funcion.

- Se ha enlazado la hoja de estilos.

- Se ha llamado a ***'./comunes/auxiliar.php'***

## Auxiliar

- Funcion ***conectar()*** que devuelve la conexion con la base de datos.

- Funcion ***logueado()*** comprueba si el usuario esta logueado o no.

- Funcion ***mostrar_navbar()*** muestra el navbar dependiendo si esta logueado o no.

- Funcion ***filtrar_entrada(string $param, string $metodo = INPUT_POST)*** comprueba si isset una variable que recoge mediante GET o POST (por defecto recoge por POST) y ademas la trimea.

- Funcion ***mostrar_error(array $error, string $par)*** muestra los errores donde yo quiera que se muestren, para ello se le pasa la clave del array.

- Funcion ***hh($cadena)*** para evitar el XXS (Cross-site scripting) se utiliza cuando se quiere mostrar informacion que viene de fuera del programa.

## Login

- Formulario.

- Comprobaciones de si existe el usuario, que el nombre no puede ser vacio.. etc.

## Style

- Se ha alineado las cosas de navbar a la derecha con flexbox.

- Se ha dado color rojo a los errores para cuando se muestren.

***30/10/21***

## Register

- Formulario.

- Recoger datos.

- Validar datos y trimearlo.

- Pintar errores.

- FALTA REGISTRAR EL USUARIO.

## Auxiliar

- Modificado funcion ***mostrar_navbar()*** para que no muestre mensajes adicionales y el id para el estilo.

## Style

- id's diferentes para el navbar dependiendo si el usuario esta logueado o no.

***30/10/21***

## Index

- Comprobar si estaba logueado no hacia ***login=logueado()*** 

## Register

- Ya se meten los datos en la base de datos.
  
- Crea variable flash (1 turno) y redirecciona a login para iniciar sesion.

## Login

- Comprueba si existe la variable flash y si existe muestra por un simple echo.

## Index de depart

- Muestra los departamentos existentes y cuenta cuantos departamentos tiene.

- Boton para borrar departamentos.

## Borrar de depart

- Pregunta si desea borrar el departamento

- No comprueba si el departamento existe, pero deberia.

- Si en el index le das a borrar un departamento y este tiene asociado empleados, muestra un mensaje flash que tiene duracion de 1 turno.