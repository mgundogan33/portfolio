<x-frontend-layout>
    {{-- Hero Primary --}}
    <x-frontend.hero />
    {{-- Promote TAil-100 --}}
    <x-frontend.promote />
    {{-- About Secondary --}}
    <x-frontend.about />
    {{-- Skills tail-100 --}}
    <x-frontend.skills :skills="$skills" />
    {{-- Portfolio Primary --}}
    <x-frontend.portfolio :skills="$skills" :projects="$projects" />
    {{-- Services secondary --}}
    <x-frontend.services/>
    {{-- Contact primary --}}
    <x-frontend.contact/>
</x-frontend-layout>
