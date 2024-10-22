<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="collection_meta_describe_boat" class="block text-sm font-medium leading-6 text-gray-900">Describe boat</label>
                    <div class="mt-2">
                        @php
                            if(isset($return_array['collection_meta_describe_boat']) && ($return_array['collection_meta_describe_boat'] != '')){
                                echo '<p>'.$return_array['collection_meta_describe_boat'].'</p>';
                            }
                        @endphp
                    </div>
                </div>
                
                <div class="sm:col-span-3">
                  <label for="collection_meta_boat_type" class="block text-sm font-medium leading-6 text-gray-900">What type of boat is it?*</label>
                  <div class="mt-2">
                        @php
                            if(isset($return_array['collection_meta_boat_type']) && ($return_array['collection_meta_boat_type'] != '')){
                                switch ($return_array['collection_meta_boat_type']) {
                                    case 1:
                                        echo '<p>Sailing boat</p>';
                                        break;
                                    case 2:
                                        echo '<p>Motor boat</p>';
                                        break;
                                    case 3:
                                        echo '<p>House boat</p>';
                                        break;
                                    case 4:
                                        echo '<p>Inflatable boat</p>';
                                        break;
                                    case 5:
                                        echo '<p>Small boat</p>';
                                        break;
                                    case 6:
                                        echo '<p>Other boat</p>';
                                        break;
                                }
                            }    
                        @endphp
                    
                  </div>
                </div>
                <div class="col-span-full">
                    <h4 class="text-base font-semibold leading-7 text-gray-900">Approx dimensions</h4>
                </div>
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_dimensions" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_unit_dimensions']) && ($return_array['collection_meta_unit_dimensions'] != '')){
                                    switch ($return_array['collection_meta_unit_dimensions']) {
                                        case 1:
                                            echo '<p>Centimetre</p>';
                                            break;
                                        case 2:
                                            echo '<p>Meter</p>';
                                            break;
                                        case 3:
                                            echo '<p>Feet</p>';
                                            break;
                                    }
                                }    
                            @endphp
                        </div>
                    </div>
                    <div>
                        <label for="length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                        <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_length']) && ($return_array['collection_meta_length'] != '')){
                                    echo '<p>'.$return_array['collection_meta_length'].'</p>';
                                }
                            @endphp
                        </div>  
                    </div>
                    <div>
                        <label for="width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                        <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_width']) && ($return_array['collection_meta_width'] != '')){
                                    echo '<p>'.$return_array['collection_meta_width'].'</p>';
                                }
                            @endphp
                        </div>  
                    </div>
                  
                    <div>
                        <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                        <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_height']) && ($return_array['collection_meta_height'] != '')){
                                    echo '<p>'.$return_array['collection_meta_height'].'</p>';
                                }
                            @endphp
                        </div>
                    </div>
                </div>
                
                
                <div class="col-span-full grid grid-cols-4 gap-4">
                    <div>
                        <label for="collection_meta_unit_weight" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                        <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_unit_weight']) && ($return_array['collection_meta_unit_weight'] != '')){
                                    switch ($return_array['collection_meta_unit_weight']) {
                                        case 1:
                                            echo '<p>kilogram</p>';
                                            break;
                                        case 2:
                                            echo '<p>Tons</p>';
                                            break;
                                        case 3:
                                            echo '<p>Pound (Lbs)</p>';
                                            break;
                                    }
                                }    
                            @endphp
                        </div>
                    </div>
                    <div>
                        <label for="collection_meta_weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                        <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_weight']) && ($return_array['collection_meta_weight'] != '')){
                                    echo '<p>'.$return_array['collection_meta_weight'].'</p>';
                                }
                            @endphp
                        </div>  
                    </div>

                </div>

                <div class="sm:col-span-3">
                  <label for="collection_meta_keel_type" class="block text-sm font-medium leading-6 text-gray-900">Type of keel*</label>
                  <div class="mt-2">
                    @php
                        if(isset($return_array['collection_meta_keel_type']) && ($return_array['collection_meta_keel_type'] != '')){
                            switch ($return_array['collection_meta_keel_type']) {
                                case 1:
                                    echo '<p>None</p>';
                                    break;
                                case 2:
                                    echo '<p>Bilge keel</p>';
                                    break;
                                case 3:
                                    echo '<p>Chined hull</p>';
                                    break;
                                case 4:
                                    echo '<p>Dagger board</p>';
                                    break;
                                case 5:
                                    echo '<p>Doppelkeil</p>';
                                    break;
                                case 6:
                                    echo '<p>Fin keel</p>';
                                    break;
                                case 7:
                                    echo '<p>Lifting keel</p>';
                                    break;
                                case 8:
                                    echo '<p>Long keel</p>';
                                    break;
                                case 9:
                                    echo '<p>Short keel</p>';
                                    break;
                                case 10:
                                    echo '<p>Smooth curve hull</p>';
                                    break;
                                case 11:
                                    echo '<p>Swing keel</p>';
                                    break;
                                case 12:
                                    echo '<p>Wing keel</p>';
                                    break;  
                                case 13:
                                    echo '<p>Other</p>';
                                    break;    
                            }
                        }    
                    @endphp
                  </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_on_trailer" class="font-medium text-gray-900">Boat is on trailer</label>
            
                            @php 
                                if(!empty($return_array['collection_meta_on_trailer']) && ($return_array['collection_meta_on_trailer'] == 1)){
                                    echo '<p>Yes</p>';
                                }else{
                                    echo '<p>No</p>';
                                }
                            @endphp
                    </div>
                </div>
              </div>
            </div>
          </div>
          
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="collection_meta_level" class="block text-sm font-medium leading-6 text-gray-900">Collection floor level</label>
                <div class="mt-2">
                    @php
                        if(isset($return_array['collection_meta_level']) && ($return_array['collection_meta_level'] != '')){
                            if($return_array['collection_meta_level'] == 0){
                                echo '<p>None</p>';
                            }else if(($return_array['collection_meta_level'] >= 1) && ($return_array['collection_meta_level'] <= 10)){
                                $level = $return_array['collection_meta_level']-1;
                                if($level == 0){
                                    echo '<p>Ground Level</p>';
                                }else{
                                    echo '<p>Level '.$level.'</p>';
                                }
                            }else{
                                echo '<p>Level 11 or above</p>';
                            }
                        }
                    @endphp
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="collection_meta_help" class="block text-sm font-medium leading-6 text-gray-900">Help loading</label>
                <div class="mt-2">
                    @php
                        if(isset($return_array['collection_meta_help']) &&  ($return_array['collection_meta_help'] != '')){
                            if($return_array['collection_meta_help'] == 0){
                                echo '<p>None</p>';
                            }else if($return_array['collection_meta_help'] == 1){
                                echo '<p>I’m happy to load/unload</p>';
                            }else{
                                echo '<p>Requires '.$return_array['collection_meta_help'].' people</p>';
                            }
                        }
                    @endphp
                </div>
            </div>
        </div>
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="collection_meta_delivery_level" class="block text-sm font-medium leading-6 text-gray-900">Delivery floor level</label>
                <div class="mt-2">
                    @php
                    
                        if(isset($return_array['collection_meta_delivery_level']) && ($return_array['collection_meta_delivery_level'] != '')){
                            if($return_array['collection_meta_delivery_level'] == 0){
                                echo '<p>None</p>';
                            }else if(($return_array['collection_meta_delivery_level'] >= 1) && ($return_array['collection_meta_delivery_level'] <= 10)){
                               
                                $level = $return_array['collection_meta_delivery_level']-1;
                                if($level == 0){
                                    echo '<p>Ground Level</p>';
                                }else{
                                    echo '<p>Level '.$level.'</p>';
                                }
                            }else{
                                echo '<p>Level 11 or above</p>';
                            }
                        }
                        
                        
                    @endphp
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="collection_meta_delivery_help" class="block text-sm font-medium leading-6 text-gray-900">Help unloading</label>
                <div class="mt-2">
                    @php
                        if(!empty($return_array['collection_meta_delivery_help'])){
                            if($return_array['collection_meta_delivery_help'] == 1){
                                echo '<p>I’m happy to load/unload</p>';
                            }else{
                                echo '<p>Requires '.$return_array['collection_meta_delivery_help'].' people</p>';
                            }
                        }
                    @endphp
                </div>
            </div>
        </div>
        
        <div class="col-span-full">
            <div class="sm:col-span-3">
                <label for="collection_meta_details" class="block text-sm font-medium leading-6 text-gray-900">Describe or list each item that you need moved from your home.</label>
                <div class="mt-2">
                    @php
                        if(!empty($return_array['collection_meta_details'])){
                                echo '<p>'.$return_array['collection_meta_details'].'</p>';
                        }
                    @endphp
                </div>
            </div>
        
            <div class="sm:col-span-3">
                <label for="collection_meta_further_description" class="block text-sm font-medium leading-6 text-gray-900">Any further info</label>
                <div class="mt-2">
                    @php
                        if(!empty($return_array['collection_meta_further_description'])){
                                echo '<p>'.$return_array['collection_meta_further_description'].'</p>';
                        }
                    @endphp
                </div>
            </div>
        </div>
        

