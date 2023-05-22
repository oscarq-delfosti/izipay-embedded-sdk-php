# Embedded-Form-Izipay in PHP

Este es un ejemplo de trabajo de la pasarela de pago  Izipay con un formulario de pago integrado. 
Para obtener más información, consulte la documentación aquí [Documentación Izipay](https://secure.micuentaweb.pe/doc/es-PE/form-payment/standard-payment/sitemap.html).

## Requisitos previos
* PHP ^7.0

## 1.- Descargar el proyecto 
Descargar el proyecto en formato .zip ingresando [aquí](https://github.com/izipay-pe/Embedded-PaymentFormD1-PHP/archive/refs/heads/main.zip) o clonarlo con el siguiente comando:

```sh
git clone https://github.com/izipay-pe/Embedded-PaymentFormD1-PHP.git
``` 
## 2.- Obtener las credenciales
* Ingresar al [Back Office Vendedor](https://secure.micuentaweb.pe/vads-merchant/loginAction.init.a ) 
para poder obtener las crecenciales. 
* Ingresar a CONFIGURACIÓN > TIENDAS > TIENDA

![Tiendas](store.png)

Para obtener mas información de este paso consulte en el siguiente [enlace](https://secure.micuentaweb.pe/doc/es-PE/rest/V4.0/api/get_my_keys.html).

![Credenciales](bo.png)

## 3.- Configurar las credenciales:
Obtener las credenciales de su Back Office Vendedor y copiarlas en las variales correspondientes en el archivo: `keys.php` 

```sh
/* Username, password and endpoint used for server to server web-service calls */

//(En el Back Office) Copiar Usuario
KEY_USER = 'XXXXXXXX'

//(En el Back Office) Copiar Contraseña de test
KEY_PASSWORD = 'testpassword_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'

//(En el Back Office) Copiar Contraseña de Nombre del servidor API REST
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
//(En el Back Office) Copiar Clave pública de test
KEY_JS = 'XXXXXXXX:testpublickey_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'

/* SHA256 key */
//(En el Back Office) Clave HMAC-SHA-256 de test
KEY_SHA256 = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
``` 
## 4.-Configurar la respuesta del pago por IPN 
Configurar la URL de notificación al final del pago para que su servidor web esté al tanto de la información del estado de pago de la transacción. Vea la documentación para más información. Aquí [IPN](https://secure.micuentaweb.pe/doc/es-PE/form-payment/quick-start-guide/implementar-la-ipn.html) 

De forma predeterminada, no se notifica al sitio del comerciante en caso de abandono. Debe habilitar la regla de notificación correspondiente en su Back Office Vendedor.

Para configurar la notificación:

Entrar en Back Office Vendedor

a)Vaya al menú: Configuración > Reglas de notificación .

b)Haga clic derecho en URL de notificación de cancelación .

c)Seleccione Gestionar la regla .

d)En la sección Configuración general , llene el campo Dirección(es) de e-mail a notificar en caso de fallo .

e)Marque la casilla Reenvío automático en caso de fallo si desea autorizar a la plataforma a reenviar automáticamente la notificación hasta 4 veces en caso de fallo.

f)En la sección URL de notificación de la API REST , indique la URL de su página en los campos URL de destino de la IPN a la que se llamará en modo TEST y URL de destino de la IPN a la que se llamará en modo PRODUCTION .
Guarde los cambios.

g)Active la regla haciendo clic derecho en URL de notificación de cancelación y seleccionando Activar la regla .


![URL de notificacion](bo2.png)

## 5.- Ejecutar el proyecto
Abrir la aplicación instalada de Xampp y ejecutar el botón **Start** del modulo de **Apache**
Luego abrir la siguiente url en su navegador web (Chrome, Mozilla, Safari, etc) con el puerto 80: **http://localhost:80/**.


![Pasarela de pago](/images/Screenshot-4.png)
