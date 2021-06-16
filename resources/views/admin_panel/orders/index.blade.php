@extends('admin_panel.adminLayout') @section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Categories Table')}}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                    {{ __('Id')}}
                                    </th>
                                    <th>
                                    {{ __('Name')}}
                                    </th>
                                    <th>
                                    {{ __('Address')}}
                                    </th>
                                    <th>
                                    {{ __('Product Name')}}
                                    </th>
                                    <th>
                                    {{ __('Quantity')}}
                                    </th>

                                    <th>
                                    {{ __('Placed at')}}
                                    </th>
                                    <th>
                                    {{ __('Status')}}
                                    </th>

                                    <th>
                                    {{ __('Update')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale as $s)

                                @foreach($all as $c)
                                @if($c[0]==$s->id)
                                @foreach($products as $p)
                                @if($p)
                                @if( $c[1]==$p->id)
                                <tr>
                                    <td>{{$s->id}}</td>

                                    @foreach($users as $u)
                                    @if($u->id == $s->user_id)
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->addresses()->first()->title}}, {{$u->addresses()->first()->lineOne}}, {{$u->addresses()->first()->city}}</td>

                                    @break
                                    @endif
                                    @endforeach


                                    <td>

                                        {{$p->name}}

                                    </td>
                                    <td>
                                        {{$c[2]}}
                                    </td>


                                    <td>
                                        {{$s->created_at}}
                                    </td>
                                    <td>
                                        {{$s->order_status}}
                                    </td>
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="orderId">
                                            <select name="stat">
                                                @foreach($status as $x)
                                                @if($s->order_status!=$x)
                                                <option value="{{$x}}">{{$x}}</option>

                                                @endif

                                                @endforeach
                                            </select>
                                            <input type="submit" class="btn btn-sm btn-warning" value="{{ __('Update')}}">
                                        </form>
                                    </td>
                                    @break
                                    @endif

                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection