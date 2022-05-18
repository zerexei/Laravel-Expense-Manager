<x-layouts.main title="Expense Category" breadcrum="Expense Management > Expense Categories">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>
        <div>
            <expense-category-list :categories="{{ $categories }}"></expense-category-list>
        </div>
    </div>
</x-layouts.main>
