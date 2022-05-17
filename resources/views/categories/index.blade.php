<x-layouts.main title="Expense Category" breadcrum="Expense Management > Expense Categories">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
        <expense-category-list :categories="{{ $categories }}"></expense-category-list>
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
