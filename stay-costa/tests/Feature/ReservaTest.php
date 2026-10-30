<?php

namespace Tests\Feature;

use App\Models\Propiedades;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaTest extends TestCase
{
    use RefreshDatabase;

    private function propiedad(array $overrides = []): Propiedades
    {
        return Propiedades::create(array_merge([
            'titulo' => 'Villa Test',
            'descripcion' => 'Descripción de prueba',
            'precio_noche' => 100.00,
            'ubicacion' => 'Playa El Tunco',
            'habitaciones' => 2,
            'imagen_url' => 'https://example.com/foto.jpg',
            'activo' => true,
        ], $overrides));
    }

    private function cliente(array $overrides = []): User
    {
        return User::create(array_merge([
            'name' => 'Cliente Test',
            'email' => 'cliente@test.com',
            'password' => 'password123',
            'rol' => 'cliente',
            'activo' => true,
        ], $overrides));
    }

    private function datosReserva(Propiedades $propiedad, array $overrides = []): array
    {
        return array_merge([
            'propiedad_id' => $propiedad->id,
            'nombre_cliente' => 'Cliente Test',
            'email_cliente' => 'cliente@test.com',
            'fecha_inicio' => now()->addDays(2)->toDateString(),
            'fecha_fin' => now()->addDays(5)->toDateString(),
            'huespedes' => 2,
        ], $overrides);
    }

    public function test_no_permite_reservas_superpuestas(): void
    {
        $propiedad = $this->propiedad();
        $cliente = $this->cliente();

        Reserva::create([
            'propiedad_id' => $propiedad->id,
            'user_id' => $cliente->id,
            'nombre_cliente' => 'Otro Cliente',
            'email_cliente' => 'otro@test.com',
            'fecha_inicio' => now()->addDays(2)->toDateString(),
            'fecha_fin' => now()->addDays(6)->toDateString(),
            'huespedes' => 1,
            'total_pago' => 400,
            'estado' => 'confirmada',
        ]);

        $this->actingAs($cliente)
            ->post('/reservas', $this->datosReserva($propiedad, [
                'fecha_inicio' => now()->addDays(4)->toDateString(),
                'fecha_fin' => now()->addDays(8)->toDateString(),
            ]))
            ->assertSessionHasErrors('fecha_inicio');

        $this->assertDatabaseCount('reservas', 1);
    }

    public function test_permite_reservas_que_inician_cuando_termina_otra(): void
    {
        $propiedad = $this->propiedad();
        $cliente = $this->cliente();

        Reserva::create([
            'propiedad_id' => $propiedad->id,
            'user_id' => $cliente->id,
            'nombre_cliente' => 'Otro Cliente',
            'email_cliente' => 'otro@test.com',
            'fecha_inicio' => now()->addDays(2)->toDateString(),
            'fecha_fin' => now()->addDays(5)->toDateString(),
            'huespedes' => 1,
            'total_pago' => 300,
            'estado' => 'confirmada',
        ]);

        $this->actingAs($cliente)
            ->post('/reservas', $this->datosReserva($propiedad, [
                'fecha_inicio' => now()->addDays(5)->toDateString(),
                'fecha_fin' => now()->addDays(7)->toDateString(),
            ]))
            ->assertRedirect('/propiedades/'.$propiedad->id);

        $this->assertDatabaseCount('reservas', 2);
    }

    public function test_valida_maximo_de_huespedes_en_el_servidor(): void
    {
        $propiedad = $this->propiedad(['habitaciones' => 1]); // máximo 2 huéspedes
        $cliente = $this->cliente();

        $this->actingAs($cliente)
            ->post('/reservas', $this->datosReserva($propiedad, ['huespedes' => 5]))
            ->assertSessionHasErrors('huespedes');

        $this->assertDatabaseCount('reservas', 0);
    }

    public function test_no_permite_reservar_una_propiedad_inactiva(): void
    {
        $propiedad = $this->propiedad(['activo' => false]);
        $cliente = $this->cliente();

        $this->actingAs($cliente)
            ->post('/reservas', $this->datosReserva($propiedad))
            ->assertSessionHasErrors('propiedad_id');

        $this->assertDatabaseCount('reservas', 0);
    }

    public function test_invitado_no_puede_ver_mis_reservas(): void
    {
        $this->get('/mis-reservas')->assertRedirect('/login');
    }

    public function test_usuario_inactivo_no_puede_iniciar_sesion(): void
    {
        $this->cliente(['activo' => false]);

        $this->from('/login')
            ->post('/login', [
                'email' => 'cliente@test.com',
                'password' => 'password123',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_logout_muestra_el_mensaje_de_exito(): void
    {
        $this->actingAs($this->cliente())
            ->post('/logout')
            ->assertRedirect('/')
            ->assertSessionHas('exito');

        $this->assertGuest();
    }

    public function test_el_mensaje_flash_se_muestra_una_sola_vez(): void
    {
        $mensaje = 'Mensaje de prueba sin duplicar';

        $respuesta = $this->withSession(['error' => $mensaje])
            ->get('/login')
            ->assertOk();

        // El layout global es el único que imprime el flash.
        $this->assertSame(1, substr_count($respuesta->getContent(), $mensaje));
    }
}
