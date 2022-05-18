@props(['title', 'breadcrum'])

<x-layouts.app>
    <div class="flex">
        {{-- SIDEBAR --}}
        <x-layouts.sidebar></x-layouts.sidebar>
        <div class="flex-1">

            {{-- NAVBAR --}}
            <div class="border-b-2">
                <x-navbar></x-navbar>
            </div>

            {{-- TITLE --}}
            <div class="flex justify-between p-6">
                <h3>{{ $title }}</h3>
                <h3>{{ $breadcrum }}</h3>
            </div>

            {{-- MAIN CONTENT --}}
            <div class="p-2 px-12">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>
