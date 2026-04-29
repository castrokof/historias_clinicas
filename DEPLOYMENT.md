# 🚀 Guía de Deployment - Sistema de Historias Clínicas

## 📋 Checklist Pre-Deployment

Antes de desplegar a producción, verifica que hayas completado:

- [ ] Actualización a Laravel 11.47.0 completa
- [ ] Todas las migraciones probadas en desarrollo
- [ ] Tests ejecutados y pasando
- [ ] Assets compilados para producción
- [ ] Variables de entorno configuradas
- [ ] Copias de seguridad de base de datos
- [ ] Plan de rollback preparado

---

## 🖥️ Requisitos del Servidor

### **Software Mínimo**

```bash
✅ PHP 8.2 o superior (Laravel 11 requiere PHP 8.2+)
✅ MySQL 8.0+ o MariaDB 10.3+
✅ Composer 2.x
✅ Node.js 18.x+ y npm
✅ Git
✅ Nginx o Apache
✅ Supervisor (para queues)
```

### **Extensiones PHP Requeridas**

```bash
php8.2-cli
php8.2-common
php8.2-mysql
php8.2-zip
php8.2-gd
php8.2-mbstring
php8.2-curl
php8.2-xml
php8.2-bcmath
php8.2-intl
php8.2-fpm  # Si usas Nginx
```

---

## 🔧 Instalación en Servidor (Ubuntu/Debian)

### **1. Instalar PHP 8.2+**

```bash
# Agregar repositorio PPA
sudo apt update
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update

# Instalar PHP y extensiones
sudo apt install php8.2 php8.2-cli php8.2-common php8.2-mysql \
    php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl \
    php8.2-xml php8.2-bcmath php8.2-intl php8.2-fpm

# Verificar instalación
php -v
```

### **2. Instalar Composer**

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
composer --version
```

### **3. Instalar MySQL**

```bash
sudo apt install mysql-server mysql-client
sudo mysql_secure_installation

# Crear base de datos
sudo mysql -u root -p
```

```sql
CREATE DATABASE historias_clinicas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'historias_user'@'localhost' IDENTIFIED BY 'TU_PASSWORD_SEGURA';
GRANT ALL PRIVILEGES ON historias_clinicas.* TO 'historias_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### **4. Instalar Node.js y npm**

```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
node -v
npm -v
```

### **5. Instalar Nginx**

```bash
sudo apt install nginx
sudo systemctl start nginx
sudo systemctl enable nginx
```

---

## 📦 Deployment del Proyecto

### **1. Clonar Repositorio**

```bash
cd /var/www
sudo git clone https://github.com/castrokof/historias_clinicas.git
sudo chown -R www-data:www-data historias_clinicas
cd historias_clinicas
```

### **2. Instalar Dependencias**

```bash
# Dependencias de Composer (producción)
composer install --optimize-autoloader --no-dev

# Dependencias de npm
npm ci
npm run build
```

### **3. Configurar Archivo .env**

```bash
# Copiar ejemplo
cp .env.example .env

# Editar configuración
nano .env
```

**Configuración .env para Producción:**

```env
APP_NAME="Sistema Historias Clínicas"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com
APP_KEY=

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=historias_clinicas
DB_USERNAME=historias_user
DB_PASSWORD=TU_PASSWORD_SEGURA

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
FILESYSTEM_DISK=local
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120
SESSION_ENCRYPT=true

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=tu-smtp-host
MAIL_PORT=587
MAIL_USERNAME=tu-email@example.com
MAIL_PASSWORD=tu-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@tu-dominio.com
MAIL_FROM_NAME="${APP_NAME}"

# CORS Configuration
CORS_ALLOWED_ORIGINS=https://tu-dominio.com
CORS_ALLOWED_METHODS=GET,POST,PUT,DELETE,OPTIONS
CORS_ALLOWED_HEADERS=Content-Type,X-Requested-With,Authorization,Accept,Origin,X-CSRF-TOKEN

# Default Passwords (CAMBIAR INMEDIATAMENTE)
ADMIN_DEFAULT_PASSWORD=PasswordSuperSegura2024!
DEV_DEFAULT_PASSWORD=DevPasswordSegura2024!
MEDIC_DEFAULT_PASSWORD=MedicPasswordSegura2024!
```

### **4. Generar APP_KEY**

```bash
php artisan key:generate
```

### **5. Ejecutar Migraciones**

```bash
# IMPORTANTE: Hacer backup antes!
mysqldump -u historias_user -p historias_clinicas > backup_pre_migration.sql

# Ejecutar migraciones
php artisan migrate --force

# Ejecutar seeders (solo en primera instalación)
php artisan db:seed --force
```

### **6. Optimizar Aplicación**

```bash
# Cachear configuración
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimizar autoloader
composer dump-autoload --optimize
```

### **7. Configurar Permisos**

```bash
# Permisos de almacenamiento
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Permisos del proyecto
sudo chown -R www-data:www-data /var/www/historias_clinicas
sudo find /var/www/historias_clinicas -type f -exec chmod 644 {} \;
sudo find /var/www/historias_clinicas -type d -exec chmod 755 {} \;
```

---

## 🌐 Configuración de Nginx

### **Crear archivo de configuración:**

```bash
sudo nano /etc/nginx/sites-available/historias_clinicas
```

**Contenido del archivo:**

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name tu-dominio.com www.tu-dominio.com;
    root /var/www/historias_clinicas/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Cacheo de assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

### **Activar sitio:**

```bash
sudo ln -s /etc/nginx/sites-available/historias_clinicas /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

---

## 🔒 Configurar SSL con Let's Encrypt

```bash
# Instalar Certbot
sudo apt install certbot python3-certbot-nginx

# Obtener certificado SSL
sudo certbot --nginx -d tu-dominio.com -d www.tu-dominio.com

# Renovación automática (ya viene configurado)
sudo certbot renew --dry-run
```

---

## 🔄 Configurar Queue Worker con Supervisor

### **1. Instalar Supervisor**

```bash
sudo apt install supervisor
```

### **2. Crear configuración**

```bash
sudo nano /etc/supervisor/conf.d/historias-worker.conf
```

**Contenido:**

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

### **3. Iniciar worker**

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start historias-worker:*
sudo supervisorctl status
```

---

## 🔄 Script de Deployment Automatizado

Crear archivo `deploy.sh`:

```bash
#!/bin/bash

echo "🚀 Iniciando deployment..."

# Entrar en modo mantenimiento
php artisan down

# Actualizar código
git pull origin main

# Instalar/actualizar dependencias
composer install --optimize-autoloader --no-dev
npm ci
npm run build

# Ejecutar migraciones
php artisan migrate --force

# Limpiar y cachear
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Reiniciar workers
sudo supervisorctl restart historias-worker:*

# Salir de modo mantenimiento
php artisan up

echo "✅ Deployment completado!"
```

**Dar permisos:**

```bash
chmod +x deploy.sh
```

**Usar:**

```bash
./deploy.sh
```

---

## 📊 Monitoreo y Logs

### **Ver logs en tiempo real:**

```bash
tail -f storage/logs/laravel.log
```

### **Ver logs de Nginx:**

```bash
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/nginx/access.log
```

### **Ver estado de workers:**

```bash
sudo supervisorctl status
```

---

## 🔐 Seguridad Post-Deployment

### **1. Cambiar contraseñas predeterminadas**

```bash
php artisan tinker
```

```php
use App\Models\Seguridad\Usuario;

// Cambiar password del admin
$admin = Usuario::where('usuario', 'admin')->first();
$admin->password = bcrypt('NuevaPasswordSegura2024!');
$admin->save();
```

### **2. Configurar Firewall**

```bash
sudo ufw allow 22/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw enable
sudo ufw status
```

### **3. Configurar rate limiting**

Ya está configurado en `RouteServiceProvider.php`:
- API: 60 requests por minuto
- Web: Protegido por throttle middleware

### **4. Configurar backups automáticos**

```bash
# Crear script de backup
sudo nano /usr/local/bin/backup-historias.sh
```

```bash
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/historias_clinicas"

mkdir -p $BACKUP_DIR

# Backup de base de datos
mysqldump -u historias_user -p'PASSWORD' historias_clinicas > $BACKUP_DIR/db_$DATE.sql

# Backup de archivos
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/historias_clinicas/storage/app

# Eliminar backups antiguos (más de 30 días)
find $BACKUP_DIR -type f -mtime +30 -delete

echo "Backup completado: $DATE"
```

```bash
chmod +x /usr/local/bin/backup-historias.sh
```

**Programar con cron:**

```bash
sudo crontab -e
```

```cron
# Backup diario a las 2 AM
0 2 * * * /usr/local/bin/backup-historias.sh >> /var/log/backup-historias.log 2>&1
```

---

## 🚨 Plan de Rollback

Si algo sale mal:

```bash
# 1. Entrar en modo mantenimiento
php artisan down

# 2. Restaurar código anterior
git reset --hard HEAD~1

# 3. Reinstalar dependencias
composer install --optimize-autoloader --no-dev

# 4. Restaurar base de datos
mysql -u historias_user -p historias_clinicas < backup_pre_migration.sql

# 5. Limpiar cachés
php artisan optimize:clear

# 6. Salir de modo mantenimiento
php artisan up
```

---

## 📝 Checklist Post-Deployment

- [ ] Aplicación accesible desde el dominio
- [ ] SSL funcionando (https://)
- [ ] Login funciona correctamente
- [ ] Base de datos migrada exitosamente
- [ ] Assets cargando correctamente
- [ ] Emails enviándose (si aplica)
- [ ] Queue workers corriendo
- [ ] Logs sin errores críticos
- [ ] Backups programados
- [ ] Contraseñas cambiadas
- [ ] Firewall configurado
- [ ] Monitoring configurado

---

## 🆘 Solución de Problemas Comunes

### **500 Internal Server Error**

```bash
# Ver logs
tail -f storage/logs/laravel.log
sudo tail -f /var/log/nginx/error.log

# Verificar permisos
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### **Página en blanco**

```bash
# Habilitar debug temporalmente
php artisan down
# Cambiar APP_DEBUG=true en .env
# Ver error, arreglar
# Cambiar APP_DEBUG=false
php artisan up
```

### **Assets no cargan**

```bash
npm run build
php artisan view:clear
php artisan config:clear
```

### **Queue workers no procesan trabajos**

```bash
sudo supervisorctl restart historias-worker:*
sudo supervisorctl status
```

---

## 📞 Contacto y Soporte

- 📧 Email: castrokof@gmail.com
- 🐛 Issues: https://github.com/castrokof/historias_clinicas/issues
- 📚 Documentación: ./README.md

---

**¡Tu aplicación está lista para producción! 🎉**
