@extends('layouts.master_customer')

@section('title', 'Home Page')

@section('content')

    
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Account details</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Your details</p>
    
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                  <div class="mt-2">
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
    
                <div class="sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                  <div class="mt-2">
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
    
                <div class="sm:col-span-3">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
            
                <div class="sm:col-span-3">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Mobile</label>
                  <div class="mt-2">
                    <input id="mobile" name="mobile" type="text" autocomplete="mobile" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
  
            </div>
        </div>
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Your password</h2>
    
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="old-password" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
                  <div class="mt-2">
                    <input type="password" name="old-password" id="old-password" autocomplete="old-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
    
                <div class="sm:col-span-3">
                  <label for="new-password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                  <div class="mt-2">
                    <input type="text" name="new-password" id="new-password" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
  
            </div>
        </div>
        
        



@endsection