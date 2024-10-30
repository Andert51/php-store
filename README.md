# FullStack PHP Web App 
==========================
### Overview

Esta es una aplicacion web full-stack con php que simula una  plataforma de comercio electronico, la aplicacion incluye una interfaz de usuario, una base de datos con mysql  y lógica de backend para manejar productos, pedidos y usuarios, ademas incluye un frontend  para que los usuarios interactuen con la aplicacion.

Programacion : PHP, HTML, CSS, JavaScript, MySQL
**Se hizo uso de programacion por capas para el backend**
>src para el backend
>public para el frontend

## Programacion por capas (Backend)

* Config sirve para la configuracion de la aplicacion, como conexiones a  bases de datos, rutas de la aplicacion, etc.
* Controllers sirve  para la logica de negocio, donde se manejan las operaciones de negocio de la aplicacion.
* Middleware sirve  para la seguridad de la aplicacion, como autenticacion y autorizacion, en general son intermediarios entre la peticion del frontend y la respuesta del backend.
* Models sirve para  la comunicacion con la base de datos, donde se definen las estructuras de los datos y  las operaciones que se pueden realizar sobre ellos, es la similitud con la base de datos y el codigo.
* interfaces sirve para  definir la forma en que se deben comportar los objetos de la aplicacion, es decir, la forma en que deben interactuar entre si, es la definicion de todas las  operaciones que se pueden realizar sobre un objeto, funciones,  metodos, etc.
* Repositories sirve  para  la comunicacion con la base de datos, donde se definen las operaciones que se usaran.
* Routes sirve  para  definir las rutas de la aplicacion, es decir, las peticiones que  se pueden realizar a la aplicacion.
* Services sirve para la logica de negocio, donde se manejan las operaciones de negocio de la aplicacion.












