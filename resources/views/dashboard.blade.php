<div>
    <div class="space-y-10">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Overview ({{ now()->monthName }})
            </h3>

            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Total Income
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-indigo-600">
                            {{ number_format($currentMonthIncome) }}
                        </dd>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Total Expense
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-indigo-600">
                            {{ number_format($currentMonthExpense) }}
                        </dd>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Total Revenue
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-indigo-600">
                            {{ number_format($currentMonthIncome - $currentMonthExpense) }}
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Recent Activity
            </h3>

            <div class="mt-2 flex flex-col">
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
                                        Type
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
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($activities as $activity)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <p class="truncate w-72 text-gray-500 text-sm truncate group-hover:text-gray-900">
                                                    {{ $activity->subject->title }}
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <p class="text-gray-500 text-sm truncate group-hover:text-gray-900">
                                                    {{ ucfirst($activity->subject_type) }}
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <p class="text-gray-500 text-sm truncate group-hover:text-gray-900">
                                                    {{ $activity->subject->category->name }}
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <p class="text-sm text-gray-700 flex justify-end items-center">
                                                    <svg class="w-4 h-4 mr-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $activity->subject->amount }}
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <p class="text-sm text-gray-500">{{ $activity->subject->entry_date->format('M, d Y') }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 text-center whitespace-no-wrap text-sm leading-5 text-gray-500" colspan="5">
                                                No Recent Activity found...
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
