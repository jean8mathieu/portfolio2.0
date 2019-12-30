<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Accessing home page directly
     */
    public function testAccessingHomepageDirectly()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
    }

    /**
     * Accessing home page with route
     */
    public function testAccessingHomepageWithRoute()
    {
        $response = $this->get(route('home.index'));
        $response->assertSuccessful();
    }

    /**
     * Accessing the tag page
     */
    public function testAccessingTagPage()
    {
        $tag = factory(Tag::class)->create();
        $response = $this->get(route('home.tag', [$tag]));

        $response->assertSuccessful();
    }

    /**
     * Accessing the tag page with a tag that do not exist
     */
    public function testAccessingTagPageThatDoNotExist()
    {
        $response = $this->get(route('home.tag', ['dsadsad']));
        $response->assertNotFound();
    }

    /**
     * Accessing the about page
     */
    public function testAccessingAboutPage()
    {
        $response = $this->get(route('home.about'));
        $response->assertSuccessful();
    }

    /**
     * Accessing the contact page
     */
    public function testAccessingContactPage()
    {
        $response = $this->get(route('home.contact'));
        $response->assertSuccessful();
    }
}
