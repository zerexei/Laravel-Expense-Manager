<template>
    <modal title="Update User">
        <div class="w-3/4 mx-auto">
            <form :action="'/admin/users/' + user.id" method="POST" class="space-y-4">
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="_token" :value="csrf" />

                <div class="flex justify-between">
                    <label class="flex-1">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        :value="user.name"
                        class="flex-1"
                    />
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="flex-1"
                        :value="user.email"
                    />
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Role</label>
                    <select
                        name="role"
                        id="role"
                        class="flex-1 w-full p-2 border border-black rounded"
                    >
                        <option
                            v-for="role in roles"
                            :key="role.id"
                            :value="role.id"
                            :selected="role.name === user.role"
                        >
                            {{ role.name }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-between mt-12">
                    <button
                        class="btn-danger"
                        type="button"
                        @click="this.$refs.deleteUserForm.submit()"
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
                ref="deleteUserForm"
                :action="'/admin/users/' + user.id"
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
        user: Object,
        roles: Array,
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
