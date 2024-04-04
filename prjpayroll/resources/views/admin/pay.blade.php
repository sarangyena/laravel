<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Payroll') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="font-bold text-2xl border-b-2 border-green-300">PAYROLL</p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Edit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Job
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rate
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No. Of Days
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Late
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Salary
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rate Per Hour
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No. Of Hours
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        OT Pay
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Holiday
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        PhilHealth
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        SSS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Advance
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->id }}
                                        </th>
                                        <td class="px-6 py-1">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                <img src="{{ asset('images/edit.png') }}">
                                            </a>
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->job }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->rate }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->days }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->late }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->salary }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->rph }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->hrs }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->otpay }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->holiday }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->philhealth }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->sss }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->advance }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $item->total }}
                                        </td>
                                        
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
