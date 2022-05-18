<template>
    <modal title="Add Category">
        <div class="w-3/4 mx-auto">
            <form action="/admin/categories" method="POST" class="space-y-4">
                <input type="hidden" name="_token" :value="csrf" />
                <div class="flex justify-between">
                    <label class="flex-1">Display Name</label>
                    <input
                        class="flex-1"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Display Name"
                    />
                </div>
                <div class="flex justify-between">
                    <label class="flex-1">Description</label>
                    <input
                        class="flex-1"
                        type="text"
                        name="description"
                        id="description"
                        placeholder="Description"
                    />
                </div>
                <div class="flex justify-end space-x-2">
                    <button @click="$emit('close')" class="btn-second" type="button">
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
