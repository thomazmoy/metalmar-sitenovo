<?php

namespace Tests\Feature;

use App\Mail\NovoContatoRecebido;
use App\Models\Contato;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContatoTest extends TestCase
{
    public function test_contato_submission_with_honeypot_is_silently_discarded(): void
    {
        Mail::fake();
        $initialCount = Contato::count();

        $response = $this->post('/store', [
            'nome' => 'Spam Bot',
            'email' => 'bot@spammer.com',
            'telefone' => '11999999999',
            'assunto' => 'Oferta imperdível',
            'mensagem' => 'Compre agora mesmo nosso produto incrível!',
            'hp_company_field' => 'Sou um bot preenchendo campo oculto',
        ]);

        $response->assertStatus(302);
        $this->assertSame($initialCount, Contato::count());
        Mail::assertNothingSent();
    }

    public function test_legitimate_contato_submission_creates_record_and_triggers_email(): void
    {
        Mail::fake();

        $response = $this->post('/store', [
            'nome' => 'Cliente Legítimo',
            'email' => 'cliente@empresa.com.br',
            'telefone' => '91988887777',
            'assunto' => 'Orçamento de Manutenção Naval',
            'mensagem' => 'Gostaria de solicitar um orçamento para manutenção.',
            'hp_company_field' => '',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contato', [
            'email' => 'cliente@empresa.com.br',
            'assunto' => 'Orçamento de Manutenção Naval',
        ]);

        Mail::assertSent(NovoContatoRecebido::class);

        // Limpeza do registro criado no teste
        Contato::where('email', 'cliente@empresa.com.br')->delete();
    }
}
