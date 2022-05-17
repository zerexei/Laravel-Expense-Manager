<template>
    <div>
        <div>
            <table class="table-fixed border-2 border-black">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="w-1/5">Display Name</th>
                        <th class="w-2/5 border-l-2 border-r-2 border-black">
                            Email Adress
                        </th>
                        <th class="w-1/5">Roles</th>
                        <th class="w-1/5">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="user in users"
                        :key="user.id"
                        class="odd:bg-gray-300"
                    >
                        <td class="pl-2">{{ user.name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">
                            {{ user.email }}
                        </td>
                        <td class="pl-2 border-r-2 border-black">
                            {{ user.active_roles }}
                        </td>
                        <td class="pl-2">{{ user.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-6">
            <button @click="showCreateModal = true" class="btn">Add Role</button>
        </div>

        <add-user-modal
            :roles="roles"
            v-show="showCreateModal"
            @close="showCreateModal = false"
        ></add-user-modal>
    </div>
</template>

<script>
import AddUserModal from "./modals/AddUserModal";

export default {
    components: {
        AddUserModal,
    },
    props: {
        users: Array,
        roles: Array,
    },
    data() {
        return {
            showCreateModal: false,
            showUpdateModal: false,
            role: {},
        };
    },
    methods: {
        showEditRoleModal(role) {
            this.showUpdateModal = true;
            this.role = role;
        },
    },
};
</script>
