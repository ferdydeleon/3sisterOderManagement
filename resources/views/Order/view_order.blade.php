@include('partials.header', ['title' => $title])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-500">
        <div>
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            </div>
        </div>
        {{-- <label for="table-search" class="sr-only">Search dd</label> --}}
        <form action="/customer" method="POST" class="flex items-center">
            @csrf
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="search" name="name" id="voice-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" value={{ old('name') }}>
            </div>
            <button type="submit"
                class="mx-2.5 inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>Search
            </button>
        </form>
    </div>
    <table class="w-full text-sm text-left text-gray-200 dark:text-white mx-auto">
        <thead class="text-xs  uppercase bg-gray-50 dark:bg-gray-800 dark:white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $row)
                <tr
                    class="bg-white border-b dark:bg-gray-700 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ date('d-m-Y', strtotime($row->created_at)) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ number_format($row->price) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->qty }}
                    </td>
                    <td class="px-6 py-4">
                        {{ number_format($row->total) }}
                    </td>
                </tr>
            @endforeach
            <tr
            class="bg-white border-b dark:bg-gray-700 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                Grand Total :
            </td>
            <td class="px-6 py-4">

            </td>
            <td class="px-6 py-4">

            </td>
            <td class="px-6 py-4">

            </td>
            <td class="px-6 py-4">
                @foreach ($grandTotal as $val)
                       {{number_format($val->grand_total)}}
                @endforeach
            </td>
        </tr>

        </tbody>
    </table>
    {{-- <div class="flex flex-col items-center mt-2">
        {{ $orders->links() }}
    </div> --}}
</div>
@include('partials.footer')
