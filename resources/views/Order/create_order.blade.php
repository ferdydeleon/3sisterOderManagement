@include('partials.header',['title' => 'Create Orders'])
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
            <section>
                <h3 class="font-bold text-2xl">{{$title}}</h3>

            </section>
            <section class="mt-10">
                <form action="/order/customer" method="POST" class="flex flex-col">
                    @csrf  {{-- @csrf  certificate lahat ng unauthorize post na nd galing sa system nd papasukin --}}
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="text" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                          Customer Name
                        </label>
                        <select id="countries" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            @foreach ($customer as $row)
                            <option value="{{$row->name}}"  {{$row->name ==  $row->name ? 'selected' : ''}} >{{$row->name}}</option>
                            @endforeach
                        </select>

                    @error('name')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="order" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Product
                        </label>
                           <select id="product-dropdown" name="order" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            @foreach ($product as $row)
                            <option value="{{$row->name}}"  {{$row->name ==  $row->name ? 'selected' : ''}} >{{$row->name}}</option>
                            @endforeach
                        </select>
                        @error('order')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Price
                        </label>
                        <input id="amount"  type="number" name="amount" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('name')}} >
                        @error('amount')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="payment" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Status Payment
                        </label>
                        <select  name="payment" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            <option  value="" {{old('status_payment') == "" ? 'selected' : ''}} >Select</option>
                            <option value="COD" {{old('status_payment') == "COD" ? 'selected' : ''}}>COD</option>
                            <option value="Gcash" {{old('status_payment') == "Gcash" ? 'selected' : ''}}>Gcash</option>
                            <option value="Paid" {{old('status_payment') == "Paid" ? 'selected' : ''}}>Paid</option>
                          </select>
                          @error('payment')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="deliver_charge" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Deliver charge
                        </label>
                        <input  type="number" name="deliver_charge" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('name')}} >
                        @error('deliver_charge')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>

                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="note" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                           Notes
                        </label>
                        <textarea id="message" name="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300
                        focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Customer Notes..."></textarea>

                    </div>
                    <button class="bg-pink-600 hover:bg-pink-700 text-bold text-white py-2 rounded shadow-lg
                    hover:shadow-xl transition duration-200"
                    type="submit">Submit</button>
                </form>
            </section>
    </main>
@include('partials.footer')

