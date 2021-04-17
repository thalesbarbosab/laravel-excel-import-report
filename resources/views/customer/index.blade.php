@extends('layouts.app')
@section('title')
    <title>@lang('platform.customer.name')</title>
@endsection
@section('body')
    <br>
    <div class="mb-3">
        <a href="{{route('customers.index')}}" class="btn btn-dark">@lang('platform.generic.message.index')</a>
        <a href="{{route('customers.create')}}" class="btn btn-primary">@lang('platform.customer.new')</a>
    </div>
    <h3>@lang('platform.customer.name')</h3>
    <div class="mb-3">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('platform.customer.form.cpf')</th>
                <th scope="col">@lang('platform.customer.form.name')</th>
                <th scope="col">@lang('platform.customer.form.email')</th>
                <th scope="col">@lang('platform.customer.form.options')</th>
                </tr>
            </thead>
            <tbody>
                @if(count($customers)==0)
                    <td colspan="5">@lang('platform.customer.message.no_data')</td>
                @else
                    @foreach ($customers as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->cpf}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{route('customers.edit',$item->id)}}" class="btn btn-primary btn-outline btn-sm">@lang('platform.generic.action.edit')</a>
                                <form method="POST" action="{{ route('customers.destroy', $item->id) }}" style="display: inline" onsubmit="return confirm('@lang('platform.customer.message.delete')');" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-outline btn-sm"><i class="far fa-trash-alt"></i>@lang('platform.generic.action.delete')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
