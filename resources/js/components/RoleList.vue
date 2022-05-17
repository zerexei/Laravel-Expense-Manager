<template>
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
    </div>
</template>

<script>
export default {
    props: {
        roles: Array,
    },
};
</script>
