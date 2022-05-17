@if (Route::has('login'))
<div class="flex justify-end space-x-4 p-6">
    @auth
    <h3>Welcome to Expense Manager</h3>
    <button @click="this.$refs.logoutForm.submit()">Logout</button>
    <form ref="logoutForm" action="/logout" method="POST" class="hidden">
        @method('DELETE')
        @csrf
    </form>
    @else
    <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
    @endauth
</div>
@endif
