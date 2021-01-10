<div>
    <form wire:submit.prevent="login" class="space-y-6" action="#" method="POST">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
            </label>
            <div class="mt-1">
                <input wire:model="email" type="email" id="email" class="@error('email') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" autofocus required>
            </div>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password
            </label>
            <div class="mt-1">
                <input wire:model="password" type="password" id="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" required>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input wire:model="remember" type="checkbox" id="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring focus:ring-indigo-500 focus:ring-offset-0 focus:ring-opacity-20 focus:border-indigo-300">
                <label for="remember" class="ml-2 block text-sm text-gray-900">
                    Remember me
                </label>
            </div>
            <div class="text-sm">
                <a href="#" class="font-medium text-indigo-600 transition ease-in-out duration-150 hover:text-indigo-500 focus:outline-none focus:underline">
                    Forgot your password?
                </a>
            </div>
        </div>
        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 transition ease-in-out duration-150 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20">
                Sign in
            </button>
        </div>
    </form>
    <div class="mt-6">
        <div class="text-center">
            <a href="{{ route('register') }}" class="font-medium text-gray-600 transition ease-in-out duration-150 hover:text-gray-700 focus:outline-none focus:underline">
                Haven't signed up yet?
            </a>
        </div>
    </div>
</div>
