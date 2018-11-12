<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $headers = ['Accept' => 'application/json'];

    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $applicationJson = $this->transformHeadersToServerVars($this->headers);
        $server = array_merge($server, $applicationJson);
        return parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
    }

    public function login($user = null)
    {
        $user = $user ? : factory(User::class)->create();
        $token = auth()->login($user);

        $this->headers['Authorization'] = 'Bearer ' . $token;

        return $this;
    }
}
