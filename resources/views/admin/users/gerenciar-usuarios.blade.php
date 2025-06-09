<x-guest-layout>
    <div class="pt-4 bg-refop">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-authentication-card-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-5xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Gerenciar Usuários
                </h1>

                <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-refop rounded-md font-semibold text-xs text-refop uppercase tracking-widest hover:bg-refop hover:text-white active:bg-refop focus:outline-none focus:border-refop focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Voltar
                    </a>
                    <a href="{{ route('admin.users.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-refopClaro active:bg-refopClaro focus:outline-none focus:border-refopClaro focus:ring focus:ring-refopClaro disabled:opacity-25 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Criar Novo Usuário
                    </a>
                </div>

                <div class="bg-white rounded-lg overflow-x-auto border border-gray-200">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th
                                    class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th
                                    class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email
                                </th>
                                <th
                                    class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Admin
                                </th>
                                <th
                                    class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500">
                                        Nenhum usuário encontrado.
                                    </td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <a href="{{ route('admin.users.show', $user) }}" class="hover:text-blue-600 underline">{{ $user->name }}</a>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->isAdmin() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $user->isAdmin() ? 'Sim' : 'Não' }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-5 py-4 whitespace-nowrap text-sm font-medium text-right flex flex-row">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="text-slate-600 hover:text-blue-700"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Tem certeza que deseja deletar este usuário: {{ addslashes($user->name) }}? Esta ação não pode ser desfeita.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-slate-600 hover:text-red-600 ml-1 focus:outline-none"
                                                    title="Deletar {{ $user->name }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                @if ($users->hasPages())
                    <div class="mt-8">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
