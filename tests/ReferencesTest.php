<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReferencesTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function it_shows_references_page()
    {
        $this->visit('/references')
            ->see('Job Application');
    }
}
