<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signInAdmin($admin = null)
    {
        $admin = $admin ?: factory(\App\User::class)->create();

        config(['bookstore.administrators' => [$admin->email]]);

        $this->actingAs($admin);

        return $this;
    }
}
