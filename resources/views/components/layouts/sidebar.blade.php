<div class="w-1/5 min-h-screen p-6 border-2 border-black space-y-12">
    {{-- USER INFO --}}
    <div class="space-y-2">
        <div>
            <img src="https://picsum.photos/200" alt="profile image" class="object-fill w-24 h-24 rounded-full" />
        </div>

        <h1>{{ auth()->user()->name }} ({{ auth()->user()->active_role }})</h1>
    </div>

    {{-- NAVBAR --}}
    <nav class="flex flex-col space-y-2">
        <a href="{{ route('dashboard') }}">Dashboard</a>

        {{-- USER MANAGEMENT --}}
        <a href="#">User Management</a>
        <div class="flex flex-col ml-3 space-y-2">
            @if(auth()->user()->is_admin)
            <a href="{{ route('admin.roles.index') }}">Roles</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            @endif
            <a href="{{ route('password.edit') }}">Change password</a>
        </div>

        {{-- EXPENSE MANAGEMENT --}}
        <a href="#">Expense Management</a>
        <div class="flex flex-col ml-3 space-y-2">
            @if(auth()->user()->is_admin)
            <a href="{{ route('admin.categories.index') }}">Expense Category</a>
            @endif
            <a href="{{ route('admin.expenses.index') }}">Expense</a>
        </div>
    </nav>

</div>
