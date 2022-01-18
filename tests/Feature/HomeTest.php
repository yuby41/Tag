<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_empty()
    {
        $this->get('/')
             ->assertStatus(200)
             ->assertSee('No hay etiquetas');
    }

    public function test_withData()
    {
        $tag = Tag::factory()->create();
        
        $this
             ->get('/')
             ->assertStatus(200)
             ->assertSee($tag->name);
    }
}
