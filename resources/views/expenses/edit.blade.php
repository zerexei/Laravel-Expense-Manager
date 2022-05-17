<x-layouts.main title="zxc" breadcrum="zxc">
    <x-feedback></x-feedback>
    <div>
        <div>

            <form action="{{ route('expenses.update', $expense) }}" method="POST">
                @method('PUT')
                @csrf
                <select name="category" id="category" class="w-full p-2 border border-black rounded">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->name === $expense->categories->name) selected
                        @endif
                        >
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <input type="text" name="amount" id="amount" value="{{ $expense->amount }}" />
                <input type="date" name="entry_date" id="entry_date" value="{{ $expense->entry_date }}" />
                <button type="button" @click="this.$refs.deleteExpenseForm.submit()">Delete</button>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>

        <form ref="deleteExpenseForm" action="{{ route('expenses.destroy', $expense) }}" method="POST">
            @method('DELETE')
            @csrf
        </form>
    </div>
</x-layouts.main>
