<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiagramTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->seed();
    }

    public function test_diagram_page_renders_chart(): void
    {
        $resp = $this->get(route('diagram.index'));
        $resp->assertOk();
        $resp->assertSee('Mintastatisztika'); // Chart dataset label
    }
}
