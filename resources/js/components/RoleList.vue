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
                        v-for="role in roles"
                        :key="role.id"
                        @dblclick="showEditRoleModal(role)"
                        class="odd:bg-gray-300"
                    >
                        <td class="pl-2">{{ role.name }}</td>
                        <td class="pl-2 border-l-2 border-r-2 border-black">
                            {{ role.description }}
                        </td>
                        <td class="pl-2">{{ role.created_at }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 flex justify-end">
                <button @click="showCreateModal = true" class="btn">
                    Add Role
                </button>
            </div>
        </div>

        <add-role-modal
            v-show="showCreateModal"
            @close="showCreateModal = false"
        ></add-role-modal>
        <edit-role-modal
            :role="role"
            v-show="showUpdateModal"
            @close="showUpdateModal = false"
        ></edit-role-modal>
    </div>
</template>

<script>
import AddRoleModal from "./modals/AddRoleModal";
import EditRoleModal from "./modals/EditRoleModal";

export default {
    components: {
        AddRoleModal,
        EditRoleModal,
    },
    props: {
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
