@extends('admin.layouts.admin')

@section('content')

<h1>Quotes</h1>
<br>
<a href="{{ route('admin.quotes.create') }}" class="btn btn-primary">Add New Quote</a>

<br><br>

    <table class="table table-striped table-hover">
        <tbody>
        <tr>
            <th>ID</th>
            <th>Quote Date</th>
            <th>Quote Number</th>
            <th>Customer</th>
            <th>Total Amount</th>
            <th></th>
        </tr>

        @foreach($quotes as $quote)
            <tr>
                <td>{{$quote->id }}</td>
                <td>{{$quote->quote_date }}</td>
                <td>{{$quote->quote_number}}</td>
                <td>{{$quote->customer->name}}</td>
                <td>${{number_format($quote->total_amount, 2)}}</td>
                <td><a href="admin/quotes/view/{{$quote->id}}" class="btn btn-sm btn-info">View Quote</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection