<x-layouts.main title="Roles" breadcrum="User Management > Roles">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <table class="table-fixed border-2 border-black">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="w-1/4">Display Name</th>
                        <th class="w-2/4 border-l-2 border-r-2 border-black">Description</th>
                        <th class="w-1/4">Created At</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)

                    <tr>
                        <td class="pl-2">{{ $role->name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">{{ $role->description }}</td>
                        <td class="pl-2">{{ $role->created_at }}</td>
                        <td><a href="{{ route('roles.edit', $role) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
