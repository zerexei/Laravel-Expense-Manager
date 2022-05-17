<x-layouts.main title="zxc" breadcrum="zxc">
    <x-feedback></x-feedback>
    <div>
        <div>

            <form action="{{ route('roles.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="text" name="name" id="name" value="{{ $user->name }}" />
                <input type="text" name="description" id="description" value="{{ $role->email }}" />
                <button type="button" @click="this.$refs.deleteRoleForm.submit()">Delete</button>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>

        <form ref="deleteRoleForm" action="{{ route('roles.destroy', $role) }}" method="POST">
            @method('DELETE')
            @csrf
        </form>
    </div>
</x-layouts.main>
