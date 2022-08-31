<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_list_participants()
    {
        $response = $this->get('/api/users/listParticipants/1');

        $response->assertStatus(200);
    }

    public function test_list_incidences()
    {
        $response = $this->get('/api/users/listIncidences/1');

        $response->assertStatus(200);
    }

    public function test_list_activities()
    {
        $response = $this->get('/api/users/listActivities/1');

        $response->assertStatus(200);
    }

    public function test_asign_to_activity()
    {
        $response = $this->post('/api/users/asign/1', 
        [   'user_id' => 1,
            'activity_id' => 1,
        ]);

        $response->assertStatus(200);
    }

    public function test_asign_to_project()
    {
        $response = $this->post('/api/users/asign/2', 
        [   'user_id' => 1,
            'project_id' => 1,
        ]);

        $response->assertStatus(200);
    }

    public function test_asign_to_incidence()
    {
        $response = $this->post('/api/users/asign/3',
        [   'user_id' => 1,
            'incidence_id' => 1,
        ]);

        $response->assertStatus(200);
    }
}
