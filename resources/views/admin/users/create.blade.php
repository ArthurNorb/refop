<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h1 class="text-xl font-semibold text-center text-gray-700 mb-6">
            Cadastrar Novo Usuário
        </h1>

        <x-validation-errors class="mb-4" />

        @if (session('success'))
            <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 border border-green-400 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="block mt-4">
                <label for="is_admin" class="flex items-center">
                    <x-checkbox id="is_admin" name="is_admin" value="1" :checked="old('is_admin')" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Tornar este usuário um administrador?') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ url()->previous() }}"
                    class="inline-block bg-white text-red-600 font-semibold py-1 px-4 border border-red-500 rounded-lg hover:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Cancelar
                </a>
                <x-button class="ms-4">
                    {{ __('Cadastrar Usuário') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
