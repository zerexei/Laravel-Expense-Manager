<x-layouts.app>
    <div class="w-1/3 mx-auto p-6 border-2 border-white rounded-md pt-32">
        <h2>Login</h2>

        <x-feedback></x-feedback>

        <form action="{{ route('authenticate') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" autofocus />
            </div>

            <div class="flex flex-col">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" />
            </div>

            <div class="flex justify-end">
                <button type="button" class="py-2 px-3 text-gray-200 bg-gray-900 rounded-md">Login with GitHub</button>
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</x-layouts.app>
