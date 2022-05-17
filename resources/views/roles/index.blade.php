<x-layouts.main title="Roles" breadcrum="User Management > Roles">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <role-list :roles="{{ $roles }}"></role-list>
        </div>

        <div class="flex justify-end">
            <button class="btn">Add Role</button>
        </div>

        <div>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="Display Name" />
                <input type="text" name="description" id="description" placeholder="Description" />
                <button class="btn">Save</button>
            </form>
        </div>
    </div>
</x-layouts.main>
