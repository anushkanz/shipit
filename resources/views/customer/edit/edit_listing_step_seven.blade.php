@section('content')
@php
    $lising_data = return_listing_meta(request()->route()->parameters['listing_id'],'',false)->toArray();
    $return_array = array();
    foreach($lising_data as $key => $meta){
        $return_array[$meta['meta']] = $meta['value'];
    }
@endphp
    <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 8,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]  ) }}">     
        @csrf 
        <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
        <input type='hidden' name='task' value="7">  
        <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
        <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
        <div class="col-span-full">
            <p class="mt-3 text-sm leading-6 text-gray-600">Update a listing</p>
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Your listing is live!</label>
            
            <div class="mt-2">
                <p class="mt-3 text-sm leading-6 text-gray-600">Your {{return_data_id('Item',request()->route()->parameters['type'])->item}} listing has been posted and is now available for transporters to make quotes.</p>
                <p class="mt-3 text-sm leading-6 text-gray-600">Check back in your listings page to view your active listings and view quotes. Compare the quotes you receive by reading the transporter details. And finally, accept a quote and book your transporter.</p>
                <p class="mt-3 text-sm leading-6 text-gray-600">Contact the support team if you have any questions. </p>
            </div>
          
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/dashboard" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continue</a>
        </div>
    </form>
@endsection