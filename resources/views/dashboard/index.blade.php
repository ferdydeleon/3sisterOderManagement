@include('partials.header', ['title' => 'Create Orders'])
<main class="bg-white max-w-7xl mx-auto p-5 my-10 rounded-lg shadow-2xl">
    <section class="mb-3">
        <h3 class="font-bold text-2xl">{{ $title }}</h3>
    </section>


<div class="flex items-center space-x-4">
<div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Top 10 Customer</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   <div class="flex items-center justify-between mb-4">
    <b class="text-l font-medium text-gray-900 truncate dark:text-white">Customer Name</b>
    <b class="text-l font-medium text-gray-900 truncate dark:text-white">
        Order Quantity
    </b>
</div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($topCustomer as $row)
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                           {{$row->name}}
                        </p>

                    </div>

                  <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    {{$row->total_qty}}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
   </div>

</div>



<div class="flex items-center space-x-4 p-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
           Top Product Sale
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Product Name
                </th>
                <th scope="col" class="px-6 py-3">
                 Quantity
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($top as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$row->name}}
                </th>
                <td class="px-6 py-4">
                    {{number_format($row->total_qty)}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
           Income Monthly
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Month
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Selling
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Original Price
                </th>
                <th scope="col" class="px-6 py-3">
                  Income
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($income as $val)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{($val->month)}}
                </th>
                <td class="px-6 py-4">
                    {{number_format($val->total_selling)}}
                </td>
                <td class="px-6 py-4">
                    {{number_format($val->total_original)}}
                </td>
                <td class="px-6 py-4">
                    {{number_format($val->total_selling - $val->total_original)}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



</div>
</div>

@include('partials.footer')
