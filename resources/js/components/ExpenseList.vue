<template>
    <div>
        <table class="table-fixed overflow-scroll border-2 border-black">
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
                <tr v-for="expense in expenses" :key="expense.id">
                    <td class="pl-2">{{ expense.category_name }}</td>
                    <td class="pl-2 border-l-2 border-r-2 border-black">
                        $ {{ expense.amount }}
                    </td>
                    <td class="pl-2">{{ expense.entry_date }}</td>
                    <td class="px-2">{{ expense.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        expenses: Array,
    },
};
</script>
