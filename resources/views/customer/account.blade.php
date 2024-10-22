@extends('layouts.master_customer')

@section('title', 'Home Page')

@section('content')

        <div class="border-b border-gray-900/10 pb-12">

            <h2 class="text-base font-semibold leading-7 text-gray-900">Account details</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Your details</p>
            @if (\Session::has('error-details'))
                <div class="alert alert-error">
                    <ul>
                        @foreach (Session::get('error-details') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success-details'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success-details') !!}</li>
                    </ul>
                </div>
            @endif

            <form id='checkout-form' method='post' action="{{ route('customer.account.update') }}">   
                @csrf 
                <input type='hidden' name='id' value="{{$user->id}}"> 
                <input type='hidden' name='task' value="account"> 
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="fname" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                      <div class="mt-2">
                        <input value="{{$user->fname}}" type="text" name="fname" id="fname" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
        
                    <div class="sm:col-span-3">
                      <label for="lname" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                      <div class="mt-2">
                        <input  value="{{$user->lname}}" type="text" name="lname" id="lname" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
        
                    <div class="sm:col-span-3">
                      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                      <div class="mt-2">
                        <input  value="{{$user->email}}" id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="mobile" class="block text-sm font-medium leading-6 text-gray-900">Mobile</label>
                      <div class="mt-2">
                        <input  value="{{$user->mobile}}" id="mobile" name="mobile" type="text" autocomplete="mobile" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Your password</h2>
            @if (\Session::has('error-password'))
                <div class="alert alert-error">
                    <ul>
                        @foreach (Session::get('error-password') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success-details'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success-password') !!}</li>
                    </ul>
                </div>
            @endif
            
            <form id='checkout-form' method='post' action="{{ route('customer.account.update') }}">     
                @csrf 
                <input type='hidden' name='id' value="{{$user->id}}"> 
                <input type='hidden' name='task' value="password"> 
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="old_password" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
                      <div class="mt-2">
                        <input type="password" name="old_password" id="old_password" autocomplete="old_password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    
                    <div class="sm:col-span-3">
                      <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                      <div class="mt-2">
                        <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
        
                    <div class="sm:col-span-3">
                      <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                      <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
    
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </div>
            </form>    
        </div>
        
        



@endsection