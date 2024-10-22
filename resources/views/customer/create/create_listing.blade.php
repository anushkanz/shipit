@extends('layouts.master_customer')

@switch(request("step"))
    @case(1)
        @include('customer.create.create_listing_step_one')
        @break
    @case(2)
        @include('customer.create.create_listing_step_two')
        @break
    @case(3)
        @include('customer.create.create_listing_step_three')
        @break
    @case(4)
        @include('customer.create.create_listing_step_four')
        @break
    @case(5)
        @include('customer.create.create_listing_step_five')
        @break
    @case(6)
        @include('customer.create.create_listing_step_six')
        @break
    @case(7)
        @include('customer.create.create_listing_step_seven')
        @break
    @default
        {{dd(request("step"))}}
@endswitch


