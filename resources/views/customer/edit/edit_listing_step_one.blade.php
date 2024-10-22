@section('content')
    <form id='checkout-form' method='post' action="{{ route('customer.listing.create.step_one' ,['step' => 1,'type'=>'1'])  }}">     
        @csrf 
        <input type='hidden' name='id' value="{{$listing->id}}"> 
        <input type='hidden' name='task' value="1"> 
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">What are you listing? </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600"></p>
                <div class="mt-10 space-y-10">
                    <fieldset>
                        <div class="mt-6 space-y-6">
                            @foreach($items as $item)
                                <div class="flex items-center gap-x-3">
                                    <input id="listing_type" name="listing_type" value="{{ $item->id }}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="listing_type" class="block text-sm font-medium leading-6 text-gray-900">{{ $item->item }}</label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continue</button>
        </div>
    </form>
@endsection
