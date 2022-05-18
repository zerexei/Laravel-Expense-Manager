<template>
    <modal title="Update Expense">
        <div class="w-3/4 mx-auto">
            <form :action="'/admin/expenses/' + expense.id" method="POST" class="space-y-4">
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="_token" :value="csrf" />

                <div class="flex justify-between">
                    <label class="flex-1">Category</label>
                    <select
                        name="category"
                        id="category"
                        class="flex-1 w-full p-2 border border-black rounded"
                    >
                        <option
                            v-for="category in categories"
                            :key="category.id"
                            :value="category.id"
                            :selected="category.name === expense.category_name"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Amount</label>
                    <input
                        type="text"
                        name="amount"
                        id="amount"
                        class="flex-1"
                        :value="expense.amount"
                    />
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Entry Date</label>
                    <input
                        type="date"
                        name="entry_date"
                        id="entry_date"
                        class="flex-1"
                        :value="expense.entry_date"
                    />
                </div>
                <div class="flex justify-between mt-12">
                    <button
                        class="btn-danger"
                        type="button"
                        @click="this.$refs.deleteExpenseForm.submit()"
                    >
                        Delete
                    </button>
                    <div>
                        <button
                            @click="$emit('close')"
                            class="btn-second"
                            type="button"
                        >
                            Cancel
                        </button>
                        <button type="submit" class="btn">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div>
            <form
                ref="/deleteExpenseForm"
                :action="'admin/expenses/' + expense.id"
                method="POST"
            >
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="_token" :value="csrf" />
            </form>
        </div>
    </modal>
</template>

<script>
import Modal from "./Modal";

export default {
    components: {
        Modal,
    },
    props: {
        expense: Object,
        categories: Array,
    },
    data() {
        return {
            csrf: "",
        };
    },
    mounted() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;
    },
};
</script>
