<!--{{$listing}}-->

<!--{{$listing->id}}-->
<!--{{$listing->status}}-->
<!--{{$listing->title}}-->
<!--{{$listing->type_id}}-->
@php
    $lising_data = return_listing_meta($listing->id,'',false)->toArray();
    $return_array = array();
    foreach($lising_data as $key => $meta){
        $return_array[$meta['meta']] = $meta['value'];
    }
    
 
@endphp

@extends('layouts.master_customer')
@section('title', 'Home Page')
@section('content')
<!--Lising navigation and title-->
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-2 sm:col-start-1">
          Arrow
        </div>

        <div class="sm:col-span-2">
          <p>My listings / {{ $listing->title }}</p>
          <h3>Listing details</h3>
        </div>

        <div class="sm:col-span-2">
          @php echo 'Listing ID #'.$listing->id; @endphp
        </div>
      </div>
    </div>
</div>
<!--Lising quotes section-->
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
                <h2>Active quotes</h2>
                <p>You'll be notified by email with new quotes. Accept a quote now to secure it</p>
                <ul class="list-none">
                  <li>Now this is a story all about how, my life got flipped-turned upside down</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Lising details section-->
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
                <h2>{{$listing->title}}</h2>
                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                    <span class="relative">{{ $listing->status }}</span>
                </span>
         
                <div class="">{{return_data_id('Item', $listing->type_id, true)->item}}</div>

                <!-- We have 9 items types and all have different data to display-->
                @php
                    $current_item_id = $listing->type_id;
                    
                    switch ($current_item_id) { //Item type is ITEM
                        case 1:
                        @endphp
                            @include('customer.listing.show_listing_type_item')
                        @php    
                            break;
                        case 2:
                        @endphp 
                            @include('customer.listing.show_listing_type_home')
                        @php
                            break;
                        case 3:
                        @endphp
                            @include('customer.listing.show_listing_type_vehicle')
                        @php    
                            break;
                        case 4:
                        @endphp 
                            @include('customer.listing.show_listing_type_boat')
                        @php
                            break; 
                        case 5:
                        @endphp
                            @include('customer.listing.show_listing_type_piano')
                        @php
                            break;   
                        case 6:
                        @endphp
                            @include('customer.listing.show_listing_type_animal')
                        @php    
                            break;   
                        case 7:
                        @endphp
                            @include('customer.listing.show_listing_type_junk')
                        @php
                            break;   
                        case 8:
                        @endphp
                            @include('customer.listing.show_listing_type_other')
                        @php
                            break; 
                        case 9:
                        @endphp
                            @include('customer.listing.show_listing_type_trademe')
                        @php
                            break;    
                    }
                @endphp
                
            </div>
        </div>
    </div>
</div>


<!--Lising Images section-->
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

<!--Lising Map section-->
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">

                <div id='map'style='height: 400px;' data-collection="{{$collection['value']}}" data-delivery="{{$delivery['value']}}"></div>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxTTy9jXmantKLOYhoq0RXXCrQfcwBHng&callback=initMap&libraries=marker&v=weekly"></script>
                <script> 
                    function initMap() {
                        let collection = $('#map').data("collection");
                        let delivery = $('#map').data("delivery");
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 4,
                            center: { lat: -24.345, lng: 134.46 }, // Australia.
                        });
                        const directionsService = new google.maps.DirectionsService();
                        const directionsRenderer = new google.maps.DirectionsRenderer({
                            draggable: true,
                            map,
                            panel: document.getElementById("panel"),
                        });
                    
                        directionsRenderer.addListener("directions_changed", () => {
                            const directions = directionsRenderer.getDirections();
                    
                            if (directions) {
                              computeTotalDistance(directions);
                            }
                        });
                        displayRoute(
                            collection,
                            delivery,
                            directionsService,
                            directionsRenderer,
                        );
                    }

                    function displayRoute(origin, destination, service, display) {
                        service
                            .route({
                              origin: origin,
                              destination: destination,
                              
                              travelMode: google.maps.TravelMode.DRIVING,
                              avoidTolls: true,
                            })
                            .then((result) => {
                              display.setDirections(result);
                            })
                            .catch((e) => {
                              alert("Could not display directions due to: " + e);
                            });
                    }

                    function computeTotalDistance(result) {
                          let total = 0;
                          const myroute = result.routes[0];
                        
                          if (!myroute) {
                            return;
                          }
                        
                          for (let i = 0; i < myroute.legs.length; i++) {
                            total += myroute.legs[i].distance.value;
                          }
                        
                          total = total / 1000;
                          document.getElementById("total").innerHTML = total + " km";
                    }
                    
                    jQuery(document).ready(function($) {
                        initMap();
                    });

                </script>
            </div>
        </div>
    </div>
</div>

<!--Lising Collection and Delivery section-->
<div class="space-y-12" id="delivery_collection_section">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-6" id="collection_section">
                <h2>Collection</h2>
                    <ul class="list-none">
                        @php 
                            if (!empty($return_array['collection_meta_address'])){
                        @endphp
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <p>Collection address </p>
                                    @php 
                                        echo '<p>'.$return_array['collection_meta_address'].'</p>';
                                    @endphp
                            </li>
                        @php  
                            }
                        @endphp
                        <!-- Collection date -->
                        @php 
                            if (!empty($return_array['collection_meta_dates_type'])){
                        @endphp
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                                <p>Collection Date</p>
                                    @php
                                        switch ($return_array['collection_meta_dates_type']) {
                                            case 1:
                                                echo '<p>'.$return_array['collection_meta_dates_from'].'</p>';
                                                break;
                                            case 2:
                                                echo '<p>'.$return_array['collection_meta_dates_from'].'</p>';
                                                break;
                                            case 3:
                                                echo '<p>'.$return_array['collection_meta_dates_from'].'</p>';
                                                break;
                                            case 4:
                                                echo '<p>'.$return_array['collection_meta_dates_from'].'</p>';
                                                echo '<p>'.$return_array['collection_meta_dates_to'].'</p>';
                                                break;    
                                        }
                                    @endphp
                            </li>
                        @php  
                            }
                        @endphp
                        <!-- Collection help -->
                        @php 
                            if (!empty($return_array['collection_meta_help'])){
                        @endphp
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                @php 
                                    echo '<p>Loading</p>';
                                    echo '<p>'.$return_array['collection_meta_help'].'</p>';
                                @endphp    
                            </li>
                        @php  
                            }
                        @endphp
                    </ul>
            </div>
            <div class="sm:col-span-6" id="collection_section">
                <h2>Delivery</h2>
                    <ul class="list-none">
                        <!-- Delivery address -->
                        @php 
                            if (!empty($return_array['collection_meta_delivery_address'])){
                        @endphp 
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <p>Delivery address </p>
                                    @php 
                                        echo '<p>'.$return_array['collection_meta_delivery_address'].'</p>';
                                    @endphp
                            </li>
                        @php  
                            }
                        @endphp   
                        <!-- Delivery dates -->
                        @php 
                            if (!empty($return_array['collection_meta_delivery_dates_type'])){
                        @endphp
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                                <p>Delivery Date</p>
                                    @php
                                        switch ($return_array['collection_meta_delivery_dates_type']) {
                                            case 1:
                                                if(isset($return_array['collection_meta_delivery_dates_from'])){
                                                    echo '<p>'.$return_array['collection_meta_delivery_dates_from'].'</p>';
                                                }
                                                break;
                                            case 2:
                                                if(isset($return_array['collection_meta_delivery_dates_from'])){
                                                    echo '<p>'.$return_array['collection_meta_delivery_dates_from'].'</p>';
                                                }
                                                break;
                                            case 3:
                                                if(isset($return_array['collection_meta_delivery_dates_from'])){
                                                    echo '<p>'.$return_array['collection_meta_delivery_dates_from'].'</p>';
                                                }
                                                break;
                                            case 4:
                                                if(isset($return_array['collection_meta_delivery_dates_from'])){
                                                    echo '<p>'.$return_array['collection_meta_delivery_dates_from'].'</p>';
                                                }
                                                if(isset($return_array['collection_meta_delivery_dates_to'])){
                                                    echo '<p>'.$return_array['collection_meta_delivery_dates_to'].'</p>';
                                                }
                                                break;    
                                        }
                                    @endphp
                            </li>
                        @php  
                            }
                        @endphp    
                        <!-- Delivery Distance -->
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                </svg>
                                <p>Distance</p>
                                <p><div id="total"></div></p>
                            </li>
                        <!-- Delivery help -->
                        @php 
                            if (!empty($return_array['collection_meta_delivery_help'])){
                        @endphp
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                @php 
                                    echo '<p>Loading</p>';
                                    echo '<p>'.$return_array['collection_meta_delivery_help'].'</p>';
                                @endphp    
                            </li>
                        @php  
                            }
                        @endphp
                    </ul>
            </div>
        </div>
    </div>
</div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <input type='hidden' name='id' value="{{$listing->id}}">
            <input type='hidden' name='task' value="2"> 
            <input type='hidden' name='listing_type' value="{{$current_item_id}}"> 
            <input type='hidden' name='user_id' value="{{Auth::user()->id}}"> 
            <a href="/customer/listing_update/step/2/{{$listing->type_id}}/{{Auth::user()->id}}/{{$listing->id}}" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Edit my request</a>
            <a href="#" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel request</a>
        </div>

@endsection