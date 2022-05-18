<x-layouts.main title="Users" breadcrum="User Management > Users">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <user-list :users="{{ $users }}" :roles="{{ $roles }}"></user-list>
        </div>
    </div>
</x-layouts.main>
