@include('partials.header',['title' => 'Create Customer'])
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
            <section>
                <h3 class="font-bold text-2xl">Add Customer</h3>

            </section>
            <section class="mt-10">
                <form action="/register/store" method="POST" class="flex flex-col">
                    @csrf  {{-- @csrf  certificate lahat ng unauthorize post na nd galing sa system nd papasukin --}}
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="text" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Name
                        </label>
                        <input  type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('name')}} >
                    @error('name')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Phone Number
                        </label>
                        <input  type="number" name="phone_number"  class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4
                        border-gray-400 px-3" value={{old('phone_number')}}>
                        @error('phone_number')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Town
                        </label>
                        <select id="countries" name="town" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            <option selected>Choose Town</option>
                            <option value="Echague">Echague</option>
                            <option value="Alicia">Alicia</option>
                            <option value="Santiago">Santiago</option>
                            <option value="Cauayan">Cauayan</option>
                          </select>
                        @error('town')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                           Barangays
                        </label>
                        <select id="countries" name="barangays" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                            <option selected>Choose a country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                          </select>
                        {{-- <input  type="password" name="password_confirmation" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"> --}}
                        @error('barangays')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <button class="bg-pink-600 hover:bg-pink-700 text-bold text-white py-2 rounded shadow-lg
                    hover:shadow-xl transition duration-200"
                    type="submit">Submit</button>
                </form>
            </section>
    </main>
@include('partials.footer')

