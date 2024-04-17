<x-qr-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl my-auto text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Log') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="font-bold text-2xl border-b-2 border-green-300">VIEW LOGIN</p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                        @if (!isset($qr) || $qr->isEmpty())
                            <div class="flex items-center mt-3 p-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
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
                                id="view">
                                <thead
                                    class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Role
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
                                            IP Address
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Geolocation
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Login
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Logout
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($qr as $data)
                                        <tr data-id="{{ $data->id }}"
                                            class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $data->id }}
                                            </th>
                                            <td class="px-6 py-1">
                                                {{ $data->role }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $data->userName }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $data->name }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $data->job }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $data->ip }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $data->geo }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ $data->created_at }}
                                            </td>
                                            @if($data->created_at->eq($data->updated_at))
                                                <td class="px-6 py-1">
                                                    
                                                </td>
                                            @else
                                                <td class="px-6 py-1">
                                                    {{ $data->updated_at }}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="mt-4">
                        {{ $qr->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="application/javascript">
            /*axios.post('qr/find', data)
                .then(response => {
                    const data = response.data;
                    $('#userName').val(data.userName);
                    $('#role').val(data.role);
                    $('#job').val(data.job);
                    $('#name').val(data.name);
                    axios.post('qr/image', data, {
                        responseType: 'blob'
                    })
                        .then(response => {
                            const blobData = response.data; // Retrieve Blob data
                            const blobUrl = URL.createObjectURL(blobData);
                            $('#imagePreview').attr('src', blobUrl);
                            $('#qrForm').submit();
                        })
                        .catch(error => {
                            console.error('Error retrieving Blob:', error);
                            // Handle error if needed
                        });
                })
                .catch(error => {
                    console.error(error.response.data);
                    // Handle error
                });
            });
        /*scanner.addListener('scan',function(c){
            navigator.geolocation.getCurrentPosition((position) => {
                var obj = {
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude
                }
                document.getElementById('username').value=c;
                obj.user = c;

                fetch('../private/scanQR_process.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'                            
                    },
                    body: JSON.stringify(obj)
                })
                .then(data => {
                    // Handle the response data if needed
                    console.log(data);
                    // Redirect to another page using JavaScript
                    window.location.href = '/capstone/log/index.php';
                })

                .catch(error => {
                    console.error('Error:', error);
                });
            })
            
        });
        })*/

        
    </script>
</x-qr-layout>
