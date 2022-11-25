# AICOSoft

Dashboard creado con el stack WAMP.

- Windows
- Apache
- MySQL
- PHP

# Changelog

2022-11-25 - Elías García y Christian Fajardo

# Carpetas del proyecto

## Config

### config.php

### paypal.php

## Controllers

Contiene los diferentes controladores que utiliza el sitio web. 

### count-task.php

Realiza las consultas necesarias para contar las tareas de cada proyecto, discriminarlas por "Concluída" o "En proceso" y poder generar la información que permite el display de las barras de progreso de dashboard.php

```php
Linea 5:

$getTotal = "SELECT COUNT(*) total FROM tasks 
    WHERE id_user = '$user_id' AND id_project = '$id_project'";

Linea 14:

$getTaskDone = "SELECT COUNT(*) total FROM tasks 
    WHERE done = 1 AND id_project = '$id_project'";

Linea 22:

$getTaskUndone = "SELECT COUNT(*) total FROM tasks 
    WHERE done = 0 AND id_project = '$id_project'";
```

### create-file.php

Permite realizar el registro de nuevos archivos en la base de datos por medio de una consulta.

```php
Linea 15:

$create_file = "INSERT INTO files (name, category, upload_date, file, type, id_user) 
VALUES ('$file_name', '$category', '$file_date', '$BLOB_file', '$type', '$user_id')";
    $file_created = mysqli_query($conexion, $create_file);
```

### create-project-on.php

Permite realizar el registro de un nuevo proyecto para un usuario específico en la base de datos por medio de una consulta, específicamente desde mis-proyectos.php

```php
Linea 23:

$create_project = "INSERT INTO projects (project_name, description, url, id_user) 
VALUES ('$project_name', '$description', '$url', '$user_id')";
```

### create-project.php

Permite realizar el registro de un nuevo proyecto para un usuario específico en la base de datos por medio de una consulta, específicamente desde crear-proyecto.php

```php
Linea 23:

$create_project = "INSERT INTO projects (project_name, description, url, id_user) 
VALUES ('$project_name', '$description', '$url', '$user_id')";
```
### create-task.php

Permite realizar el registro de una nueva tarea para un usuario específico en la base de datos por medio de una consulta.

```php
Linea 8:

$create_task = "INSERT INTO tasks (task_name, date_todo, done, id_project, id_user) 
VALUES ('$task_name', '$date_todo', '$done', '$id_project', '$user_id')";
```

### delete-file.php

Permite eliminar el registro de un archivo en la base de datos por medio de una consulta.

```php
Linea 8:

$delete_file = "DELETE FROM files WHERE id_file = '$id_file'";
```

### delete-project.php

Permite eliminar el registro de un proyecto en la base de datos por medio de una consulta, siempre y cuando este no tenga tareas registradas.

```php
Linea 13:

$query = "DELETE FROM projects WHERE id_project = '$id_project' AND id_user = '$user_id'";
```

### delete-task.php

Permite eliminar el registro de una tarea en un proyecto específico en la base de datos por medio de una consulta.

```php
Linea 8:

$delete_task = ("DELETE FROM tasks WHERE id_task = '$id_task'");
```

### login.php

Realiza la autenticación de un usuario cuando intenta ingresar con un correo y contraseña, comparándolos con los registros en la base de datos por medio de una consulta.

```php
Linea 10:

$query = "SELECT * FROM users WHERE email = '$email'";
```

### logout.php

Cierra la sesión del dashboard eliminando los datos de sesión y redirige al usuario a login.php

```php
<?php 
    session_start();
    session_destroy();

    header("Location: ../views/login.php");
?>
```

### paypalCheckout.php

### preview-file.php

Permite visualizar una interfaz que muestra una vista previa de el documento seleccionado siempre que este tenga una extensión compatible.
El documento es leído por medio de una consulta a la base de datos.

```php
Linea 6:

$get_files = "SELECT * FROM files WHERE id_file = '$id'";
```

### read-file.php

Permite identificar el usuario que está haciendo la petición de entrar a la sección de "Archivos" en el dashboard y solo permita visualizar los archivos que pertenezcan a este usuario por medio de una consulta a la base de datos.

```php
Linea 3:

$get_files = "SELECT * FROM files WHERE id_user = '$user_id'";
```

### read-project.php

Permite identificar el usuario que está haciendo la petición de entrar a la sección de "Mis proyectos" en el dashboard y solo permita visualizar los proyectos que pertenezcan a este usuario por medio de una consulta a la base de datos.

```php
Linea 3:

$query = "SELECT * FROM projects WHERE id_user = $user_id";
```

### read-task.php

Permite identificar el proyecto al que pertenece cada tarea y solo permita visualizar las tareas que pertenecen al proyecto que se está visualizando y que todo lo anterior pertenezca a el usuario que está haciendo la petición por medio de una consulta a la base de datos.

```php
Linea 4:

$getProject = "SELECT * FROM projects WHERE url = '$url' AND id_user = '$user_id'";

Linea 14:

$getTasks = "SELECT * FROM tasks WHERE id_project = '$id_project'";
```

### register.php

Permite registrar a nuevos usuarios que proporcionen los datos requeridos en el formulario, insertando los datos en la base de datos por medio de una consulta.

```php
Linea 26:

$newUser = "INSERT INTO users (username, email, password, token, active, free_period, id_rol) VALUES ('$username', '$email', '$hashpass', '$token', '$activo', '$free_period', '$id_rol')";
```

### set-premium.php

Permite asignar el periodo de prueba a los usuarios que se registran por primera vez.

### subscribed.php

### unsuscribed.php

### update-file.php

Permite actualizar el registro de el archivo seleccionado, permitiendo cambiar el nombre de este o el archivo mismo y por ende la categoría a la que pertenece y su fecha de subida, al dar click en el botón actualizar el registro se modificará en la base de datos por medio de diferentes consultas.

```php
Linea 12:

$getfile = "SELECT * FROM files WHERE id_file = '$id_file'";
$result = mysqli_query($conexion, $getfile);

Linea 21:

$update_file = "UPDATE files SET name = '$file_name' WHERE id_file = '$id_file'";

Linea 36:

$update_file = "UPDATE files SET category = '$category', upload_date = '$file_date', file = '$BLOB_file', type = '$type' WHERE id_file = '$id_file'";

Linea 44:

$update_file = "UPDATE files SET name = '$file_name', category = '$category', upload_date = '$file_date', file = '$BLOB_file', type = '$type' WHERE id_file = '$id_file'";
```

### update.project.php

Permite actualizar el registro de el proyecto seleccionado, permitiendo cambiar el nombre de este y su descripción, al dar click en el botón actualizar el registro se modificará en la base de datos por medio de una consulta.

```php
Linea 25:

$updateProject = "UPDATE projects SET project_name = '$project_name', description = '$description' WHERE url = '$url'";
```

### update.task.php

Permite actualizar el registro de la tarea seleccionada, permitiendo cambiar el nombre, la fecha de vencimiento y su estatus de progreso, al dar click en el botón actualizar el registro se modificará en la base de datos por medio de una consulta.

```php
Linea 11:

$update = ("UPDATE tasks SET task_name = '$task_name', date_todo = '$date_todo', done = '$done' WHERE id_task = '$id_task'");
```

# Public

Contiene las carpetas de css, img y js.

## CSS

Contiene las hojas de estilos de el login, registro y dashboard.

El archivo "main.css" está dividido en secciones comprensibles por comentarios que indican a qué seccion pertenecen los estilos que contiene. 

## IMG

Contiene todas las imagenes y logotipos utilizados login, registro y dashboard.

## JS

Contiene todos los archivos de JavaScript que permiten funcionar funcionalidades específicas del dashboard.

### bootstrap-modal.js

Permite el uso de la ventana modal de la librería de bootstrap.

### closeAlerts.js

Le asigna la función de cerrar las alertas de colores que indican la resolución de una acción hecha a los iconos de "tache" que hay en estas.

```php
Linea 4:

closeAlert.onclick = () => {
    alert.style.display = "none";
};
```

### menuToggle.js

Le asigna la función de abrir y cerrar el menú al ícono de menú del dashboard, igualmente contiene algunas animaciones para que los elementos dentro y fuera del menú se adapten al tamaño de este.
```php
Linea 13:

toggle.onclick = function() {
    ...
}
```

### modal.js

Permite que el modal de confirmación pueda ser utilizado en ciertas secciones del dashboard.

```php
Linea 6:

btnEliminar.onclick = () => {
    modal.style.display = "block";
};
```

### progressBar.js

Permite establecer las gráficas de progreso de cada proyecto indivisulamente.
Esto no está totalmente implementado, pero se dejó en el proyecto para su futuro uso.

### projects.js

Realiza una validación asegurandose de que al registrar un nuevo proyecto los campos hayan sido llenados correctamente, de no ser así se manda un mensaje de alerta.

```php
Linea 1:

const validatedProjects = () => {
    ...
}
```
### selectedFile.js

Permite reemplazar el mensaje "Seleccione un archivo" del botón con el nombre del archivo seleccionado.

```php
Linea 16:

if( fileName )
	label.querySelector( 'span' ).innerHTML = fileName;
```

# views

En esta carpeta se encuentran todos los archivos con código HTML que crean la estructura del sitio.

### active.php

Valida si el correo del usuario está verificado.

### archivos.php

Permite visualizar la sección de "Archivos" del dashboard, dando acceso al formulario para registrar y editar archivos y la tabla que lista los archivos registrados.

### crear-proyecto.php

Permite visualizar la sección de "Crear proyecto" del dashboard, dando acceso al formulario para registrar un nuevo proyecto

### dashboard.php

Permite visualizar la sección de "AICOSoft" del dashboard, dando acceso a información como: tutoriales para el uso del dashboard, mensaje de bienvenida y el progreso de los proyectos con tareas registradas.

### editar-proyecto.php

Permite visualizar la sección de "Editar proyecto" del dashboard, dando acceso al formulario para editar el registro del proyecto seleccionado.

### login.php

Permite visualizar la pantalla de "Login" del dashboard, dando acceso al formulario para ingresar los datos necesarios para acceder al dashboard, tambien cuenta con un enlace para registrarse de ser necesario.

### mis-proyectos.php

Permite visualizar la sección de "Mis proyectos" del dashboard, dando acceso a la interfaz que permite agregar un nuevo proyecto, ingresar a los diferentes proyectos o editar un proyecto en específico.

### orderDetails.php

### perfil.php

Permite visualizar la sección de "Perfil" del dashboard, dando acceso a la interfaz que visualiza el nombre, email y tipo de usuario del usuario que ingresó al dashboard.

### proyecto.php

Permite visualizar la sección de "Proyecto" del dashboard, dando acceso a los datos específicos del proyecto sleccionado en la sección "mis proyectos", da acceso al formulario para registrar nuevas tareas, edición de tareas y el listado de las mismas.

### registro.php

Permite visualizar la sección de "Registro" del dashboard, dando acceso al formulario para crear una nueva cuenta que tendrá acceso al resto de las secciones del dashboard de acuerdo a los roles que se le asignen, ya sea de manera automática o manual.

### suscripcion.php

### usuarios.php

Permite visualizar la sección de "Usuarios" del dashboard, dando acceso únicamente a usuarios con el rol "Administrador" a una tabla con la información de todos los usuarios registrados.

## includes

Contiene secciones de código HTML que se reutilizan en diferentes secciones del dashboard.

### footer.php

Contiene los enlaces de todos los archivos de JavaScript utilizados en el dashboard y las secciones finales del body y el html principales.

### header.php

Contiene el código de la barra de navegación del dashboard para que aparezca en todas las páginas del mismo sin tener que repetir el código en cada una de ellas.

### menu-movil.php

Contiene el código de la barra de navegación del dashboard para la versión de teléfono, el cual permite que aparezca en todas las páginas del mismo sin tener que repetir el código en cada una de ellas.

### modal-editar-archivo.php

Contiene la ventana modal que permite editar los datos del registro de un archivo seleccionado previamente.

### modal-editar-tarea.php

Contiene la ventana modal que permite editar los datos del registro de una tarea seleccionada previamente.

### modal-eliminar-archivo.php

Contiene la ventana modal que permite eliminar el registro de un archivo seleccionado previamente.

### modal-eliminar-tarea.php

Contiene la ventana modal que permite eliminar el registro de una tarea seleccionada previamente.

# Base de datos

La base de datos "aico" contiene todas las tablas que almacenan los datos necesarios para el optimo funcionamiento del dashboard, tales como registros de usuarios, proyectos y archivos, etc.

## Tablas

### activo

Cuenta con dos campos con dos valores posibles cada uno que se correlacionan respectivamente:

- id_activo (1 y 2)
- estado (no verificado, verificado)

Estos valores definen si un usuario ya verificó su cuenta de correo para su registro a la plataforma.

### files

Esta tabla almacena toda la información de los archivos registrados.

- Se le asigna una ID de archivo
- Nombre
- Categoria (Extensión o tipo de archivo a la que pertenece)
- Fecha de registro 
- El tipo de archivo que se compone de la categoría y la extensión 
- La ID del usuario al que pertenece

### projects

Esta tabla almacena toda la información de los proyectos registrados.

- Se le asigna una ID de proyecto
- Nombre del proyecto
- Descripción 
- Fecha de creación
- URL
- La ID del usuario al que pertenece

### roles

Cuenta con dos campos con tres valores posibles cada uno que se correlacionan respectivamente:

- id (1, 2 y 3)
- rol (admin, usuario de pago y usuario gratis)

Estos valores definen si un usuario es capáz de acceder al diferente contenido del dashboard.

### tasks

Esta tabla almacena toda la información de las tareas pertenecientes a los proyectos registrados.

- Se le asigna una ID de tarea
- Nombre de la tarea
- Fecha de vencimiento de la tarea
- Un valor de (1 (tarea realizada) o 0 (Tarea en proceso)) 
- La ID del proyecto al que pertenece
- La ID del usuario al que pertenece

### users

Esta tabla almacena toda la información de los usuarios registrados.

- Se le asigna una ID de usuario
- Nombre 
- Correo electrónico
- Contraseña  
- Token de verificación
- Estado activo 
- Fecha de registro
- Periodo de prueba (0 = no esta en prueba, 1 = si está en prueba)
- Ultima fecha de pago
- Rol