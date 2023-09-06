<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        // Log::info("Hello Info", ['user' => "jhondoe"]);
        // Log::warning("Hello Warning", ['user' => 'jhondoe']);

        Log::withContext(['user' => 'jhondoe']);
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testChannel()
    {
        $stderrLogger = Log::channel('stderr');
        $stderrLogger->error("Hello Channel STDERR"); // log akan spesifik hanya dikirim ke  channel stderr

        // Log::warning("Hello Warning Laravel"); // log akan spesifik hanya dikirim ke channel default
        self::assertTrue(true);
    }
}