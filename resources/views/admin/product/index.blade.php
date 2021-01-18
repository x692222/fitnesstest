<x-app-layout>
    <x-slot name="header">
        <a href="/admin/products/create" class="w-1/6 tracking-widest text-xs text-center uppercase float-right font-medium text-white uppercase bg-gray-400 py-1">
            Create Product
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            @if(session()->has('error'))
                                <div scope="col" class="px-6 py-3 text-left text-red-900 font-bold text-xs font-medium text-gray-500 tracking-wider border-2 border-red-900 m-5">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            SKU
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Images
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">View</span>
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $product->sku }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $product->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="px-2 inline-flex text-xs text-center leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    <div class="text-sm text-gray-900 text-center">{{ $product->images_count }}</div>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 text-right">{{ number_format($product->price,2) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ url('/admin/products/' . $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/admin/products/{{ $product->id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <a href="void();" class="text-indigo-600 hover:text-indigo-900" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More items... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-3">{{ $products->links() }}</div>

        </div>
    </div>
</x-app-layout>
