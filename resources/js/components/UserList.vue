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
                        <th class="w-1/5 border-r-2 border-black">Roles</th>
                        <th class="w-1/5">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="user in users"
                        :key="user.id"
                        @dblclick="showEditUserModal(user)"
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
            <button @click="showCreateModal = true" class="btn">
                Add User
            </button>
        </div>

        <add-user-modal
            :roles="roles"
            v-show="showCreateModal"
            @close="showCreateModal = false"
        ></add-user-modal>

        <edit-user-modal
            :user="user"
            :roles="roles"
            v-show="showUpdateModal"
            @close="showUpdateModal = false"
        ></edit-user-modal>
    </div>
</template>

<script>
import AddUserModal from "./modals/AddUserModal";
import EditUserModal from "./modals/EditUserModal";

export default {
    components: {
        AddUserModal,
        EditUserModal,
    },
    props: {
        users: Array,
        roles: Array,
    },
    data() {
        return {
            showCreateModal: false,
            showUpdateModal: false,
            user: {},
        };
    },
    methods: {
        showEditUserModal(user) {
            this.showUpdateModal = true;
            this.user = user;
        },
    },
};
</script>
