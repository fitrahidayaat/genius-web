<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post('api/users', [
            "email" => "fitrahidayaat@gmail.com",
            "password" => "rahasia123",
            "name" => "Muhammad Ramdhan Fitra Hidayat",
            "role" => "student"
        ])
            ->assertStatus(201)
            ->assertJson([
                "data" => [
                    "email" => "fitrahidayaat@gmail.com",
                    "name" => "Muhammad Ramdhan Fitra Hidayat",
                    "role" => "student"
                ]
            ]);
    }

    public function testRegisterFailed()
    {
        $this->post('api/users', [
            "email" => "test",
            "password" => "",
            "name" => "",
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "email" => [
                        "The email field must be a valid email address."
                    ],
                    "password" => [
                        "The password field is required."
                    ],
                    "name" => [
                        "The name field is required."
                    ],
                    "role" => [
                        "The role field is required."
                    ],
                ],
            ]);
    }
    public function testRegisterUsernameAlreadyExists()
    {
        $this->testRegisterSuccess();
        $this->post('api/users', [
            "email" => "fitrahidayaat@gmail.com",
            "password" => "rahasia123",
            "name" => "Muhammad Ramdhan Fitra Hidayat",
            "role" => "student"
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "email" => [
                        "Email already exists"
                    ]
                ],
            ]);
    }
}
