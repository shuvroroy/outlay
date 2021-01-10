<div>
    <div class="space-y-5">
        <div class="sm:flex justify-between">
            <div class="w-full mb-3 md:w-2/4 md:mb-0">
                <input wire:model="search" type="text" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" placeholder="Search Expense..." />
            </div>

            <span class="md:inline-flex rounded-md shadow-sm">
                <button wire:click="create()" type="button" class="w-full flex justify-center py-3 sm:py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 transition ease-in-out duration-150 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20">
                    <svg class="-ml-0.5 mr-2 h-4 w-4" stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Expense
                </button>
            </span>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 space-y-6 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Entry Date
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($expenses as $expense)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <p class="truncate w-72 text-gray-500 text-sm truncate group-hover:text-gray-900">
                                                {{ $expense->title }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <p class="text-gray-500 text-sm truncate group-hover:text-gray-900">
                                                {{ $expense->category->name }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap">
                                            <p class="text-sm text-gray-700 flex justify-end items-center">
                                                <svg class="w-4 h-4 mr-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ $expense->amount }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap">
                                            <p class="text-sm text-gray-500">{{ $expense->entry_date->format('M, d Y') }}</p>
                                        </td>
                                        <td class="px-6 py-4 space-x-1.5 whitespace-nowrap text-right text-sm font-medium">
                                            <button wire:click="edit({{ $expense->id }})" type="button" class="focus:outline-none">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button wire:click="selectedItem({{ $expense->id }})" type="button" class="focus:outline-none">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-center whitespace-no-wrap text-sm leading-5 text-gray-500" colspan="5">
                                            No Expense found...
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $expenses->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="save" action="#" method="POST">
        <x-modal.dialog wire:model.defer="showSaveModal">
            <x-slot name="title">
                {{ $modalHeadingText }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="date" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Date</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs relative rounded-md shadow-sm">
                            <x-input.date wire:model="expense.entry_date" id="date" />
                        </div>

                        @error('expense.entry_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Title</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input wire:model="expense.title" type="text" id="title" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" />
                        </div>

                        @error('expense.title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="category" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Category</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <select wire:model="expense.category_id" id="category" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm">
                                <option value="">Choose category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $expense->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('expense.category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="amount" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">Amount</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input wire:model="expense.amount" type="text" id="amount" class="block w-full pl-10 pr-12 border border-gray-300 rounded-md shadow-sm transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm" placeholder="0.00">
                        </div>

                        @error('expense.amount')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="sm:flex sm:flex-row-reverse">
	    			<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
						<button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20 sm:text-sm sm:leading-5">Save</button>
					</span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
						<button wire:click="$set('showSaveModal', false)" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20 transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancel</button>
					</span>
                </div>
            </x-slot>
        </x-modal.dialog>
    </form>

    <form wire:submit.prevent="destroy">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">Delete Expense</x-slot>

            <x-slot name="content">
                <div class="text-gray-700">Are you sure you want to delete <strong>{{ $expense->title }} ?</strong> This action cannot be undone.</div>
            </x-slot>

            <x-slot name="footer">
                <div class="sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-indigo-700 transition ease-in-out duration-150 focus:ring-4 focus:ring-red-500 focus:ring-opacity-20 sm:text-sm sm:leading-5">Delete</button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="$set('showDeleteModal', false)" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20 transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancel</button>
                    </span>
                </div>
            </x-slot>
        </x-modal.confirmation>
    </form>
</div>
