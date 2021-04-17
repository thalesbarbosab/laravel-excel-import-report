@extends('errors::illustrated-layout')

@section('title', __('validation.generic.404_error'))

@section('code', '404')
@section('message')
    @lang('validation.generic.404_error_body')
@stop
