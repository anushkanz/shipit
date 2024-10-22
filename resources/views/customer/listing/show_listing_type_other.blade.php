<div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                          <label for="collection_meta_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what you need to move*</label>
                          <div class="mt-2">
                            @php
                                if(isset($return_array['collection_meta_details']) && ($return_array['collection_meta_details'] != '')){
                                    echo '<p>'.$return_array['collection_meta_details'].'</p>';
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
                            <label for="collection_meta_length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                            <div class="mt-2">
                                @php
                                if(isset($return_array['collection_meta_length']) && ($return_array['collection_meta_length'] != '')){
                                    echo '<p>'.$return_array['collection_meta_length'].'</p>';
                                }
                            @endphp
                            </div>  
                        </div>
                        <div>
                            <label for="collection_meta_width" class="block text-sm font-medium leading-6 text-gray-900">Width</label>
                            <div class="mt-2">
                                @php
                                if(isset($return_array['collection_meta_width']) && ($return_array['collection_meta_width'] != '')){
                                    echo '<p>'.$return_array['collection_meta_width'].'</p>';
                                }
                            @endphp
                            </div>  
                        </div>
                      
                        <div>
                            <label for="collection_meta_height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
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
            </div>
        </div>
    