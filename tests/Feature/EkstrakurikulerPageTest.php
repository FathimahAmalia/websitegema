<?php

namespace Tests\Feature;

use Tests\TestCase;

class EkstrakurikulerPageTest extends TestCase
{
    public function test_extracurricular_page_shows_the_programs_and_shared_navigation(): void
    {
        $response = $this->get('/ekstrakurikuler');

        $response->assertOk()
            ->assertSee('Temukan minatmu')
            ->assertSee('Cyber Security Club')
            ->assertSee('Robotika &amp; IoT', false)
            ->assertSee('Paskibra &amp; Pasus', false)
            ->assertSee('Futsal &amp; E-Sport', false)
            ->assertSee('English Debate Club')
            ->assertSee('Desain &amp; Multimedia', false)
            ->assertSee('PENGEMBANGAN MINAT & BAKAT', false)
            ->assertSee(route('ekstrakurikuler.index'), false)
            ->assertSee('class="nav-link active dropdown-toggle"', false);

        $this->assertSame(6, substr_count($response->getContent(), 'class="extracurricular-card"'));
    }

    public function test_homepage_extracurricular_menu_opens_the_dedicated_page(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('href="' . route('ekstrakurikuler.index') . '"', false);
    }
}
