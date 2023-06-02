

@auth

<ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
    <li>
      <a href="/orderlist"  class="block py-2 pl-3 pr-4 text-white  rounded md:bg-transparent bg-blue-700 md:text-blue-700 md:p-0 dark:text-white " aria-current="page">Order List</a>
    </li>
    <li>
      <a href="/order/form" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Create Order</a>
    </li>
    <li>
      <a href="/customer/form" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Create Customer</a>
    </li>
    <li>
      <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Report</a>
    </li>
    <li>
    <form action="/logout" method="POST">
           @csrf
      <button class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</button>
    </form>
    </li>
  </ul>
@else
  @endauth





{{-- <ul class="flex flex-col md:flex-row px-4">

    <li class="">
        <a href="/orderlist" class="block py-2 pr-4 pl-3">Order List</a>
    </li>
    <li class="">
        <a href="/create" class="block py-2 pr-4 pl-3">Create Order</a>
    </li>
    <li class="">
        <a href="/report" class="block py-2 pr-4 pl-3">Report</a>
    </li>

    <li class="">
        <form action="/logout" method="POST">
         @csrf
        <button  class="block py-2 pr-4 pl-3">Logout</button>
        </form>
    </li>

</ul> --}}
