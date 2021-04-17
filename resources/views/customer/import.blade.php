@extends('layouts.app')
@section('title')
    <title>Customers</title>
@endsection
@section('body')
    <br>
    <div class="mb-3">
        <a href="{{route('customers.index')}}" class="btn btn-dark">@lang('platform.customer.message.return')</a>
    </div>
    <h3>@lang('platform.customer.import')</h3>
    <form method="POST" action="{{ route('customers.storeImport') }}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label class="form-label">@lang('platform.customer.form.file')</label>
            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{old('file')}}">
            @if ($errors->has('file'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-outline btn-primary" type="submit">@lang('platform.generic.action.submit')</button>
        </div>
    </form>
@endsection
