<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projeler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('projects.create') }}"
                    class="px-3 py-1 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Proje Ekle
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-base text-gray-900 dark:text-white">
                                Proje Adı
                            </th>
                            <th scope="col" class="px-6 py-3 text-base text-gray-900 dark:text-white">
                                Beceri Adı
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Proje Url
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-base text-gray-900 dark:text-white">
                                Resim
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ App\Models\Skill::skill->name }} --}}
                        @forelse ($projects as $project)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $project->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $project->skill->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <img class="w-14 h-14" src=" {{ asset('storage/' . $project->image) }}"
                                        alt="">
                                </td>

                                <td class="flex justify-end px-6 py-4">
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                        class="px-3 py-1 bg-green-500 hover:bg-green-700 rounded-lg text-white">Güncelle</a>
                                    -
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                        class="px-3 py-1 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                            onclick="return confirm('Projeyi Silmek İstediğinize Eminmisiniz')">Sil
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <h2 style="margin-top: 12px">Proje Bulunmamakta ...</h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
