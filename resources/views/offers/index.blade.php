<x-app-layout>
    <div class="py-10 px-6 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">All Offers</h3> <a href="{{ route('offer.create') }}" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"> + Create Offer </a> </div>

                <div class="bg-white py-4 mb-4 rounded-xl">
                    <form action="" class="flex flex:md-row flex-col gap-8 justify-center">
                        <div class="px-8 py-2 bg-white border border-gray-200 rounded-3xl">
                            <select name="status" id="status" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select Status</option> 
                              
                                @foreach(\App\Constants\Status::LIST as $status)
                                <option value="{{ $status }}" 
                                    {{ request()->query('status') === $status ? 'selected' : '' }}
                                    value="{{ $status }}">{{ $status }}
                            </option>
                            @endforeach
                            </select>
                        </div>
                    </form>
                </div>
               
                @if($offers->count() <= 0)
                <div class="mb-16 bg-white border border-gray-100 rounded-xl">
                    <div class="flex flex-col justify-center items-center">
                        <h3 class="p-6 text-center text-2xl font-bold text-gray-800 dark:text-gray-100">No Data Found</h3>
                    </div>
                </div>
                @else 
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-left text-gray-700 dark:text-gray-200">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Categories</th>
                            <th class="px-4 py-3">Locations</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Created</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody> @forelse ($offers as $offer)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800 dark:text-gray-100">{{ $offer->title }}</td>
                            <td class="px-4 py-3 text-green-600 dark:text-green-400 font-semibold"> ${{ number_format($offer->price, 2) }} </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300"> @foreach ($offer->categories as $category) {{ $category->title }} @endforeach </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300"> @foreach ($offer->locations as $location) {{ $location->title }} @endforeach </td>
                            
                            @if($offer->status === \App\Constants\Status::DRAFT)
                            <td class="px-4 py-3 text-green-600 dark:text-green-400 font-semibold"> 
                                <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300"> {{ $offer->status }}  </span>
                            </td>
                            @else
                            <td class="px-4 py-3 text-red-600 dark:text-red-400 font-semibold"> 
                                <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300"> {{ $offer->status }}  </span>
                            </td>
                            @endif

                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300"> {{ $offer->created_at->format('d M, Y') }} </td>
                            <td class="px-4 py-3 flex items-center justify-center space-x-3"> <a href="{{ route('offer.show', $offer->id) }}" class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-lg"> Show </a> <a href="{{ route('offer.edit', $offer->id) }}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded-lg"> Edit </a>
                                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this offer?');"> @csrf @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg"> Delete </button>
                                </form>
                            </td>
                        </tr> @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-300"> No offers found. </td>
                        </tr> @endforelse </tbody>
                </table>
            </div> {{-- Pagination --}}
           
            <div class="mt-6"> {{ $offers->links() }} </div>
             @endif
        </div>
    </div>
</x-app-layout>