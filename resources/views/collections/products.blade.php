@extends('layouts.master')

@section('title', 'Create Product')

@section('contents')
    <section class="bg-gray-100 hidden" id="create-product">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class="gap-12 flex justify-between">
                    <div class="max-w-lg space-y-3">
                        <h3 class="text-indigo-600 font-semibold">Products</h3>
                        <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                            Create new Product for {{ $collection->name }}
                        </p>
                        <p>
                            You can create as many products as you want and add them to a
                            collection
                        </p>
                    </div>
                    <div>
                        <button onclick="hideCreateProduct()"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>
                    </div>
                </div>

                <div class="flex-1 mt-12 sm:max-w-lg lg:max-w-md">
                    <form method="POST" action="{{ route('collections.products.save', ['collectionid' => $collection->id]) }}"
                        class="space-y-5">
                        @sessionToken
                        <input type="hidden" id="collectionid" name="collectionid" value="{{ $collection->id }}">
                        <input type="hidden" id="productid" name="productid" value="0">
                        <div>
                            <label class="font-medium"> Product Name </label>
                            <input type="text" id="name" name="name" required
                                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
                        </div>
                        <div>
                            <label class="font-medium"> Product Description </label>
                            <textarea rows="3" id="description" name="description"
                                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
                            Save Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class=" mx-auto gap-12">
                    <div class="flex justify-between">
                        <div class="max-w-lg space-y-3">
                            <h3 class="text-indigo-600 font-semibold">Products</h3>
                            <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                                Available Products for {{ $collection->name }}
                            </p>
                            <p>
                                Here are your available products for {{ $collection->name }}. You can edit or delete them.
                                <a href="{{ URL::tokenRoute('collections.index') }}"
                                    class="text-indigo-500 hover:text-indigo-700 font-bold rounded">
                                    Go Back
                                </a>
                            </p>
                        </div>
                        <div>
                            <button onclick="showCreateProduct()"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Create Product
                            </button>

                        </div>
                    </div>
                </div>
                <div class="max-w-screen-xl mx-auto px-4 py-4 md:px-8">
                    <div class="mt-12 relative h-max overflow-auto">
                        <table class="w-full table-auto text-sm text-left">
                            <thead class="text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 pr-6">Name</th>
                                    <th class="py-3 pr-6">Description</th>
                                    <th class="py-3 pr-6">status</th>
                                    <th class="py-3 pr-6"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 divide-y">
                                @foreach ($product as $singleProduct)
                                    <tr>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $singleProduct->name }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $singleProduct->description }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap"><span
                                                class="px-3 py-2 rounded-full font-semibold text-xs text-green-600 bg-green-50">Active</span>
                                        </td>

                                        <td class="text-right whitespace-nowrap">
                                            <button onclick="editProduct(this)"
                                                class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg"
                                                data-id="{{ $singleProduct->id }}" data-name="{{ $singleProduct->name }}"
                                                data-description="{{ $singleProduct->description }}">Edit</button>
                                            &nbsp;
                                            {{-- <a href="{{ URL::tokenRoute('collections.products', ['id' => $collection->id]) }}"
                                                class="py-1.5 px-3 text-red-600 hover:text-gray-500 duration-150 hover:bg-red-50 border rounded-lg">Products</a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection

@push('scripts')
    <script>
        function showCreateProduct() {
            document.getElementById('create-product').classList.remove('hidden');
        }

        function hideCreateProduct() {
            document.getElementById('create-product').classList.add('hidden');
            //clear the values
            document.getElementById('productid').value = '';
            document.getElementById('name').value = '';
            document.getElementById('description').value = '';

        }

        function editProduct(button) {
            console.log(button.dataset);
            document.getElementById('create-product').classList.remove('hidden');
            document.getElementById('productid').value = button.dataset.id;
            document.getElementById('name').value = button.dataset.name;
            document.getElementById('description').value = button.dataset.description;
        }
    </script>
@endpush
