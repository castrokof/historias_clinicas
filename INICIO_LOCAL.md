# 🚀 Guía de Inicio - Sistema de Historias Clínicas (Laravel 11)

## ✅ Configuración Completada

Ya tienes estos pasos listos:
- ✅ Aplicación actualizada a Laravel 11.47.0
- ✅ Dependencias de Composer instaladas
- ✅ Archivo .env configurado
- ✅ APP_KEY generada
- ✅ Assets compilados con Vite

---

## 📋 Pasos para Iniciar la Aplicación Localmente

### **OPCIÓN A: Usando MySQL (Recomendado para Producción)**

#### 1. Instalar MySQL (si no lo tienes)

**En Ubuntu/Debian:**
```bash
sudo apt update
sudo apt install mysql-server mysql-client
sudo systemctl start mysql
sudo systemctl enable mysql
```

**En macOS con Homebrew:**
```bash
brew install mysql
brew services start mysql
```

**En Windows:**
- Descargar desde: https://dev.mysql.com/downloads/installer/
- O usar XAMPP/WAMP que incluye MySQL

#### 2. Crear la Base de Datos

```bash
# Conectar a MySQL
mysql -u root -p

# Ejecutar estos comandos en MySQL:
CREATE DATABASE historias_clinicas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'historias_user'@'localhost' IDENTIFIED BY 'tu_password';
GRANT ALL PRIVILEGES ON historias_clinicas.* TO 'historias_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### 3. Configurar .env

Edita el archivo `.env` y configura:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=historias_clinicas
DB_USERNAME=historias_user
DB_PASSWORD=tu_password
```

#### 4. Ejecutar Migraciones y Seeders

```bash
php artisan migrate --seed
```

---

### **OPCIÓN B: Usando SQLite (Más rápido para pruebas)**

#### 1. Instalar extensión SQLite de PHP

**En Ubuntu/Debian:**
```bash
sudo apt install php8.2-sqlite3
# o si usas PHP 8.4:
sudo apt install php8.4-sqlite3
```

**En macOS:**
```bash
brew install php-sqlite
```

**En Windows:**
- Editar `php.ini`
- Descomentar: `extension=sqlite3`

#### 2. Reiniciar PHP

```bash
# Si usas PHP-FPM
sudo systemctl restart php8.2-fpm
```

#### 3. Verificar instalación

```bash
php -m | grep sqlite
# Debe mostrar: pdo_sqlite y sqlite3
```

#### 4. El .env ya está configurado para SQLite

Ya dejé configurado:
```env
DB_CONNECTION=sqlite
```

#### 5. Ejecutar Migraciones y Seeders

```bash
php artisan migrate --seed
```

---

## 🎯 Iniciar el Servidor de Desarrollo

### Una vez configurada la base de datos:

```bash
# Iniciar el servidor de desarrollo de Laravel
php artisan serve
```

Verás algo como:
```
INFO  Server running on [http://127.0.0.1:8000].

Press Ctrl+C to stop the server
```

### Abrir en el navegador:
```
http://localhost:8000
```

O si prefieres otro puerto:
```bash
php artisan serve --port=8080
```

---

## 👥 Usuarios Predeterminados

Después de ejecutar los seeders, tendrás estos usuarios:

| Usuario | Contraseña | Rol | Email |
|---------|-----------|-----|-------|
| admin | Ver .env: ADMIN_DEFAULT_PASSWORD | Superadmin | admin@example.com |
| desarrollador | Ver .env: DEV_DEFAULT_PASSWORD | Superadmin | dev@example.com |
| medico | Ver .env: MEDIC_DEFAULT_PASSWORD | Médico | medico@example.com |

**Contraseñas por defecto** (puedes cambiarlas en `.env`):
```env
ADMIN_DEFAULT_PASSWORD=ChangeMe2024!
DEV_DEFAULT_PASSWORD=ChangeMe2024!
MEDIC_DEFAULT_PASSWORD=ChangeMe2024!
```

---

## 🔧 Comandos Útiles para Desarrollo

### Limpiar cachés
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Ver rutas disponibles
```bash
php artisan route:list
```

### Ejecutar tests
```bash
php artisan test
```

### Recompilar assets (si modificas CSS/JS)
```bash
npm run dev        # Modo desarrollo con watch
npm run build      # Compilar para producción
```

### Abrir consola de Laravel (Tinker)
```bash
php artisan tinker
```

### Ver logs en tiempo real
```bash
tail -f storage/logs/laravel.log
```

---

## 🐛 Solución de Problemas Comunes

### Error: "could not find driver"
**Solución:** Instalar extensión PDO de MySQL o SQLite
```bash
# Para MySQL
sudo apt install php8.2-mysql

# Para SQLite
sudo apt install php8.2-sqlite3
```

### Error: "Connection refused [tcp://127.0.0.1:3306]"
**Solución:** MySQL no está corriendo
```bash
sudo systemctl start mysql
```

### Error: "SQLSTATE[HY000] [1045] Access denied"
**Solución:** Verificar credenciales en `.env`

### Error: "Permission denied" en storage
**Solución:**
```bash
chmod -R 775 storage bootstrap/cache
```

### La página no carga estilos
**Solución:**
```bash
npm run build
php artisan view:clear
```

---

## 📊 Verificar que Todo Funciona

### 1. Verificar PHP y extensiones
```bash
php -v
php -m | grep -E 'pdo|mysql|sqlite'
```

### 2. Verificar Laravel
```bash
php artisan --version
# Debe mostrar: Laravel Framework 11.47.0
```

### 3. Verificar base de datos
```bash
php artisan migrate:status
```

### 4. Verificar que el servidor funciona
```bash
php artisan serve
# Abrir http://localhost:8000 en el navegador
```

---

## 🎨 Estructura de la Aplicación

```
http://localhost:8000/              # Página de login
http://localhost:8000/seguridad/login  # Login alternativo
http://localhost:8000/admin/menu    # Panel de administración (requiere login)
http://localhost:8000/logs          # Logs del sistema (solo superadmin)
```

---

## 📝 Siguiente Paso Recomendado

1. **Instalar MySQL o habilitar SQLite** (ver opciones arriba)
2. **Ejecutar:** `php artisan migrate --seed`
3. **Iniciar servidor:** `php artisan serve`
4. **Acceder:** http://localhost:8000
5. **Login con:** admin / ChangeMe2024!

---

## 💡 Consejos para Desarrollo

### Hot Reload de Assets
```bash
# En una terminal
npm run dev

# En otra terminal
php artisan serve
```

### Debugging
```bash
# Ver queries ejecutadas
DB_CONNECTION=mysql
DB_LOG_QUERIES=true
```

### Formato de código
```bash
./vendor/bin/pint
```

---

## ❓ ¿Necesitas Ayuda?

- 📚 Documentación Laravel: https://laravel.com/docs/11.x
- 📖 README del proyecto: ./README.md
- 🐛 Reportar problemas: GitHub Issues

---

**¡Tu aplicación está lista para desarrollo! 🎉**

Sigue los pasos según tu preferencia (MySQL o SQLite) y tendrás todo funcionando en minutos.
