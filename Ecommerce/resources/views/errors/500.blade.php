@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

@extends('errors/layout')


@section('message', 'Server Failed')
@section("page_title","500 Error")
@section("container")
		<h1>4<span>0</span>4</h1>
        @endsection