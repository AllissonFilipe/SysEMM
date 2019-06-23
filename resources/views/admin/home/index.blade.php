@extends('adminlte::page')

@section('title', 'Home')
    
@section('content_header')
    <style>
        .content-wrapper {
            background-image: url("{{asset('template/img/banner_bg.png')}}");
            background-repeat: no-repeat;
            background-position: right;
        }
    </style>
@stop

@section('content')
        <center><img src="{{asset('template/img/Logo_SysEMM_2.jpg')}}" alt="logo"></center>
@stop