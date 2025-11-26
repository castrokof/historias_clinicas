<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Ejecutar migraciones y seeders necesarios
        $this->artisan('migrate');
    }

    /**
     * Test que la página de login se puede acceder.
     */
    public function test_login_page_can_be_accessed(): void
    {
        $response = $this->get('/seguridad/login');

        $response->assertStatus(200);
    }

    /**
     * Test que un usuario puede iniciar sesión con credenciales correctas.
     */
    public function test_user_can_login_with_correct_credentials(): void
    {
        // Crear un usuario de prueba
        DB::table('usuario')->insert([
            'papellido' => 'TEST',
            'sapellido' => 'USER',
            'pnombre' => 'PRUEBA',
            'snombre' => null,
            'tipo_documento' => 'CC',
            'documento' => '999999999',
            'usuario' => 'testuser',
            'password' => Hash::make('password123'),
            'email' => 'test@example.com',
            'activo' => 1,
        ]);

        // Crear rol
        $rolId = DB::table('rol')->insertGetId([
            'nombre' => 'Test Role',
            'descripcion' => 'Test Role Description',
        ]);

        // Asignar rol al usuario
        DB::table('usuario_rol')->insert([
            'usuario_id' => 1,
            'rol_id' => $rolId,
        ]);

        // Intentar login
        $response = $this->post('/seguridad/login', [
            'usuario' => 'testuser',
            'password' => 'password123',
        ]);

        $this->assertAuthenticated();
    }

    /**
     * Test que un usuario no puede iniciar sesión con credenciales incorrectas.
     */
    public function test_user_cannot_login_with_incorrect_credentials(): void
    {
        // Crear un usuario de prueba
        DB::table('usuario')->insert([
            'papellido' => 'TEST',
            'sapellido' => 'USER',
            'pnombre' => 'PRUEBA',
            'snombre' => null,
            'tipo_documento' => 'CC',
            'documento' => '999999999',
            'usuario' => 'testuser',
            'password' => Hash::make('password123'),
            'email' => 'test@example.com',
            'activo' => 1,
        ]);

        // Intentar login con contraseña incorrecta
        $response = $this->post('/seguridad/login', [
            'usuario' => 'testuser',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();
    }

    /**
     * Test que un usuario inactivo no puede iniciar sesión.
     */
    public function test_inactive_user_cannot_login(): void
    {
        // Crear un usuario inactivo
        DB::table('usuario')->insert([
            'papellido' => 'INACTIVE',
            'sapellido' => 'USER',
            'pnombre' => 'TEST',
            'snombre' => null,
            'tipo_documento' => 'CC',
            'documento' => '888888888',
            'usuario' => 'inactiveuser',
            'password' => Hash::make('password123'),
            'email' => 'inactive@example.com',
            'activo' => 0,  // Usuario inactivo
        ]);

        // Intentar login
        $response = $this->post('/seguridad/login', [
            'usuario' => 'inactiveuser',
            'password' => 'password123',
        ]);

        $this->assertGuest();
    }

    /**
     * Test que un usuario autenticado puede cerrar sesión.
     */
    public function test_authenticated_user_can_logout(): void
    {
        // Crear un usuario de prueba
        DB::table('usuario')->insert([
            'papellido' => 'TEST',
            'sapellido' => 'USER',
            'pnombre' => 'PRUEBA',
            'snombre' => null,
            'tipo_documento' => 'CC',
            'documento' => '999999999',
            'usuario' => 'testuser',
            'password' => Hash::make('password123'),
            'email' => 'test@example.com',
            'activo' => 1,
        ]);

        // Crear rol
        $rolId = DB::table('rol')->insertGetId([
            'nombre' => 'Test Role',
            'descripcion' => 'Test Role Description',
        ]);

        // Asignar rol al usuario
        DB::table('usuario_rol')->insert([
            'usuario_id' => 1,
            'rol_id' => $rolId,
        ]);

        // Login
        $this->post('/seguridad/login', [
            'usuario' => 'testuser',
            'password' => 'password123',
        ]);

        $this->assertAuthenticated();

        // Logout
        $response = $this->get('/seguridad/logout');

        $this->assertGuest();
    }

    /**
     * Test que rutas protegidas requieren autenticación.
     */
    public function test_protected_routes_require_authentication(): void
    {
        $response = $this->get('/admin/menu');

        // Debe redirigir al login
        $response->assertRedirect('/seguridad/login');
    }
}
