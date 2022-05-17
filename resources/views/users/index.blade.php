<x-layouts.main title="Users" breadcrum="User Management > Users">
    <div class="space-y-4">
        <div>
            <x-feedback></x-feedback>
        </div>

        <div>
            <user-list :users="{{ $users }}"></user-list>
        </div>

        <div class="flex justify-end">
            <button class="btn">Add Role</button>
        </div>

        <div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="name" />
                <input type="email" name="email" id="email" placeholder="Email Address" />
                <select name="role" id="role" class="w-full p-2 border border-black rounded">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if($role->name === 'user') selected @endif
                        >
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                <input type="password" name="password" id="password" placeholder="password" />
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="confirm password" />
                <button class="btn">Save</button>
            </form>
        </div>
    </div>
</x-layouts.main>
