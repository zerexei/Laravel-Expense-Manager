<x-layouts.main title="Expense Category" breadcrum="Expense Management > Expense Categories">
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
                    @foreach ($categories as $category)

                    <tr>
                        <td class="pl-2">{{ $category->name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">{{ $category->description }}</td>
                        <td class="pl-2">{{ $category->created_at }}</td>
                        <td><a href="{{ route('categories.edit', $category) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <button class="btn">Add Role</button>
        </div>

        <div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="Display Name" />
                <input type="text" name="description" id="description" placeholder="Description" />
                <button class="btn">Save</button>
            </form>
        </div>
    </div>
</x-layouts.main>
