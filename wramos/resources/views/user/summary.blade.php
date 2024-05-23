<x-user-layout>
    @php
        $data = cache('' . auth()->user()->id . '');
        $services = null;
        $recommend = null;
        foreach ($data['services'] as $d) {
            if ($services == null) {
                $services = $d;
            } else {
                $services = $services . ', ' . $d;
            }
        }
        foreach ($data['recommend'] as $r) {
            if ($recommend == null) {
                $recommend = $r;
            } else {
                $recommend = $recommend . ', ' . $r;
            }
        }
    @endphp
    <div class="sm:ml-64 h-screen flex flex-col justify-between">
        <div class="p-4 mx-4 rounded-lg dark:border-gray-700 mt-20">
            <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">USER | BOOK APPOINTMENT</h1>
            <ol class="lg:flex justify-between items-center w-full space-y-4 lg:space-y-0 lg:space-x-4 mt-5">
                <li class="relative  ">
                    <a class="flex items-center font-medium w-full ">
                        <span
                            class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm  lg:w-8 lg:h-8">1</span>
                        <div class="block">
                            <h4 class="text-base  text-gray-900">Select Options</h4>
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
                <li class="relative ">
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-red-500 border border-transparent rounded-full flex justify-center items-center mr-3 text-sm text-white lg:w-8 lg:h-8">
                            3</span>
                        <div class="block">
                            <h4 class="text-base  text-red-500">Summary</h4>
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
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-gray-50 border border-gray-200 rounded-full flex justify-center items-center mr-3 text-sm  lg:w-8 lg:h-8">4</span>
                        <div class="block">
                            <h4 class="text-base  text-gray-900">Payment</h4>
                        </div>
                    </a>
                </li>
            </ol>

            <div class="py-5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">SUMMARY</h1>
                            <div class="relative overflow-x-auto mt-3">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Appointment ID:
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $data['appointment_id'] }}
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Appointment Date:
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $data['date'] }}
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Services:
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $services }}
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Required Recommendation:
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $recommend }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="flex justify-end">
                                    <a href="{{ route('u-pay') }}"><button type="button"
                                            class="mt-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Go
                                            To Payment</button></a>
                                </div>
                            </div>
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
</x-user-layout>
