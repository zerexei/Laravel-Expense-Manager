<template>
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
</template>

<script>
export default {
    props: {
        users: Array,
    },
};
</script>
