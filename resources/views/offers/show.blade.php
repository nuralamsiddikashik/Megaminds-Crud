<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Offer Details') }}
        </h2>
    </x-slot>

    <div class="pt-10 flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-[600px] bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-8 border-b pb-4">
                {{ $offer->title }}
            </h2>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="font-medium text-gray-600 dark:text-gray-300">Description:</span>
                    <span class="text-gray-800 dark:text-gray-100">{{ $offer->description }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <span class="font-medium text-gray-600 dark:text-gray-300">Price:</span>
                    <span class="text-green-600 dark:text-green-400 font-semibold">
                        ${{ number_format($offer->price, 2) }}
                    </span>
                </div>

                <div class="flex items-center justify-between">
                    <span class="font-medium text-gray-600 dark:text-gray-300">Created At:</span>
                    <span class="text-gray-700 dark:text-gray-200">{{ $offer->created_at->format('d M, Y h:i A') }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <span class="font-medium text-gray-600 dark:text-gray-300">Last Updated:</span>
                    <span class="text-gray-700 dark:text-gray-200">{{ $offer->updated_at->format('d M, Y h:i A') }}</span>
                </div>
            </div>

            <div class="mt-8 flex justify-center space-x-4">
                <a href="" 
                   class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200">
                    Back
                </a>
                <a href="" 
                   class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
