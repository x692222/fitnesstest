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
                        {{ $product->name }}
                    </h1>
                    <hr>
                    <div class="my-3">
                        <div class="flex justify-between gap-3">
                                <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Category</label>
                                    {{ $product->category->name }}
                                </span>
                            <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Product Name</label>
                                  {{ $product->name }}
                                </span>
                            <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">SKU</label>
                                  {{ $product->sku }}
                                </span>
                            <span class="w-1/2">
                                  <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Price</label>
                                  {{ number_format($product->price,2) }}
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
