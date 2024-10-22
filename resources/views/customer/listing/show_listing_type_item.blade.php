<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="collection_meta_level" class="block text-sm font-medium leading-6 text-gray-900">Collection floor level</label>
                <div class="mt-2">
                    @php
                        if($return_array['collection_meta_level'] != ''){
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
                        if($return_array['collection_meta_help'] != ''){
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
                    
                        if($return_array['collection_meta_delivery_level'] != ''){
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
        
    </div>
</div>