@section('content')
@php
    $lising_data = return_listing_meta(request()->route()->parameters['listing_id'],'',false)->toArray();
    $return_array = array();
    foreach($lising_data as $key => $meta){
        $return_array[$meta['meta']] = $meta['value'];
    }
@endphp
@switch(request()->route()->parameters['type'])
    
    @case(1 || 2) <!--Item Type--><!--Home Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 4,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]  ) }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="3"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}">
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Delivery details</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="collection_meta_delivery_address" class="block text-sm font-medium leading-6 text-gray-900">Delivery address*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$return_array['collection_meta_delivery_address']}}" name="collection_meta_delivery_address" id="collection_meta_delivery_address" autocomplete="collection_meta_delivery_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
        
                    <div class="sm:col-span-3">
                        <label for="collection_meta_delivery_level" class="block text-sm font-medium leading-6 text-gray-900">Delivery floor level</label>
                        <div class="mt-2">
                            <select id="collection_meta_delivery_level" name="collection_meta_delivery_level" autocomplete="collection_meta_delivery_level" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="0" @php if ($return_array['collection_meta_delivery_level'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                                <option value="1" @php if ($return_array['collection_meta_delivery_level'] == '1') echo ' selected="selected"'; @endphp>Ground</option>
                                <option value="2" @php if ($return_array['collection_meta_delivery_level'] == '2') echo ' selected="selected"'; @endphp>Level 1</option>
                                <option value="3" @php if ($return_array['collection_meta_delivery_level'] == '3') echo ' selected="selected"'; @endphp>Level 2</option>
                                <option value="4" @php if ($return_array['collection_meta_delivery_level'] == '4') echo ' selected="selected"'; @endphp>Level 3</option>
                                <option value="5" @php if ($return_array['collection_meta_delivery_level'] == '5') echo ' selected="selected"'; @endphp>Level 4</option>
                                <option value="6" @php if ($return_array['collection_meta_delivery_level'] == '6') echo ' selected="selected"'; @endphp>Level 5</option>
                                <option value="7" @php if ($return_array['collection_meta_delivery_level'] == '7') echo ' selected="selected"'; @endphp>Level 6</option>
                                <option value="8" @php if ($return_array['collection_meta_delivery_level'] == '8') echo ' selected="selected"'; @endphp>Level 7</option>
                                <option value="9" @php if ($return_array['collection_meta_delivery_level'] == '9') echo ' selected="selected"'; @endphp>Level 8</option>
                                <option value="10" @php if ($return_array['collection_meta_delivery_level'] == '10') echo ' selected="selected"'; @endphp>Level 9</option>
                                <option value="11" @php if ($return_array['collection_meta_delivery_level'] == '11') echo ' selected="selected"'; @endphp>Level 10</option>
                                <option value="12" @php if ($return_array['collection_meta_delivery_level'] == '12') echo ' selected="selected"'; @endphp>Level 11 or above</option>
                            </select>
                        </div>
                    </div>
        
                <div class="sm:col-span-3">
                    <label for="delivery_help" class="block text-sm font-medium leading-6 text-gray-900">Help loading</label>
                    <div class="mt-2">
                        <select id="collection_meta_delivery_help" name="collection_meta_delivery_help" autocomplete="help" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0" @php if ($return_array['collection_meta_delivery_help'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                            <option value="1" @php if ($return_array['collection_meta_delivery_help'] == '1') echo ' selected="selected"'; @endphp >I’m happy to load/unload</option>
                            <option value="2" @php if ($return_array['collection_meta_delivery_help'] == '2') echo ' selected="selected"'; @endphp >Requires 1 person </option>
                            <option value="3" @php if ($return_array['collection_meta_delivery_help'] == '3') echo ' selected="selected"'; @endphp >Requires 2 people </option>
                            <option value="4" @php if ($return_array['collection_meta_delivery_help'] == '4') echo ' selected="selected"'; @endphp >Requires 3 people </option>
                        </select>
                    </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_delivery_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                  <div class="mt-2">
                    <select id="collection_meta_delivery_dates_type" name="collection_meta_delivery_dates_type" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="0" @php if ($return_array['collection_meta_delivery_dates_type'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                        <option value="1" @php if ($return_array['collection_meta_delivery_dates_type'] == '1') echo ' selected="selected"'; @endphp >Flexiable</option>
                        <option value="2" @php if ($return_array['collection_meta_delivery_dates_type'] == '2') echo ' selected="selected"'; @endphp >ASAP</option>
                        <option value="3" @php if ($return_array['collection_meta_delivery_dates_type'] == '3') echo ' selected="selected"'; @endphp >Specific date</option>
                        <option value="4" @php if ($return_array['collection_meta_delivery_dates_type'] == '4') echo ' selected="selected"'; @endphp >Between dates</option>
                    </select>
                  </div>
                </div>
                <div class="sm:col-span-3" id="sp_date">
                    @php if(!empty($return_array['collection_meta_delivery_dates_from'])){ @endphp 
                        <input id="datepicker_from" value="{{$return_array['collection_meta_delivery_dates_from']}}" name="collection_meta_delivery_dates_from" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                    @php } @endphp
                    
                    @php if(!empty($return_array['collection_meta_delivery_dates_to'])){ @endphp 
                        <input id="datepicker_to"  value="{{$return_array['collection_meta_delivery_dates_to']}}" name="collection_meta_delivery_dates_to" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
                    @php } @endphp
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
    @case(3 || 4 || 5 || 6 || 7 || 8 )<!--'vehicle' || 'boat' || 'piano' || 'pet' || 'junk' || 'other' Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.create.step_two' ,['step' => 4,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]  ) }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="3"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            

          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Collection details</h2>
              
        
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="collection_meta_delivery_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_delivery_address" value="{{$return_array['collection_meta_delivery_address']}}" id="collection_meta_delivery_address" autocomplete="collection_meta_delivery_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="collection_meta_delivery_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                  <div class="mt-2">
                    <select id="collection_meta_delivery_dates_type" name="collection_meta_delivery_dates_type" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="0" @php if ($return_array['collection_meta_delivery_dates_type'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                        <option value="1" @php if ($return_array['collection_meta_delivery_dates_type'] == '1') echo ' selected="selected"'; @endphp >Flexiable</option>
                        <option value="2" @php if ($return_array['collection_meta_delivery_dates_type'] == '2') echo ' selected="selected"'; @endphp >ASAP</option>
                        <option value="3" @php if ($return_array['collection_meta_delivery_dates_type'] == '3') echo ' selected="selected"'; @endphp >Specific date</option>
                        <option value="4" @php if ($return_array['collection_meta_delivery_dates_type'] == '4') echo ' selected="selected"'; @endphp >Between dates</option>
                    </select>
                  </div>
                </div>
                <div class="sm:col-span-3" id="sp_date">
                    @php if(!empty($return_array['collection_meta_delivery_dates_from'])){ @endphp 
                        <input id="datepicker_from" value="{{$return_array['collection_meta_delivery_dates_from']}}" name="collection_meta_delivery_dates_from" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                    @php } @endphp
                    
                    @php if(!empty($return_array['collection_meta_delivery_dates_to'])){ @endphp 
                        <input id="datepicker_to"  value="{{$return_array['collection_meta_delivery_dates_to']}}" name="collection_meta_delivery_dates_to" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
                    @php } @endphp
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
