@section('content')
@php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

@endphp
@switch(request()->route()->parameters['type'])
    
    @case(1 || 2) <!--Item || Home Type-->
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 4,'type' => request()->route()->parameters['type']])  }}">     
            @csrf 
            <input type='hidden' name='id' value="{{$id}}"> 
            <input type='hidden' name='task' value="4"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            <div class="col-span-full">
                <p class="mt-3 text-sm leading-6 text-gray-600">Create a listing</p>
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Contents in your home</label>
                
                <div class="mt-2">
                    <p class="mt-3 text-sm leading-6 text-gray-600">Describe or list each item that you need moved from your home.</p>
                    <textarea id="collection_meta_details" name="collection_meta_details" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
              
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continue</button>
            </div>
        </form>
    @break
    @case(3 || 4 || 5 || 6 || 7 || 8 )<!--'vehicle' || 'boat' || 'piano' || 'pet' || 'junk' || 'other' Type-->
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 4,'type' => request()->route()->parameters['type']])  }}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}"> 
            <input type='hidden' name='task' value="4"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Delivery details</h2>
              
        
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="collection_meta_delivery_address" class="block text-sm font-medium leading-6 text-gray-900">Delivery address*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_delivery_address" id="collection_meta_delivery_address" autocomplete="collection_meta_delivery_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="collection_meta_delivery_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                  <div class="mt-2">
                    <select id="collection_meta_delivery_dates_type" name="collection_meta_delivery_dates_type" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="0">Select</option>
                        <option value="1">Flexiable</option>
                        <option value="2">ASAP</option>
                        <option value="3">Specific date</option>
                        <option value="4">Between dates</option>
                    </select>
                  </div>
                </div>
                <div class="sm:col-span-3" id="sp_date">
                    <input id="datepicker_from" name="collection_meta_delivery_dates_from" style="display:none;" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                    <input id="datepicker_to"  name="collection_meta_delivery_dates_to" style="display:none;"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
                </div>
        
              </div>
            </div>
          </div>
        
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
        </form>
    @break
    @default
        {{dd(request("id"))}}
@endswitch
@endsection