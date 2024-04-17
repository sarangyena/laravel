<x-employee-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Salary') }}
        </h2>
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
                                <img src="{{ asset('images/loupe.png') }}" class="w-4">
                            </div>
                            <input type="text" id="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Employee . . ." required />
                        </div>
                    </form>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        @if ($payroll->isEmpty())
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
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                id="payroll">
                                <thead
                                    class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Username
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
                                    @foreach ($payroll as $pay)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $pay->id }}
                                            </th>
                                            <td class="px-6 py-1">
                                                {{ $pay->userName }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->name }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->job }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->rate }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->days }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->late }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->salary }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->rph }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->hrs }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->otpay }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->holiday }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->philhealth }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->sss }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->advance }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="mt-4">
                        {{ $payroll->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="application/javascript">
        $(document).ready(function(){
            $('#search').on('input', function() {
                var inputValue = $(this).val().toUpperCase();
                $('#payroll tbody tr').filter(function() {
                    $(this).toggle($(this).text().indexOf(inputValue) > -1);
                });
            });
        })
    </script>
</x-employee-layout>
