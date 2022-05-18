<x-layouts.main title="Roles" breadcrum="User Management > Roles">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <role-list :roles="{{ $roles }}"></role-list>
        </div>

    </div>
</x-layouts.main>
