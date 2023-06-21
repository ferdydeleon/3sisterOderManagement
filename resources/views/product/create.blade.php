@include('partials.header',['title' => $title])
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
            <section>
                <h3 class="font-bold text-2xl">{{$title}}</h3>
            </section>
            <section class="mt-10">
                <form action="/product/store" method="POST" class="flex flex-col">
                    @csrf  {{-- @csrf  certificate lahat ng unauthorize post na nd galing sa system nd papasukin --}}
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                          Pruduct Name
                        </label>
                        <input  type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('name')}} >
                    @error('name')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Quantity
                        </label>
                        <input  type="number" name="quantity"  class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4
                        border-gray-400 px-3" value={{old('quantity')}}>
                        @error('quantity')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="original_price" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Original Price
                        </label>
                        <input  type="number" name="original_price"  class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4
                        border-gray-400 px-3" value={{old('original_price')}}>
                        @error('original_price')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="selling_price" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                           Selling Price
                        </label>
                        <input  type="number" name="selling_price"  class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4
                        border-gray-400 px-3" value={{old('selling_price')}}>
                        @error('selling_price')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>

                    <button class="bg-pink-600 hover:bg-pink-700 text-bold text-white py-2 rounded shadow-lg
                    hover:shadow-xl transition duration-200"
                    type="submit">Save Product</button>
                </form>
            </section>
    </main>
@include('partials.footer')

