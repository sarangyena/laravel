@if (isset($edit))
@php
    $temp = explode(",", $edit->services);
    for ($i=0; $i < count($temp); $i++) { 
        if($temp[$i][0] === ' '){
            $temp[$i] = Str::replaceFirst(substr($temp[$i], 0, 1), '', $temp[$i]);
        }
    }
@endphp
    <form method="post" class="mt-3" action="{{ route('a-updateP', $edit->id) }}">
        @csrf
        @method('patch')
        <x-input-label for="name" :value="__('Name:')" />
        <x-text-input id="name" class="block mb-2 mt-1 w-full" type="text" name="name" value="{{ old('name', $edit->name) }}" required  />
        <x-input-label for="description" :value="__('Description:')" />
        <x-text-input id="description" class="block mb-2 mt-1 w-full" type="text" name="description" value="{{ old('description', $edit->description) }}" required />
        <x-input-label for="fee" :value="__('Fee:')" />
        <div class="columns-2">
            <x-text-input id="fee" class="block w-full" type="text" name="fee" value="{{ old('fee', $edit->fee) }}" required />

            <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox" type="button"
                class="container flex justify-center bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Include
                Services<svg class="w-2.5 h-2.5 ms-3 self-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg></button>
        </div>


        <!-- Dropdown menu -->
        <div id="dropdownDefaultCheckbox"
            class="container z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                @foreach ($services as $s)
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value="{{ $s->name }}" name="service[]"
                            @for ($i = 0; $i < count($temp); $i++)
                                @if ($s->name == $temp[$i])
                                    checked
                                @endif
                            @endfor
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $s->name }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


        <button type="submit"
            class="flex mt-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Edit</button>

    </form>
@else
    <form method="post" class="mt-3" action="{{ route('a-storeP') }}">
        @csrf
        <x-input-label for="name" :value="__('Name:')" />
        <x-text-input id="name" class="block mb-2 mt-1 w-full" type="text" name="name" required />
        <x-input-label for="description" :value="__('Description:')" />
        <x-text-input id="description" class="block mb-2 mt-1 w-full" type="text" name="description" required />
        <x-input-label for="fee" :value="__('Fee:')" />
        <div class="columns-2">
            <x-text-input id="fee" class="block w-full" type="text" name="fee" required />

            <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox" type="button"
                class="container flex justify-center bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Include
                Services<svg class="w-2.5 h-2.5 ms-3 self-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg></button>
        </div>


        <!-- Dropdown menu -->
        <div id="dropdownDefaultCheckbox"
            class="container z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                @foreach ($services as $s)
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-1" type="checkbox" value="{{ $s->name }}" name="service[]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-1"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $s->name }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


        <button type="submit"
            class="flex mt-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Add</button>

    </form>
@endif
