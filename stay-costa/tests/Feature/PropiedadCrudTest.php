<?php

namespace Tests\Feature;

use App\Models\Propiedades;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropiedadCrudTest extends TestCase
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

    private function usuario(string $rol = 'cliente'): User
    {
        return User::create([
            'name' => 'Usuario '.$rol,
            'email' => $rol.'@test.com',
            'password' => 'password123',
            'rol' => $rol,
            'activo' => true,
        ]);
    }

    private function datosPropiedad(array $overrides = []): array
    {
        return array_merge([
            'titulo' => 'Nueva Propiedad',
            'descripcion' => 'Descripción de la nueva propiedad',
            'ubicacion' => 'El Zonte',
            'precio_noche' => 150.50,
            'habitaciones' => 3,
            'imagen_url' => 'https://example.com/nueva.jpg',
        ], $overrides);
    }

    // ---------- Lectura pública (solo activas) ----------

    public function test_home_solo_muestra_propiedades_activas(): void
    {
        $this->propiedad(['titulo' => 'Activa Visible']);
        $this->propiedad(['titulo' => 'Inactiva Oculta', 'activo' => false]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Activa Visible')
            ->assertDontSee('Inactiva Oculta');
    }

    public function test_catalogo_solo_muestra_propiedades_activas(): void
    {
        $this->propiedad(['titulo' => 'Activa Visible']);
        $this->propiedad(['titulo' => 'Inactiva Oculta', 'activo' => false]);

        $this->get('/propiedades')
            ->assertOk()
            ->assertSee('Activa Visible')
            ->assertDontSee('Inactiva Oculta');
    }

    public function test_detalle_de_propiedad_inactiva_devuelve_404(): void
    {
        $inactiva = $this->propiedad(['activo' => false]);

        $this->get('/propiedades/'.$inactiva->id)->assertNotFound();
    }

    public function test_buscador_excluye_propiedades_inactivas(): void
    {
        $this->propiedad(['titulo' => 'Villa Sol Activa']);
        $this->propiedad(['titulo' => 'Villa Sol Inactiva', 'activo' => false]);

        $this->getJson('/buscar-propiedades?q=Sol')
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonFragment(['titulo' => 'Villa Sol Activa'])
            ->assertJsonMissing(['titulo' => 'Villa Sol Inactiva']);
    }

    // ---------- CRUD administrativo ----------

    public function test_admin_puede_ver_activas_e_inactivas_en_el_panel(): void
    {
        $this->propiedad(['titulo' => 'Propiedad Activa']);
        $this->propiedad(['titulo' => 'Propiedad Inactiva', 'activo' => false]);

        $this->actingAs($this->usuario('administrador'))
            ->get('/admin/propiedades')
            ->assertOk()
            ->assertSee('Propiedad Activa')
            ->assertSee('Propiedad Inactiva')
            ->assertSee('Inactiva');
    }

    public function test_admin_puede_crear_propiedad(): void
    {
        $this->actingAs($this->usuario('administrador'))
            ->post('/admin/propiedades', $this->datosPropiedad())
            ->assertRedirect('/admin/propiedades');

        $this->assertDatabaseHas('propiedades', [
            'titulo' => 'Nueva Propiedad',
            'activo' => true,
        ]);
    }

    public function test_crear_propiedad_valida_los_campos(): void
    {
        $this->actingAs($this->usuario('administrador'))
            ->post('/admin/propiedades', [
                'titulo' => '',
                'descripcion' => '',
                'ubicacion' => '',
                'precio_noche' => -10,
                'habitaciones' => 0,
                'imagen_url' => 'no-es-url',
            ])
            ->assertSessionHasErrors(['titulo', 'descripcion', 'ubicacion', 'precio_noche', 'habitaciones', 'imagen_url']);

        $this->assertDatabaseCount('propiedades', 0);
    }

    public function test_admin_puede_editar_una_propiedad(): void
    {
        $propiedad = $this->propiedad();
        $admin = $this->usuario('administrador');

        $this->actingAs($admin)
            ->get('/admin/propiedades/'.$propiedad->id.'/editar')
            ->assertOk()
            ->assertSee('Villa Test');

        $this->actingAs($admin)
            ->put('/admin/propiedades/'.$propiedad->id, $this->datosPropiedad(['titulo' => 'Villa Actualizada']))
            ->assertRedirect('/admin/propiedades');

        $this->assertDatabaseHas('propiedades', [
            'id' => $propiedad->id,
            'titulo' => 'Villa Actualizada',
        ]);
    }

    public function test_destroy_hace_borrado_logico(): void
    {
        $propiedad = $this->propiedad();

        $this->actingAs($this->usuario('administrador'))
            ->delete('/admin/propiedades/'.$propiedad->id)
            ->assertRedirect('/admin/propiedades');

        // Sigue existiendo en la base, pero desactivada.
        $this->assertDatabaseHas('propiedades', [
            'id' => $propiedad->id,
            'activo' => false,
        ]);

        // Y deja de ser visible en el sitio público.
        $this->get('/propiedades/'.$propiedad->id)->assertNotFound();
        $this->get('/propiedades')->assertOk()->assertDontSee($propiedad->titulo);
    }

    public function test_admin_puede_reactivar_una_propiedad(): void
    {
        $propiedad = $this->propiedad(['activo' => false]);

        $this->actingAs($this->usuario('administrador'))
            ->patch('/admin/propiedades/'.$propiedad->id.'/activar')
            ->assertRedirect('/admin/propiedades');

        $this->assertDatabaseHas('propiedades', [
            'id' => $propiedad->id,
            'activo' => true,
        ]);
    }

    public function test_cliente_no_puede_gestionar_propiedades(): void
    {
        $cliente = $this->usuario('cliente');
        $propiedad = $this->propiedad();

        $this->actingAs($cliente)->get('/admin/propiedades')->assertRedirect('/');
        $this->actingAs($cliente)->get('/admin/propiedades/'.$propiedad->id.'/editar')->assertRedirect('/');
        $this->actingAs($cliente)->delete('/admin/propiedades/'.$propiedad->id)->assertRedirect('/');

        $this->assertDatabaseHas('propiedades', [
            'id' => $propiedad->id,
            'activo' => true,
        ]);
    }
}
