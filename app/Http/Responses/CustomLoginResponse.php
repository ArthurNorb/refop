<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log; // Para debugging
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify; // Para usar a URL de fallback definida em Fortify::redirects

class CustomLoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        Log::info('CustomLoginResponse: toResponse() FOI CHAMADO.'); // LOG 6

        // Você pode adicionar lógica aqui se precisar verificar o "intended URL"
        // $intended = $request->session()->pull('url.intended', Fortify::redirects('login'));
        // Log::info('CustomLoginResponse: Intended URL era: ' . $intended);

        // Forçar sempre o redirecionamento para '/'
        $redirectTo = '/';
        Log::info('CustomLoginResponse: Redirecionando para: ' . $redirectTo); // LOG 7

        return $request->wantsJson()
                    ? new JsonResponse('', 204)
                    : redirect()->to($redirectTo); // Usar to() para ser explícito
    }
}