<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl my-auto text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Employee') }}
            </h2>
            <a href="{{ route('a-view') }}"><button type="button"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">VIEW
                    EMPLOYEES</button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="font-bold text-2xl border-b-2 border-green-300">ADD EMPLOYEE</p>
                    @if (session('success'))
                        <div class="flex items-center p-4 mb-4 mt-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{ session('success') }}</span>
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
                    <form method="POST" action="{{ route('a-store') }}" id="empForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="columns-2 py-2">
                            <img src="{{ asset('images/user.png') }}" class="w-52 h-max mx-auto my-3" id="imagePreview">
                            <x-input-label for="imagePreview" :value="__('Upload Employee Image:')" />
                            <x-text-input id="image" class="block mt-1 w-full uppercase" type="file"
                                name="image" accept="image/*" required />
                            <div class="flex justify-evenly pt-10">
                                <x-input-label for="imagePreview" :value="__('ROLE:')" />
                                <input type="radio" id="emp" name="role" value="EMPLOYEE" required>
                                <x-input-label for="emp" :value="__('EMPLOYEE')" />
                                <input type="radio" id="on" name="role" value="ON-CALL" required>
                                <x-input-label for="on" :value="__('ON-CALL')" />
                            </div>
                            <div class="mt-5">
                                <x-input-label for="userName" :value="__('User ID:')" />
                                <x-text-input id="userName" class="block mt-1 w-full uppercase" type="text"
                                    name="userName" readonly required />
                            </div>
                        </div>
                        <div class="mt-3 columns-3">
                            <x-input-label for="last" :value="__('Last Name:')" />
                            <x-text-input id="last" class="block mt-1 w-full uppercase" type="text"
                                name="last" required />
                            <x-input-label for="first" :value="__('First Name:')" />
                            <x-text-input id="first" class="block mt-1 w-full uppercase" type="text"
                                name="first" required />
                            <x-input-label for="middle" :value="__('Middle Name:')" />
                            <x-text-input id="middle" class="block mt-1 w-full uppercase" type="text"
                                name="middle" />
                        </div>
                        <div class="mt-3 columns-3">
                            <x-input-label for="status" :value="__('Status:')" />
                            <x-select-input id="status" name="status" class="mt-1">
                                <option selected disabled>----------</option>
                                <option value="SINGLE">SINGLE</option>
                                <option value="MARRIED">MARRIED</option>
                                <option value="DIVORCED">DIVORCED</option>
                            </x-select-input>
                            <x-input-label for="email" :value="__('Email:')" />
                            <x-text-input id="email" class="block mt-1 w-full uppercase" type="email"
                                name="email" />
                            <x-input-label for="phone" :value="__('Phone No.:')" />
                            <x-text-input id="phone" class="block mt-1 w-full uppercase" type="text"
                                name="phone" />
                        </div>
                        <div class="mt-3 columns-3">
                            <x-input-label for="job" :value="__('Job:')" />
                            <x-select-input id="job" name="job" class="mt-1" required>
                                <option selected disabled>----------</option>
                                <option value="AREA MANAGER">AREA MANAGER</option>
                                <option value="BOOK KEEPER">BOOK KEEPER</option>
                                <option value="CASHIER">CASHIER</option>
                                <option value="FARMERS">FARMERS</option>
                                <option value="FARM MANAGER">FARM MANAGER</option>
                                <option value="GENERAL MANAGER">GENERAL MANAGER</option>
                                <option value="HR">HR</option>
                                <option value="PAYROLL ASSISTANT">PAYROLL ASSISTANT</option>
                                <option value="SECRETARY">SECRETARY</option>
                                <option value="SUPERVISOR">SUPERVISOR</option>
                                <option value="TECH SUPPORT">TECH SUPPORT</option>
                            </x-select-input>
                            <x-input-label for="sss" :value="__('SSS No.:')" />
                            <x-text-input id="sss" class="block mt-1 w-full uppercase" type="text"
                                name="sss" />
                            <x-input-label for="philhealth" :value="__('PhilHealth No.:')" />
                            <x-text-input id="philhealth" class="block mt-1 w-full uppercase" type="text"
                                name="philhealth" />
                        </div>
                        <div class="mt-3 columns-2">
                            <x-input-label for="pagibig" :value="__('Pag-Ibig No.:')" />
                            <x-text-input id="pagibig" class="block mt-1 w-full uppercase" type="text"
                                name="pagibig" />
                            <x-input-label for="rate" :value="__('Rate:')" />
                            <x-text-input id="rate" class="block mt-1 w-full uppercase" type="text"
                                name="rate" value="430" required />
                        </div>

                        <p class="font-semibold text-2xl leading-5 border-b-2 pb-2 mt-3 border-green-300">ADDRESS:</p>
                        <x-input-label for="address" :value="__('Address:')" />
                        <x-text-input id="address" class="block mt-1 w-full uppercase" type="text"
                            name="address" required />
                        <p class="font-semibold text-2xl leading-5 border-b-2 pb-2 mt-3 border-green-300">EMERGENCY
                            CONTACT:</p>
                        <x-input-label for="eName" :value="__('Full Name:')" />
                        <x-text-input id="eName" class="block mt-1 w-full uppercase" type="text"
                            name="eName" />
                        <x-input-label for="ePhone" :value="__('Phone No.:')" />
                        <x-text-input id="ePhone" class="block mt-1 w-full uppercase" type="text"
                            name="ePhone" />
                        <x-input-label for="eAdd" :value="__('Address:')" />
                        <x-text-input id="eAdd" class="block mt-1 w-full uppercase" type="text"
                            name="eAdd" />
                        <div class="flex mt-3 flex-row-reverse">
                            <x-primary-button class="m-3">
                                {{ __('Add') }}
                            </x-primary-button>
                            <x-secondary-button id="clear" class="m-3">
                                {{ __('Clear') }}
                            </x-secondary-button>
                        </div>
                    </form>
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
        $(document).ready(function() {
            //Image Preview
            $('#image').change(function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                        $('#imagePreview').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
            //Convert to Uppercase
            $('#empForm input[type="text"]').on('input', function() {
                $(this).val($(this).val().toUpperCase());
            });
            $('#empForm input[type="email"]').on('input', function() {
                $(this).val($(this).val().toUpperCase());
            });
            // EMPLOYEE
            $('#emp').change(function() {
                if ($(this).is(':checked')) {
                    const data = {
                        role: 'EMPLOYEE'
                    };
                    axios.post('username', data)
                        .then(response => {
                            var userId = document.getElementById("userName");
                            userId.value = response.data;
                            // Handle successful response
                        })
                        .catch(error => {
                            console.error(error.response.data);
                            // Handle error
                        });
                }
            });
            // ON-CALL
            $('#on').change(function() {
                if ($(this).is(':checked')) {
                    const data = {
                        role: 'ON-CALL'
                    };
                    axios.post('username', data)
                        .then(response => {
                            var userId = document.getElementById("userName");
                            userId.value = response.data;
                            // Handle successful response
                        })
                        .catch(error => {
                            console.error(error.response.data);
                            // Handle error
                        });
                }
            });
            //Clear Form
            $('#clear').click(function() {
                $('#empForm')[0].reset();
                $("#imagePreview").attr("src", "{{ asset('images/user.png') }}");
            })
        })
    </script>
</x-admin-layout>
