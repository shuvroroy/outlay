<div class="fixed w-full top-0 left-0 flex justify-center px-4 z-50">
    <div
        x-cloak
        x-data="{ show: false, message: '' }"
        x-show="show"
        x-on:notify.window="show = true; message = $event.detail; setTimeout(() => { show = false }, 2500)"
        x-transition:enter="transform ease-out duration-500 transition"
        x-transition:enter-start="-translate-y-24"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transform ease-in duration-300 transition"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-24"
        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto mt-8"
    >
        <div class="rounded-lg shadow-xs overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p x-text="message" class="text-sm leading-5 font-medium text-gray-900"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
