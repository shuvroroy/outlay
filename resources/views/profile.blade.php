<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="update" action="#" method="POST">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Full Name
                            </label>
                            <div class="mt-1">
                                <input wire:model="user.name" type="text" id="name" class="@error('name') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" autofocus required>
                            </div>
                            @error('user.name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email address
                            </label>
                            <div class="mt-1">
                                <input wire:model="user.email" type="email" id="email" class="@error('email') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" required>
                            </div>
                            @error('user.email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="website" class="block text-sm font-medium text-gray-700">
                                Website
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm transition ease-in-out duration-150 focus-within:ring focus-within:ring-indigo-500 focus-within:ring-opacity-20 focus-within:border-indigo-300">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    http://
                                </span>
                                <input wire:model="user.website" type="text" name="website" id="website" class="flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 focus:outline-none focus:ring-0 focus:border-transparent" placeholder="www.example.com">
                            </div>
                            @error('user.website')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="birthday" class="block text-sm font-medium text-gray-700">
                                Birthday
                            </label>
                            <div class="mt-1">
                                <x-input.date wire:model="user.birthday" id="birthday" />
                            </div>
                            @error('user.birthday')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Photo
                        </label>
                        <div class="mt-1 flex items-center">
                            <input wire:model="photo" x-ref="photo" type="file" class="hidden">
                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                @if($photo)
                                    <img class="object-cover h-full w-full" src="{{ $photo->temporaryUrl() }}" alt="{{ auth()->user()->name }}">
                                @else
                                    <img class="object-cover h-full w-full" src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                                @endif
                            </span>
                            <button x-on:click.prevent="$refs.photo.click()" type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-offset-0 focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300">
                                Change
                            </button>
                        </div>
                        @error('photo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            About
                        </label>
                        <div class="mt-1">
                            <textarea wire:model="user.about" id="about" rows="4" class="@error('about') border-red-300 @enderror block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 resize-none transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" placeholder="Brief description for your profile."></textarea>
                        </div>
                        @error('user.about')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-offset-0 focus:ring-indigo-500 focus:ring-opacity-20">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
