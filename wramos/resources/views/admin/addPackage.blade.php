<x-admin-layout>
    <div class="sm:ml-64 h-screen flex flex-col justify-between">
        <div class="p-4 mx-4 rounded-lg dark:border-gray-700 mt-20">
            <h1 class="text-2xl font-bold border-b-2 border-red-500 pb-1">ADMIN | ADD PACKAGE</h1>
            <a href="{{ route('a-packages') }}">
                <button type="button"
                    class="mt-3 flex content-center gap-2 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    Back</button>
            </a>
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
            @include('partials._package')

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
