@extends('layouts.app')

@section('title', 'REFOP - Início')

@section('content')

    <h2 class="mt-4 mb-3 text-azul-mais-escuro fw-semibold">Atualizações Recentes</h2>

    <div class="feed row justify-content-center">
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title fs-5 mb-2">
                        <a href="#" class="text-decoration-none text-azul-escuro fw-semibold">Prestação de
                            contas - Março 2025</a>
                    </h3>
                    <p class="card-text text-muted">O documento de prestação de contas está disponível para visualização.</p>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title fs-5 mb-2">
                        <a href="#"
                            class="text-decoration-none text-azul-escuro fw-semibold">Solicitação de evento -
                            Festa das Luzes</a>
                    </h3>
                    <p class="card-text text-muted">Repúblicas interessadas devem preencher o formulário até 30/04.</p>
                </div>
            </div>
        </div>

    @endsection
