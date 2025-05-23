# 🎓 Proyecto Evaluación Docente

Este repositorio contiene la implementación completa de una **aplicación web** para la evaluación del desempeño de los docentes en una institución educativa. El sistema está desarrollado con **Laravel** y **Blade** como motor de plantillas, utilizando **MySQL** como base de datos.

---

## 📑 Tabla de Contenidos

1. [📋 Descripción General](#descripción-general)
2. [⭐ Características Principales](#características-principales)
3. [🏗️ Estructura del Proyecto](#estructura-del-proyecto)
4. [📌 Requisitos](#requisitos)
5. [🚀 Instalación y Ejecución](#instalación-y-ejecución)
6. [📱 Uso de la Aplicación](#uso-de-la-aplicación)
7. [⚙️ Metodología de Desarrollo](#metodología-de-desarrollo)
8. [👨‍💻 Autores](#autores)
9. [📜 Licencia](#licencia)
10. [📬 Contacto](#contacto)

---

## 📋 Descripción General

El **Proyecto Evaluación Docente** optimiza el proceso de evaluación de los docentes a través de una plataforma que:

- 🔍 Permite a los **estudiantes** evaluar de forma anónima.
- 👨‍💼 Brinda a los **coordinadores/decanos** la posibilidad de ingresar evaluaciones administrativas.
- 🧑‍🏫 Facilita a los **docentes** la autoevaluación de su desempeño.
- 📊 Genera **reportes**, **estadísticas** y **actas de compromiso** para el seguimiento y mejora continua.
- ⚠️ Emite **alertas** y **notificaciones** ante bajo rendimiento.
- ⚖️ Gestiona **procesos de sanción o retiro** según sea necesario.

### 📚 Documentación detallada

- **Accede** a la documentación completa mediante el pdf **(⚠️ DESACTUALIZADO ⚠️)**:  
  [Proyecto_de_Evaluación_Docente.pdf](Documentacion/Proyecto_de_Evaluación_Docente.pdf)

- **Accede** a la plantilla de Desarrollo De Apliaciones web del proyecto:
  [Definición_del_Proyecto___Desarrollo_de_aplicaciones_web](Documentacion/Definición_del_Proyecto___Desarrollo_de_aplicaciones_web.pdf)

- **Accede** a la plantilla de Bases De Datos del proyecto:  
  [Plantilla_de_Definición_del_Proyecto\_\_\_Base_de_Datos_II.pdf](Documentacion/Plantilla_de_Definición_del_Proyecto___Base_de_Datos_II.pdf)

---

## ⭐ Características Principales

- 🔐 **Autenticación de usuarios** con múltiples roles (administrador, decano/coordinador, docente).
- 📊 **Dashboard personalizado** según el rol del usuario.
- 👨‍💼 **Panel de Administrador** con gestión de períodos de evaluación y roles.
- 🏛️ **Panel de Decano/Coordinador** con:
  - 📝 Generación y gestión de actas de compromiso
  - ⚠️ Alertas de bajo desempeño docente
  - 📈 Seguimiento a planes de mejora
  - ⚖️ Procesos de sanción y/o retiro
  - 📊 Estadísticas y reportes por facultad/programa
- 🧑‍🏫 **Panel de Docente** con:
  - 📋 Visualización de resultados de evaluación
  - 📊 Acceso a estadísticas personales
  - ⚙️ Configuración de datos personales
- ✅ **Sistema de evaluación** completo con múltiples dimensiones y criterios.
- 📈 **Reportes y gráficos estadísticos** en tiempo real.

---

## 🏗️ Estructura del Proyecto

El proyecto utiliza la estructura estándar de Laravel, con algunas particularidades:

```plaintext
Frontend_backend_laravel_blade_evaluacion_docente/
├─ app/                      # Lógica principal de la aplicación
│  ├─ Console/               # Comandos Artisan personalizados
│  ├─ Exceptions/            # Manejadores de excepciones
│  ├─ Http/                  # Controladores, Middleware, Requests
│  ├─ Models/                # Modelos Eloquent (ActaCompromiso, ProcesoSancion, etc.)
│  ├─ Providers/             # Service Providers
│  ├─ Services/              # Servicios adicionales
│  └─ View/                  # Componentes de vistas
│
├─ bootstrap/                # Archivos de inicio de Laravel
├─ config/                   # Configuraciones
├─ database/                 # Migraciones, seeders y SQL
│  ├─ migrations/            # Estructura de tablas
│  ├─ seeders/               # Datos iniciales
│  └─ sql/                   # Scripts SQL y procedimientos almacenados
│
├─ Documentacion/            # Documentación del proyecto
│  ├─ Proyecto_de_Evaluación_Docente.pdf
│  └─ casos_uso_historias_usuario.md
│
├─ public/                   # Archivos públicos (CSS, JS, imágenes)
│  ├─ css/                   # Hojas de estilo
│  ├─ js/                    # JavaScript
│  └─ images/                # Imágenes y recursos gráficos
│
├─ resources/                # Recursos de la aplicación
│  ├─ css/                   # Estilos fuente
│  ├─ js/                    # JavaScript fuente
│  └─ views/                 # Vistas Blade
│      ├─ Actas/             # Vistas de actas de compromiso
│      ├─ Administrador/     # Vistas del panel de administrador
│      ├─ components/        # Componentes reutilizables
│      ├─ Decano/            # Vistas del panel de decano/coordinador
│      ├─ Docente/           # Vistas del panel de docente
│      ├─ layouts/           # Plantillas base
│      └─ Login/             # Vistas de autenticación
│
├─ routes/                   # Definición de rutas
│  ├─ api.php                # Rutas de API
│  └─ web.php                # Rutas web
│
├─ storage/                  # Almacenamiento (logs, cache, archivos)
├─ tests/                    # Pruebas automatizadas
├─ vendor/                   # Dependencias (gestionadas por Composer)
├─ .env                      # Configuración de entorno
├─ composer.json             # Dependencias de PHP
├─ package.json              # Dependencias de Node.js
└─ README.md                 # Este archivo
```

---

## 📌 Requisitos

### Para ejecutar el proyecto

- 🐘 **PHP 8.x** y **Composer** (para gestionar dependencias en Laravel).
- 🐬 **MySQL 5.7+** o **MariaDB** como sistema de gestión de base de datos.
- 🌐 **Servidor Web** (Apache o Nginx) configurado para ejecutar aplicaciones Laravel.
- 🟢 **Node.js** y **npm** para compilar assets (opcional, si se modifican los archivos JS/CSS).
- 🔄 **XAMPP**, **WAMP** o similar si se desea un entorno de desarrollo local integrado.

---

## 🚀 Instalación y Ejecución

### Requisitos previos

- 🐘 **PHP 8.1** o superior (requerido por el proyecto)
- 🐬 **MySQL 5.7+** o **MariaDB**
- 🔄 **Composer** (versión 2.x recomendada)
- 🟢 **Node.js** (16.x o superior) y **npm**
- 🌐 **Servidor web** (Apache/Nginx) o **XAMPP/WAMP/MAMP**

### Configuración del entorno local

1. **Clonar el repositorio** 📥:
   ```bash
   git clone https://github.com/SLarkZ01/Frontend_backend_laravel_blade_evaluacion_docente.git
   cd Frontend_backend_laravel_blade_evaluacion_docente
   ```

2. **Instalar dependencias de PHP** 📦:
   ```bash
   composer install
   ```

3. **Instalar dependencias de JavaScript** 📦:
   ```bash
   npm install
   ```

4. **Configurar archivo .env** ⚙️:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar base de datos** 🗄️:
   - Crear una base de datos MySQL llamada `evaluacion_docentes`
   - Editar el archivo `.env` con tus credenciales de base de datos:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=evaluacion_docentes
     DB_USERNAME=tu_usuario
     DB_PASSWORD=tu_contraseña
     ```

6. **Configurar la base de datos** (tienes dos opciones) 💾:

   **Opción A: Usar migraciones y seeders de Laravel**
   ```bash
   php artisan migrate --seed
   ```

   **Opción B: Importar directamente el script SQL**
   - Usando la línea de comandos:
     ```bash
     mysql -u [usuario] -p evaluacion_docentes < database/sql/evaluacion_docentes.sql
     ```
   - O usando PHPMyAdmin:
     1. Accede a PHPMyAdmin (generalmente en http://localhost/phpmyadmin)
     2. Selecciona la base de datos `evaluacion_docentes`
     3. Ve a la pestaña "Importar"
     4. Selecciona el archivo `database/sql/evaluacion_docentes.sql`
     5. Haz clic en "Importar"

7. **Importar procedimientos almacenados** 📊:
   ```bash
   mysql -u [usuario] -p evaluacion_docentes < database/sql/procedimientos.sql
   mysql -u [usuario] -p evaluacion_docentes < database/sql/acta_compromiso_procedures.sql
   mysql -u [usuario] -p evaluacion_docentes < database/sql/proceso_sancion_procedures.sql
   ```

8. **Compilar los activos** 🎨:
   ```bash
   npm run build
   ```

9. **Establecer permisos adecuados** (solo en entornos Unix/Linux) 🔒:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

10. **Ejecutar el servidor de desarrollo** 🖥️:
    ```bash
    php artisan serve
    ```

11. **Acceder a la aplicación** 🌐:
    - Abrir el navegador y visitar: `http://localhost:8000`

### Configuración alternativa con XAMPP/WAMP

1. **Instalar el proyecto en la carpeta htdocs**:
   - Clonar o descargar el repositorio en la carpeta htdocs (por defecto en `C:/xampp/htdocs/` o similar)

2. **Seguir los pasos 2-8** de la configuración anterior.

3. **Configurar un VirtualHost** (opcional pero recomendado):
   - Editar el archivo `httpd-vhosts.conf` de Apache
   - Añadir una configuración como esta:
     ```apache
     <VirtualHost *:80>
         DocumentRoot "C:/xampp/htdocs/Frontend_backend_laravel_blade_evaluacion_docente/public"
         ServerName evaluacion-docente.local
         <Directory "C:/xampp/htdocs/Frontend_backend_laravel_blade_evaluacion_docente/public">
             Options Indexes FollowSymLinks
             AllowOverride All
             Require all granted
         </Directory>
     </VirtualHost>
     ```
   - Añadir `127.0.0.1 evaluacion-docente.local` al archivo hosts

4. **Reiniciar Apache**

5. **Acceder a la aplicación** 🌐:
   - A través de `http://evaluacion-docente.local` o
   - A través de `http://localhost/Frontend_backend_laravel_blade_evaluacion_docente/public`

---

## 📱 Uso de la Aplicación

### Roles y Accesos

- 👨‍💼 **Administrador**:
  - Acceso a través de `/Admin`
  - Gestión de períodos de evaluación
  - Administración de roles y permisos
  - Generación de reportes globales

- 🏛️ **Decano/Coordinador**:
  - Acceso a través de `/decano`
  - Gestión de actas de compromiso
  - Monitoreo de alertas de bajo desempeño
  - Seguimiento a planes de mejora
  - Gestión de procesos de sanción o retiro

- 🧑‍🏫 **Docente**:
  - Acceso a través de `/docente`
  - Consulta de resultados de evaluación
  - Visualización de estadísticas personales
  - Configuración de datos personales

### Funcionalidades Principales

- 📝 **Actas de Compromiso**:
  - Creación y gestión de actas para docentes con bajo rendimiento
  - Seguimiento de compromisos y planes de mejora

- ⚠️ **Alertas de Bajo Desempeño**:
  - Notificación automática de docentes con calificaciones por debajo del umbral
  - Dashboard visual con indicadores de rendimiento

- ⚖️ **Procesos de Sanción**:
  - Gestión de procesos disciplinarios
  - Seguimiento a través de diferentes estados

- 📊 **Reportes y Estadísticas**:
  - Visualización de promedios por facultad y programa
  - Gráficos interactivos de rendimiento docente
  - Identificación de docentes destacados

---

## ⚙️ Metodología de Desarrollo

El proyecto se desarrolla siguiendo una metodología ágil (Scrum), que incluye:

- 📅 **Planificación de sprints**: Definición y priorización de funcionalidades.
- 🗣️ **Reuniones de seguimiento**: Para coordinar avances y detectar impedimentos.
- 🔍 **Revisión y retrospectiva**: Evaluación del progreso y ajuste del plan de trabajo.
- 🔄 **Control de versiones**: Gestión del código fuente mediante Git.

---

## 👨‍💻 Autores

- 🎨 **Thomas Montoya Magon** – Frontend y vistas Blade
- 🖌️ **Juan Daniel Bravo** – Frontend y UI/UX
- 💻 **Alejandro Martínez Salazar** – Backend Laravel
- 🗄️ **Daniel Rivas Agredo** – Base de Datos y procedimientos almacenados
- 🔧 **Luisa Julieth Joaqui** – Backend y APIs

---

## 📜 Licencia

Este proyecto se encuentra bajo la licencia MIT. Ver el archivo `LICENSE` para más detalles.

---

## 📬 Contacto

Para preguntas, sugerencias o reportar errores, puedes crear un issue en el repositorio o contactar directamente a alguno de los autores.

---

¡Gracias por tu interés en el **Proyecto Evaluación Docente**! 🌟 Juntos estamos contribuyendo a mejorar la calidad educativa a través de un sistema de evaluación transparente, robusto y eficaz.
