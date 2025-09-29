<x-app-layout>

    <div class="py-10 px-6 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">All Offers</h3>
                <a href="{{ route('offer.create') }}"
                   class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    + Create Offer
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-left text-gray-700 dark:text-gray-200">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Categories</th>
                            <th class="px-4 py-3">Locations</th>
                            <th class="px-4 py-3">Created</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offers as $offer)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-medium text-gray-800 dark:text-gray-100">{{ $offer->title }}</td>
                                <td class="px-4 py-3 text-green-600 dark:text-green-400 font-semibold">
                                    ${{ number_format($offer->price, 2) }}
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">
                                    @foreach ($offer->categories as $category)
                                        {{ $category->title }}
                                    @endforeach
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">
                                    @foreach ($offer->locations as $location)
                                        {{ $location->title }}
                                    @endforeach
                                </td>
                                
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">
                                    {{ $offer->created_at->format('d M, Y') }}
                                </td>
                                <td class="px-4 py-3 flex items-center justify-center space-x-3">
                                    <a href="{{ route('offer.show', $offer->id) }}" 
                                       class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-lg">
                                        Show
                                    </a>
                                    <a href="" 
                                       class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded-lg">
                                        Edit
                                    </a>
                                    <form action="" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this offer?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-300">
                                    No offers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $offers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
