@include('partials.header', ['title' => 'Create Orders'])



<section class="bg-white max-w-12xl mx-auto p-5 my-10 rounded-lg shadow-2xl">
    <h3 class="font-bold text-2xl">{{ $title }}</h3>
</section>


<main class="bg-white max-w-12xl mx-auto p-5 my-10 rounded-lg shadow-2xl">

<section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-6 md:gap-6 pt-9">
    <!-- Pricing Card -->
    <div class="w-full max-w-md p-4 border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
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
    <!-- Pricing Card -->

    <div class="w-full max-w-md p-4 border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Top Product Sale</h5>
            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                View all
            </a>
       </div>
       <div class="flex items-center justify-between mb-4">
        <b class="text-l font-medium text-gray-900 truncate dark:text-white">Product Name</b>
        <b class="text-l font-medium text-gray-900 truncate dark:text-white">
           Quantity
        </b>
    </div>
       <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($top as $row)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$row->name}}
                            </p>

                        </div>

                      <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        {{number_format($row->total_qty)}}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
       </div>
    </div>
    <!-- Pricing Card -->

    <div class="w-full text-sm  rounded-lg text-left text-gray-500 dark:text-gray-400">
     <table class="">
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
                    Total  Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Total DC
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
                    {{number_format($val->chargeTOtal)}}
                </td>
                <td class="px-6 py-4">
                    {{number_format(($val->total_selling - $val->total_original)+$val->chargeTOtal)}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
  </section>

@include('partials.footer')
