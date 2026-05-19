**Fincas**

Pequeña aplicación de gestión de fincas y comunicaciones internas, construida sobre Laravel. Este README ofrece una visión general del proyecto, sus funcionalidades y los pasos mínimos para ponerlo en marcha.

**Descripción**

- **Propósito:** Permitir a administradores, empleados y propietarios gestionar edificios, incidencias, avisos, documentos y consultas.
- **Audiencia:** Desarrolladores que van a desplegar o mantener la aplicación, y usuarios técnicos que necesiten entender la estructura básica.

**Funcionalidades principales (resumen)**

- **Autenticación y perfiles:** Usuarios con roles (administrador edificio, empleado, propietario) y perfiles asociados.
- **Gestión de edificios:** Crear y editar edificios y datos básicos relacionados.
- **Incidencias:** Registro, asignación y seguimiento de incidencias con comentarios y estado.
- **Avisos:** Publicación de avisos dirigidos a vecinos o empleados.
- **Documentos:** Subida y descarga de documentos asociados a edificios o avisos.
- **Consultas y comunicación:** Gestión de consultas de usuarios y envío de correos (plantillas de notificación básicas).

**Stack tecnológico**

- Backend: PHP 8.x con Laravel.
- Dependencias PHP: gestionadas con `composer` (ver `composer.json`).
- Frontend: assets con Vite / npm (ver `package.json`).
- Base de datos: MySQL / MariaDB (u otro SGBD compatible con Laravel).

**Estructura relevante del repositorio**

- `app/Models/` : modelos Eloquent (User, Edificio, Incidencia, Aviso, Documento, etc.).
- `app/Http/Controllers/` : controladores que implementan la lógica HTTP.
- `database/migrations/` : migraciones para crear las tablas principales.
- `database/seeders/` : seeders para datos de ejemplo.
- `routes/web.php` : rutas públicas y protegidas por middleware.
- `resources/views/` : vistas Blade si la aplicación las usa.

**Vistas (frontend)**

- Ubicación: `resources/views/` y subcarpetas por sección (auth, admin, edificios, incidencias, avisos, documentos).
- Layouts y componentes: existe un layout base (por ejemplo `layouts/app.blade.php`) que incluye header, footer y menú. Las vistas usan secciones (`@yield`) y componentes Blade (`@component` / `@include`) para partes reutilizables.
- Páginas típicas:
	- Dashboard: resumen para administradores y empleados.
	- Listados: tablas paginadas de incidencias, avisos, documentos y usuarios.
	- Formularios: creación/edición de incidencias, avisos, documentos y perfiles.
	- Detalles: vista individual de incidencia con comentarios y estado.
- Interactividad: modales y validación en cliente con JS; assets gestionados por Vite (`resources/js`).
- Cómo se relacionan con controladores: los controladores devuelven vistas con datos via `return view('incidencias.index', compact('incidencias'))` y usan políticas/middleware para restringir acceso.

**Relaciones y modelos (BD)**

Las relaciones principales entre modelos (basadas en los modelos presentes en `app/Models`) son, a grandes rasgos:

- `Edificio`:
	- hasMany `Incidencia`
	- hasMany `Aviso`
	- hasMany `Documento`

- `Incidencia`:
	- belongsTo `Edificio`
	- belongsTo `User` (reportante / creador)
	- hasMany `ComentarioIncidencia`
	- campos típicos: `titulo`, `descripcion`, `estado`, `prioridad`, `user_id`, `edificio_id`

- `ComentarioIncidencia`:
	- belongsTo `Incidencia`
	- belongsTo `User` (autor)

- `Aviso`:
	- belongsTo `Edificio`
	- belongsTo `User` (autor)
	- campos típicos: `titulo`, `contenido`, `fecha_publicacion`

- `Documento`:
	- belongsTo `Edificio` (o a veces a `Aviso`)
	- campos típicos: `nombre`, `ruta`, `tipo`, `edificio_id`

- `User`:
	- puede tener `hasOne` `PropietarioPerfil` o `EmpleadoPerfil`
	- puede relacionarse con `Incidencia`, `ComentarioIncidencia`, `Aviso`, `Consulta`

- `PropietarioPerfil` / `EmpleadoPerfil`:
	- pertenecen a `User` y contienen metadatos del perfil (direccion, telefono, datos de apartamento, rol en el edificio).

- `AdminEdificio`:
	- normalmente ligado a `User` y/o a `Edificio` (permite gestionar permisos y acciones administrativas).

Nota: las migraciones en `database/migrations/` definen las claves foráneas y los índices; revisa los archivos allí para ver los nombres exactos de columnas y restricciones.

Ejemplo sencillo de diagrama ER (texto):

- User 1 --- * Incidencia * --- 1 Edificio
- Incidencia 1 --- * ComentarioIncidencia
- Edificio 1 --- * Aviso
- Edificio 1 --- * Documento

Si necesitas, puedo generar un diagrama ER más detallado en formato Mermaid o una tabla con columnas por tabla.

**Instalación (mínima, local)**

1. Clonar el repositorio y entrar en la carpeta `fincas`.
2. Copiar el `.env.example` a `.env` y configurar la conexión a la base de datos y el mail.
3. Instalar dependencias PHP y JS:

```bash
composer install
npm install
```

4. Generar la clave de la aplicación y migrar la base de datos:

```bash
php artisan key:generate
php artisan migrate --seed
```

5. Compilar assets (modo desarrollo):

```bash
npm run dev
```

6. Iniciar servidor local de desarrollo:

```bash
php artisan serve
```

Visitar `http://127.0.0.1:8000` (o la URL que muestre `php artisan serve`).

**Pruebas**

Ejecutar tests PHPUnit (si están configurados):

```bash
./vendor/bin/phpunit
```

**Notas y recomendaciones**

- Revisa `database/seeders/` para cuentas de prueba y datos iniciales.
- Comprueba la configuración de correo en `.env` para que las notificaciones (emails) funcionen.
- Usa `php artisan storage:link` si la aplicación sirve archivos subidos desde `storage`.

**Cómo contribuir**

- Abrir un issue describiendo el bug o la mejora.
- Enviar PR basado en una rama dedicada; incluye descripción clara y migraciones/seeders si procede.

**Contacto y autoría**

Proyecto creado como parte del TFG. Para dudas técnicas contactar con el autor del repositorio.

**Licencia**

Revisa `composer.json` y la raíz del repositorio para la información de licencia; por defecto Laravel usa MIT.

---

Si quieres, adapto el README con más detalle (capturas, ejemplos de datos o pasos para Docker). Indica qué prefieres.
