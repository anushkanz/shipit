@section('content')

@php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}
@endphp
@switch(request()->route()->parameters['type'])
    @case(1) <!--Item Type-->
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type'] ] )}}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Item details</h2>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                            <div class="mt-2">
                                <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                    </div>
                    <div class="col-span-full">
                          <label for="collection_meta_details" class="block text-sm font-medium leading-6 text-gray-900">Item name*</label>
                          <div class="mt-2">
                            <input type="text" name="collection_meta_details" id="collection_meta_details" autocomplete="collection_meta_details" placeholder="Example — Construction material" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                    </div> 
                    <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                    <div class="sm:col-span-3">
                        <label for="collection_meta_level" class="block text-sm font-medium leading-6 text-gray-900">Collection floor level</label>
                        <div class="mt-2">
                            <select id="collection_meta_level" name="collection_meta_level" autocomplete="collection_meta_level" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="0">Select</option>
                                <option value="1">Ground</option>
                                <option value="2">Level 1</option>
                                <option value="3">Level 2</option>
                                <option value="4">Level 3</option>
                                <option value="5">Level 4</option>
                                <option value="6">Level 5</option>
                                <option value="7">Level 6</option>
                                <option value="8">Level 7</option>
                                <option value="9">Level 8</option>
                                <option value="10">Level 9</option>
                                <option value="11">Level 10</option>
                                <option value="12">Level 11 or above</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_help" class="block text-sm font-medium leading-6 text-gray-900">Help loading</label>
                      <div class="mt-2">
                        <select id="help" name="collection_meta_help" autocomplete="collection_meta_help" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          <option value="0">Select</option>
                          <option value="1">I’m happy to load/unload</option>
                          <option value="2">Requires 1 person </option>
                          <option value="3">Requires 2 people </option>
                          <option value="4">Requires 3 people </option>
                        </select>
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                        <label for="collection_meta_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                        <div class="mt-2">
                            <select id="collection_meta_dates_type" name="collection_meta_dates_type" autocomplete="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="0">Select</option>
                                <option value="1">Flexiable</option>
                                <option value="2">ASAP</option>
                                <option value="3">Specific date</option>
                                <option value="4">Between dates</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3" id="sp_date">
                        <input id="datepicker_from" name="collection_meta_dates_from" style="display:none;" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                        <input id="datepicker_to"  name="collection_meta_dates_to" style="display:none;"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
                    </div>
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_dimensions" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_dimensions" name="collection_meta_unit_dimensions" autocomplete="collection_meta_unit_dimensions" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1">CM</option>
                                    <option value="2">M</option>
                                    <option value="3">FT</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                        <div>
                            <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                      
                        <div>
                            <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_height" id="collection_meta_height" autocomplete="collection_meta_height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1">Kg</option>
                                    <option value="2">Ton</option>
                                    <option value="3">LB</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type'] ] )}}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Collection details</h2>
              
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
        
                <div class="sm:col-span-3">
                  <label for="collection_meta_level" class="block text-sm font-medium leading-6 text-gray-900">Collection floor level</label>
                  <div class="mt-2">
                    <select id="collection_meta_level" name="collection_meta_level" autocomplete="collection_meta_level" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="0">Select</option>
                        <option value="1">Ground</option>
                        <option value="2">Level 1</option>
                        <option value="3">Level 2</option>
                        <option value="4">Level 3</option>
                        <option value="5">Level 4</option>
                        <option value="6">Level 5</option>
                        <option value="7">Level 6</option>
                        <option value="8">Level 7</option>
                        <option value="9">Level 8</option>
                        <option value="10">Level 9</option>
                        <option value="11">Level 10</option>
                        <option value="12">Level 11 or above</option>
                    </select>
                  </div>
                </div>
        
                <div class="sm:col-span-3">
                  <label for="collection_meta_help" class="block text-sm font-medium leading-6 text-gray-900">Help loading</label>
                  <div class="mt-2">
                    <select id="help" name="collection_meta_help" autocomplete="collection_meta_help" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0">Select</option>
                            <option value="1">I’m happy to load/unload</option>
                            <option value="2">Requires 1 person </option>
                            <option value="3">Requires 2 people </option>
                            <option value="4">Requires 3 people </option>
                    </select>
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <label for="collection_meta_dates_type" class="block text-sm font-medium leading-6 text-gray-900">Specify your delivery date</label>
                    <div class="mt-2">
                        <select id="collection_meta_dates_type" name="collection_meta_dates_type" autocomplete="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0">Select</option>
                            <option value="1">Flexiable</option>
                            <option value="2">ASAP</option>
                            <option value="3">Specific date</option>
                            <option value="4">Between dates</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-3" id="sp_date">
                    <input id="datepicker_from" name="collection_meta_dates_from" style="display:none;" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date from">
                    <input id="datepicker_to"  name="collection_meta_dates_to" style="display:none;"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date to">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type']])  }}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Vehicle details</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div> 
                    <div class="col-span-full">
                      <label for="collection_meta_describe_vehicle" class="block text-sm font-medium leading-6 text-gray-900">Describe vehicle*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_meta_describe_vehicle" id="collection_meta_describe_vehicle" autocomplete="describe_vehicle" placeholder="Example — RV, family car, school bus" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
        
                    <div class="sm:col-span-3">
                      <label for="collection_meta_vehicle_type" class="block text-sm font-medium leading-6 text-gray-900">Vehicle type*</label>
                      <div class="mt-2">
                        <select id="collection_meta_vehicle_type" name="collection_meta_vehicle_type" autocomplete="collection_meta_vehicle_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">Car,van,SUV,Ute</option>
                            <option value="2">Truck, Bus, Large RV</option>
                            <option value="3">Classic or race car transport</option>
                            <option value="4">Special vehicle or machinery (Digger etc)</option>
                        </select>
                      </div>
                    </div>
        
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_make" class="block text-sm font-medium leading-6 text-gray-900">Vehicle make*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_vehicle_make" id="collection_meta_vehicle_make" autocomplete="collection_meta_vehicle_make" placeholder="Example — Fiat, Tesla, Toyota" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_model" class="block text-sm font-medium leading-6 text-gray-900">Vehicle model</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_vehicle_model" id="collection_meta_vehicle_model" autocomplete="collection_meta_vehicle_model" placeholder="Example — 500, Corolla, 911, Clio" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_year" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Year</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_vehicle_year" id="collection_meta_vehicle_year" autocomplete="collection_meta_vehicle_year" placeholder="Example — 2001" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_vehicle_plate_number" class="block text-sm font-medium leading-6 text-gray-900">Plate number (optional)</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_vehicle_plate_number" id="collection_meta_vehicle_plate_number" autocomplete="collection_meta_vehicle_plate_number" placeholder="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_operational" class="font-medium text-gray-900">Vehicle is operational</label>
                        <input id="collection_meta_operational" name="collection_meta_operational" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_legal" class="font-medium text-gray-900">Vehicle is road legal and can be towed</label>
                        <input id="collection_meta_legal" name="collection_meta_legal" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type']])  }}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}"> 
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Boat details</h2>
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="collection_meta_describe_boat" class="block text-sm font-medium leading-6 text-gray-900">Describe boat*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_describe_boat" id="collection_meta_describe_boat" autocomplete="collection_meta_describe_boat" placeholder="Example — Sailboat Beneteau Oceanis 500" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_boat_type" class="block text-sm font-medium leading-6 text-gray-900">What type of boat is it?*</label>
                  <div class="mt-2">
                    <select id="collection_meta_boat_type" name="collection_meta_boat_type" autocomplete="collection_meta_boat_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1">Sailing boat</option>
                        <option value="2">Motor boat</option>
                        <option value="3">House boat</option>
                        <option value="4">Inflatable boat</option>
                        <option value="5">Small boat</option>
                        <option value="6">Other boat</option>
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
                                <option value="1">CM</option>
                                <option value="2">M</option>
                                <option value="3">FT</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>
                    <div>
                        <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>
                  
                    <div>
                        <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_height" id="collection_meta_height" autocomplete="height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                
                
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1">Kg</option>
                                <option value="2">Ton</option>
                                <option value="3">LB</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                    </div>

                </div>

                <div class="sm:col-span-3">
                  <label for="collection_meta_keel_type" class="block text-sm font-medium leading-6 text-gray-900">Type of keel*</label>
                  <div class="mt-2">
                    <select id="collection_meta_keel_type" name="collection_meta_keel_type" autocomplete="collection_meta_keel_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1">None</option>
                        <option value="2">Bilge keel</option>
                        <option value="3">Chined hull</option>
                        <option value="4">Dagger board</option>
                        <option value="5">Doppelkeil</option>
                        <option value="6">Fin keel</option>
                        <option value="7">Lifting keel</option>
                        <option value="8">Long keel</option>
                        <option value="9">Short keel</option>
                        <option value="10">Smooth curve hull</option>
                        <option value="11">Swing keel</option>
                        <option value="12">Wing keel</option>
                        <option value="13">Other</option>
                    </select>
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_on_trailer" class="font-medium text-gray-900">Boat is on trailer</label>
                        <input id="collection_meta_on_trailer" name="collection_meta_on_trailer" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type']])}}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}"> 
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Piano details</h2>
              
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="collection_meta_describe_piano" class="block text-sm font-medium leading-6 text-gray-900">Describe piano*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_describe_piano" id="collection_meta_describe_piano" autocomplete="collection_meta_describe_piano" placeholder="Example — Yamaha Grand Piano" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_boat_type" class="block text-sm font-medium leading-6 text-gray-900">What type of piano is it?*</label>
                  <div class="mt-2">
                    <select id="collection_meta_piano_type" name="collection_meta_piano_type" autocomplete="collection_meta_piano_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1">Vertical piano (upright)</option>
                        <option value="2">Electric/digital piano</option>
                        <option value="3">Baby grand piano</option>
                        <option value="4">Grand piano</option>
                        <option value="5">Concert grand piano</option>
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
                                    <option value="1">CM</option>
                                    <option value="2">M</option>
                                    <option value="3">FT</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                        <div>
                            <label for="collection_meta_width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                      
                        <div>
                            <label for="collection_meta_height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_height" id="collection_meta_height" autocomplete="collection_meta_height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                
                
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1">Kg</option>
                                <option value="2">Ton</option>
                                <option value="3">LB</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type']])}}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Pet / livestock details</h2>
              
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="col-span-full">
                  <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="collection_meta_pet_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what kind of animal and breed*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_meta_pet_details" id="collection_meta_pet_details" autocomplete="collection_meta_pet_details" placeholder="Example — Labrador" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="collection_meta_animal_type" class="block text-sm font-medium leading-6 text-gray-900">Type of animal*</label>
                      <div class="mt-2">
                        <select id="collection_meta_animal_type" name="collection_meta_animal_type" autocomplete="collection_meta_animal_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">Pet (cat, dog, bird, horse, etc)</option>
                            <option value="2">Livestock (sheep, cattle, deer, etc)</option>
                        </select>
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="collection_meta_how_many" class="block text-sm font-medium leading-6 text-gray-900">How many?*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_meta_how_many" id="collection_meta_how_many" autocomplete="collection_meta_how_many"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_additional_information" class="block text-sm font-medium leading-6 text-gray-900">Any additional information required about the animal?*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_meta_additional_information" id="collection_meta_additional_information" autocomplete="collection_meta_additional_information" placeholder="Example — Sailboat Beneteau Oceanis 500" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_on_kennel" class="font-medium text-gray-900">Animal is in kennel transit box</label>
                        <input id="collection_meta_on_kennel" name="collection_meta_on_kennel" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type']])  }}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}"> 
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Junk details</h2>
              
                <div class="col-span-full">
                  <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                  <div class="mt-2">
                    <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
                
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="collection_meta_junk_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what kind of junk you need removed*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_meta_junk_details" id="collection_meta_junk_details" autocomplete="collection_meta_junk_details" placeholder="Example — House junk clearout" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_junk_type" class="block text-sm font-medium leading-6 text-gray-900">Type of junk*</label>
                      <div class="mt-2">
                        <select id="collection_meta_junk_type" name="collection_meta_junk_type" autocomplete="collection_meta_junk_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">Household junk</option>
                            <option value="2">Commercial junk</option>
                            <option value="3">Office junk</option>
                            <option value="4">Construction junk</option>
                            <option value="5">Demolition waste</option>
                            <option value="6">Soil/garden junk</option>
                            <option value="7">Hazardous waste</option>
                            <option value="8">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="collection_meta_how_volume" class="block text-sm font-medium leading-6 text-gray-900">Approx volume* (metres square)</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_how_volume" id="collection_meta_how_volume" autocomplete="collection_meta_how_volume"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1">Kg</option>
                                    <option value="2">Ton</option>
                                    <option value="3">LB</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
        <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 2,'type' => request()->route()->parameters['type']] )  }}">  
            @csrf 
            <input type='hidden' name='id' value="{{$id}}"> 
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">Create a listing</p>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Other details</h2>
                    <div class="col-span-full">
                      <label for="collection_title" class="block text-sm font-medium leading-6 text-gray-900">Listing Title*</label>
                      <div class="mt-2">
                        <input type="text" name="collection_title" id="collection_title" autocomplete="collection_title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
                    
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                          <label for="collection_meta_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what you need to move*</label>
                          <div class="mt-2">
                            <input type="text" name="collection_meta_details" id="collection_meta_details" autocomplete="collection_meta_details" placeholder="Example — Construction material" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                        </div>
                        <div class="col-span-full">
                        <label for="collection_meta_address" class="block text-sm font-medium leading-6 text-gray-900">Collection address*</label>
                        <div class="mt-2">
                            <input type="text" name="collection_meta_address" id="collection_meta_address" autocomplete="collection_meta_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                                    <option value="1">CM</option>
                                    <option value="2">M</option>
                                    <option value="3">FT</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_length" id="collection_meta_length" autocomplete="collection_meta_length" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                        <div>
                            <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_width" id="collection_meta_width" autocomplete="collection_meta_width" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>  
                        </div>
                      
                        <div>
                            <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_height" id="collection_meta_height" autocomplete="collection_meta_height" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-full grid grid-cols-4 gap-4">
                        <div>
                            <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                            <div class="mt-2">
                                <select id="collection_meta_unit_weight" name="collection_meta_unit_weight" autocomplete="collection_meta_unit_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1">Kg</option>
                                    <option value="2">Ton</option>
                                    <option value="3">LB</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                            <div class="mt-2">
                                <input type="text" name="collection_meta_weight" id="collection_meta_weight" autocomplete="collection_meta_weight" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
