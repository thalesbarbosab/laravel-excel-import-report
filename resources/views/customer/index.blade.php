@extends('layouts.app')
@section('title')
    <title>@lang('platform.customer.name')</title>
@endsection
@section('body')
    <br>
    <div class="mb-3">
        <a href="{{route('customers.index')}}" class="btn btn-dark">@lang('platform.generic.message.index')</a>
        <a href="{{route('customers.create')}}" class="btn btn-primary">@lang('platform.customer.new')</a>
        <a href="{{route('customers.import')}}" class="btn btn-info">@lang('platform.customer.import')</a>
        @if (count($customers)>0)
            <a href="{{route('customers.report')}}" class="btn btn-info">@lang('platform.customer.report')</a>
        @endif

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
                                <a href="{{route('customers.report',$item->id)}}" class="btn btn-info btn-outline btn-sm">@lang('platform.generic.action.report')</a>
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
    @if(Session::has('report'))
        <div class="modal fade" id="modal-report-download" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{Session::get('report_name')}}</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <i class="far fa-check-circle"></i> <strong>@lang('platform.report.message.generated_success')</strong>
                            <br><br>
                            <a type="button" class="btn btn-secondary" href="{{Session::get('report_link')}}" target='download'><i class="fas fa-cloud-download-alt"></i> @lang('platform.report.message.realize_download')</a>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-primary float-right" data-bs-dismiss="modal">@lang('platform.generic.action.close')</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script>
        $(document).ready( function () {
            @if(Session::has('report'))
                $('#modal-report-download').modal('show')
            @endif
        });
    </script>
@endsection
