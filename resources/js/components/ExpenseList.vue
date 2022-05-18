<template>
    <div>
        <div>
            <!-- TODO: create tags to filter all expenses & own expenses -->
        </div>
        <div class="overflow-y-auto h-96">
            <table
                v-show="expenses.length > 0"
                class="table-fixed border-2 border-black"
            >
                <thead class="bg-gray-400">
                    <tr>
                        <th class="w-2/4">Expense Category</th>
                        <th class="w-1/4 border-l-2 border-r-2 border-black">
                            Amount
                        </th>
                        <th class="w-1/4">Entry Date</th>
                        <th class="w-1/4">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="expense in expenses"
                        :key="expense.id"
                        @dblclick="showEditExpenseModal(expense)"
                        class="odd:bg-gray-300"
                    >
                        <td class="pl-2">{{ expense.category_name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">
                            $ {{ expense.amount }}
                        </td>
                        <td class="pl-2">{{ expense.entry_date }}</td>
                        <td class="px-2">{{ expense.created_at }}</td>
                    </tr>
                </tbody>
            </table>
            <p v-show="expenses.length === 0">No available expenses</p>
        </div>

        <div class="mt-6 flex justify-end">
            <button @click="showCreateModal = true" class="btn">
                Add Expense
            </button>
        </div>

        <add-expense-modal
            :categories="categories"
            v-show="showCreateModal"
            @close="showCreateModal = false"
        ></add-expense-modal>

        <edit-expense-modal
            :expense="expense"
            :categories="categories"
            v-show="showUpdateModal"
            @close="showUpdateModal = false"
        ></edit-expense-modal>
    </div>
</template>

<script>
import AddExpenseModal from "./modals/AddExpenseModal";
import EditExpenseModal from "./modals/EditExpenseModal";

export default {
    components: {
        AddExpenseModal,
        EditExpenseModal,
    },
    props: {
        expenses: Array,
        categories: Array,
    },
    data() {
        return {
            showCreateModal: false,
            showUpdateModal: false,
            expense: {},
        };
    },
    methods: {
        showEditExpenseModal(expense) {
            this.showUpdateModal = true;
            this.expense = expense;
        },
    },
};
</script>
