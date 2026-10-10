# 🇨🇴 Cultura de Colombia

Sitio web dinámico sobre la **cultura de Colombia**: sus seis regiones, la gastronomía, la música, las festividades, los personajes, los símbolos patrios y los destinos turísticos.

Proyecto académico construido con **PHP 8+, SQLite (SQL), Tailwind CSS y JavaScript vanilla**. Diseño moderno, limpio, fluido y 100% responsive (móvil, tablet y escritorio).

---

## ✨ Características

- **Diseño responsive** probado desde 320 px hasta pantallas grandes.
- **Navegación suave**, menú móvil hamburguesa y filtros por región.
- **Animaciones** de aparición al hacer scroll (con soporte a `prefers-reduced-motion`).
- **Contenido 100% dinámico** desde una base de datos SQL (regiones, platos, ritmos, fiestas, etc.).
- **Formulario de contacto** funcional que guarda mensajes en la base de datos.
- **URLs limpias** (`/regiones`, `/region/caribe`, ...) vía `.htaccess` (Apache) o el router incluido para `php -S`.
- **CSS optimizado**: Tailwind compilado y minificado, con cache-busting de assets.
- **Accesibilidad**: navegación por foco, `aria-*`, salto de contenido y texto de contraste correcto.
- **Compatibilidad** con todos los navegadores modernos (Chrome, Edge, Firefox, Safari, Opera).

---

## 🗂 Estructura del proyecto (módulos)

| Módulo | Ruta | Descripción |
| --- | --- | --- |
| **Base de datos / SQL** | `database/` | `schema.sql` (estructura) + `seed.sql` (contenido) + BD SQLite generada |
| **Aplicación PHP** | `app/` | Configuración, conexión PDO, rutas y consultas |
| **Vistas** | `views/` | Diseño (layout), componentes y páginas |
| **Fron-end** | `assets/` | CSS compilado, JavaScript, logotipo y favicon |
| **Estilos fuente** | `src/` | Tailwind (no tocar si solo usas el sitio) |
| **Herramientas** | `scripts/` | Inicializar la BD y router del servidor local |

---

## 🚀 Cómo ejecutarlo en tu computador

### 1) Inicializar la base de datos (una sola vez)

```bash
php scripts/init_db.php
```

> Si ya tienes la BD y quieres recrearla desde cero: `php scripts/init_db.php --fresh`

> **También puedes importar `database/schema.sql` y `database/seed.sql`** con cualquier cliente SQL (hechos para SQLite).

### 2) Levantar el servidor

**Opción A – PHP embebido (recomendada, sin instalar nada más):**

```bash
php -S localhost:8000 scripts/router.php
```

Abre: http://localhost:8000

**Opción B – Apache / XAMPP:**

Coloca el proyecto en `C:\xampp\htdocs\colombia` (o `htdocs`) y abre:
http://localhost/colombia

Las URL limpias funcionan por el `.htaccess` incluido. Los archivos y carpetas internas (`app/`, `database/`, `views/`, `scripts/`) están bloqueadas.

> ⚠️ La base de datos `cultura_colombia.sqlite` se crea **automáticamente en la primera visita** si no existe (permite `escritura` en la carpeta `database/`).

---

## 🎨 Recompilar el CSS (solo si editas el diseño)

```bash
npm install      # instala Tailwind CLI (dev)
npm run build    # genera assets/css/styles.css minificado
npm run dev      # modo watch mientras editas
```

---

## ☁️ Subirlo a GitHub

Este repositorio ya está inicializado y con commits. Solo falta crear el repositorio en GitHub y enlazarlo:

```bash
# 1) Crea un repositorio vacío en https://github.com/new (sin README, sin .gitignore)

# 2) Agrega tu repositorio remoto (reemplaza TU-USUARIO y TU-REPO):
git remote add origin https://github.com/TU-USUARIO/colombia-cultura.git

# 3) Sube el proyecto:
git branch -M main
git push -u origin main
```

El enlace de tu repositorio quedará así:
`https://github.com/TU-USUARIO/colombia-cultura`

---

## 🌐 Publicar en un hosting gratuito

Con el proyecto en GitHub puedes usar **Netlify Drop**, **Vercel** o **InfinityFree**:

- **InfinityFree / FreeHostia**: sube todos los archivos vía FTP o el panel al interior de `htdocs`/`public_html`. El sitio arrancará solo y creará la BD automáticamente.
- **Vercel / Netlify**: crean el host de estáticos + PHP automáticamente al conectar el repositorio de GitHub.

---

## 🗄 Tablas de la base de datos

| Tabla | Contenido |
| --- | --- |
| `regiones` | Las 6 regiones culturales y naturales de Colombia |
| `gastronomia` | 10 platos típicos con sus ingredientes |
| `musica` | 10 ritmos e instrumentos |
| `festividades` | 10 carnavales y festivales |
| `personajes` | 8 artistas, escritores y músicos destacados |
| `simbolos` | Símbolos patrios, fauna, flora y culturales |
| `sitios` | 8 destinos turísticos emblemáticos |
| `datos_curiosos` | Datos y cifras sobre el país |
| `mensajes` | Mensajes del formulario de contacto |

---

## 🛠 Tecnologías

- **Backend**: PHP 8.5 (PDO + SQLite 3)
- **Frontend**: Tailwind CSS 3.4, JavaScript vanilla, SVG
- **Servidor**: Apache (`.htaccess`) o `php -S` con router propio

Hecho con ❤️ para la materia de Cultura / Bases de datos.