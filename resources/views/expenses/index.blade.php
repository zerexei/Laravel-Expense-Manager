<x-layouts.main title="Expenses" breadcrum="Expense Management > Expenses">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <expense-list :expenses="{{ $expenses }}" :categories="{{ $categories }}"></expense-list>
        </div>
    </div>
</x-layouts.main>
