<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecurityTest extends TestCase
{
    /**
     * Test sensitive admin and maintenance routes require authentication.
     */
    public function test_sensitive_routes_require_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/limparcache')->assertRedirect('/login');
        $this->get('/storagelink')->assertRedirect('/login');
        $this->get('/gerar-sitemap')->assertRedirect('/login');
        $this->post('/admin/toggle-situacao', ['model' => 'Banner', 'id' => 1, 'situacao' => '1'])->assertRedirect('/login');
    }

    /**
     * Test locale change accepts valid locales and discards invalid ones.
     */
    public function test_locale_change_validates_input(): void
    {
        $response = $this->get('/google/translate/change?lang=en');
        $response->assertSessionHas('locale', 'en');

        $responseInvalid = $this->get('/google/translate/change?lang=malicious_payload');
        $responseInvalid->assertSessionHas('locale', 'pt-BR');
    }
}
