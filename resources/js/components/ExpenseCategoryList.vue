<template>
    <div>
        <div>
            <table class="table-fixed border-2 border-black">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="w-1/4">Display Name</th>
                        <th class="w-2/4 border-l-2 border-r-2 border-black">
                            Description
                        </th>
                        <th class="w-1/4">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="category in categories"
                        :key="category.id"
                        @dblclick="showEditExpenseCategoryModal(category)"
                        class="odd:bg-gray-300"
                    >
                        <td class="pl-2">{{ category.name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">
                            {{ category.description }}
                        </td>
                        <td class="pl-2">{{ category.created_at }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 flex justify-end">
                <button @click="showCreateModal = true" class="btn">
                    Add Category
                </button>
            </div>
        </div>

        <add-expense-category-modal
            v-show="showCreateModal"
            @close="showCreateModal = false"
        ></add-expense-category-modal>

        <edit-expense-category-modal
            :category="category"
            v-show="showUpdateModal"
            @close="showUpdateModal = false"
        ></edit-expense-category-modal>
    </div>
</template>

<script>
import AddExpenseCategoryModal from "./modals/AddExpenseCategoryModal";
import EditExpenseCategoryModal from "./modals/EditExpenseCategoryModal";

export default {
    components: {
        AddExpenseCategoryModal,
        EditExpenseCategoryModal,
    },
    props: {
        categories: Array,
    },
    data() {
        return {
            showCreateModal: false,
            showUpdateModal: false,
            category: {},
        };
    },
    methods: {
        showEditExpenseCategoryModal(category) {
            this.showUpdateModal = true;
            this.category = category;
        },
    },
};
</script>
