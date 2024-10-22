@section('content')
@php
$id = $_GET['id'];
@endphp

    <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 6 ,'type' => request()->route()->parameters['type']])  }}">     
        @csrf 
        <input type='hidden' name='id' value="{{$id}}">
        <input type='hidden' name='task' value="6"> 
        <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
        <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
        <div class="col-span-full">
            <p class="mt-3 text-sm leading-6 text-gray-600">Create a listing</p>
            <label for="collection_meta_further_description" class="block text-sm font-medium leading-6 text-gray-900">Any further info</label>
            
            <div class="mt-2">
                <p class="mt-3 text-sm leading-6 text-gray-600">Write your description here</p>
                <textarea id="collection_meta_further_description" name="collection_meta_further_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
          
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continue</button>
        </div>
    </form>
@endsection