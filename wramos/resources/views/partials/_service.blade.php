@if (isset($data))
    @php
        $temp = explode(',', $data->day);
        for ($i = 0; $i < count($temp); $i++) {
            if ($temp[$i][0] === ' ') {
                $temp[$i] = Str::replaceFirst(substr($temp[$i], 0, 1), '', $temp[$i]);
            }
        }
        $daysOfWeek = [];
        for ($day = 0; $day < 7; $day++) {
            $daysOfWeek[] = Carbon\Carbon::now()->startOfWeek(Carbon\Carbon::SUNDAY)->addDays($day)->format('l');
        }
        dd($daysOfWeek);
    @endphp
@endif
<form method="post" action="{{ route('a-storeS') }}" enctype="multipart/form-data">
    @csrf
    <div class="columns-2">
        <div>
            <img src="{{ asset('images/service.png') }}" class="w-28 h-max mx-auto mt-3 my-7" id="imagePreview">
            <x-input-label for="imagePreview" :value="__('Upload Service Image:')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*"
                required />
        </div>
        <div>
            <x-input-label for="name" :value="__('Name:')" />
            <input type="text" name="name" value="{{ isset($data) ? $data->name : '' }}"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <x-input-label for="description" :value="__('Description:')" />
            <input type="text" name="description" value="{{ isset($data) ? $data->description : '' }}"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <x-input-label for="fee" :value="__('Fee:')" />
            <input type="text" name="fee" value="{{ isset($data) ? $data->fee : '' }}"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <x-input-label for="reserve" :value="__('Reserve Per Day:')" />
            <input type="text" name="reserve" value="{{ isset($data) ? $data->reserve : '' }}"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

    </div>

    <div class="flex mt-3 gap-3">
        <h1 class="font-bold">Day Available: </h1>
        <div class="flex items-center me-4">
            <input id="inline-checkbox" type="checkbox" value="Sunday" name="day[1]"
                @for ($i = 0; $i < count($temp) ; $i++)
                if() @endfor
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sunday</label>
        </div>
        <div class="flex items-center me-4">
            <input id="inline-2-checkbox" type="checkbox" value="Monday" name="day[2]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-2-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monday</label>
        </div>
        <div class="flex items-center me-4">
            <input id="inline-checked-checkbox" type="checkbox" value="Tuesday" name="day[3]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-checked-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuesday</label>
        </div>
        <div class="flex items-center me-4">
            <input id="inline-checked-checkbox" type="checkbox" value="Wednesday" name="day[4]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-checked-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wednesday</label>
        </div>
        <div class="flex items-center me-4">
            <input id="inline-checked-checkbox" type="checkbox" value="Thursday" name="day[5]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-checked-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thursday</label>
        </div>
        <div class="flex items-center me-4">
            <input id="inline-checked-checkbox" type="checkbox" value="Friday" name="day[6]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-checked-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friday</label>
        </div>
        <div class="flex items-center me-4">
            <input id="inline-checked-checkbox" type="checkbox" value="Saturday" name="day[]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inline-checked-checkbox"
                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saturday</label>
        </div>
    </div>

    <div class="flex items-center my-5">
        <input id="default-checkbox" type="checkbox" value="true" name="require"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Require
            Recommendation from Doctors (Optional)</label>
    </div>
    <div class="flex justify-end">
        <button type="submit"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Add</button>
    </div>
</form>
