@include('partials.header', ['title' => $title])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-500 p-1">

        <div>
            <a href="/product/create" class="inline-flex items-center text-green-500 bg-white border border-green-300 focus:outline-none hover:bg-green-100 focus:ring-4 focus:ring-green-200
            font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-green-800 dark:text-white dark:border-green-600 dark:hover:bg-green-700 dark:hover:border-green-600 dark:focus:ring-green-700"
                type="button">
                <svg fill="none" class="w-4 h-4 mr-2 text-green-400 " stroke="currentColor" stroke-width="1"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                    </path>
                </svg>
                Add New

            </a>
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <button>Add New</button>

            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative p-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="table-search-users"
                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for Product">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-200 dark:text-white mx-auto">
        <thead class="text-xs  uppercase bg-gray-50 dark:bg-gray-800 dark:white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Original Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Selling Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $row)
                <tr
                    class="bg-white border-b dark:bg-gray-700 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $row->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->quantity }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->original_price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->selling_price }}
                    </td>
                    <td class="px-6 py-4">
                        <!-- Modal toggle -->
                        <form action="/product/{{ $row->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <a href="/product/{{ $row->id }}" type="button"
                                class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md">
                                Edit</a>
                            <button type="submit" onclick="return confirm('Are You Sure Youw Want To delete this! ?')"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex flex-col items-center mt-2">
        {{ $product->links() }}
    </div>

</div>
@include('partials.footer')
