@extends('layouts.app')

@section('page')

    <div class="container-fluid fluid">

        <div class="row header">

            <div class="col-md-3 col-xs-12 text-center">
                <img src={{url('/assets/logo.png')}} width="" height="" alt=""/>
            </div>
            <div class="col-md-6 text-right visible-lg">
                col-md-6 right
            </div>

        </div>

    </div>


    {{--Region Content--}}
    @yield('content')

@endsection

@section('styles')
    {{ Html::style(mix('assets/auth/css/auth.css')) }}
@endsection
