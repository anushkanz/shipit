<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="collection_meta_describe_vehicle" class="block text-sm font-medium leading-6 text-gray-900">Describe vehicle</label>
              <div class="mt-2">
                @php 
                    if(!empty($return_array['collection_meta_describe_vehicle'])){
                        echo $return_array['collection_meta_describe_vehicle'];
                    }    
                @endphp
              </div>
            </div>
    
            <div class="sm:col-span-3">
                <label for="collection_meta_vehicle_type" class="block text-sm font-medium leading-6 text-gray-900">Vehicle type</label>
                <div class="mt-2">
                    @php
                        if(!empty($return_array['collection_meta_vehicle_type'])){
                            switch ($return_array['collection_meta_vehicle_type']) {
                                case 1:
                                    echo '<p>Car,van,SUV,Ute</p>';
                                    break;
                                case 2:
                                    echo '<p>Truck, Bus, Large RV</p>';
                                    break;
                                case 3:
                                    echo '<p>Classic or race car transport</p>';
                                    break;
                                case 4:
                                    echo '<p>Special vehicle or machinery (Digger etc)</p>';
                                    break; 
                            }
                        }
                    @endphp
                </div>
            </div>
    
            <div class="sm:col-span-3">
              <label for="collection_meta_vehicle_make" class="block text-sm font-medium leading-6 text-gray-900">Vehicle make</label>
              <div class="mt-2">
                    @php 
                        if(!empty($return_array['collection_meta_vehicle_make'])){
                            echo $return_array['collection_meta_vehicle_make'];
                        }    
                    @endphp
              </div>
            </div>
        
            <div class="sm:col-span-3">
                <label for="collection_meta_vehicle_model" class="block text-sm font-medium leading-6 text-gray-900">Vehicle model</label>
                <div class="mt-2">
                    @php 
                        if(!empty($return_array['collection_meta_vehicle_model'])){
                            echo $return_array['collection_meta_vehicle_model'];
                        }    
                    @endphp
                </div>
            </div>
        
            <div class="sm:col-span-3">
                <label for="collection_meta_vehicle_year" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Year</label>
                <div class="mt-2">
                    @php 
                        if(!empty($return_array['collection_meta_vehicle_year'])){
                            echo $return_array['collection_meta_vehicle_year'];
                        }    
                    @endphp
                </div>
            </div>
        
            <div class="sm:col-span-3">
                <label for="collection_meta_vehicle_plate_number" class="block text-sm font-medium leading-6 text-gray-900">Plate number</label>
                <div class="mt-2">
                    @php 
                        if(!empty($return_array['collection_meta_vehicle_plate_number'])){
                            echo $return_array['collection_meta_vehicle_plate_number'];
                        }    
                    @endphp
                </div>
            </div>
            <div class="sm:col-span-3">
                <div class="flex h-6 items-center">
                    <label for="collection_meta_operational" class="font-medium text-gray-900">Vehicle is operational : </label>
                    @php 
                        if(!empty($return_array['collection_meta_operational']) && ($return_array['collection_meta_operational'] == 1)){
                            echo '<p>Yes</p>';
                        }else{
                            echo '<p>No</p>';
                        }
                    @endphp
                </div>
                <div class="flex h-6 items-center">
                    <label for="collection_meta_legal" class="font-medium text-gray-900">Vehicle is road legal and can be towed : </label>
                    @php 
                        if(!empty($return_array['collection_meta_legal']) && ($return_array['collection_meta_legal'] == 1)){
                            echo '<p>Yes</p>';
                        }else{
                            echo '<p>No</p>';
                        }
                    @endphp
                </div>
            </div>
            
            <div class="col-span-full">
            
            <div class="sm:col-span-3">
                <label for="collection_meta_description" class="block text-sm font-medium leading-6 text-gray-900">Any further info</label>
                <div class="mt-2">
                    @php
                        if(!empty($return_array['collection_meta_description'])){
                                echo '<p>'.$return_array['collection_meta_description'].'</p>';
                        }
                    @endphp
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

        