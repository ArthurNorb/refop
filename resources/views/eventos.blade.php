@extends('layouts.app')

@section('title', 'REFOP - Eventos')

@section('content')

    <h2 class="mt-4 mb-3">Próximos Eventos</h2>

    <div class="feed row justify-content-center">
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title fs-5 mb-2">
                        <a href="#" class="text-decoration-none text-azul-escuro">Festa das Luzes</a>
                    </h3>
                    <p class="card-text text-muted">Data: 10 de maio de 2025</p>
                    <p class="card-text text-muted">Local: Praça da UFOP</p>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title fs-5 mb-2">
                        <a href="#" class="text-decoration-none text-azul-escuro">Assembleia Geral das Repúblicas</a>
                    </h3>
                    <p class="card-text text-muted">Data: 25 de maio de 2025</p>
                    <p class="card-text text-muted">Local: Auditório da Escola de Minas</p>
                </div>
            </div>
        </div>
    </div>

@endsection