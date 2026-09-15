<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Novo Contato Recebido</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            margin: 0;
            padding: 24px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .header {
            border-bottom: 2px solid #e6461e;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }
        .header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
        }
        .header p {
            margin: 4px 0 0;
            color: #64748b;
            font-size: 14px;
        }
        .field {
            margin-bottom: 16px;
        }
        .field-label {
            font-weight: 600;
            font-size: 13px;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
        }
        .field-value {
            font-size: 15px;
            color: #1e293b;
            background-color: #f8fafc;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }
        .message-box {
            white-space: pre-wrap;
            line-height: 1.6;
        }
        .footer {
            margin-top: 32px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #94a3b8;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Novo Contato Recebido</h2>
            <p>Mensagem enviada através do formulário de contato do site MetalMar.</p>
        </div>

        <div class="field">
            <div class="field-label">Nome Completo</div>
            <div class="field-value">{{ $contato->nome }}</div>
        </div>

        <div class="field">
            <div class="field-label">E-mail</div>
            <div class="field-value"><a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a></div>
        </div>

        <div class="field">
            <div class="field-label">Telefone / WhatsApp</div>
            <div class="field-value"><a href="tel:{{ $contato->telefone }}">{{ $contato->telefone }}</a></div>
        </div>

        <div class="field">
            <div class="field-label">Assunto</div>
            <div class="field-value">{{ $contato->assunto }}</div>
        </div>

        <div class="field">
            <div class="field-label">Mensagem</div>
            <div class="field-value message-box">{{ $contato->mensagem }}</div>
        </div>

        <div class="footer">
            Este e-mail foi gerado automaticamente pelo sistema MetalMar.
        </div>
    </div>
</body>
</html>
