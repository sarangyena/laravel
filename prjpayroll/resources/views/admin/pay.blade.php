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
                    <form class="flex items-center max-w-sm mt-3">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                                </svg>
                            </div>
                            <input type="text" id="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Employee . . ." required />
                        </div>
                    </form>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        @if ($employees->isEmpty())
                            <div class="flex items-center p-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
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
                                    @foreach ($employees as $employee)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $employee->id }}
                                            </th>
                                            <td class="px-6 py-1">
                                                <a href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    <img src="{{ asset('images/edit.png') }}">
                                                </a>
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->name }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->job }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->rate }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->days }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->late }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->salary }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->rph }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->hrs }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->otpay }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->holiday }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->philhealth }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->sss }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->advance }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $employee->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
