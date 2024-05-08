<?php

namespace Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    // setup
    protected function setUp(): void
    {
        parent::setUp();
        // DB::delete("DELETE FROM students");
        // DB::delete("DELETE FROM teachers");
        // DB::delete("DELETE FROM users");
        // DB::delete("DELETE FROM personal_access_tokens");
    }
}
