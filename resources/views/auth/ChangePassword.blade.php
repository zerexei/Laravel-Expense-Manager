<x-layouts.main title="Update Password" breadcrum="User Management > Update Password">
    <div class="w-1/3 mx-auto">
        <x-feedback></x-feedback>
        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
            @method('PUT')
            @csrf
            <div>
                <label class="text-sm font-bold text-gray-700">Old Password</label>
                <input type="password" name="old_password" placeholder="old password" />
            </div>

            <div>
                <label class="text-sm font-bold text-gray-700">New Password</label>
                <input type="password" name="password" placeholder="password" />
            </div>

            <div>
                <label class="text-sm font-bold text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="confirm password" />
            </div>

            <div class="flex justify-end">
                <button class="btn">Update</button>
            </div>
        </form>
    </div>
</x-layouts.main>
