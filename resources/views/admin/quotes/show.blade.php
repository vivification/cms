@extends('admin.layouts.admin')

@section('content')

    <h1>View Quote {{ $quote->quote_number }}</h1>
    <br>
    <br>
    <div class="container">

        @if (config('quotes.logo_file') !='')
            <div class="col-md-12 text-center">
                <img src="{{config('quotes.logo_file')}}" alt="" width="100px">
                <br><br>
            </div>
        @endif


        <div class="row clearfix text-right" >
            <div class="col-md-4 offset-4 text-right">
                <b>Quote Number:</b> {{ $quote->quote_number }}
                <br>
                <b>Quote Date:</b>{{ $quote->quote_date }}
                <br>
            </div>
        </div>

        <div class="row clearfix" style="margin-top:20px">
            <div class="col-md-12">
                <div class="float-left col-md-6" style="font-size:14px;" >
                    <b>To:</b>          {{ $quote->customer->name }}
                    <br>
                    <b>Address:</b>     {{ $quote->customer->address }}
                    <br>
                    <b>City:</b>        {{ $quote->customer->city }}
                    <br>
                    <b>State:</b>       {{ $quote->customer->state }}
                    <br>
                    <b>Postcode:</b>    {{ $quote->customer->postcode }}
                    <br>
                    <b>Country:</b>     {{ $quote->customer->country }}
                    <br>
                    <b>Phone:</b>       {{ $quote->customer->phone }}
                    <br>
                    <b>Email:</b>       {{ $quote->customer->email }}

                    @if ($quote->customer->customer_fields)
                        @foreach ($quote->customer->customer_fields as $field)
                            <br /><br /><b>{{ $field->field_key }}</b>: {{ $field->field_value }}
                            @endforeach
                    @endif

                </div>
                <div class="float-right col-md-4">
                    <b>From</b>: {{ config('quotes.seller.name') }}
                    <br>
                    <b>Address</b>: {{ config('quotes.seller.address') }}
                    <br>
                    @if (config('quotes.seller.email') != '')
                        <b>Email</b>: {{ config('quotes.seller.email') }}
                    @endif
                    @if (is_array(config('quotes.seller.additional_info')))
                        @foreach (config('quotes.seller.additional_info') as $key => $value)
                            <br /><br />
                            <b>{{ $key }}</b>: {{ $value }}
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row clearfix" style="margin-top: 20px">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center"> # </th>
                        <th class="text-center"> Product </th>
                        <th class="text-center"> Qty </th>
                        <th class="text-center"> Price </th>
                        <th class="text-center"> Total </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($quote->quote_items as $item)

                    <tr id='addr0'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>

                    @endforeach
                    <tr id='addr1'></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row clearfix" style="margin-top:20px">
            <div class="pull-right col-md-5">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                    <tr>
                        <th class="text-center">Sub Total</th>
                        <td class="text-center">${{ number_format($quote->test_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Tax</th>
                        <td class="text-center">{{ $quote->tax_percent }}%</td>
                    </tr>
                    <tr>
                        <th class="text-center">Tax Amount</th>
                        <td class="text-center">${{ number_format($quote->total_amount * $quote->tax_percent /100, 2) }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Grand Total</th>
                        <td class="text-center">${{ number_format($quote->total_amount + ($quote->total_amount * $quote->tax_percent /100), 2) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row clearfix" style="margin-top: 20px">
            <div class="col-md-12">
                {{ config('quotes.footer_text') }}
            </div>

        </div>

    </div>

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection