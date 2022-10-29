<?php

namespace Tests\Feature;

use App\Models\Representative;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepresentativeTest extends TestCase
{
    public function test_representative_list()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_representative_create()
    {
        $user = Representative::factory()->create();
        $user = $user->toArray();
        $this->assertDatabaseHas('representatives',$user);
    }

    public function test_representative_delete()
    {
        $user = Representative::factory()->create();

        if ($user){
            $user->delete();
        }

        $this->assertSoftDeleted('representatives',$user->toArray());
    }
}
