@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))

@extends('errors/layout')


@section('message', 'Too Many Requests')
@section("page_title","429 Error")
@section("container")
		<h1>4<span>0</span>4</h1>
        @endsection