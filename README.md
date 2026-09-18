# Proyecto Laravel

Aplicación web desarrollada con **Laravel**, **PHP** y **MySQL**.
La base de datos se administra mediante **phpMyAdmin**.

## Requisitos

Antes de comenzar, tener instalado:

* PHP
* Composer
* Laravel
* MySQL
* phpMyAdmin
* XAMPP.
* Git

## 1. Descargar el proyecto

Clonar el repositorio:

```bash
git clone https://github.com/Geronimogomez09/proyectoPasantias.git
```

Ingresar a la carpeta:

```bash
cd proyectoPasantias
```

## 2. Instalar las dependencias

Ejecutar:

```bash
composer install
```

Si el proyecto utiliza dependencias de Node:

```bash
npm install
```

## 3. Configurar el archivo `.env`

Laravel utiliza el archivo `.env` para configurar la conexión con la base de datos.

Primero, crear una copia del archivo de ejemplo:

```bash
copy .env.example .env
```

En Linux o macOS:

```bash
cp .env.example .env
```

Luego generar la clave de la aplicación:

```bash
php artisan key:generate
```

## 4. Crear la base de datos

Abrir **phpMyAdmin** desde el navegador.

Por ejemplo, si se utiliza XAMPP:

```text
http://localhost/phpmyadmin
```

Crear una nueva base de datos.

nombre:
```text
bdproyectopasantias
```

Se recomienda utilizar el cotejamiento:

```text
utf8mb4_unicode_ci
```

## 5. Importar la base de datos

Dentro de phpMyAdmin:

1. Seleccionar la base de datos creada.
2. Entrar en la pestaña **Importar**.
3. Seleccionar el archivo `.sql` del proyecto.
4. Presionar **Importar** o **Continuar**.
5. Esperar a que finalice la importación.

La base de datos quedará lista para ser utilizada por Laravel.

## 6. Configurar la conexión en Laravel

Abrir el archivo `.env` y modificar los datos de conexión.

Ejemplo utilizando XAMPP y MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bdproyectopasantias
DB_USERNAME=root
DB_PASSWORD=
```
Los datos deben coincidir con la configuración de MySQL utilizada en el equipo.

## 7. Limpiar la configuración de Laravel

Después de modificar `.env`, ejecutar:

```bash
php artisan config:clear
```

También se puede ejecutar:

```bash
php artisan cache:clear
```

## 8. Ejecutar el proyecto

Iniciar el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

Luego abrir en el navegador:

```text
http://127.0.0.1:8000
```

## 9. Si se utilizan migraciones

Si el proyecto utiliza las migraciones de Laravel para crear la estructura de la base de datos, se puede ejecutar:

```bash
php artisan migrate:refresh --seed
```

## 10. Estructura de la base de datos

La base de datos utilizada por el proyecto se encuentra en el archivo:

```text
database/nombre_base_datos.sql
```

Este archivo permite recrear las tablas y datos necesarios para ejecutar el proyecto.

## 11. Solución de problemas

### Error de conexión con MySQL

Verificar que:

* Apache y MySQL estén iniciados en XAMPP/Laragon.
* El nombre de la base de datos coincida con `DB_DATABASE`.
* El usuario coincida con `DB_USERNAME`.
* La contraseña coincida con `DB_PASSWORD`.
* El puerto de MySQL sea correcto.

### Laravel no reconoce los cambios del `.env`

Ejecutar:

```bash
php artisan config:clear
```

### Falta la clave de aplicación

Ejecutar:

```bash
php artisan key:generate
```

### No se encuentran las dependencias

Ejecutar:

```bash
composer install
```

Y, si corresponde:

```bash
npm install
```

## Autores

Proyecto realizado por:

Geronimo Gomez, Joaquien Gomez, Ana Vera, Ivan barrera.
