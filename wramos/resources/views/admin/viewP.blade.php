@php
    use Carbon\Carbon;
@endphp
<x-admin-layout>
    <div class="sm:ml-64 h-screen flex flex-col justify-between">
        <div class="p-4 mx-4 rounded-lg dark:border-gray-700 mt-20">
            <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">ADMIN | PATIENT DETAILS</h1>
            <div class="relative overflow-x-auto mt-10 rounded-lg shadow-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Name:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->first . ' ' . $patient->last }}
                            </td>
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Email:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->email }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Mobile Number:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->phone }}
                            </td>
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Address:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->address }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Gender:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->gender }}
                            </td>
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Birthday:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->bday }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Age:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ intval(Carbon::parse($patient->bday)->diffInYears(Carbon::now())) }}
                            </td>
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Patient Registration Date:
                            </th>
                            <td class="px-6 py-4 text-lg">
                                {{ $patient->created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="bg-white dark:bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <strong>W.RAMOS</strong>. Developed by IS Student from TUP Manila.
                </span>
            </div>
        </footer>
    </div>

</x-admin-layout>
