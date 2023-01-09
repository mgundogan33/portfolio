<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beceriler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('skills.create') }}"
                    class="px-3 py-1 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Beceri Ekle
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Beceri Adı
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Resim
                            </th>
                            <th scope="col" class="btn btn-success px-6 py-3">
                                {{-- Güncelle / Sil --}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skills as $skill)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $skill->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <img class="w-14 h-14" src="{{ asset('storage/' . $skill->image) }}" alt="">
                                </td>
                                <td class="flex justify-end px-6 py-4">
                                    <a href="{{ route('skills.edit', $skill->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Güncelle</a>
                                    -
                                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('skills.destroy', $skill->id) }}" onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline rounded-full">Sil</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <h2 style="margin-top: 12px">Beceri Bulunmamakta ...</h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
