<div class="space-y-12">
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full">
          <label for="collection_meta_junk_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what kind of junk you need removed*</label>
          <div class="mt-2">
            @php
                if(isset($return_array['collection_meta_junk_details']) && ($return_array['collection_meta_junk_details'] != '')){
                    echo '<p>'.$return_array['collection_meta_junk_details'].'</p>';
                }
            @endphp
          </div>
        </div>
    
        <div class="sm:col-span-3">
          <label for="collection_meta_junk_type" class="block text-sm font-medium leading-6 text-gray-900">Type of junk*</label>
          <div class="mt-2">
            @php
                if(isset($return_array['collection_meta_junk_type']) && ($return_array['collection_meta_junk_type'] != '')){
                    switch ($return_array['collection_meta_junk_type']) {
                        case 1:
                            echo '<p>Household junk</p>';
                            break;
                        case 2:
                            echo '<p>Commercial junk</p>';
                            break;
                        case 3:
                            echo '<p>Office junk</p>';
                            break;
                        case 4:
                            echo '<p>Construction junk</p>';
                            break;
                        case 5:
                            echo '<p>Demolition waste</p>';
                            break;
                        case 6:
                            echo '<p>Soil/garden junk</p>';
                            break;
                        case 7:
                            echo '<p>Hazardous waste</p>';
                            break;
                        case 8:
                            echo '<p>Other</p>';
                            break;    
                    }
                }    
            @endphp
          </div>
        </div>
        <div class="sm:col-span-3">
            <label for="collection_meta_how_volume" class="block text-sm font-medium leading-6 text-gray-900">Approx volume* (metres square)</label>
            <div class="mt-2">
                @php
                    if(isset($return_array['collection_meta_how_volume']) && ($return_array['collection_meta_how_volume'] != '')){
                        echo '<p>'.$return_array['collection_meta_how_volume'].'</p>';
                    }
                @endphp
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

    </div>
    
    </div>
  </div>
