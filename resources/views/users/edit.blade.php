<x-layouts.main title="zxc" breadcrum="zxc">
    <x-feedback></x-feedback>
    <div>
        <div>

            <form action="{{ route('users.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="text" name="name" id="name" value="{{ $user->name }}" />
                <input type="email" name="email" id="email" value="{{ $user->email }}" />
                <select name="role" id="role" class="w-full p-2 border border-black rounded">
                    @foreach ($roles as $role)
                    <option
                        value="{{ $role->id }}"
                        @if($role->name === $user->roles->first()) selected @endif
                    >
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                <button type="button" @click="this.$refs.deleteUserForm.submit()">Delete</button>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>

        <form ref="deleteUserForm" action="{{ route('users.destroy', $user) }}" method="POST">
            @method('DELETE')
            @csrf
        </form>
    </div>
</x-layouts.main>
