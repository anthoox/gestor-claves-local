# Gestor de Claves Local (Local, MVC PHP + MySQL)

## Descripción

Este proyecto es un gestor de contraseñas simple y seguro desarrollado en PHP utilizando el patrón arquitectónico **MVC**.  
Funciona en local con una base de datos MySQL y emplea cifrado AES para proteger las contraseñas almacenadas.  
Cuenta con un sistema de contraseña maestra para controlar el acceso.

---

## Características

- Gestión completa de contraseñas: crear, leer, editar y eliminar.
- Almacenamiento seguro: las contraseñas se cifran con AES-256 antes de guardarse.
- Sistema de autenticación con contraseña maestra (almacenada como hash).
- Interfaz sencilla y limpia dividida en vistas organizadas por MVC.
- Estructura organizada en carpetas siguiendo buenas prácticas MVC.
- Funciona en entorno local (servidor PHP + MySQL).
- Código base preparado para futuras mejoras (como exportar datos, generación de contraseñas, etc.).

---

## Requisitos

- PHP 7.2 o superior con extensión OpenSSL habilitada.
- Servidor web local (XAMPP, WAMP, MAMP o similar).
- MySQL o MariaDB.
- Navegador moderno.

---

## Instalación

1. Clonar o descargar el repositorio en tu carpeta de servidor local (por ejemplo, `htdocs` en XAMPP).  
2. Crear la base de datos MySQL y tabla usando el script SQL proporcionado (`database.sql`).  
3. Configurar la conexión a la base de datos en `config/config.php`.  
4. Definir la contraseña maestra (hash) en la configuración o mediante migración.  
5. Abrir en el navegador `http://localhost/public/index.php`.  


---

## Uso

- Ingresar la contraseña maestra para acceder al sistema.  
- Gestionar tus contraseñas en el dashboard: agregar, editar, eliminar.  
- Las contraseñas se almacenan cifradas y se descifran solo tras autenticación.  

---

## Seguridad

- Contraseña maestra almacenada como hash seguro (bcrypt o similar).  
- Contraseñas cifradas con AES-256-CBC usando OpenSSL.  
- Toda la lógica y modelos están fuera de la carpeta pública.  
- Sesiones controladas para proteger el acceso.  

---

## Próximas mejoras (ideas)

- Añadir generador de contraseñas seguras.  
- Implementar exportación e importación de datos cifrados.  
- Temporizador para cierre automático de sesión por inactividad.  
- Versión online con cifrado de lado cliente.  

---

## Contribuciones

Este proyecto es para uso personal y aprendizaje, pero si quieres aportar mejoras o reportar errores, ¡bienvenido!


