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
                                <img src="{{ asset('images/loupe.png') }}" class="w-4">
                            </div>
                            <input type="text" id="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Employee . . ." required />
                        </div>
                    </form>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        @if (session('delete'))
                            <div class="flex items-center p-4 mb-4 mt-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{ session('delete') }}</span>
                                </div>
                            </div>
                        @elseif (session('update'))
                            <div class="flex items-center p-4 mb-4 mt-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{ session('update') }}</span>
                                </div>
                            </div>
                        @elseif (session('error'))
                            <div class="flex items-center p-4 mb-4 mt-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{ session('error') }}</span>
                                </div>
                            </div>
                        @endif
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
                                            Date Hired
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Print
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Week
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
                                            class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $pay->id }}
                                            </th>
                                            <td class="px-6 py-1">
                                                {{$pay->created_at}}
                                            </td>
                                            <td class="px-6 py-1">
                                                <a href="{{route('print', $pay->id)}}"
                                                    id="print"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    <img src="{{ asset('images/printer.png') }}" class="w-7">
                                                </a>
                                            </td>
                                            <td class="px-6 py-1">
                                                <a href="{{ route('a-payEdit', $pay->id) }}" id="edit"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    <img src="{{ asset('images/edit.png') }}">
                                                </a>
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $pay->week }}
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
                    @if (empty($log))
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
        $(document).ready(function(){
            $('#search').on('input', function() {
                var inputValue = $(this).val().toUpperCase();
                $('#payroll tbody tr').filter(function() {
                    $(this).toggle($(this).text().indexOf(inputValue) > -1);
                });
            });
        })
    </script>
</x-admin-layout>
