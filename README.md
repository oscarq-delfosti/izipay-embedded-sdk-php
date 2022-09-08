# Embedded-and-pop-in-Form-Izipay in PHP

Este es un ejemplo practico con la pasarela de pago de Izipay utilizando el formulario de pago incrustado y pop-in.  
Visite la documentación para más información aquí: [Documentación Izipay](https://secure.micuentaweb.pe/doc/es-PE/form-payment/standard-payment/sitemap.html)


## 1.- Instalar el programa XAMPP que incluye PHP 7.0 en adelante.

```sh
Install XAMPP https://www.apachefriends.org/
``` 

## 2.- Descargar 
Descargar el proyecto .zip ingresado [aquí](https://github.com/izipay-pe/php-Delfosti/archive/refs/heads/main.zip) ó clonarlo con git

```sh
git clone https://github.com/izipay-pe/php-Delfosti.git
``` 

## 3.- Mover el proyecto y descomprimirlo en la carpeta htdocs 
Descomprir el proyecto en la carpeta htdocs en la ruta de instalación de Xampp: `C:\xampp\htdocs`

![proyecto en xampp](/images/Screenshot-1.png)

## 4- Abrir la aplicación XAMPP Control Panel 
 Abrir la aplicación instalada de Xampp y ejecutar el botón **Start** del modulo de **Apache**, quedando de la siguiente manera:

![Xampp control panel](/images/Screenshot-2.png)

## 5.- Configurar el identificador de su tienda y la clave:
Obtener las credenciales de su Back Office Vendedor y copiarlas en las variales correspondientes en el archivo: `keys.php` 

```sh
/* Username, password and endpoint used for server to server web-service calls */

//(En el Back Office) Copiar Usuario
Lyra\Client::setDefaultUsername("XXXXXXXX");

//(En el Back Office) Copiar Contraseña de test
Lyra\Client::setDefaultPassword("testpassword_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

//(En el Back Office) Copiar Contraseña de Nombre del servidor API REST
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
//(En el Back Office) Copiar Clave pública de test
Lyra\Client::setDefaultPublicKey("XXXXXXXX:testpublickey_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

/* SHA256 key */
//(En el Back Office) Clave HMAC-SHA-256 de test
Lyra\Client::setDefaultSHA256Key("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
``` 

## 6.- Abrir el navegador web
Abrir la siguiente url en su navegador web (Chrome, Mozilla, Safari, etc) con el puerto 80 que abrió xampp : **http://localhost:80/php-delfosti/** y seleccione pagoIncrustado.php o pagoPop-in.php.

![Pasarela de pago](/images/Screenshot-3.png)

## 7.- Soporteecommerce@izipay.pe
Para más información comunicarse al correo del equipo de soporte de Izipay.  
**Asunto**: Mensaje + RUC + codigo de comercio / Razon Social.