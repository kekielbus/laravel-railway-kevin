<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Camiseta;

class CamisetaTest extends TestCase
{
    use RefreshDatabase;

    public function test_listado_de_camisetas()
    {
        Camiseta::factory()->count(5)->create();

        $response = $this->getJson('/api/camisetas');

        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }

    public function test_crear_una_camiseta()
    {
        $data = [
            'nombre' => 'Psg',
            'precio' => '100',
            'descripcion' => 'Unisex'
        ];

        $response = $this->postJson('/api/camisetas', $data);

        $response->assertStatus(201)
             ->assertJsonFragment(['nombre' => 'Psg']);
    }

    public function test_eliminar_camiseta()
    {
        $camiseta = Camiseta::factory()->create();

        $response = $this->deleteJson("/api/camisetas/{$camiseta->id}");

        $response->assertStatus(200);
    }
}
