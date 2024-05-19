<x-app-layout>
<script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" integrity="sha384-E9+7TL9cxlIDbbF5+3k5jRkKQK1iOor9z0AsI5C/a8cYb/A5kaITaaJ5E5J4ENzQ" crossorigin="anonymous"></script>

<body class="bg-gray-900 text-white" x-data="{ showModal: false, serviceName: '' }">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-gray-200 text-center">Services</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <div class="bg-gray-800 p-4 rounded-lg shadow-lg ">
                    <h2 class="text-xl text-gray-300 font-bold mb-2">{{ $service->name }}</h2>
                    <p class="text-gray-400 mb-4">{{ $service->descripition }}</p>
                    <p class="text-gray-400 mb-4">Category: {{ $service->category }}</p>
                    <form action="{{ route('applyForService', $service->id) }}" method="POST" @submit.prevent="serviceName = '{{ $service->name }}'; showModal = true; $el.submit();">
                        @csrf
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Apply</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-gray-800 text-white rounded-lg p-6 shadow-lg w-1/2">
            <div class="flex justify-end">
                <button @click="showModal = false" class="text-gray-400 hover:text-gray-200">&times;</button>
            </div>
            <div class="flex flex-col items-center">
                <svg class="w-16 h-16 text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <h2 class="text-2xl font-bold mb-2">Applied Successfully</h2>
                <p class="text-gray-400 mb-4">You have successfully applied for <span x-text="serviceName"></span>. We will call you.</p>
                <button @click="showModal = false" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">OK</button>
            </div>
        </div>
    </div>

</x-app-layout>