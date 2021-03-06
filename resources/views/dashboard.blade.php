<x-layouts.main title="My Expenses" breadcrum="Dashboard">
    <x-feedback></x-feedback>
    <div class="flex">
        <div class="flex-1">
            <div class="w-1/2 mx-auto">
                <div class="flex justify-between mb-6">
                    <h3>Expense Category</h3>
                    <h3>Total</h3>
                </div>

                @forelse ($expense_category_total as $category => $expense_total)
                <div class="flex justify-between space-y-2">
                    <p>{{ $category }}</p>
                    <p>$ {{ $expense_total }}</p>
                </div>
                @empty
                <p>No available expenses</p>
                @endforelse
            </div>
        </div>
        <div class="flex-1">
            <pie-chart :categories="{{ $expense_category_total }}"></pie-chart>
        </div>
    </div>
</x-layouts.main>
