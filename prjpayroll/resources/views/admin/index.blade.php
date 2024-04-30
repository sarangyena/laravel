<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <p class="font-bold text-2xl border-b-2 border-green-300">PAYROLL</p>
                    <div class="columns-3 mt-3">
                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <p class="text-xl text-center border-b-2 border-green-300 mx-5">TOTAL PAYROLL LAST MONTH</p>
                            <p class="text-4xl text-center py-10">₱ {{ $month }}</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <p class="text-xl text-center text-nowrap border-b-2 border-green-300 mx-5">TOTAL PAYROLL YEAR TO DATE</p>
                            <p class="text-4xl text-center py-10">₱ {{ $year }}</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <p class="text-xl text-center border-b-2 border-green-300 mx-5">CURRENT PERIOD</p>
                            <p class="text-4xl text-center py-10">{{ $week }}th Period</p>
                        </div>
                    </div>
                    <p class="font-bold text-2xl border-b-2 border-green-300 mt-5">EMPLOYEES</p>
                    <div class="columns-2 mt-3">
                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <p class="text-xl text-center border-b-2 border-green-300 mx-5">TOTAL EMPLOYEES</p>
                            <p class="text-4xl text-center py-10">{{ $count }}</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <p class="text-xl text-center border-b-2 border-green-300 mx-5">INACTIVE EMPLOYEES</p>
                            <p class="text-4xl text-center py-10">{{ $status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Log Timeline-->
    <div id="drawer-example"
        class="bg-gray-100 dark:bg-gray-900 fixed top-0 left-0 z-40 h-screen p-5 overflow-hidden transition-transform -translate-x-full w-80"
        tabindex="-1" aria-labelledby="drawer-label">
        <div class="relative bg-white dark:bg-gray-800 h-full overflow-y-auto shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h5 id="drawer-label"
                    class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    <p class="font-bold text-2xl border-b-2 border-green-300">LOG
                        TIMELINE
                    </p>
                </h5>
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <ol class="relative border-s border-gray-200 dark:border-gray-700">
                    @if ($log->isEmpty())
                        <div class="flex items-center p-4 mt-2 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">No Data to be Displayed.</span>
                            </div>
                        </div>
                    @else
                        @foreach ($log as $data)
                            <li class="ms-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                </div>
                                <time
                                    class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $data->created_at }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $data->title }}
                                </h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                    {{ $data->log }}</p>
                            </li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="application/javascript">
            $(document).ready(function() {
                $('#drawer-example').click(function(){
                    console.log('success');
                })
            })
        </script>
</x-admin-layout>
