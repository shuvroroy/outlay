<div
    x-data="{
        value: @entangle($attributes->wire('model')),
        showDatepicker: false,
        datepickerValue: '',
        month: '',
        year: '',
        noOfDays: [],
        blankDays: [],
        MONTHS: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        DAYS: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

        initDate() {
            let today = this.value === null ? new Date() : new Date(this.value);
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
        },

        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);

            return today.toDateString() === d.toDateString() ? true : false;
        },

        getDateValue(date) {
            let selectedDate = new Date(this.year, this.month++, date);
            this.datepickerValue = selectedDate.toDateString();

            let year = selectedDate.getFullYear();
            let month = selectedDate.getMonth() + 1;

            this.value = year +'-'+ ('0'+ month).slice(-2) +'-'+ ('0' + selectedDate.getDate()).slice(-2);

            this.showDatepicker = false;
        },

        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankdaysArray = [];
            for (let i=1; i<=dayOfWeek; i++) {
                blankdaysArray.push(i);
            }

            let daysArray = [];
            for (let i=1; i<=daysInMonth; i++) {
                daysArray.push(i);
            }

            this.blankDays = blankdaysArray;
            this.noOfDays = daysArray;
        },

        nextMonth() {
            if (this.month == 11) {
                this.year += 1;
                this.month = 0;
            } else {
                this.month++;
            }
        },

        prevMonth() {
            if (this.month == 0) {
                this.year -= 1;
                this.month = 11;
            } else {
                this.month--;
            }
        }
    }"
    x-init="[initDate(), getNoOfDays(), $watch('value', value => initDate())]"
    class="relative"
>
    <input
        type="text"
        {{ $attributes->only('id') }}
        x-bind:value="datepickerValue"
        @click="showDatepicker = !showDatepicker"
        @keydown.escape="showDatepicker = false"
        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-20 focus:border-indigo-300 sm:text-sm"
        readonly
    >

    <div class="absolute top-0 right-0 px-3 py-2">
        <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
    </div>

    <div
        x-show.transition="showDatepicker"
        @click.away="showDatepicker = false"
        class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0 z-50"
        style="width: 17rem"
    >

        <div class="flex justify-between items-center mb-2">
            <div>
                <span x-text="MONTHS[month]" class="text-lg font-bold text-gray-800"></span>
                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
            </div>
            <div>
                <button
                    @click="prevMonth(); getNoOfDays()"
                    type="button"
                    class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 focus:outline-none rounded-full"
                >
                    <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button
                    type="button"
                    class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 focus:outline-none rounded-full"
                    @click="nextMonth(); getNoOfDays()"
                >
                    <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex flex-wrap mb-3 -mx-1">
            <template x-for="(day, index) in DAYS" :key="index">
                <div style="width: 14.26%" class="px-1">
                    <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                </div>
            </template>
        </div>

        <div class="flex flex-wrap -mx-1">
            <template x-for="blankday in blankDays">
                <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
            </template>
            <template x-for="(date, dateIndex) in noOfDays" :key="dateIndex">
                <div style="width: 14.28%" class="px-1 mb-1">
                    <div
                        @click="getDateValue(date)"
                        x-text="date"
                        class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                        :class="{'bg-indigo-600 text-white': isToday(date) == true, 'text-gray-700 hover:bg-indigo-200 hover:text-white': isToday(date) == false }"
                    ></div>
                </div>
            </template>
        </div>
    </div>
</div>
