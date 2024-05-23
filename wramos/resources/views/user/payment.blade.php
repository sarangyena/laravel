<x-user-layout>
    @php
        $data = cache(''.auth()->user()->id.'');
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
                <li class="relative ">
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-red-500 border border-transparent rounded-full flex justify-center items-center mr-3 text-sm text-white lg:w-8 lg:h-8">
                            4</span>
                        <div class="block">
                            <h4 class="text-base  text-red-500">Payment</h4>
                        </div>
                    </a>
                </li>
            </ol>
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-4 text-gray-900 dark:text-gray-100">
                            @if (isset($data))
                                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-bold">Payment Successful!</span> Thank you for using our
                                        services.
                                    </div>
                                </div>
                                <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">PAYMENT DETAILS</h1>
                                <div class="relative overflow-x-auto mt-3 rounded-lg">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Payment ID
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Type
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Payment Method Type
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Amount
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Paid At
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data['reference']}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ ucfirst($data['type']) }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ ucfirst($data['method']) }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ ucfirst($data['status']) }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    ₱ {{ $data['amount'] }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$data['paid_at']}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-bold">Warning!</span> We highly recommend to record the payment details for security purposes.
                                    </div>
                                </div>
                                <a class="flex justify-end" href="{{route('u-history')}}">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Finish</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user-layout>
