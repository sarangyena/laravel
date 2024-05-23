<x-admin-layout>
    <div class="sm:ml-64 h-screen flex flex-col justify-between">
        <div class="p-4 mx-4 rounded-lg dark:border-gray-700 mt-20">
            <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">ADMIN | APPOINTMENTS</h1>
            @if ($data->isEmpty())
                <div class="mt-3 flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">No data to be displayed.</span>
                    </div>
                </div>
            @else
                <div class="relative overflow-x-auto mt-3 rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Appointment ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Patient ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Services
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Appointment Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->appointment_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->patient_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->allServices }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->total }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <footer class="bg-white dark:bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <strong>W.RAMOS</strong>.
                    Developed by IS Student from TUP Manila.
                </span>
            </div>
        </footer>
    </div>
</x-admin-layout>
