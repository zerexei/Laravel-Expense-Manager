<div class="w-1/5 min-h-screen p-6 border-2 border-black space-y-12">
    <div class="space-y-2">
        <div>
            <img src="https://picsum.photos/200" alt="profile image" class="object-fill w-24 h-24 rounded-full" />
        </div>
        <h1>{{ auth()->user()->name }}</h1>
    </div>

    <nav class="flex flex-col space-y-2">
        <a href="{{ route('dashboard') }}">Dashboard</a>

        <a href="#">User Management</a>
        <div class="flex flex-col ml-3 space-y-2">
            <a href="{{ route('roles.index') }}">Roles</a>
            <a href="{{ route('users.index') }}">Users</a>
        </div>

        <a href="#">Expense Management</a>
        <div class="flex flex-col ml-3 space-y-2">
            <a href="{{ route('categories.index') }}">Expense Category</a>
            <a href="{{ route('expenses.index') }}">Expense</a>
        </div>
    </nav>

</div>
