<x-layouts.main title="Roles" breadcrum="User Management > Roles">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <table class="table-fixed border-2 border-black">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="w-2/4">Display Name</th>
                        <th class="w-1/4 border-l-2 border-r-2 border-black">Amount</th>
                        <th class="w-1/4">Entry Date</th>
                        <th class="w-1/4">Created At</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)

                    <tr>
                        <td class="pl-2">{{ $expense->categories->name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">{{ $expense->amount }}</td>
                        <td class="pl-2">{{ $expense->entry_date }}</td>
                        <td class="pl-2">{{ $expense->created_at }}</td>
                        <td><a href="{{ route('expenses.edit', $expense) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <button class="btn">Add Role</button>
        </div>

        <div>
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="Display Name" />
                <input type="text" name="description" id="description" placeholder="Description" />
                <button class="btn">Save</button>
            </form>
        </div>
    </div>
</x-layouts.main>
