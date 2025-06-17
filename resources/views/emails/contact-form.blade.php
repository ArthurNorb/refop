<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Mensagem de Contato</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #ddd; border-radius: 5px; max-width: 600px; margin: 20px auto; }
        h2 { color: #1e3a5f; }
        strong { color: #1e3a5f; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nova mensagem recebida pelo site da REFOP</h2>
        <p>Você recebeu uma nova mensagem através do formulário de contato.</p>
        <hr>
        <p><strong>Nome:</strong> {{ $data['nome'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Identificação (Matrícula):</strong> {{ $data['identificacao'] }}</p>
        <p><strong>Telefone:</strong> {{ $data['telefone'] }}</p>
        <hr>
        <h3>Mensagem:</h3>
        <p>
            {!! nl2br(e($data['mensagem'])) !!}
        </p>
    </div>
</body>
</html>