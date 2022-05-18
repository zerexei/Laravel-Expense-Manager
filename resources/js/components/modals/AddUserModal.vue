<template>
    <modal title="Add User">
        <div class="w-3/4 mx-auto">
            <form action="/admin/users" method="POST" class="space-y-4">
                <input type="hidden" name="_token" :value="csrf" />

                <div class="flex justify-between">
                    <label class="flex-1">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="flex-1"
                        placeholder="name"
                    />
                </div>
                <div class="flex justify-between">
                    <label class="flex-1">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="flex-1"
                        placeholder="Email Address"
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
                            :selected="role.name == defaultRole"
                        >
                            {{ role.name }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="flex-1"
                        placeholder="password"
                    />
                </div>

                <div class="flex justify-between">
                    <label class="flex-1">Confirm assword</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="flex-1"
                        placeholder="confirm password"
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
        roles: Array,
    },
    data() {
        return {
            csrf: "",
            defaultRole: "users",
        };
    },
    mounted() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;
    },
};
</script>
