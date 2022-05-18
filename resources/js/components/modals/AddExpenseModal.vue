<template>
    <modal title="Add User">
        <div class="w-3/4 mx-auto">
            <form action="/expenses" method="POST" class="space-y-4">
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
                        placeholder="Amount"
                    />
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Entry Date</label>
                    <input
                        type="date"
                        name="entry_date"
                        id="entry_date"
                        class="flex-1"
                    />
                </div>

                <div class="flex justify-end space-x-2">
                    <button
                        @click="$emit('close')"
                        class="btn-second"
                        type="button"
                    >
                        Cancel
                    </button>
                    <button class="btn">Save</button>
                </div>
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
