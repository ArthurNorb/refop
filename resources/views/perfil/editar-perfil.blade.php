<x-guest-layout>
    <div class="pt-4 bg-refop">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-authentication-card-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Editar Meu Perfil
                </h1>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('perfil.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Nome') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                    </div>

                    <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                        <p class="text-sm text-gray-600">Deixe os campos de senha em branco para não alterá-la.</p>
                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Nova Senha') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirmar Nova Senha') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('meu-perfil') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                            Cancelar
                        </a>
                        
                        <x-button class="ms-4">
                            {{ __('Salvar Alterações') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>