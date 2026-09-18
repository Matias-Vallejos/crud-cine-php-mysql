# Sistema Web CRUD de Cine — PHP & MySQL

Aplicación web desarrollada en PHP y MySQL para la gestión integral de un cine. Permite administrar el catálogo de películas y la base de datos de usuarios mediante una arquitectura modular basada en acciones y componentes reutilizables, aplicando operaciones completas de CRUD (Creación, Lectura, Actualización y Borrado) y un diseño moderno e intuitivo con Bootstrap.

---

## 🏛️ Estructura del Proyecto

El código fuente está organizado por responsabilidades y componentes de interfaz:

- proyecto/
  - acciones/
    - borrar_pelicula.php
    - cambiar_rol_usuario.php
    - cerrar_sesion.php
    - formulario_contacto.php
    - ingresar_usuario.php
    - modificar_pelicula.php
    - modificar_usuario.php
    - nueva_pelicula.php
    - registrar_usuario.php
  - clases/
    - Conexion.php
    - Pelicula.php
    - Usuario.php
  - componentes/
    - banner_premium.php
    - footer.php
    - navbar.php
  - css/
    - estilos.css
  - imagenes/
    - home.png
    - pochoclos.png
    - posters/
      - 12_angry_men.jpg
  - db/
    - cinephp.sql

---

## 🚀 Arquitectura y Componentes Implementados

* **Capa de Datos y Conexión (clases/Conexion.php):** Gestión centralizada de la conexión a la base de datos MySQL mediante PDO o extensiones nativas de PHP.
* **Modelos de Dominio (clases/):** Pelicula.php encamina la lógica del catálogo y Usuario.php administra la autenticación y control de roles.
* **Controladores de Acción (acciones/):** Scripts independientes encargados de procesar peticiones de formularios para altas, bajas, modificaciones y control de sesiones.
* **Componentes Visuales y Estilos (componentes/ y css/):** Fragmentos reutilizables (navbar, footer, banner_premium) integrados con **Bootstrap** para lograr una interfaz responsiva, complementados con hojas de estilos personalizadas (`estilos.css`).

---

## 🛠️ Funcionalidades Principales

* 🎬 **Gestión de Películas:** Alta de nuevos títulos con soporte para carga de recursos gráficos (pósters), modificación de metadatos y eliminación de registros.
* 👥 **Administración de Usuarios:** Registro, inicio de sesión, modificación de perfiles y cambio de roles de usuario de forma dinámica.
* ✉️ **Interacción:** Procesamiento de formularios de contacto y maquetación fluida mediante clases utilitarias de Bootstrap.

---

## 💻 Requisitos y Configuración Local

* **Servidor Web:** Apache / Nginx (compatible con XAMPP, WampServer o Docker).
* **PHP:** Versión 7.4 o superior.
* **Base de Datos:** MySQL / MariaDB.
* **Frontend:** Bootstrap (cargado mediante CDN o archivos locales).

### Pasos de instalación:
1. Colocar la carpeta del proyecto en el directorio raíz del servidor local (ej. htdocs).
2. Importar el archivo SQL ubicado en db/cinephp.sql desde phpMyAdmin para crear la base de datos.
3. Configurar los parámetros de conexión en clases/Conexion.php.
4. Abrir el navegador e ingresar a la ruta correspondiente del proyecto.

---

> 🎓 Contexto académico: Proyecto desarrollado para la materia Programación Web / Aplicaciones Interactivas — Carrera de Analista de Sistemas.
