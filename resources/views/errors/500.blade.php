@extends('errors::illustrated-layout')

@section('title', __('validation.generic.500_error'))
@section('code', '500')
@section('message')
    @lang('validation.generic.500_error_body')
@stop
