<x-layouts.main title="Update Password" breadcrum="User Management > Update Password">
    <div>
        <x-feedback></x-feedback>
        <form action="{{ route('password.update') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="password" name="old_password" placeholder="old password" />
            <input type="password" name="password" placeholder="password" />
            <input type="password" name="password_confirmation" placeholder="confirm password" />
            <button>Update</button>
        </form>
    </div>
</x-layouts.main>
