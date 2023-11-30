@extends('layouts.master')

@section('title', 'Create Collection')

@section('contents')
    <section class="bg-gray-100 hidden" id="create-collection">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class="gap-12 flex justify-between">
                    <div class="max-w-lg space-y-3">
                        <h3 class="text-indigo-600 font-semibold">Collections</h3>
                        <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                            Create new Collection
                        </p>
                        <p>
                            You can create as many collections as you want and add collections to them.
                        </p>
                    </div>
                    <div>
                        <button onclick="hideCreateCollection()"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>
                    </div>
                </div>

                <div class="flex-1 mt-12 sm:max-w-lg lg:max-w-md">
                    <form method="POST" action="{{ route('collections.save') }}" class="space-y-5">
                        @sessionToken
                       
                        <input type="hidden" name="collectionid" id="collectionid" value="0">
                        <div>
                            <label class="font-medium"> Collection Name</label>
                            <input type="text" id="name" name="name" required
                                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
                        </div>
                        <div>
                            <label class="font-medium"> Collection Description </label>
                            <textarea rows="3" id="description" name="description"
                                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
                            Save Collection
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
                            <h3 class="text-indigo-600 font-semibold">Collections</h3>
                            <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                                Available collections
                            </p>
                            <p>
                                Here are your available collections. You can edit or delete them.
                            </p>
                        </div>
                        <div>
                            <button onclick="showCreateCollection()"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Create Collection
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
                                    <th class="py-3 pr-6">Status</th>
                                    <th class="py-3 pr-6"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 divide-y">
                                @foreach ($collections as $collection)
                                    <tr>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $collection->name }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $collection->description }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap"><span
                                                class="px-3 py-2 rounded-full font-semibold text-xs text-green-600 bg-green-50">Active</span>
                                        </td>

                                        <td class="text-right whitespace-nowrap">
                                            <button onclick="editCollection(this)"
                                                class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg"
                                                data-id="{{ $collection->id }}" data-name="{{ $collection->name }}"
                                                data-description="{{ $collection->description }}">Edit</button>
                                            &nbsp;
                                            <a href="{{ URL::tokenRoute('collections.products', ['collectionid' => $collection->id]) }}"
                                                class="py-1.5 px-3 text-red-600 hover:text-gray-500 duration-150 hover:bg-red-50 border rounded-lg">Products</a>
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
        function showCreateCollection() {
            document.getElementById('create-collection').classList.remove('hidden');
        }

        function hideCreateCollection() {
            document.getElementById('create-collection').classList.add('hidden');
            //clear the values
            document.getElementById('name').value = '';
            document.getElementById('description').value = '';
            document.getElementById('collectionid').value = '';
        }

        function editCollection(button) {
            console.log(button.dataset);
            document.getElementById('create-collection').classList.remove('hidden');
            //get the data-name, data-description and data-id
            document.getElementById('name').value = button.dataset.name;
            document.getElementById('description').value = button.dataset.description;
            document.getElementById('collectionid').value = button.dataset.id;
        }
    </script>
@endpush
