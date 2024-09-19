@extends('vendor.layouts.app')

@section('title', 'Vendor : Subscription')
@php
    use Carbon\Carbon;
@endphp
@push('customCSS')
    <style type="text/css" media="screen">
        .action-cons {
            font-size: 20px;
            font-weight: bold;
        }

        .action-cons:hover {
            font-size: 20px;
            color: #f8f9fa;
            background: #339af0;
        }

        .lis-bg-light {
            background-color: #00000005
        }

        section {
            padding-top: 6.25em;
            padding-bottom: 6.25em;
            position: relative
        }

        .pb-4,
        .py-4 {
            padding-bottom: 1.5rem !important
        }

        h2 {
            font-size: 2rem
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #222222;
            margin: 0 0 15px;
            font-family: "Poppins", sans-serif;
            line-height: 1.75rem
        }

        .lis-light {
            color: #707070
        }

        .font-weight-normal {
            font-weight: 400 !important
        }

        h5 {
            font-size: 1.25rem
        }

        .price-table {
            -webkit-transition: 0.3s ease
        }

        .lis-brd-light {
            border-color: #dadada !important
        }

        .lis-rounded-top {
            border-top-right-radius: 20px;
            border-top-left-radius: 20px
        }

        .lis-bg-light {
            background-color: #f7f7f7
        }

        .pb-4,
        .py-4 {
            padding-bottom: 1.5rem !important
        }

        .lis-latter-spacing-2 {
            letter-spacing: 2px
        }

        .text-uppercase {
            text-transform: uppercase !important
        }

        .lis-font-weight-500 {
            font-weight: 500
        }

        .display-4 {
            font-size: 3.5rem
        }

        .price-table sup {
            top: -1.5em
        }

        .price-table sup,
        .price-table small {
            font-size: 1.25rem
        }

        .price-table small {
            font-size: 1.25rem
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0 !important
        }

        sup {
            position: relative;
            font-size: 75%;
            line-height: 0
        }

        .lis-brd-light {
            border-color: #dadada !important
        }

        .bg-white {
            background-color: #fff !important
        }

        .py-5 {
            padding-bottom: 3rem !important
        }

        .lis-line-height-3 {
            line-height: 3 !important
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none
        }

        .lis-line-height-3 {
            line-height: 3 !important
        }

        .btn-primary-outline {
            background-color: transparent;
            color: #ff214f !important;
            border-color: #ff214f
        }

        .btn {
            color: #fff;
            padding: .5rem 1.3rem;
            font-size: 1rem;
            word-wrap: break-word
        }

        .lis-rounded-circle-50 {
            border-radius: 50px
        }

        .pl-2,
        .px-2 {
            padding-right: .5rem !important
        }

        .btn-primary-outline:hover,
        .btn-primary-outline:focus {
            background-color: #ff214f;
            border-color: #ff214f;
            color: #fff !important
        }

        .lis-bg-primary {
            background-color: #ff214f
        }

        .btn-primary {
            background-color: #ff214f;
            border-color: #ff214f
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #ff214f;
            border-color: #ff214f
        }

        .price-table.active {
            transform: scale(1.045);
            -webkit-transform: scale(1.045)
        }

        .price-table {
            -webkit-transition: 0.3s ease
        }

        .lis-rounded-bottom {
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            min-height: 230px;
        }

        .description-block ul {
            list-style-type: none;
            padding: 0;
        }

    </style>
@endpush

@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <section class="lis-bg-light">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 text-center">
                                <div class="heading pb-4">
                                    <h2>Choose Your Plan</h2>
                                    <h5 class="font-weight-normal lis-light">Choose a pricing plan & get started with your listing.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if(!empty($discounts))
                                @php $i = 1; @endphp
                                @foreach($discounts as $key => $discount)
                                    <div class="col-12 col-md-6 wow fadeInUp mb-5 mb-lg-0 text-center" style="visibility: visible; animation-name: fadeInUp;">
                                        <div class="price-table">
                                            <div class="price-header lis-bg-light lis-rounded-top py-4 border border-bottom-0 lis-brd-light">
                                                <h5 class="text-uppercase lis-latter-spacing-2">
                                                    {{$discount->name}}
                                                </h5>
                                                <h1 class="display-4 lis-font-weight-500">
                                                    <sup>$</sup> {{$discount->price}}
                                                    <small>/{{$discount->plan_duration}}</small></h1>
                                                <p class="mb-0">Advertiser Membership</p>
                                                {{-- <p class="mb-0">First deal free.</p>--}}
                                            </div>

                                            <div class="description-block border border-top-0 lis-brd-light bg-white py-5 lis-rounded-bottom">

                                                {!! $discount->description !!}

                                                <p> @if($discount->plan_duration == '6 Months')
                                                        {!! $dynamic_message->six_month_subscription_title ?? '' !!}
                                                    @else
                                                        {!! $dynamic_message->one_year_subscription_title ?? '' !!}
                                                    @endif</p>

                                                <form action="{{route('plan.checkout')}}">

                                                    <input type="hidden" name="plan_id" value="{{$discount->id}}">
                                                    <input type="hidden" name="details" value="{{$discount->description}}">
                                                    <input type="hidden" name="price" value="{{$discount->price}}">

                                                    @if ($discount->id == 1)
                                                        <input type="hidden" name="plan_expiry" value="182">
                                                    @endif

                                                    @if ($discount->id == 2)
                                                        <input type="hidden" name="plan_expiry" value="365">
                                                    @endif

                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                                    @if (Auth::user()->plan_id == $discount->id && Auth::user()->plan_expiry_date > Carbon::now())
                                                        <button type="submit" class="btn
                                                           @if (isset(Auth::user()->plan_id)) btn-danger @else  btn-primary-outline @endif
                                                                btn-md lis-rounded-circle-50" data-abc="true" disabled><i class="la la-tick"></i>
                                                            Current Plan
                                                        </button>
                                                        @if (isset(Auth::user()->plan_id))
                                                            @if (Auth::user()->plan_expiry_date > Carbon::now())
                                                                <p class="font-weight-bold" style="margin-top:20px;">
                                                                    Valid Till:
                                                                    <span class="text-danger ml-2">{{Auth::user()->plan_expiry_date}}</span>
                                                                </p>
                                                            @else
                                                                <p style="margin-top:20px;">Your Plan has expired...</p>
                                                            @endif
                                                        @endif
                                                    @else
                                                        <button type="submit" class="btn btn-primary-outline btn-md lis-rounded-circle-50" data-abc="true"><i class="la la-cart-plus"></i>
                                                            Sign Up Now
                                                        </button>
                                                    @endif
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            @endif
                        </div>
                        <div class="row my-5 text-center">
                            <div class=" col-12 heading pb-4">
                                <h2>Pricing For Extra Features</h2>
                            </div>
                            <div class="col-6">
                                <div class="card rounded" style="border-radius: 20px !important;">
                                    <div class="card-body py-4">
                                        <h3>${{$additionalPricing->per_listing_price}}</h3>
                                        <div class="">
                                            <p>
                                                Foreach Extra New <b>Category</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="card rounded" style="border-radius: 20px !important;">
                                    <div class="card-body py-4">
                                        <h3>${{$additionalPricing->additional_city_price}}</h3>
                                        <div class="">
                                            <p>
                                                Foreach Extra New <b>City</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </section>


            </div>
        </div>


@endsection

@push('customJs')

@endpush
