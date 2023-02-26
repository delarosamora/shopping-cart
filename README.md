# Carrito de productos

![Carrito de compras](https://raw.githubusercontent.com/delarosamora/shopping-cart/master/public/img/shopping-cart.jpg "Carrito de productos")

Con esta aplicación podrás añadir productos a tu carrito online y tramitar la compra a través de una página de checkout.

## Tecnologías utilizadas

<figure>
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
         alt="Laravel" width="300" height="100">
    <figcaption>Laravel 8.0</figcaption>
</figure>

<figure>
    <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png"
         alt="Boostrap 5.0" width="200" height="150">
    <figcaption>Boostrap 5.0</figcaption>
</figure>

<figure>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/2300px-React-icon.svg.png"
         alt="React JS"  width="300">
    <figcaption>React JS</figcaption>
</figure>

## Instalación

### 1. Clonar el repositorio

`git glone https://github.com/delarosamora/shopping-cart.git`

### 2. Ejecutar las migraciones

En tu motor de base de datos favorito (MySQL, PostreSQL, etc) debes crear una base de datos vacía, y si es necesario, indicar los datos de acceso en el fichero .env:
- Equipo de la base de datos
- Nombre de la base de datos
- Usuario de la base de datos
- Contraseña de la base de datos

En mi caso tengo las siguientes

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopping_cart
DB_USERNAME=root
DB_PASSWORD=
```

Una vez se indiquen los datos de acceso, se debe ejecutar las migraciones para crear las tablas:

`php artisan migrate`

### 3. Rellenar datos en las tablas

Los datos que se rellenan serán estados de carrito y productos. Para ello, se debe ejecutar el siguiente comando:

`php artisan db:seed`

Este comando lee los siguientes ficheros
- database\seeders\CartStatusSeeder.php
- database\seeders\ProductSeeder.php

Si se desean crear más estados o más productos, simplemente se pueden modificar estos archivos.

### 4. Configurar cliente de correo

Esta aplicación envía correos a los clientes cuando los carritos cambian de estado. Para ello, en el fichero .env debes rellenar los datos de tu proveedor de correo:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario
MAIL_PASSWORD=tu_contraseña
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tu_email
MAIL_FROM_NAME="${APP_NAME}"
```