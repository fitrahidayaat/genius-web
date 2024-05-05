<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testMobileRegisterTeacherSuccess()
    {
        $this->post('api/register', [
                "email" => "fitrahidayaat@gmail.com",
                "password" => "rahasia123",
                "name" => "Muhammad Ramdhan Fitra Hidayat",
                "role" => "teacher"
            ])
                ->assertStatus(201)
                ->assertJson([
                    "data" => [
                        "email" => "fitrahidayaat@gmail.com",
                        "name" => "Muhammad Ramdhan Fitra Hidayat",
                        "role" => "teacher"
                    ]
            ]);
    }

    public function testWebRegisterTeacherSuccess()
    {
        $this->post('register', [
            "email" => "fitrahidayaat@gmail.com",
            "password" => "rahasia123",
            "name" => "Muhammad Ramdhan Fitra Hidayat",
            "role" => "teacher",
        ])->assertRedirect('/dashboard')
        ->assertSessionHas('token');

        // select first teacher
        $teacher = \App\Models\Teacher::first();
        $this->assertNotNull($teacher);
    }

    public function testWebRegisterStudentSuccess()
    {
        $this->testMobileRegisterTeacherSuccess();
        $teacher = \App\Models\Teacher::first();
        $this->post('register', [
            "email" => "fitrahidayat132@gmail.com",
            "password" => "rahasia123",
            "name" => "Muhammad Ramdhan Fitra Hidayat",
            "role" => "student",
            "invitation_code" => $teacher->code,
        ])->assertRedirect('/dashboard')
        ->assertSessionHas('token');

        // select first student
        $student = \App\Models\Student::first();
        $this->assertNotNull($student);
    }

    public function testMobileRegisterTeacherFailed()
    {
        $this->post('api/register', [
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

    public function testMobileRegisterUsernameAlreadyExists()
    {
        $this->testMobileRegisterTeacherSuccess();
        $this->post('api/register', [
            "email" => "fitrahidayaat@gmail.com",
            "password" => "rahasia123",
            "name" => "Muhammad Ramdhan Fitra Hidayat",
            "role" => "teacher"
        ])
            ->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "message" => [
                        "Email already exists"
                    ]
                ],
            ]);
    }
}
