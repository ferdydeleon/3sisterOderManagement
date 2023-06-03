
@include('partials.header',['title' => 'Order List'])

    {{-- <header class="max-w-lg mx-auto mt-10">
        <a href="#" >
            <h1 class="text-4xl font-bold text-white text-center ">Order List</h1>
        </a>
    </header> --}}
   <section class="mt-10">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            First Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Phone Numbe
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Order
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Amount
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Payment
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Address
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $orders )



                    <tr class="bg-gray-800 border-b text-white">
                        <td class="py-4 px-6">
                            {{$orders->name}}
                        </td>
                        <td class="py-4 px-6">
                            {{$orders->phone_number}}
                        </td>
                        <td class="py-4 px-6">
                            {{$orders->order}}
                        </td>
                        <td class="py-4 px-6">
                            {{$orders->amount}}
                        </td>
                        <td class="py-4 px-6">
                            {{$orders->payment}}
                        </td>
                        <td class="py-4 px-6">
                            {{$orders->town}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
   </section>
@include('partials.footer')




{{-- @include('partials.header' ,['title' => 'Order List'])
        <ul>
            @foreach ($order as $orders )
            <li>{{$orders->name}}  </li>
            @endforeach
        </ul>
@include('partials.footer') --}}


