@section('content')

@php
    $lising_data = return_listing_meta($listing['id'],'',false)->toArray();
    $return_array = array();
    foreach($lising_data as $key => $meta){
        $return_array[$meta['meta']] = $meta['value'];
    }
@endphp


@switch(request()->route()->parameters['type'])
    @case(1) <!--Item Type-->
        <form id='checkout-form' method='post' action="{{ route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id' => Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']] )}}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Item details</h2>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                            <div class="mt-2">
                                <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                    </div>
                    <div class="col-span-full">
                          <label for="collection_meta_details" class="block text-sm font-medium leading-6 text-gray-900">Item name*</label>
                          <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_details']}}" name="collection_meta_details" id="collection_meta_details" autocomplete="collection_meta_details" placeholder="Example — Construction material" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                    </div> 
                    <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                    <div class="sm:col-span-3">
                        <label for="collection_meta_level" class="block text-sm font-medium leading-6 text-gray-900">Collection floor level</label>
                        <div class="mt-2">
                            <select id="collection_meta_level" name="collection_meta_level" autocomplete="collection_meta_level" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="0" @php if ($return_array['collection_meta_level'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                                <option value="1" @php if ($return_array['collection_meta_level'] == '1') echo ' selected="selected"'; @endphp >Ground</option>
                                <option value="2" @php if ($return_array['collection_meta_level'] == '2') echo ' selected="selected"'; @endphp >Level 1</option>
                                <option value="3" @php if ($return_array['collection_meta_level'] == '3') echo ' selected="selected"'; @endphp >Level 2</option>
                                <option value="4" @php if ($return_array['collection_meta_level'] == '4') echo ' selected="selected"'; @endphp >Level 3</option>
                                <option value="5" @php if ($return_array['collection_meta_level'] == '5') echo ' selected="selected"'; @endphp >Level 4</option>
                                <option value="6" @php if ($return_array['collection_meta_level'] == '6') echo ' selected="selected"'; @endphp >Level 5</option>
                                <option value="7" @php if ($return_array['collection_meta_level'] == '7') echo ' selected="selected"'; @endphp >Level 6</option>
                                <option value="8" @php if ($return_array['collection_meta_level'] == '8') echo ' selected="selected"'; @endphp >Level 7</option>
                                <option value="9" @php if ($return_array['collection_meta_level'] == '9') echo ' selected="selected"'; @endphp >Level 8</option>
                                <option value="10" @php if ($return_array['collection_meta_level'] == '10') echo ' selected="selected"'; @endphp >Level 9</option>
                                <option value="11" @php if ($return_array['collection_meta_level'] == '11') echo ' selected="selected"'; @endphp >Level 10</option>
                                <option value="12" @php if ($return_array['collection_meta_level'] == '12') echo ' selected="selected"'; @endphp >Level 11 or above</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_help" class="block text-sm font-medium leading-6 text-gray-900">Help loading</label>
                      <div class="mt-2">
                        <select id="help" name="collection_meta_help" autocomplete="collection_meta_help" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0" @php if ($return_array['collection_meta_help'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                            <option value="1" @php if ($return_array['collection_meta_help'] == '1') echo ' selected="selected"'; @endphp >I’m happy to load/unload</option>
                            <option value="2" @php if ($return_array['collection_meta_help'] == '2') echo ' selected="selected"'; @endphp >Requires 1 person </option>
                            <option value="3" @php if ($return_array['collection_meta_help'] == '3') echo ' selected="selected"'; @endphp >Requires 2 people </option>
                            <option value="4" @php if ($return_array['collection_meta_help'] == '4') echo ' selected="selected"'; @endphp >Requires 3 people </option>
                        </select>
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                        <label for="collection_meta_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                        <div class="mt-2">
                            <select id="collection_meta_dates_type" name="collection_meta_dates_type" autocomplete="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="0" @php if ($return_array['collection_meta_dates_type'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                                <option value="1" @php if ($return_array['collection_meta_dates_type'] == '1') echo ' selected="selected"'; @endphp >Flexiable</option>
                                <option value="2" @php if ($return_array['collection_meta_dates_type'] == '2') echo ' selected="selected"'; @endphp >ASAP</option>
                                <option value="3" @php if ($return_array['collection_meta_dates_type'] == '3') echo ' selected="selected"'; @endphp >Specific date</option>
                                <option value="4" @php if ($return_array['collection_meta_dates_type'] == '4') echo ' selected="selected"'; @endphp >Between dates</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3" id="sp_date">
                        
                        @php if(!empty($return_array['collection_meta_dates_from'])){ @endphp 
                            <input id="datepicker_from" value="{{$return_array['collection_meta_dates_from']}}" name="collection_meta_dates_from" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                        @php } @endphp
                        
                        @php if(!empty($return_array['collection_meta_dates_to'])){ @endphp 
                            <input id="datepicker_to"  value="{{$return_array['collection_meta_dates_to']}}" name="collection_meta_dates_to" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
                        @php } @endphp
                        
                    </div>
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_dimensions" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_dimensions" name="collection_meta_unit_dimensions" autocomplete="collection_meta_unit_dimensions" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1" @php if ($return_array['collection_meta_unit_dimensions'] == '1') echo ' selected="selected"'; @endphp >CM</option>
                                    <option value="2" @php if ($return_array['collection_meta_unit_dimensions'] == '2') echo ' selected="selected"'; @endphp >M</option>
                                    <option value="3" @php if ($return_array['collection_meta_unit_dimensions'] == '3') echo ' selected="selected"'; @endphp >FT</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_length']}}" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                        <div>
                            <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_width']}}" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                      
                        <div>
                            <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_height']}}" name="collection_meta_height" id="collection_meta_height" autocomplete="collection_meta_height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1"  @php if ($return_array['collection_meta_unit_weight'] == '1') echo ' selected="selected"'; @endphp >Kg</option>
                                    <option value="2"  @php if ($return_array['collection_meta_unit_weight'] == '2') echo ' selected="selected"'; @endphp >Ton</option>
                                    <option value="3"  @php if ($return_array['collection_meta_unit_weight'] == '3') echo ' selected="selected"'; @endphp >LB</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_weight']}}" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
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
    @case(2) <!--Home Type-->
        <form id='checkout-form' method='post' action="{{ route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id'] ] ) }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Collection details</h2>
              
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
        
                <div class="sm:col-span-3">
                  <label for="collection_meta_level" class="block text-sm font-medium leading-6 text-gray-900">Collection floor level</label>
                  <div class="mt-2">
                        <select id="collection_meta_level" name="collection_meta_level" autocomplete="collection_meta_level" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0" @php if ($return_array['collection_meta_level'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                            <option value="1" @php if ($return_array['collection_meta_level'] == '1') echo ' selected="selected"'; @endphp >Ground</option>
                            <option value="2" @php if ($return_array['collection_meta_level'] == '2') echo ' selected="selected"'; @endphp >Level 1</option>
                            <option value="3" @php if ($return_array['collection_meta_level'] == '3') echo ' selected="selected"'; @endphp >Level 2</option>
                            <option value="4" @php if ($return_array['collection_meta_level'] == '4') echo ' selected="selected"'; @endphp >Level 3</option>
                            <option value="5" @php if ($return_array['collection_meta_level'] == '5') echo ' selected="selected"'; @endphp >Level 4</option>
                            <option value="6" @php if ($return_array['collection_meta_level'] == '6') echo ' selected="selected"'; @endphp >Level 5</option>
                            <option value="7" @php if ($return_array['collection_meta_level'] == '7') echo ' selected="selected"'; @endphp >Level 6</option>
                            <option value="8" @php if ($return_array['collection_meta_level'] == '8') echo ' selected="selected"'; @endphp >Level 7</option>
                            <option value="9" @php if ($return_array['collection_meta_level'] == '9') echo ' selected="selected"'; @endphp >Level 8</option>
                            <option value="10" @php if ($return_array['collection_meta_level'] == '10') echo ' selected="selected"'; @endphp >Level 9</option>
                            <option value="11" @php if ($return_array['collection_meta_level'] == '11') echo ' selected="selected"'; @endphp >Level 10</option>
                            <option value="12" @php if ($return_array['collection_meta_level'] == '12') echo ' selected="selected"'; @endphp >Level 11 or above</option>
                        </select>
                  </div>
                </div>
        
                <div class="sm:col-span-3">
                  <label for="collection_meta_help" class="block text-sm font-medium leading-6 text-gray-900">Help loading</label>
                  <div class="mt-2">
                    <select id="help" name="collection_meta_help" autocomplete="collection_meta_help" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0" @php if ($return_array['collection_meta_help'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                            <option value="1" @php if ($return_array['collection_meta_help'] == '1') echo ' selected="selected"'; @endphp >I’m happy to load/unload</option>
                            <option value="2" @php if ($return_array['collection_meta_help'] == '2') echo ' selected="selected"'; @endphp >Requires 1 person </option>
                            <option value="3" @php if ($return_array['collection_meta_help'] == '3') echo ' selected="selected"'; @endphp >Requires 2 people </option>
                            <option value="4" @php if ($return_array['collection_meta_help'] == '4') echo ' selected="selected"'; @endphp >Requires 3 people </option>
                    </select>
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <label for="collection_meta_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                    <div class="mt-2">
                        <select id="collection_meta_dates_type" name="collection_meta_dates_type" autocomplete="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0" @php if ($return_array['collection_meta_dates_type'] == '0') echo ' selected="selected"'; @endphp >Select</option>
                            <option value="1" @php if ($return_array['collection_meta_dates_type'] == '1') echo ' selected="selected"'; @endphp >Flexiable</option>
                            <option value="2" @php if ($return_array['collection_meta_dates_type'] == '2') echo ' selected="selected"'; @endphp >ASAP</option>
                            <option value="3" @php if ($return_array['collection_meta_dates_type'] == '3') echo ' selected="selected"'; @endphp >Specific date</option>
                            <option value="4" @php if ($return_array['collection_meta_dates_type'] == '4') echo ' selected="selected"'; @endphp >Between dates</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-3" id="sp_date">
                        
                        @php if(!empty($return_array['collection_meta_dates_from'])){ @endphp 
                            <input id="datepicker_from" value="{{$return_array['collection_meta_dates_from']}}" name="collection_meta_dates_from"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                        @php } @endphp
                        
                        @php if(!empty($return_array['collection_meta_dates_to'])){ @endphp 
                            <input id="datepicker_to"  value="{{$return_array['collection_meta_dates_to']}}" name="collection_meta_dates_to" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
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
    @case(3)  <!--Vehicle Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]) }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Vehicle details</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div> 
                    <div class="col-span-full">
                      <label for="collection_meta_describe_vehicle" class="block text-sm font-medium leading-6 text-gray-900">Describe vehicle*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$return_array['collection_meta_describe_vehicle']}}" name="collection_meta_describe_vehicle" id="collection_meta_describe_vehicle" autocomplete="describe_vehicle" placeholder="Example — RV, family car, school bus" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
        
                    <div class="sm:col-span-3">
                      <label for="collection_meta_vehicle_type" class="block text-sm font-medium leading-6 text-gray-900">Vehicle type*</label>
                      <div class="mt-2">
                        <select id="collection_meta_vehicle_type" name="collection_meta_vehicle_type" autocomplete="collection_meta_vehicle_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1"  @php if ($return_array['collection_meta_vehicle_type'] == '1') echo ' selected="selected"'; @endphp >Car,van,SUV,Ute</option>
                            <option value="2"  @php if ($return_array['collection_meta_vehicle_type'] == '2') echo ' selected="selected"'; @endphp >Truck, Bus, Large RV</option>
                            <option value="3"  @php if ($return_array['collection_meta_vehicle_type'] == '3') echo ' selected="selected"'; @endphp >Classic or race car transport</option>
                            <option value="4"  @php if ($return_array['collection_meta_vehicle_type'] == '4') echo ' selected="selected"'; @endphp >Special vehicle or machinery (Digger etc)</option>
                        </select>
                      </div>
                    </div>
        
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_make" class="block text-sm font-medium leading-6 text-gray-900">Vehicle make*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_vehicle_make']}}" name="collection_meta_vehicle_make" id="collection_meta_vehicle_make" autocomplete="collection_meta_vehicle_make" placeholder="Example — Fiat, Tesla, Toyota" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_model" class="block text-sm font-medium leading-6 text-gray-900">Vehicle model</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_vehicle_model']}}" name="collection_meta_vehicle_model" id="collection_meta_vehicle_model" autocomplete="collection_meta_vehicle_model" placeholder="Example — 500, Corolla, 911, Clio" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_year" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Year</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_vehicle_year']}}" name="collection_meta_vehicle_year" id="collection_meta_vehicle_year" autocomplete="collection_meta_vehicle_year" placeholder="Example — 2001" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_plate_number" class="block text-sm font-medium leading-6 text-gray-900">Plate number (optional)</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_vehicle_plate_number']}}" name="collection_meta_vehicle_plate_number" id="collection_meta_vehicle_plate_number" autocomplete="collection_meta_vehicle_plate_number" placeholder="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_operational" class="font-medium text-gray-900">Vehicle is operational</label>
                        <input id="collection_meta_operational" @php if ($return_array['collection_meta_operational'] == '1') echo ' "checked"'; @endphp  name="collection_meta_operational" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_legal" class="font-medium text-gray-900">Vehicle is road legal and can be towed</label>
                        <input id="collection_meta_legal" @php if ($return_array['collection_meta_legal'] == '1') echo ' "checked"'; @endphp name="collection_meta_legal" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    
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
    @case(4)  <!--Boat Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]  )}}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Boat details</h2>
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="collection_meta_describe_boat" class="block text-sm font-medium leading-6 text-gray-900">Describe boat*</label>
                  <div class="mt-2">
                    <input type="text"  value="{{$return_array['collection_meta_describe_boat']}}" name="collection_meta_describe_boat" id="collection_meta_describe_boat" autocomplete="collection_meta_describe_boat" placeholder="Example — Sailboat Beneteau Oceanis 500" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_boat_type" class="block text-sm font-medium leading-6 text-gray-900">What type of boat is it?*</label>
                  <div class="mt-2">
                    <select id="collection_meta_boat_type" name="collection_meta_boat_type" autocomplete="collection_meta_boat_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1" @php if ($return_array['collection_meta_boat_type'] == '1') echo ' selected="selected"'; @endphp >Sailing boat</option>
                        <option value="2" @php if ($return_array['collection_meta_boat_type'] == '2') echo ' selected="selected"'; @endphp >Motor boat</option>
                        <option value="3" @php if ($return_array['collection_meta_boat_type'] == '3') echo ' selected="selected"'; @endphp >House boat</option>
                        <option value="4" @php if ($return_array['collection_meta_boat_type'] == '4') echo ' selected="selected"'; @endphp >Inflatable boat</option>
                        <option value="5" @php if ($return_array['collection_meta_boat_type'] == '5') echo ' selected="selected"'; @endphp >Small boat</option>
                        <option value="6" @php if ($return_array['collection_meta_boat_type'] == '6') echo ' selected="selected"'; @endphp >Other boat</option>
                    </select>
                  </div>
                </div>
                <div class="col-span-full">
                    <h4 class="text-base font-semibold leading-7 text-gray-900">Approx dimensions</h4>
                </div>
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_dimensions" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            <select id="collection_meta_unit_dimensions" name="collection_meta_unit_dimensions" autocomplete="unit_dimensions" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1" @php if ($return_array['collection_meta_unit_dimensions'] == '1') echo ' selected="selected"'; @endphp >CM</option>
                                <option value="2" @php if ($return_array['collection_meta_unit_dimensions'] == '2') echo ' selected="selected"'; @endphp >M</option>
                                <option value="3" @php if ($return_array['collection_meta_unit_dimensions'] == '3') echo ' selected="selected"'; @endphp >FT</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_length']}}" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>
                    <div>
                        <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_width']}}" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>
                  
                    <div>
                        <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_height']}}" name="collection_meta_height" id="collection_meta_height" autocomplete="height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                
                
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1" @php if ($return_array['collection_meta_unit_weight'] == '1') echo ' selected="selected"'; @endphp >Kg</option>
                                <option value="2" @php if ($return_array['collection_meta_unit_weight'] == '2') echo ' selected="selected"'; @endphp >Ton</option>
                                <option value="3" @php if ($return_array['collection_meta_unit_weight'] == '3') echo ' selected="selected"'; @endphp >LB</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_weight']}}" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>

                </div>

                <div class="sm:col-span-3">
                  <label for="collection_meta_keel_type" class="block text-sm font-medium leading-6 text-gray-900">Type of keel*</label>
                  <div class="mt-2">
                    <select id="collection_meta_keel_type" name="collection_meta_keel_type" autocomplete="collection_meta_keel_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1" @php if ($return_array['collection_meta_keel_type'] == '1') echo ' selected="selected"'; @endphp >None</option>
                        <option value="2" @php if ($return_array['collection_meta_keel_type'] == '2') echo ' selected="selected"'; @endphp >Bilge keel</option>
                        <option value="3" @php if ($return_array['collection_meta_keel_type'] == '3') echo ' selected="selected"'; @endphp >Chined hull</option>
                        <option value="4" @php if ($return_array['collection_meta_keel_type'] == '4') echo ' selected="selected"'; @endphp >Dagger board</option>
                        <option value="5" @php if ($return_array['collection_meta_keel_type'] == '5') echo ' selected="selected"'; @endphp >Doppelkeil</option>
                        <option value="6" @php if ($return_array['collection_meta_keel_type'] == '6') echo ' selected="selected"'; @endphp >Fin keel</option>
                        <option value="7" @php if ($return_array['collection_meta_keel_type'] == '7') echo ' selected="selected"'; @endphp >Lifting keel</option>
                        <option value="8" @php if ($return_array['collection_meta_keel_type'] == '8') echo ' selected="selected"'; @endphp >Long keel</option>
                        <option value="9" @php if ($return_array['collection_meta_keel_type'] == '9') echo ' selected="selected"'; @endphp >Short keel</option>
                        <option value="10" @php if ($return_array['collection_meta_keel_type'] == '10') echo ' selected="selected"'; @endphp >Smooth curve hull</option>
                        <option value="11" @php if ($return_array['collection_meta_keel_type'] == '11') echo ' selected="selected"'; @endphp >Swing keel</option>
                        <option value="12" @php if ($return_array['collection_meta_keel_type'] == '12') echo ' selected="selected"'; @endphp >Wing keel</option>
                        <option value="13" @php if ($return_array['collection_meta_keel_type'] == '13') echo ' selected="selected"'; @endphp >Other</option>
                    </select>
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_on_trailer" class="font-medium text-gray-900">Boat is on trailer</label>
                        <input id="collection_meta_on_trailer" @php if ($return_array['collection_meta_on_trailer'] == '1') echo ' checked="checked"'; @endphp name="collection_meta_on_trailer" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
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
    @case(5)  <!--Piano Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']] )}}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}"> 
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Piano details</h2>
              
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="collection_meta_describe_piano" class="block text-sm font-medium leading-6 text-gray-900">Describe piano*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_describe_piano']}}" name="collection_meta_describe_piano" id="collection_meta_describe_piano" autocomplete="collection_meta_describe_piano" placeholder="Example — Yamaha Grand Piano" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_boat_type" class="block text-sm font-medium leading-6 text-gray-900">What type of piano is it?*</label>
                  <div class="mt-2">
                    <select id="collection_meta_piano_type" name="collection_meta_piano_type" autocomplete="collection_meta_piano_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1" @php if ($return_array['collection_meta_piano_type'] == '1') echo ' selected="selected"'; @endphp >Vertical piano (upright)</option>
                        <option value="2" @php if ($return_array['collection_meta_piano_type'] == '2') echo ' selected="selected"'; @endphp >Electric/digital piano</option>
                        <option value="3" @php if ($return_array['collection_meta_piano_type'] == '3') echo ' selected="selected"'; @endphp >Baby grand piano</option>
                        <option value="4" @php if ($return_array['collection_meta_piano_type'] == '4') echo ' selected="selected"'; @endphp >Grand piano</option>
                        <option value="5" @php if ($return_array['collection_meta_piano_type'] == '5') echo ' selected="selected"'; @endphp >Concert grand piano</option>
                    </select>
                  </div>
                </div>
                <div class="col-span-full">
                    <h4 class="text-base font-semibold leading-7 text-gray-900">Approx dimensions</h4>
                </div>
                <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_dimensions" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_dimensions" name="collection_meta_unit_dimensions" autocomplete="collection_meta_unit_dimensions" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1" @php if ($return_array['collection_meta_unit_dimensions'] == '1') echo ' selected="selected"'; @endphp >CM</option>
                                    <option value="2" @php if ($return_array['collection_meta_unit_dimensions'] == '2') echo ' selected="selected"'; @endphp >M</option>
                                    <option value="3" @php if ($return_array['collection_meta_unit_dimensions'] == '3') echo ' selected="selected"'; @endphp >FT</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_length']}}" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                        <div>
                            <label for="collection_meta_width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_width']}}" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                      
                        <div>
                            <label for="collection_meta_height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_weight']}}" name="collection_meta_height" id="collection_meta_height" autocomplete="collection_meta_height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                
                
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1" @php if ($return_array['collection_meta_unit_weight'] == '1') echo ' selected="selected"'; @endphp >Kg</option>
                                <option value="2" @php if ($return_array['collection_meta_unit_weight'] == '2') echo ' selected="selected"'; @endphp >Ton</option>
                                <option value="3" @php if ($return_array['collection_meta_unit_weight'] == '3') echo ' selected="selected"'; @endphp >LB</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_weight']}}" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>
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
    @case(6)  <!--Pet Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']] )  }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Pet / livestock details</h2>
              
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="collection_meta_pet_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what kind of animal and breed*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$return_array['collection_meta_pet_details']}}"  name="collection_meta_pet_details" id="collection_meta_pet_details" autocomplete="collection_meta_pet_details" placeholder="Example — Labrador" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="collection_meta_animal_type" class="block text-sm font-medium leading-6 text-gray-900">Type of animal*</label>
                      <div class="mt-2">
                        <select id="collection_meta_animal_type" name="collection_meta_animal_type" autocomplete="collection_meta_animal_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1" @php if ($return_array['collection_meta_animal_type'] == '1') echo ' selected="selected"'; @endphp >Pet (cat, dog, bird, horse, etc)</option>
                            <option value="2" @php if ($return_array['collection_meta_unit_weight'] == '2') echo ' selected="selected"'; @endphp >Livestock (sheep, cattle, deer, etc)</option>
                        </select>
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="collection_meta_how_many" class="block text-sm font-medium leading-6 text-gray-900">How many?*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$return_array['collection_meta_how_many']}}" name="collection_meta_how_many" id="collection_meta_how_many" autocomplete="collection_meta_how_many"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_additional_information" class="block text-sm font-medium leading-6 text-gray-900">Any additional information required about the animal?*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$return_array['collection_meta_additional_information']}}" name="collection_meta_additional_information" id="collection_meta_additional_information" autocomplete="collection_meta_additional_information" placeholder="Example — Sailboat Beneteau Oceanis 500" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_on_kennel" class="font-medium text-gray-900">Animal is in kennel transit box</label>
                        <input id="collection_meta_on_kennel" @php if ($return_array['collection_meta_on_kennel'] == '1') echo ' checked="checked"'; @endphp  name="" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                </div>
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
    @case(7)  <!--Junk Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']] ) }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Junk details</h2>
              
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="collection_meta_junk_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what kind of junk you need removed*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$return_array['collection_meta_junk_details']}}" name="collection_meta_junk_details" id="collection_meta_junk_details" autocomplete="collection_meta_junk_details" placeholder="Example — House junk clearout" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_junk_type" class="block text-sm font-medium leading-6 text-gray-900">Type of junk*</label>
                      <div class="mt-2">
                        <select id="collection_meta_junk_type" name="collection_meta_junk_type" autocomplete="collection_meta_junk_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1" @php if ($return_array['collection_meta_junk_type'] == '1') echo ' selected="selected"'; @endphp >Household junk</option>
                            <option value="2" @php if ($return_array['collection_meta_junk_type'] == '2') echo ' selected="selected"'; @endphp >Commercial junk</option>
                            <option value="3" @php if ($return_array['collection_meta_junk_type'] == '3') echo ' selected="selected"'; @endphp >Office junk</option>
                            <option value="4" @php if ($return_array['collection_meta_junk_type'] == '4') echo ' selected="selected"'; @endphp >Construction junk</option>
                            <option value="5" @php if ($return_array['collection_meta_junk_type'] == '5') echo ' selected="selected"'; @endphp >Demolition waste</option>
                            <option value="6" @php if ($return_array['collection_meta_junk_type'] == '6') echo ' selected="selected"'; @endphp >Soil/garden junk</option>
                            <option value="7" @php if ($return_array['collection_meta_junk_type'] == '7') echo ' selected="selected"'; @endphp >Hazardous waste</option>
                            <option value="8" @php if ($return_array['collection_meta_junk_type'] == '8') echo ' selected="selected"'; @endphp >Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="collection_meta_how_volume" class="block text-sm font-medium leading-6 text-gray-900">Approx volume* (metres square)</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_how_volume']}}" name="collection_meta_how_volume" id="collection_meta_how_volume" autocomplete="collection_meta_how_volume"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1" @php if ($return_array['collection_meta_unit_weight'] == '1') echo ' selected="selected"'; @endphp >Kg</option>
                                    <option value="2" @php if ($return_array['collection_meta_unit_weight'] == '2') echo ' selected="selected"'; @endphp >Ton</option>
                                    <option value="3" @php if ($return_array['collection_meta_unit_weight'] == '3') echo ' selected="selected"'; @endphp >LB</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_weight']}}"  name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                    </div>
                
                    
                </div>
                
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
    @case(8)  <!--Other Type-->
        <form id='checkout-form' method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 3,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]  ) }}">  
            @csrf 
            <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Update a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Other details</h2>
                    <div class="col-span-full">
                      <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                      <div class="mt-2">
                        <input type="text" value="{{$listing['title']}}" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                          <label for="collection_meta_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what you need to move*</label>
                          <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_details']}}" name="collection_meta_details" id="collection_meta_details" autocomplete="collection_meta_details" placeholder="Example — Construction material" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                        </div>
                        <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" value="{{$return_array['collection_meta_address']}}" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                        <div class="col-span-full">
                            <h4 class="text-base font-semibold leading-7 text-gray-900">Approx dimensions</h4>
                        </div>
                
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_dimensions" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_dimensions" name="collection_meta_unit_dimensions" autocomplete="collection_meta_unit_dimensions" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1" @php if ($return_array['collection_meta_unit_dimensions'] == '1') echo ' selected="selected"'; @endphp >CM</option>
                                    <option value="2" @php if ($return_array['collection_meta_unit_dimensions'] == '2') echo ' selected="selected"'; @endphp >M</option>
                                    <option value="3" @php if ($return_array['collection_meta_unit_dimensions'] == '3') echo ' selected="selected"'; @endphp >FT</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_length']}}"  name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                        <div>
                            <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_width']}}" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                      
                        <div>
                            <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_height']}}" name="collection_meta_height" id="collection_meta_height" autocomplete="collection_meta_height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1" @php if ($return_array['collection_meta_unit_weight'] == '1') echo ' selected="selected"'; @endphp >Kg</option>
                                    <option value="2" @php if ($return_array['collection_meta_unit_weight'] == '2') echo ' selected="selected"'; @endphp >Ton</option>
                                    <option value="3" @php if ($return_array['collection_meta_unit_weight'] == '3') echo ' selected="selected"'; @endphp >LB</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                            <div class="mt-2">
                                <input type="text" value="{{$return_array['collection_meta_weight']}}" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                    </div>

                    </div>
                
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
