<template>
    <modal title="Update Category">
        <div class="w-3/4 mx-auto">
            <form :action="'/admin/categories/' + category.id" method="POST">
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="_token" :value="csrf" />

                <div class="flex justify-between">
                    <label class="flex-1">Display Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        :value="category.name"
                        class="flex-1"
                    />
                </div>
                <div class="flex justify-between">
                    <label class="flex-1">Description</label>
                    <input
                        type="text"
                        name="description"
                        id="description"
                        class="flex-1"
                        :value="category.description"
                    />
                </div>
                <div class="flex justify-between mt-12">
                    <button
                        class="btn-danger"
                        type="button"
                        @click="this.$refs.deleteExpenseCategoryForm.submit()"
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
                ref="deleteExpenseCategoryForm"
                :action="'/admin/categories/' + category.id"
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
        category: Object,
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
