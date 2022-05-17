<x-layouts.main title="Users" breadcrum="User Management > Users">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <table class="table-fixed border-2 border-black">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="w-1/5">Display Name</th>
                        <th class="w-2/5 border-l-2 border-r-2 border-black">Email Adress</th>
                        <th class="w-1/5">Roles</th>
                        <th class="w-1/5">Created At</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td class="pl-2">{{ $user->name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">{{ $user->email }}</td>
                        <td class="pl-2 border-r-2 border-black">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                        <td class="pl-2">{{ $user->created_at }}</td>
                        <td><a href="{{ route('users.edit', $user) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <button class="btn">Add Role</button>
        </div>

        <div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="name" />
                <input type="email" name="email" id="email" placeholder="Email Address" />
                <input type="password" name="password" id="password" placeholder="password" />
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="confirm password" />
                <button class="btn">Save</button>
            </form>
        </div>
    </div>
</x-layouts.main>
