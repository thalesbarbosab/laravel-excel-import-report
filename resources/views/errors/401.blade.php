@extends('errors::illustrated-layout')

@section('title', __('validation.generic.401_error'))
@section('code', '401')
@section('message')
    @lang('validation.generic.401_error_body')
@stop
