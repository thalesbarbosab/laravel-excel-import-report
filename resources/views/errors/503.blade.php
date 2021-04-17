@extends('errors::illustrated-layout')

@section('title', __('validation.generic.503_error'))
@section('code', '503')
@section('message')
    @lang($exception->getMessage() ?: 'validation.generic.503_error_body')
@stop
