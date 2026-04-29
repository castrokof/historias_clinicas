# Sistema de Historias Clínicas

Sistema completo de gestión de historias clínicas para instituciones prestadoras de servicios de salud (IPS), desarrollado con Laravel 11.

## 📚 Guías de Documentación

- 📖 **[INICIO_LOCAL.md](INICIO_LOCAL.md)** - Guía completa para iniciar la aplicación en desarrollo local
- 🪟 **[SOLUCION_WINDOWS_XAMPP.md](SOLUCION_WINDOWS_XAMPP.md)** - Solución para problemas de PHP en Windows/XAMPP
- 🚀 **[DEPLOYMENT.md](DEPLOYMENT.md)** - Guía completa de deployment a producción

## 📋 Tabla de Contenidos

- [Características](#características)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Módulos del Sistema](#módulos-del-sistema)
- [Despliegue a Producción](#despliegue-a-producción)
- [Seguridad](#seguridad)
- [Mantenimiento](#mantenimiento)
- [Soporte](#soporte)

## ✨ Características

### Gestión Clínica
- **Historias Clínicas Electrónicas**: Registro completo de historias médicas con soporte para CIE-10
- **Evoluciones Médicas**: Seguimiento detallado de la evolución de los pacientes
- **Planes Terapéuticos**: Gestión de procedimientos según clasificación CUPS
- **Planes Farmacológicos**: Manejo de medicamentos con CUMS y códigos ATC
- **Incapacidades**: Emisión y gestión de certificados de incapacidad
- **Exportación a PDF**: Generación de documentos médicos oficiales

### Gestión de Pacientes
- **Registro Completo**: Información demográfica, contacto y documentación
- **Vinculación EPS**: Gestión de aseguradoras, niveles y copagos
- **Historial Médico**: Acceso centralizado a todas las atenciones

### Agendamiento y Citas
- **Programación de Agendas**: Gestión flexible de disponibilidad
- **Asignación de Citas**: Sistema inteligente de programación
- **Observaciones**: Historial detallado por cita
- **Consulta y Edición**: Panel completo de gestión

### Facturación
- **Facturación Electrónica**: Procedimientos, medicamentos y diagnósticos
- **Gestión de Contratos**: Relación con EPS y tarifas
- **Cálculo Automático**: Valores y copagos
- **Reportes**: Informes financieros y estadísticos

### Maestros de Datos
- **Procedimientos CUPS**: Clasificación Única de Procedimientos en Salud
- **Medicamentos CUMS**: Clasificación Única de Medicamentos y Suministros
- **Diagnósticos CIE-10**: Clasificación Internacional de Enfermedades
- **Especialidades Médicas**: Catálogo completo
- **EPS y Contratos**: Administradoras y convenios

### Seguridad y Administración
- **Sistema de Roles**: 3 niveles (superadmin, superEditor, superConsultor)
- **Menús Dinámicos**: Configurables por rol
- **Auditoría**: Registro de acciones (logs)
- **Sesiones Encriptadas**: Protección de datos sensibles

## 🖥️ Requisitos del Sistema

### Requisitos Obligatorios
- **PHP**: 8.2 o superior
- **Composer**: 2.x
- **Node.js**: 18.x o superior
- **NPM**: 9.x o superior
- **MySQL**: 8.0 o superior
- **Redis**: 6.x o superior (para sesiones y caché)
- **Apache**: 2.4+ con mod_rewrite habilitado **O** Nginx: 1.18+

### Extensiones PHP Requeridas
```bash
php-cli
php-fpm
php-mysql
php-mbstring
php-xml
php-bcmath
php-curl
php-json
php-zip
php-gd (o php-imagick)
php-redis
php-intl
```

### Verificar requisitos
```bash
php -v                    # Verificar versión de PHP
php -m | grep -i redis    # Verificar extensión Redis
composer --version        # Verificar Composer
node --version            # Verificar Node.js
npm --version             # Verificar NPM
```

## 📦 Instalación

> 💡 **Guías Detalladas Disponibles:**
> - Para desarrollo local: Ver **[INICIO_LOCAL.md](INICIO_LOCAL.md)**
> - Para Windows/XAMPP: Ver **[SOLUCION_WINDOWS_XAMPP.md](SOLUCION_WINDOWS_XAMPP.md)**
> - Para producción: Ver **[DEPLOYMENT.md](DEPLOYMENT.md)**

### 1. Clonar el Repositorio
```bash
git clone https://github.com/castrokof/historias_clinicas.git
cd historias_clinicas
```

### 2. Instalar Dependencias de PHP
```bash
composer install --optimize-autoloader --no-dev
```

### 3. Instalar Dependencias de Node.js
```bash
npm install
npm run build
```

### 4. Configurar Variables de Entorno
```bash
cp .env.example .env
nano .env  # Editar con tus configuraciones
```

### 5. Generar Clave de Aplicación
```bash
php artisan key:generate
```

### 6. Configurar Base de Datos

Crear la base de datos:
```sql
CREATE DATABASE historias_clinicas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'db_user'@'localhost' IDENTIFIED BY 'secure_password_here';
GRANT ALL PRIVILEGES ON historias_clinicas.* TO 'db_user'@'localhost';
FLUSH PRIVILEGES;
```

Ejecutar migraciones:
```bash
php artisan migrate
```

### 7. Cargar Datos Iniciales
```bash
php artisan db:seed
```

**⚠️ IMPORTANTE**: Antes de ejecutar seeders en producción, actualizar las contraseñas en `.env`:
```env
ADMIN_DEFAULT_PASSWORD=tu_contraseña_segura_aqui
DEV_DEFAULT_PASSWORD=tu_contraseña_segura_aqui
MEDIC_DEFAULT_PASSWORD=tu_contraseña_segura_aqui
```

### 8. Configurar Permisos
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 9. Optimizar para Producción
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## ⚙️ Configuración

### Archivo .env Principal

```env
APP_NAME="Sistema Historias Clínicas"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com

DB_DATABASE=historias_clinicas
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña_segura

SESSION_ENCRYPT=true
SESSION_DRIVER=redis

CORS_ALLOWED_ORIGINS=https://tu-dominio.com
```

### Configuración de Redis
```env
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Configuración de Correo
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu-app-password
MAIL_ENCRYPTION=tls
```

### Configuración de Apache

Crear archivo de configuración:
```bash
sudo nano /etc/apache2/sites-available/historias-clinicas.conf
```

Contenido:
```apache
<VirtualHost *:80>
    ServerName tu-dominio.com
    ServerAlias www.tu-dominio.com
    DocumentRoot /var/www/historias_clinicas/public

    <Directory /var/www/historias_clinicas/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/historias-error.log
    CustomLog ${APACHE_LOG_DIR}/historias-access.log combined
</VirtualHost>
```

Habilitar sitio:
```bash
sudo a2ensite historias-clinicas.conf
sudo a2enmod rewrite
sudo systemctl reload apache2
```

### SSL/HTTPS con Let's Encrypt
```bash
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d tu-dominio.com -d www.tu-dominio.com
```

## 📚 Módulos del Sistema

### 1. Gestión de Usuarios y Seguridad
- Autenticación y autorización
- Roles: Superadmin, SuperEditor, SuperConsultor
- Menús dinámicos por rol
- Auditoría de acciones

### 2. Gestión de Pacientes
- Registro completo de pacientes
- Información demográfica
- Ocupaciones y tipos de documento
- Vinculación con EPS

### 3. Historia Clínica
- Apertura de historias clínicas
- Evoluciones médicas
- Diagnósticos (CIE-10)
- Plan terapéutico (CUPS)
- Plan farmacológico (CUMS)
- Incapacidades
- Exportación a PDF

### 4. Agenda y Citas
- Programación de agendas médicas
- Asignación de citas
- Observaciones y seguimiento
- Consulta y edición

### 5. Facturación
- Facturas con procedimientos
- Facturas con medicamentos
- Gestión de contratos
- Cálculo de copagos
- Reportes financieros

### 6. Configuración
- Sedes
- Servicios
- Profesionales y especialidades
- EPS y contratos
- Procedimientos (CUPS)
- Medicamentos (CUMS)
- Diagnósticos (CIE-10)

## 🚀 Despliegue a Producción

> 📖 **Para una guía completa y detallada de deployment, consulta: [DEPLOYMENT.md](DEPLOYMENT.md)**

### Checklist Pre-Despliegue

- [ ] Variables de entorno configuradas en `.env`
- [ ] `APP_DEBUG=false` y `APP_ENV=production`
- [ ] Base de datos creada y migraciones ejecutadas
- [ ] Redis instalado y funcionando
- [ ] Permisos de archivos configurados
- [ ] SSL/HTTPS configurado
- [ ] Contraseñas de seeders actualizadas
- [ ] Backup de base de datos configurado
- [ ] Monitoreo configurado

### Optimización para Producción

```bash
# Optimizar autoloader
composer install --optimize-autoloader --no-dev

# Cachear configuración
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Compilar assets
npm run build
```

### Configurar Tareas Programadas (Cron)

```bash
crontab -e
```

Agregar:
```
* * * * * cd /var/www/historias_clinicas && php artisan schedule:run >> /dev/null 2>&1
```

### Configurar Supervisor (para Queue Workers)

```bash
sudo nano /etc/supervisor/conf.d/historias-worker.conf
```

Contenido:
```ini
[program:historias-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/historias_clinicas/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/historias_clinicas/storage/logs/worker.log
stopwaitsecs=3600
```

Activar:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start historias-worker:*
```

## 🔒 Seguridad

### Medidas Implementadas

1. **CORS Configurado**: Solo dominios autorizados
2. **Sesiones Encriptadas**: Protección de datos sensibles
3. **Headers de Seguridad**: X-Frame-Options, CSP, etc.
4. **Ruta de Logs Protegida**: Solo accesible por superadmin
5. **Contraseñas Hasheadas**: Bcrypt
6. **Tokens CSRF**: Protección contra ataques
7. **Rate Limiting**: Prevención de ataques de fuerza bruta

### Recomendaciones Adicionales

- Cambiar contraseñas predeterminadas inmediatamente
- Mantener Laravel y dependencias actualizadas
- Revisar logs regularmente
- Implementar 2FA para usuarios administrativos
- Realizar backups diarios de base de datos
- Configurar firewall (UFW/iptables)
- Mantener PHP y servidor web actualizados

### Acceso a Logs

Solo usuarios con rol `superadmin` pueden acceder a:
```
https://tu-dominio.com/logs
```

## 🔧 Mantenimiento

### Backups de Base de Datos

Automático diario:
```bash
#!/bin/bash
# /usr/local/bin/backup-db.sh
DATE=$(date +%Y%m%d_%H%M%S)
mysqldump -u db_user -p'password' historias_clinicas | gzip > /backups/historias_$DATE.sql.gz
find /backups -name "historias_*.sql.gz" -mtime +30 -delete
```

Agregar a cron:
```bash
0 2 * * * /usr/local/bin/backup-db.sh
```

### Actualizar el Sistema

```bash
# Backup primero
php artisan down

# Actualizar código
git pull origin main

# Actualizar dependencias
composer install --optimize-autoloader --no-dev
npm install && npm run build

# Ejecutar migraciones
php artisan migrate --force

# Limpiar y recachear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Subir aplicación
php artisan up
```

### Monitoreo de Logs

```bash
# Logs de Laravel
tail -f storage/logs/laravel.log

# Logs de Apache
tail -f /var/log/apache2/historias-error.log

# Logs de PHP
tail -f /var/log/php8.2-fpm.log
```

### Limpiar Caché

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 📊 Tests

### Ejecutar Tests

```bash
# Todos los tests
php artisan test

# Con cobertura
php artisan test --coverage

# Tests específicos
php artisan test --filter=LoginTest
```

### Tests Implementados

- ✅ Test de autenticación
- ✅ Test de acceso a rutas protegidas
- ✅ Test de sesiones

## 🐛 Solución de Problemas

### Error: "500 Internal Server Error"
```bash
# Revisar permisos
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Revisar logs
tail -f storage/logs/laravel.log
```

### Error: "Redis connection refused"
```bash
# Verificar que Redis esté corriendo
sudo systemctl status redis-server

# Iniciar Redis
sudo systemctl start redis-server
```

### Error: "SQLSTATE[HY000] [2002]"
```bash
# Verificar MySQL
sudo systemctl status mysql

# Verificar credenciales en .env
```

## 📝 Usuarios Predeterminados

Después de ejecutar los seeders:

| Usuario | Contraseña | Rol | Email |
|---------|------------|-----|-------|
| admin | (Ver .env) | Superadmin | admin@example.com |
| desarrollador | (Ver .env) | Superadmin | dev@example.com |
| medico | (Ver .env) | Médico | medico@example.com |

**⚠️ IMPORTANTE**: Cambiar contraseñas inmediatamente en producción.

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver archivo `LICENSE` para más detalles.

## 👥 Soporte

Para soporte técnico:
- 📧 Email: castrokof@gmail.com
- 🐛 Issues: https://github.com/castrokof/historias_clinicas/issues
- 📚 Wiki: https://github.com/castrokof/historias_clinicas/wiki

## 🔄 Versionamiento

Este proyecto usa [Semantic Versioning](https://semver.org/).

**Versión Actual**: 2.0.0 (Laravel 11)

### Cambios Recientes

#### v2.0.0 (2025-01-XX)
- ⬆️ Actualización a Laravel 11
- 🔒 Mejoras de seguridad (CORS, sesiones encriptadas, headers)
- 📦 Migración de Laravel Mix a Vite
- 🧹 Limpieza de código y archivos obsoletos
- 📝 Documentación completa
- ✅ Tests básicos implementados

---

Desarrollado con ❤️ para mejorar la gestión de salud en Colombia
