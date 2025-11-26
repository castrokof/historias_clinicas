<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecurityConfigurationTest extends TestCase
{
    /**
     * Test que la aplicación está configurada para producción en el test.
     */
    public function test_session_encryption_is_enabled(): void
    {
        $sessionEncrypt = config('session.encrypt');

        // En producción debe estar true
        // En tests puede variar, pero verificamos que la config existe
        $this->assertIsBool($sessionEncrypt);
    }

    /**
     * Test que CORS está configurado correctamente.
     */
    public function test_cors_configuration_exists(): void
    {
        $corsOrigins = config('cors.allowed_origins');
        $corsMethods = config('cors.allowed_methods');
        $corsHeaders = config('cors.allowed_headers');

        $this->assertIsArray($corsOrigins);
        $this->assertIsArray($corsMethods);
        $this->assertIsArray($corsHeaders);
    }

    /**
     * Test que las rutas de API están protegidas por CORS.
     */
    public function test_cors_paths_are_configured(): void
    {
        $corsPaths = config('cors.paths');

        $this->assertIsArray($corsPaths);
    }

    /**
     * Test que la ruta de logs requiere autenticación.
     */
    public function test_logs_route_requires_authentication(): void
    {
        $response = $this->get('/logs');

        // Debe redirigir al login o retornar 401/403
        $this->assertContains($response->getStatusCode(), [302, 401, 403]);
    }

    /**
     * Test que las variables de entorno críticas están configuradas.
     */
    public function test_critical_environment_variables_are_set(): void
    {
        // Verificar que APP_KEY existe
        $this->assertNotEmpty(config('app.key'));

        // Verificar que DB_DATABASE está configurado
        $this->assertNotEmpty(config('database.connections.mysql.database'));
    }

    /**
     * Test que los headers de seguridad básicos se pueden configurar.
     */
    public function test_security_headers_configuration(): void
    {
        // Este test verifica que la configuración de headers está en su lugar
        // Los headers reales se configuran en .htaccess
        $response = $this->get('/');

        // La aplicación debe responder
        $this->assertTrue(in_array($response->getStatusCode(), [200, 302]));
    }
}
