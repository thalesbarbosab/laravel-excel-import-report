@extends('errors::illustrated-layout')

@section('title', __('validation.generic.429_error'))
@section('code', '429')
@section('message')
    @lang('validation.generic.429_error_body')
@stop
