<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsertProfileUserSuccess()
    {
        $response = $this->postJson('api/user/profile', [
            'phone' => '081229',
            'gender_id' => 1,
            'city' => 'Jakarta',
            'photo_path' => '/image/exmaple.jpg',
            'address' => 'lorem ipsum',
            'birth_date' => '10-12-2018',
            'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing'
        ]);

        $response->assertSuccessful();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetUserDataExample()
    {
        $response = $this->get('api/auth/me');

        $response->assertSuccessful()
            ->assertJsonStructure(['data' => ['id', 'name', 'email', 'created_at', 'updated_at']]);
    }
}
