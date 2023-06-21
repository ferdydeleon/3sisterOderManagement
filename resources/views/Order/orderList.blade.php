@include('partials.header', ['title' => 'Order List'])

{{-- <header class="max-w-lg mx-auto mt-10">
        <a href="#" >
            <h1 class="text-4xl font-bold text-white text-center ">Order List</h1>
        </a>
    </header> --}}
<section class="mt-10 overflow-x-auto relative bg-white dark:bg-gray-500">
    <div>

        <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-500">
            <div>
            </div>
            <form action="/orderlist" method="POST">
                @csrf
                <div class="flex items-right right-0 p-2 ">
                    <div class="relative">
                        <input name="start" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('start') }}">
                        <label class="block text-gray-700 text-l font-bold  ml-1">Select date start</label>
                    </div>
                    <span class="mx-6  text-xl text-white "></span>
                    <div class="relative">
                        <input name="end" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800
                  block w-auto pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('end') }}">
                        <label class="block text-gray-700 text-l font-bold  ml-1">Select date end</label>
                    </div>

                    <div class="relative">
                        <button type="submit"
                            class="text-sm bg-blue-600 hover:bg-blue-700 text-bold text-white py-3 rounded shadow-lg
                hover:shadow-xl transition duration-200  w-auto pl-10  mx-6 p-10 h-auto">
                            Search</button>
                    </div>
                    <div class="relative">
                        <button type="submit"
                            class="text-sm bg-green-600 hover:bg-green-700 text-bold text-white py-3 rounded shadow-lg
                hover:shadow-xl transition duration-200  w-auto pl-10  mx-6 p-10 h-auto">

                            Print</button>
                    </div>
                </div>

        </div>
    </div>
    </form>
    </div>

    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    First Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Phone Numbe
                </th>
                <th scope="col" class="py-3 px-6">
                    Total Payment
                </th>
                {{-- <th scope="col" class="py-3 px-6">
                    Charge
                </th> --}}
                <th scope="col" class="py-3 px-6">
                    moth_of_payment
                </th>
                {{-- <th scope="col" class="py-3 px-6">
                    Status
                </th> --}}
                <th scope="col" class="py-3 px-6">
                    Notes
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $orders)
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6">
                        {{ date('d-m-Y', strtotime($orders->created_at)) }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $orders->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $orders->phone_number }}
                    </td>
                    <td class="py-4 px-6">
                        {{ number_format($orders->grand_total) }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $orders->mode_of_payment }}
                    </td>
                    {{-- <td class="py-4 px-6">
                        @if ($orders->payment_status == 1)
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> SUCCESS
                            </div>
                        @else
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> PENDING
                            </div>
                        @endif

                    </td> --}}
                    {{-- <td class="py-4 px-6">
                        {{ $orders->town }} {{ $orders->barangay }} {{ $orders->street }}
                    </td> --}}
                    <td class="py-4 px-6">
                        <p class="flex  items-center " style="width: 200px;display: block;"> {{ $orders->note }}</p>
                    </td>
                    <td class="py-4 px-6">
                        <a href="/view/orders/{{ $orders->refno }}"
                            class="inline-flex items-center px-4 py-2  hover:bg-indigo-600 text-white text-sm font-medium rounded-md">
                            View Order</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex flex-col items-center mt-2">
        {{ $order->links() }}
    </div>
    </div>
</section>
@include('partials.footer')




{{-- @include('partials.header' ,['title' => 'Order List'])
        <ul>
            @foreach ($order as $orders)
            <li>{{$orders->name}}  </li>
            @endforeach
        </ul>
@include('partials.footer') --}}
