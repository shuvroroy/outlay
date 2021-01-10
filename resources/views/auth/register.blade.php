<div>
    <form wire:submit.prevent="register" class="space-y-6" action="#" method="POST">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Full Name
            </label>
            <div class="mt-1">
                <input wire:model="name" type="text" id="name" class="@error('name') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" autofocus required>
            </div>
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
            </label>
            <div class="mt-1">
                <input wire:model="email" type="email" id="email" class="@error('email') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" required>
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
                <input wire:model="password" type="password" id="password" class="@error('password') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" required>
            </div>
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="passwordConfirmation" class="block text-sm font-medium text-gray-700">
                Confirm Password
            </label>
            <div class="mt-1">
                <input wire:model="passwordConfirmation" type="password" id="passwordConfirmation" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" required>
            </div>
        </div>
        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 transition ease-in-out duration-150 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20">
                Sign up
            </button>
        </div>
    </form>
    <div class="mt-6">
        <div class="text-center">
            <a href="{{ route('login') }}" class="font-medium text-gray-600 transition ease-in-out duration-150 hover:text-gray-700 focus:outline-none focus:underline">
                Already Have An Account?
            </a>
        </div>
    </div>
</div>
