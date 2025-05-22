<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles / Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-4"> {{-- Elemento de Teste com Bootstrap --}}
        <div class="bg-custom-laranja text-white fs-3 fw-bold p-5 m-3 rounded-3 shadow-lg">
            Bootstrap está funcionando!
        </div>

        <h1 class="display-4 text-primary">
            Bem-vindo ao Laravel!
        </h1>

        <p class="mt-3 text-body-secondary">
            Seu projeto está rodando.
        </p>
    </div>
</body>

</html>
