<?php

namespace Tests\Unit;

use Tests\TestCase;
use Carbon\Carbon;

class IncidenceTest extends TestCase
{
    public function test_create_incidence()
    {
        $response = $this->post('/api/createIncidence/', 
        [   'user_id' => 1,
            'activity_id' => 1,
            'name' => 'Incidencia de prueba',
            'description' => 'Lorem ipsum',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        $response->assertStatus(200);
    }
}
