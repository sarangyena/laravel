<x-user-layout>

    @php
        $data = cache('' . auth()->user()->id . '');
    @endphp
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
                <li class="relative ">
                    <a class="flex items-center font-medium w-full  ">
                        <span
                            class="w-6 h-6 bg-red-500 border border-transparent rounded-full flex justify-center items-center mr-3 text-sm text-white lg:w-8 lg:h-8">
                            2</span>
                        <div class="block">
                            <h4 class="text-base  text-red-500">Recommendation (Optional)</h4>
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
            <h1 class="text-2xl font-bold border-b-2 my-5 border-red-500 pb-1 inline-block">REQUIRED RECOMMENDATIONS
            </h1>
            <form method="post" action="{{ route('u-recommend') }}" enctype="multipart/form-data">
                @csrf
                <div class="columns-3">
                    @foreach ($data as $key => $value)
                        @if ($key == 'recommend')
                            @foreach ($value as $v => $v1)
                                <x-input-label for="{{ $v }}" :value="__($v1)" />
                                <x-text-input id="{{ $v }}" class="block mt-1 mb-1 w-full" type="file"
                                    name="{{ $v }}" accept="image/*" required />
                            @endforeach
                        @endif
                    @endforeach
                </div>

                <div class="mt-3 flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-bold">Warning!</span> You cannot change details after clicking next.
                    </div>
                </div>
                <div class="flex justify-between mt-3">
                    <a href="{{ route('u-book') }}">
                        <button type="button"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Back</button></a>
                    <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Next</button>
                </div>
            </form>
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
