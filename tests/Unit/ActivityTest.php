<?php

namespace Tests\Unit;

use Tests\TestCase;
use Carbon\Carbon;

class ActivityTest extends TestCase
{
    public function test_create_activity()
    {
        $response = $this->post('/api/createActivity/', 
        [   'user_id' => 1,
            'project_id' => 1,
            'name' => 'Actividad de prueba',
            'description' => 'Lorem ipsum',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        $response->assertStatus(200);
    }
}
