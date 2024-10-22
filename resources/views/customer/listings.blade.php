@extends('layouts.master_customer')

@section('title', 'Home Page')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
          <h2 class="text-2xl font-semibold leading-tight">My listings</h2>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Category</th>
                          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Journey</th>
                          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Delivery</th>
                          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Quotes</th>
                          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listings as $listing)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex">
                                   
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">{{return_data_id('Item', $listing->type_id, true)->item}}</p>
                                            <p class="text-gray-600 whitespace-no-wrap">{{$listing->title}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @php
                                        $collection_address = return_listing_meta($listing->id, 'collection_meta_address', true);
                                        $delivery_address = return_listing_meta($listing->id, 'collection_meta_delivery_address', true);
                                    @endphp
                                    
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        @php 
                                            if(!empty($collection_address)){ 
                                                 echo $collection_address['value'];
                                            }
                                        @endphp
                                    </p>
                                    <p class="text-gray-900 whitespace-no-wrap">To</p>
                                    <p class="text-gray-600 whitespace-no-wrap">
                                        @php 
                                            if(!empty($delivery_address)){ 
                                                 echo $delivery_address['value'];
                                            }
                                        @endphp
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @php
                                        $collection_meta_dates_from = return_listing_meta($listing->id, 'collection_meta_dates_from', true);
                                        $collection_meta_delivery_dates_from = return_listing_meta($listing->id, 'collection_meta_delivery_dates_from', true);
                                    @endphp
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        @php 
                                            if(!empty($collection_meta_dates_from)){ 
                                                $yrdata= strtotime($collection_meta_dates_from['value']);
                                                echo date('jS F', $yrdata);

                                            }
                                        @endphp
                                    </p>
                                    <p class="text-gray-600 whitespace-no-wrap">
                                        @php 
                                            if(!empty($collection_meta_delivery_dates_from)){ 
                                                $yrdata= strtotime($collection_meta_delivery_dates_from['value']);
                                                echo date('jS F', $yrdata);
                                            }
                                        @endphp
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Paid</span>
                                    </span>
                                </td>
                                
                                @php if($listing->status == 'publish'){ @endphp
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $listing->status }}</span>
                                        </span>
                                    </td>
                                @php }else if($listing->status == 'expired'){ @endphp
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $listing->status }}</span>
                                        </span>
                                    </td>
                                @php }else if($listing->status == 'completed'){ @endphp
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $listing->status }}</span>
                                        </span>
                                    </td>    
                                @php } @endphp
                                
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                    <a href="/customer/listing/{{ $listing->id }}" class="inline-block text-gray-500 hover:text-gray-700">
                                        <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection