<x-layouts.base :title="$title">
    <div
        x-cloak
        x-data="{ sidebarOpen: false }"
        @keydown.window.escape="sidebarOpen = false"
        class="h-screen flex overflow-hidden"
    >
        <div x-show="sidebarOpen" class="md:hidden">
            <div
                @click="sidebarOpen = false"
                x-show="sidebarOpen"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-30 transition-opacity ease-linear duration-300"
            >
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
            </div>
            <div class="fixed inset-0 flex z-40">
                <div
                    x-show="sidebarOpen"
                    x-transition:enter-start="-translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="-translate-x-full"
                    class="flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-800 transform ease-in-out duration-300"
                >
                    <div class="absolute top-0 right-0 -mr-14 p-1">
                        <button
                            x-show="sidebarOpen"
                            @click="sidebarOpen = false"
                            class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                        >
                            <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-shrink-0 flex items-center px-4">
                        <img class="h-9 w-auto" src="{{ asset('img/logo/light.svg') }}" alt="Outlay"/>
                    </div>
                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                        <nav class="px-2">
                            <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('dashboard')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                                <svg class="mr-4 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('category') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('category')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                                <svg class="mr-4 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                                Category
                            </a>
                            <a href="{{ route('income') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('income')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                                <svg class="mr-4 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                </svg>
                                Income
                            </a>
                            <a href="{{ route('expense') }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md focus:outline-none focus:text-white focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('expense')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                                <svg class="mr-4 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"/>
                                </svg>
                                Expense
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="flex-shrink-0 w-14"></div>
            </div>
        </div>
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-indigo-800 pt-5 pb-4">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-9 w-auto" src="{{ asset('img/logo/light.svg') }}" alt="Outlay" />
                </div>
                <div class="mt-5 h-0 flex-1 flex flex-col overflow-y-auto">
                    <nav class="flex-1 px-2 bg-indigo-800">
                        <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-sm leading-5 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('dashboard')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                            <svg class="mr-3 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('category') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('category')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                            <svg class="mr-3 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            Category
                        </a>
                        <a href="{{ route('income') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('income')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                            <svg class="mr-3 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                            </svg>
                            Income
                        </a>
                        <a href="{{ route('expense') }}" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 @if(request()->routeIs('expense')) text-white bg-indigo-900 @else text-indigo-300 hover:text-white hover:bg-indigo-700 focus:text-white @endif">
                            <svg class="mr-3 h-6 w-6 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"/>
                            </svg>
                            Expense
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button @click.stop="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                        <div class="w-full flex md:ml-0">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input id="search" class="block w-full h-full pl-8 pr-3 py-2 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 sm:text-sm" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <button class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </button>
                        <div x-data="{ open: false }" @click.away="open = false" class="ml-3 relative">
                            <div>
                                <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline">
                                    <img class="h-10 w-10 object-cover rounded-full" src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" />
                                </button>
                            </div>
                            <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
                            >
                                <div class="pb-1 rounded-md bg-white shadow-xs">
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Your Profile</a>
                                    <livewire:auth.logout-component />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <main x-data x-init="$el.focus()" class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    <x-notification.snack />
</x-layouts.base>
