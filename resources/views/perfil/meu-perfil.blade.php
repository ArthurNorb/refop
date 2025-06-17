<x-guest-layout>
    <div class="pt-4 bg-refop">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div>
                <a href="/">
                    <x-authentication-card-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <div class="w-full sm:max-w-2xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Meu perfil
                </h1>

                <div class="space-y-4">
                    <div>
                        <strong class="text-gray-700">Nome:</strong>
                        <p class="text-gray-900">{{ $user->name }}</p>
                    </div>
                    <hr>
                    <div>
                        <strong class="text-gray-700">Email:</strong>
                        <p class="text-gray-900">{{ $user->email }}</p>
                    </div>
                    <hr>
                    <div>
                        <strong class="text-gray-700">Administrador:</strong>
                        <p class="text-gray-900">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->isAdmin() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->isAdmin() ? 'Sim' : 'Não' }}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="mt-8 flex flex-col sm:flex-row justify-between items-center gap-3">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-refop rounded-md font-semibold text-xs text-refop uppercase tracking-widest hover:bg-refop hover:text-white active:bg-refop focus:outline-none focus:border-refop focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Voltar
                    </a>

                    <div class="flex gap-3">
                        <a href="{{ route('editar-perfil', $user) }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-refop rounded-md font-semibold text-xs text-refop uppercase tracking-widest hover:bg-refop hover:text-white active:bg-refop focus:outline-none focus:border-refop focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
