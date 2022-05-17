<x-layouts.app>
    <div class="flex">
        <div class="w-1/5 min-h-screen p-6 border-2 border-black space-y-12">
            <div class="space-y-2">
                <div>
                    <img src="https://picsum.photos/200" alt="profile image"
                        class="object-fill w-24 h-24 rounded-full" />
                </div>
                <h1>{{ $user->name }}</h1>
            </div>

            <nav class="flex flex-col space-y-2">
                <a href="#">Dashboard</a>

                <a href="#">User Management</a>
                <div class="flex flex-col ml-3 space-y-2">
                    <a href="#">Roles</a>
                    <a href="#">Users</a>
                </div>

                <a href="#">Expense Management</a>
                <div class="flex flex-col ml-3 space-y-2">
                    <a href="#">Expense Category</a>
                    <a href="#">Expense</a>
                </div>
            </nav>

        </div>
        <div class="flex-1 border-2 border-red-700"></div>
    </div>

</x-layouts.app>
