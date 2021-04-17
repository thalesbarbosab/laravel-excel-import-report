@extends('errors::illustrated-layout')

@section('title', __('validation.generic.403_error'))
@section('code', '403')
@section('message')
    @lang($exception->getMessage() ?: 'validation.generic.403_error_body')
@stop
