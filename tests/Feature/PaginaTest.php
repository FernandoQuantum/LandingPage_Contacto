<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_landing_page(){
        $response = $this->get('/landing');

        $response->assertStatus(200);
    }

    public function test_insercion_registro(){
        
        $response = $this->post('/recepcion-validacion', [
            'name' => 'Test Prueba',
            'email' => 'test@gmail.com',
            'suggestions' => 'Registro desde test'
        ]);
        
        $response->assertStatus(200);
    }

    public function test_validacion_formulario(){
        
        $response = $this->post('/recepcion-validacion', [
            'name' => '',
            'email' => 'correonovalido',
            'suggestions' => ''
        ]);
        
        $response->assertSessionHasErrors(['name', 'email', 'suggestions']);
    }

    public function test_prellenado_formulario(){

        $response = $this->get('/contacto/1234');

        $response->assertStatus(200);

        $this->assertEquals("fer@gmail.com", $response['email']);
        
        $this->assertEquals("Fercho", $response['name']);

    }
}
