@extends('layouts.app')

@section('title', 'REFOP - Repúblicas')

@section('content')

    <h2 class="mt-4 mb-3">Repúblicas Federais</h2>

    <div class="feed row justify-content-center">
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title fs-5 mb-2">
                        <a href="#" class="text-decoration-none text-azul-escuro">República Liberdade</a>
                    </h3>
                    <p class="card-text text-muted">Endereço: Rua das Repúblicas, 123 - Ouro Preto</p>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title fs-5 mb-2">
                        <a href="#" class="text-decoration-none text-azul-escuro">República Esperança</a>
                    </h3>
                    <p class="card-text text-muted">Endereço: Rua São José, 456 - Ouro Preto</p>
                </div>
            </div>
        </div>
    </div>
    @endsection
