<x-app-layout>

    <div id="home">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-screen overflow-hidden rounded-lg">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-linear" data-carousel-item>
                    <img src="{{asset('images/c1.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-linear" data-carousel-item>
                    <img src="{{asset('images/c2.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div id="services">
        <div class="bg-red-500 py-10 px-20 text-white">
            <h1 class="text-7xl font-bold">3 EASY STEPS</h1>
            <h1 class="text-3xl">Select Services, Set an Appointment & Action</h1>
            <div class="flex mt-3">
                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Get Started</button>
                <button type="button" class="text-white hover:text-black border border-white hover:bg-white focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-white dark:focus:ring-white">Learn More</button>
            </div>
        </div>
        <div class="bg-white py-10 px-20 flex flex-col text-center">
            <h1 class="text-5xl font-bold">SERVICES</h1>
            <h1 class="text-xl text-justify px-40 mt-3">Our clinic provides a range of medical services, including check-ups, vaccinations, diagnostics, treatments for chronic conditions, and specialized care. With a focus on personalized attention, we ensure comprehensive healthcare for our patients.</h1>
        </div>
        <div class="columns-xs gap-5 p-6">
            @foreach ($services as $item)
                <div class="container rounded-lg bg-white h-4/5 w-auto p-5">
                    <img src="{{asset('images/'.$item->image_data)}}" class="mx-auto p-5" id="imagePreview">
                    <h1 class="text-3xl font-bold">{{$item->name}}</h1>
                    <p class="text-sm"><strong>Fee:</strong> ₱ {{$item->fee}}</p>
                    <p class="text-justify text-sm">{{$item->description}}</p>
                    <a href = "{{route('register')}}">
                        <button type="button" class="container mt-3 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Book</button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div id="contact">
        <div class="bg-white py-10 px-20 flex flex-col text-center">
            <h1 class="text-5xl font-bold">CONTACT US</h1>
            <h1 class="text-lg text-center px-40 mt-3">Get in touch with us easily! Whether you have questions, feedback, or inquiries, our team is here to assist you. Reach out via phone, email, or visit our office, and we'll be happy to help.</h1>
        </div>
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
        <form method="post" action="{{route('contact.store')}}" class="py-5 px-40">
            @csrf
            <div>
                <label for="name" class="ublock mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                <input type="text" name="name" id="name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address:</label>
                <input type="email" id="email" name="email" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-2">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number:</label>
                <input type="text" id="phone" name="phone" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message:</label>
                <input type="text" id="message" name="message" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit" class="container mt-3 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Submit</button>
        </form>
    </div>
    
    <div class="bg-white px-40 py-10">
        <h1 class="text-3xl font-bold">GET IN TOUCH!</h1>
        <p class="text-lg"><strong>Address:</strong> Lot 194 G. Lazaro St. Dalandanan, Valenzuela City</p>
        <p class="text-lg"><strong>Phone:</strong> (+63) 932-539-7973</p>
        <p class="text-lg"><strong>Office Hours:</strong> Monday to Saturday (8:00 AM to 4:30PM)</p>
        <p class="text-lg"><strong>Email Address:</strong> wramosdiagnosticlaboratory@gmail.com</p>
        <p class="text-lg font-bold mt-5">Copyright © 2014, All rights reserved.</p>
    </div>
</x-app-layout>



<!--SELECT        isnull(CONVERT(float, REPLACE(JODetails.EstimatedTotal, ',', '')),0) AS EstimatedTotal, JOLIST.JODATE, JOLIST.JOPLATE, JOLIST.JOMODEL, JOLIST.JOYEAR, JOLIST.JOCOMPANY, JOLIST.JOBRAND, JOLIST.JOUSER, isnull(CONVERT(float,REPLACE(JOLIST.JOTOTALESTI, ',', '')),0) AS JOTOTALESTI, isnull(CONVERT(float,REPLACE(JOLIST.JOSUBTOTAL, ',','')),0) AS JOSUBTOTAL, isnull(CONVERT(float, REPLACE(JOLIST.LESSDISCOUNT, ',', '')),0) AS LESSDISCOUNT, 
                         JODetails.BreakDownDetails, CONVERT(float, REPLACE(JODetails.EstimatedAmount, ',', '')) AS EstimatedAmount , tblVPrevAmount.JODetails, isnull(CONVERT(float,REPLACE(tblVPrevAmount.JOEstiAmount,',','')),0) AS JOEstiAmount, isnull(CONVERT(float,REPLACE(tblVPrevAmount.JOTotalEstiAmount, ',','')),0) AS JOTotalEstiAmount, JOLIST.JONO, JODetails.Accomplishment
FROM            JOLIST LEFT JOIN
                         JODetails ON JOLIST.JONo = JODetails.JONO 
						 LEFT JOIN
                         tblVPrevAmount ON JODetails.JONo = tblVPrevAmount.JONo
WHERE        (JOLIST.JONO = @id)-->