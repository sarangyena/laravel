<x-user-layout>
    <div class="sm:ml-64 h-screen flex flex-col justify-between">
        <div class="p-4 mx-4 rounded-lg dark:border-gray-700 mt-20">
            <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">USER | BOOK APPOINTMENT</h1>
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @elseif(session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @elseif(session('delete'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">{{ session('delete') }}</span>
                </div>
            @endif
            <ol class="lg:flex justify-between items-center w-full space-y-4 lg:space-y-0 lg:space-x-4 mt-5">
                <li class="relative ">
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-red-500 border border-transparent rounded-full flex justify-center items-center mr-3 text-sm text-white lg:w-8 lg:h-8">
                            1 </span>
                        <div class="block">
                            <h4 class="text-base  text-red-500">Select Options</h4>
                        </div>
                        <svg class="w-5 h-5 ml-2 stroke-red-500 sm:ml-4" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 18L9.67462 13.0607C10.1478 12.5607 10.3844 12.3107 10.3844 12C10.3844 11.6893 10.1478 11.4393 9.67462 10.9393L5 6M12.6608 18L17.3354 13.0607C17.8086 12.5607 18.0452 12.3107 18.0452 12C18.0452 11.6893 17.8086 11.4393 17.3354 10.9393L12.6608 6"
                                stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </a>
                </li>
                <li class="relative  ">
                    <a class="flex items-center font-medium w-full">
                        <span
                            class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm  lg:w-8 lg:h-8">2</span>
                        <div class="block">
                            <h4 class="text-base  text-gray-900">Recommendation (Optional)</h4>
                        </div>
                        <svg class="w-5 h-5 ml-2 stroke-gray-900 sm:ml-4" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 18L9.67462 13.0607C10.1478 12.5607 10.3844 12.3107 10.3844 12C10.3844 11.6893 10.1478 11.4393 9.67462 10.9393L5 6M12.6608 18L17.3354 13.0607C17.8086 12.5607 18.0452 12.3107 18.0452 12C18.0452 11.6893 17.8086 11.4393 17.3354 10.9393L12.6608 6"
                                stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </a>
                </li>
                <li class="relative  ">
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm  lg:w-8 lg:h-8">3</span>
                        <div class="block">
                            <h4 class="text-base  text-gray-900">Summary</h4>
                        </div>
                        <svg class="w-5 h-5 ml-2 stroke-gray-900 sm:ml-4" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 18L9.67462 13.0607C10.1478 12.5607 10.3844 12.3107 10.3844 12C10.3844 11.6893 10.1478 11.4393 9.67462 10.9393L5 6M12.6608 18L17.3354 13.0607C17.8086 12.5607 18.0452 12.3107 18.0452 12C18.0452 11.6893 17.8086 11.4393 17.3354 10.9393L12.6608 6"
                                stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </a>
                </li>
                <li class="relative  ">
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm  lg:w-8 lg:h-8">4</span>
                        <div class="block">
                            <h4 class="text-base  text-gray-900">Payment</h4>
                        </div>
                    </a>
                </li>
            </ol>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <form method="post" action="{{ route('u-cache') }}">
                                @csrf
                                <div class="columns-2 mt-5">
                                    <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1 inline-block">SELECT
                                        DATE </h1>
                                    <div class="relative max-w-sm mt-3">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-autohide datepicker-buttons
                                            datepicker-autoselect-today type="text" name="date" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date"
                                            value="{{ isset($cache['date']) ? $cache['date'] : '' }}">
                                    </div>
                                    <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1 inline-block">SELECT
                                        SERVICES</h1>
                                    <div class="flex gap-5 mt-6">
                                        @foreach ($data as $item)
                                            <div class="flex items-center mb-4">
                                                <input id="{{ $item->id }}" type="checkbox"
                                                    value="{{ $item->name }}" name="services[{{ $item->id }}]"
                                                    @if (isset($cache['services'][$item->id])) checked @endif
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="{{ $item->id }}"
                                                    class="ms-2 text-base font-medium text-gray-900 dark:text-gray-300">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer class="bg-white dark:bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <strong>W.RAMOS</strong>.
                    Developed by IS Student from TUP Manila.
                </span>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</x-user-layout>
