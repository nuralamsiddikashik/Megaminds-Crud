<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Offer') }}
        </h2>
    </x-slot>

    <div class="pt-10 flex items-center justify-center bg-gray-100">
        <div class="w-[600px] bg-white shadow rounded-xl p-8">
            <h2 class="text-lg font-semibold text-center mb-6">Edit Offer</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-5" method="POST" action="{{ route('offer.update', $offer->id) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" id="title"
                           value="{{ old('title', $offer->title) }}" placeholder="Title"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input type="number" name="price" id="price"
                           value="{{ old('price', $offer->price) }}" placeholder="Price"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="3" placeholder="Description"
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $offer->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="categories" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="categories[]" id="categories"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', $offer->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('categories')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="locations" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <select name="locations[]" id="locations"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}"
                                {{ in_array($location->id, old('locations', $offer->locations->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $location->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('locations')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between border-t pt-4">
                    <a href="{{ route('offers.index') }}"
                       class="flex items-center gap-1 text-gray-600 hover:text-gray-800">
                        ✕ Cancel
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
