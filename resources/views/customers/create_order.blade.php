@include('partials.header',['title' => 'Create Orders'])
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
            <section>
                <h3 class="font-bold text-2xl">Create Orders</h3>

            </section>
            <section class="mt-10">
                <form action="/register/store" method="POST" class="flex flex-col">
                    @csrf  {{-- @csrf  certificate lahat ng unauthorize post na nd galing sa system nd papasukin --}}
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="text" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                          Customer Name
                        </label>
                        <input  type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('name')}} >
                    @error('name')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="text" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Order
                        </label>
                        <select id="countries" name="order" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            <option selected>Choose Order</option>
                            <option value="Echague">Cake</option>
                            <option value=">Milky_Donut">Milky Donut</option>
                            <option value="Fresh_lumpia">Fresh Lumpia</option>
                            <option value="Grayham">Grayham</option>
                          </select>
                        @error('order')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="text" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Price
                        </label>
                        <input  type="number" name="price" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('name')}} >
                        @error('price')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="text" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Status Payment
                        </label>
                        <select id="countries" name="status_payment" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            <option selected>Select</option>
                            <option value="COD">COD</option>
                            <option value="Gcash">Gcash</option>
                            <option value="Paid">Paid</option>
                          </select>
                          @error('status_payment')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                           Notes
                        </label>
                        <textarea id="message" name="notes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300
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

