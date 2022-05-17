<x-layouts.main title="Expenses" breadcrum="Expense Management > Expenses">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        {{-- TODO: fix overflow --}}
        <div class="overflow-y-auto h-96">
        <expense-list :expenses="{{ $expenses }}"></expense-list>
        </div>

        <div class="flex justify-end">
            <button class="btn">Add Role</button>
        </div>

        <div>
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <select name="category" id="category" class="w-full p-2 border border-black rounded">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <input type="text" name="amount" id="amount" placeholder="amount" />
                <input type="date" name="entry_date" id="entry_date" />
                <button class="btn">Save</button>
            </form>
        </div>
    </div>
</x-layouts.main>
