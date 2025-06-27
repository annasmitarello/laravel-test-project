<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Persona;
use App\Models\Auto;


class PersonaAutoRelationshipTest extends TestCase
{

    public function test_una_persona_puede_tener_varios_autos()
    {
        // Crear una persona y dos autos
        
        $persona = Persona::factory()->create();
        $auto1 = Auto::factory()->create();
        $auto2 = Auto::factory()->create();

        // Asociar los autos a la persona
        $persona->autos()->attach([$auto1->id, $auto2->id]);

        // Verificar la relación
        $this->assertCount(2, $persona->autos);
        $this->assertTrue($persona->autos->contains($auto1));
        $this->assertTrue($persona->autos->contains($auto2));
    }

    
    public function test_un_auto_puede_pertenecer_a_varias_personas()
    {
        // Crear un auto y dos personas
        $auto = Auto::factory()->create();
        $persona1 = Persona::factory()->create();
        $persona2 = Persona::factory()->create();

        // Asociar el auto a las personas
        $auto->personas()->attach([$persona1->id, $persona2->id]);

        // Verificar la relación
        $this->assertCount(2, $auto->personas);
        $this->assertTrue($auto->personas->contains($persona1));
        $this->assertTrue($auto->personas->contains($persona2));
    }

    
    public function test_se_puede_desasociar_un_auto_de_una_persona()
    {
        $persona = Persona::factory()->create();
        $auto = Auto::factory()->create();
        
        $persona->autos()->attach($auto);
        $this->assertCount(1, $persona->autos);
        
        $persona->autos()->detach($auto);
        $this->assertCount(0, $persona->fresh()->autos);
    }

    
    public function test_se_puede_acceder_a_la_relacion_desde_ambos_modelos()
    {
        $persona = Persona::factory()->create();
        $auto = Auto::factory()->create();
        
        $persona->autos()->attach($auto);
        
        // Verificar desde persona
        $this->assertEquals($auto->id, $persona->autos->first()->id);
        
        // Verificar desde auto
        $this->assertEquals($persona->id, $auto->personas->first()->id);
    }

    
}