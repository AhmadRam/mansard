@extends('admin_panel.adminLayout') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Products Table')}}
                        <a class="btn btn-lg btn-success" style="float:right;color:white; margin: 5px" href="{{route('admin.products.create')}}">+ {{ __('Add Product')}}</a>
                        <a class="btn btn-lg btn-success" style="float:right;color:white; margin: 5px" href="{{route('admin.products.createspa')}}">+ {{ __('Add SPA')}}</a>
                    </h4>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        {{ __('Name')}}
                                    </th>
                                    <th>
                                        {{ __('Category')}}
                                    </th>

                                    <th>
                                        {{ __('Action')}}
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prdlist as $prd)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.products.edit', ['id' => $prd->id])}}" class="btn btn-warning">{{$prd->name}}</a>
                                    </td>

                                    <td>
                                        {{$prd->category->name}}
                                    </td>

                                    <td>
                                        <a href="{{route('admin.products.delete', ['id' => $prd->id])}}" class="btn btn-danger">{{ __('Delete')}}</a><br><br>
                                        @if($prd->category_id == 9)
                                        <a href="{{route('admin.products.editspa', ['id' => $prd->id])}}" class="btn btn-warning">{{ __('Edit')}}</a>
                                        @else
                                        <a href="{{route('admin.products.edit', ['id' => $prd->id])}}" class="btn btn-warning">{{ __('Edit')}}</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection