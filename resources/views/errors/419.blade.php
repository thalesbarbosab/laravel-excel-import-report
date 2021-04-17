@extends('errors::illustrated-layout')

@section('title', __('validation.generic.419_error'))

@section('code', '419')
@section('message')
    @lang('validation.generic.419_error_body')
@stop
