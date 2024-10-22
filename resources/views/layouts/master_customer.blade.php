@include('layouts.header')
<div class="md:container md:mx-auto">
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        <div class="flex flex-row">
            <div class="basis-1/4">
                <ul class="list-none hover:list-disc">
                    <li><a href="{{ route('customer.listings') }}">My listings</a></li>
                    <li><a href="{{ route('customer.listing.step_one' ,['step' => 1])  }}">List an item</a></li>
                    <li><a href="{{ route('customer.account') }}">Account details</a></li>
                    <li><a href="{{ route('signout') }}">Logout</a></li>
                </ul>
            </div>
            <div class="basis-3/4">
                @yield('content')
            </div>
        </div>
</div>

@include('layouts.footer')