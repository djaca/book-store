@extends('layouts.app')

@section('content')
    <div>
        <div class="text-3xl mb-6">Purchase</div>

        <form method="POST" action="{{ route('checkout') }}" class="w-full max-w-lg">
            {{ csrf_field() }}

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="first_name">
                        First name
                    </label>
                    <input type="text"
                           name="first_name"
                           value="{{ $customer->first_name }}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                           id="first_name">
                    {!! $errors->first('first_name', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="last_name">
                        Last name
                    </label>
                    <input type="text"
                           name="last_name"
                           value="{{ $customer->last_name }}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                           id="last_name">
                    {!! $errors->first('last_name', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="address">
                        Address
                    </label>
                    <input type="text"
                           name="address"
                           value="{{ $customer->address }}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                           id="address">
                    {!! $errors->first('address', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="city">
                        City
                    </label>
                    <input type="text"
                           name="city"
                           value="{{ $customer->city }}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                           id="city">
                    {!! $errors->first('city', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="zip">
                        Zip code
                    </label>
                    <input type="text"
                           name="zip"
                           value="{{ $customer->zip }}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                           id="zip">
                    {!! $errors->first('zip', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="country">
                        Country
                    </label>
                    <input type="text"
                           name="country"
                           value="{{ $customer->country }}"
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                           id="country">
                    {!! $errors->first('country', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-blue">
                    Purchase
                </button>
                <a href="{{ route('cart.index') }}"
                   class="btn btn-light">Cancel</a>
            </div>
        </form>
    </div>
@endsection
