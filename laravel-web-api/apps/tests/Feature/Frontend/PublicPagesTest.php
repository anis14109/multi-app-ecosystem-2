<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_page_is_accessible(): void
    {
        $this->get(route('frontend.home'))->assertOk();
    }

    public function test_about_page_is_accessible(): void
    {
        $this->get(route('frontend.about'))->assertOk();
    }

    public function test_notice_page_is_accessible(): void
    {
        $this->get(route('frontend.notice.index'))->assertOk();
    }

    public function test_gallery_page_is_accessible(): void
    {
        $this->get(route('frontend.gallery.index'))->assertOk();
    }

    public function test_contact_page_is_accessible(): void
    {
        $this->get(route('frontend.contact'))->assertOk();
    }
}