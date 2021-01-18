<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/admin/products" class="py-1 tracking-widest text-xs uppercase float-right">
                        Go Back
                    </a>
                    <h1 class="text-lg">
                        Edit Product: {{ $product->name }}
                    </h1>
                    <hr>
                    <div class="my-3">
                        <form action="/admin/products/{{ $product->id }}" method="post" class="mt-6">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="flex justify-between gap-3">
                                <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Category</label>
                                    <select name="category_id" id="category_id" class="block w-full p-2 mt-2 text-gray-700 bg-gray-200 appearance-none" required>
                                      <option value="">Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @elseif($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <div class="text-red-900 text-sm font-bold">{{ $errors->first('name') }}</div>
                                    @endif
                                </span>
                                <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Product Name</label>
                                  <input id="name" type="text" name="name" class="block w-full p-2 mt-2 text-gray-700 bg-gray-200 appearance-none" value="{{ old('name') ?? $product->name }}" required />
                                    @if($errors->has('name'))
                                        <div class="text-red-900 text-sm font-bold">{{ $errors->first('name') }}</div>
                                    @endif
                                </span>
                                <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">SKU</label>
                                  <input id="name" type="text" name="sku" class="block w-full p-2 mt-2 text-gray-700 bg-gray-200 appearance-none" value="{{ old('sku') ?? $product->sku }}" required />
                                    @if($errors->has('sku'))
                                        <div class="text-red-900 text-sm font-bold">{{ $errors->first('sku') }}</div>
                                    @endif
                                </span>
                                <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Price</label>
                                  <input id="name" type="number" step="0.01" name="price" class="block w-full p-2 mt-2 text-gray-700 bg-gray-200 appearance-none" value="{{ old('price') ?? $product->price }}" placeholder="1000.00" required />
                                    @if($errors->has('price'))
                                        <div class="text-red-900 text-sm font-bold">{{ $errors->first('price') }}</div>
                                    @endif
                                </span>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="w-1/6 py-2 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
