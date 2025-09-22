<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Offer') }}
        </h2>
    </x-slot>
<div class="pt-10 flex items-center justify-center bg-gray-100">
  <div class="w-[600px] bg-white shadow rounded-xl p-8">
    <h2 class="text-lg font-semibold text-center mb-6">Create offer</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="space-y-5" method="POST" action="{{ route('offer.store') }}">
        @csrf

      <!-- Title -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
      </div>

      <!-- Price -->
      <div>
        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Price"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
               @error('price')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea name="description" id="description" rows="3" placeholder="Description"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                   @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
      </div>

      <!-- Category -->
      <div>
        <label for="categories" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <select name="categories[]" id="categories"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Select category...</option>
            @foreach($categories as $category)
              {{-- <option value="{{ $category->id }}" {{ old('categories') == $category->id ? 'selected' : '' }}>
                  {{ $category->title }} --}}
                <option value="{{ $category->id }}">{{in_array($category->id, old('categories', [])) ? 'selected' : ''}}{{ $category->title }}</option>
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
            <option value="">Select location...</option> 
            @foreach($locations as $location)
              {{-- <option value="{{ $location->id }}" {{ old('locations') == $location->id ? 'selected' : '' }}>
                  {{ $location->title }}
              </option> --}}

               <option value="{{ $location->id }}">{{in_array($location->id, old('locations', [])) ? 'selected' : ''}}{{ $location->title }}</option>
              </option>
            @endforeach
        </select>
        @error('locations')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
      </div>

      <!-- Buttons -->
      <div class="flex items-center justify-between border-t pt-4">
        <button type="button" class="flex items-center gap-1 text-gray-600 hover:text-gray-800">
          ✕ Cancel
        </button>
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
          Create
        </button>
      </div>
    </form>
  </div>
</div>



</x-app-layout>
