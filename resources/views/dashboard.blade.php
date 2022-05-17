<x-layouts.app>
    <div class="flex">
        <x-layouts.sidebar :user="$user"></x-layouts.sidebar>
        <div class="flex-1">
            <div class="border-b-2">
                <x-navbar></x-navbar>
            </div>

            <div class="flex justify-between p-6">
                <h3>My Expenses</h3>
                <h3>Dashboard</h3>
            </div>

            <div class="flex p-2 px-12">
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
                <div class="flex-1 border border-black"></div>
            </div>
        </div>
    </div>

</x-layouts.app>
