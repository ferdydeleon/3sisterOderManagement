@include('partials.header',['title' => $title])
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
            <section>
                <h3 class="font-bold text-2xl">{{$title}} {{$customer->name}}</h3>
            </section>
            <section class="mt-10">
                <form action="/customer/{{$customer->id}}" method="POST" class="flex flex-col">
                    @method('PUT')
                    @csrf  {{-- @csrf  certificate lahat ng unauthorize post na nd galing sa system nd papasukin --}}
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                          Full Name
                        </label>
                        <input  type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value="{{$customer->name}}" >
                    @error('name')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Phone Number
                        </label>
                        <input  type="number" name="phone_number"  class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4
                        border-gray-400 px-3" value="{{$customer->phone_number}}">
                        @error('phone_number')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="town" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Town
                        </label>
                        <select id="countries" name="town" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" >
                            <option value="" {{$customer->town == ""? 'selected' : ''}}></option>
                            <option  value="Echague"  {{$customer->town ==   "Echague" ? 'selected' : ''}} >Echague</option>
                            <option  value="Alicia"  {{$customer->town ==   "Alicia" ? 'selected' : ''}} >Alicia</option>
                            <option  value="San Mateo"  {{$customer->town ==   "San Mateo" ? 'selected' : ''}} >San Mateo</option>
                            <option value="Santiago"  {{$customer->town ==  "Santiago" ? 'selected' : ''}} >Santiago</option>
                            <option  value="Cauayan"  {{$customer->town ==  "Cauayan" ? 'selected' : ''}} >Cauayan</option>
                          </select>
                        @error('town')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="barangays" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                           Barangays
                        </label>

                     <input  type="text" name="barangay" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value="{{$customer->barangay}}">
                        @error('barangay')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>

                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="street" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                           Street Name/#
                        </label>

                     <input  type="text" name="street" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value="{{$customer->street}}">
                        @error('street')
                        <p class="text-red-500 text-xs mt-2 p-1">
                            {{$message}}
                        </p>
                    @enderror
                    </div>
                    <button class="bg-pink-600 hover:bg-pink-700 text-bold text-white py-2 rounded shadow-lg
                    hover:shadow-xl transition duration-200"
                    type="submit">Update</button>
                </form>
            </section>
    </main>
@include('partials.footer')

