          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="collection_meta_pet_details" class="block text-sm font-medium leading-6 text-gray-900">Briefly outline what kind of animal and breed*</label>
                      <div class="mt-2">
                        @php
                            if(isset($return_array['collection_meta_pet_details']) && ($return_array['collection_meta_pet_details'] != '')){
                                echo '<p>'.$return_array['collection_meta_pet_details'].'</p>';
                            }
                        @endphp
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="collection_meta_animal_type" class="block text-sm font-medium leading-6 text-gray-900">Type of animal*</label>
                      <div class="mt-2">
                        @php
                            if(isset($return_array['collection_meta_animal_type']) && ($return_array['collection_meta_animal_type'] != '')){
                                switch ($return_array['collection_meta_animal_type']) {
                                    case 1:
                                        echo '<p>Pet (cat, dog, bird, horse, etc)</p>';
                                        break;
                                    case 2:
                                        echo '<p>Livestock (sheep, cattle, deer, etc)</p>';
                                        break;
                                }
                            }    
                        @endphp
                      </div>
                    </div>
                
                    <div class="sm:col-span-3">
                      <label for="collection_meta_how_many" class="block text-sm font-medium leading-6 text-gray-900">How many?*</label>
                      <div class="mt-2">
                        @php
                            if(isset($return_array['collection_meta_how_many']) && ($return_array['collection_meta_how_many'] != '')){
                                echo '<p>'.$return_array['collection_meta_how_many'].'</p>';
                            }
                        @endphp
                      </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="collection_meta_additional_information" class="block text-sm font-medium leading-6 text-gray-900">Any additional information required about the animal?*</label>
                      <div class="mt-2">
                        @php
                            if(isset($return_array['collection_meta_additional_information']) && ($return_array['collection_meta_additional_information'] != '')){
                                echo '<p>'.$return_array['collection_meta_additional_information'].'</p>';
                            }
                        @endphp
                      </div>
                    </div>
                </div>
                
                <div class="sm:col-span-3">
                    <div class="flex h-6 items-center">
                        <label for="collection_meta_on_kennel" class="font-medium text-gray-900">Animal is in kennel transit box</label>
                        @php
                        if(!empty($return_array['collection_meta_on_kennel'])){
                            if($return_array['collection_meta_on_kennel'] == 1){
                                echo '<p>Yes</p>';
                            }else{
                                echo '<p>No</p>';
                            }
                        }
                    @endphp
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
    
