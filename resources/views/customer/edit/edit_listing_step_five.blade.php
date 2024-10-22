@section('content')
@php
    $lising_data = return_listing_meta(request()->route()->parameters['listing_id'],'',false)->toArray();
    $return_array = array();
    foreach($lising_data as $key => $meta){
        $return_array[$meta['meta']] = $meta['value'];
    }
@endphp
    <form id='checkout-form'  enctype='multipart/form-data'  method='post' action="{{  route('customer.edit.update.step_two' ,['step' => 6,'type' => request()->route()->parameters['type'],'uesr_id'=>Auth::user()->id,'listing_id' => request()->route()->parameters['listing_id']]  ) }}">     
        @csrf 
        <input type='hidden' name='id' value="{{request()->route()->parameters['listing_id']}}"> 
        <input type='hidden' name='task' value="5"> 
        <input type='hidden' name='listing_type' value="{{request()->route()->parameters['type']}}"> 
        <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
        <div class="col-span-full">
          <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Upload Images</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="collection_meta_file_upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
                  <input id="collection_meta_file_upload" name="collection_meta_file_upload[]" type="file" class="sr-only" multiple>
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>
        </div>
        @php
            $images = unserialize($return_array['file_upload']);
            $result = json_decode($images, true);
        @endphp
        <div class="space-y-12" id="delivery_collection_section">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($result as $key => $meta)
                    <div class="image">
                        <img src="{{ asset('public/storage/client/listing/' . $meta['name'])}}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continue</button>
        </div>
    </form>
@endsection

