@include('partials.header', ['title' => 'Create Orders'])
<main class="bg-white max-w-7xl mx-auto p-5 my-10 rounded-lg shadow-2xl">
    <section class="mb-3">
        <h3 class="font-bold text-2xl">{{ $title }}</h3>
    </section>



    <form action="/order/customer" method="POST">
        @csrf {{-- @csrf  certificate lahat ng unauthorize post na nd galing sa system nd papasukin --}}
        <div id="Remove-Div_0" class="grid md:grid-cols-5 md:gap-6">
            <div class=" py-2.5 px-0 relative z-0 max-w-xl mb-6 group">
                <select id="name" name="customer_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    @foreach ($customer as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $row->id ? 'selected' : '' }}>
                            {{ $row->name }}</option>
                    @endforeach
                </select>
                <label for="floating_email"
                    class=" py-2.5 px-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            </div>

            <div class=" py-2.5 px-0 relative z-0 max-w-xl mb-6 group">

                <select id="mode_of_payment" name="mode_of_payment"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option value="" {{ old('status_payment') == '' ? 'selected' : '' }}>Select</option>
                    <option value="COD" {{ old('status_payment') == 'COD' ? 'selected' : '' }}>COD</option>
                    <option value="Gcash" {{ old('status_payment') == 'Gcash' ? 'selected' : '' }}>Gcash</option>
                    <option value="Paid" {{ old('status_payment') == 'Paid' ? 'selected' : '' }}>Paid</option>
                </select>
                <label for="mode_of_payment"
                    class=" py-2.5 px-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                    peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                    peer-focus:-translate-y-6">Payment
                    Status</label>
            </div>


            <div class=" py-2.5 px-0 relative z-0 max-w-xl mb-6 group">
                <input type="number" id="deliver_charge" name="charge"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="deliver_charge"
                    class=" py-2.5 px-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                    peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                    peer-focus:-translate-y-6">Delivery
                    Charge</label>
            </div>

            <div class=" py-2.5 px-0 relative z-0 max-w-xl mb-6 group">

                <input type="number" id="grandtotal" name="grandtotal"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder="" />
                <label for="grandtotal"
                class=" py-2.5 px-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                peer-focus:-translate-y-6">Grand Total</label>
        </div>


            <div class=" py-2.5 px-0 relative z-0 max-w-xl mb-6 group">
                <textarea id="note" name="note"
                    class="block  px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"></textarea>
                <label for="note"
                    class=" py-2.5 px-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                    peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                    peer-focus:-translate-y-6">Notes</label>
            </div>



        </div>

        <div id="table">
            <div id="Remove-Div_0" class="grid md:grid-cols-5 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">

                    <select id="product-dropdown0" name="product[]"
                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="" >Select</option>
                        @foreach ($product as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                        @endforeach
                    </select>

                    <label for="Product"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75
                        top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">

                    <input id="quantity0" type="number" name="quantity[]"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="Quantity"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600
                        peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantity</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input id="price0" type="number" name="price[]"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="Price"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0
                         peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="total[]" id="total0"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="Total"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600
                        peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <button type="button" value="0"
                        class="remove-button w-full focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</button>
                </div>
            </div>

        </div>

        <div class="grid gap-x-10 gap-y-10 grid-cols-4">

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
            font-medium rounded-lg text-sm w-full sm:w-auto text-center
         dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 px-10 py-2.5">submit</button>
        <input type="button" id="add"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none
             focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center
          dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            value="Add" />




    </div>
    </form>

    <script>
        var i = 0;
        $('#add').on('click', function() {
            ++i;
            $('#table').append(
                `<div  id="Remove-Div_` + i + `" class="grid md:grid-cols-5 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">

                    <select id="product-dropdown` + i + `" name="product[]"
                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        @foreach ($product as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $row->id ? 'selected' : '' }}>
                                {{ $row->name }}</option>
                        @endforeach
                    </select>

                    <label for="Product"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="quantity[]" id="quantity` + i + `"

                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="Quantity"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantity</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text"  name="price[]" id="price` + i + `"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="Price"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text"name="total[]" id="total` + i + `"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="total"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600
                        peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <button type="button" value=` + i + ` class="remove-button w-full focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</button>
                </div>

             </div>`
            );
        });
    </script>

    @include('partials.footer')
