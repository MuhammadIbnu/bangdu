@extends('layouts.template')

@section('title')
    Data Petugas Bakuda
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    @if (Request::get('keyword'))
                        <a href="{{route('bakuda.index')}}" class="btn btn-success">Back</a>
                    @else
                    <a href="{{route('bakuda.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>create</a>
                    @endif
                    <form action="{{route('bakuda.index')}}" method="get">
                        <div class="fore-group">
                            <label for="keyword" class="col-sm-2 control-label">Search By name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    @if (Request::get('keyword'))
                        <div class="alert alert-success alert-black">hasil pencarian dangan keyword: <b>{{Request::get('keyword')}}</b></div>
                    @endif
                        @include('alert.success')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>username</th>
                                <th>nama</th>
                                <th width="30%">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bakuda as $row)
                                <tr>
                                    <td>{{$loop->iteration + ($bakuda->perPage() *($bakuda->currentPage()-1))}} </td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>
                                        <form method="post" action="{{route('bakuda.destroy',[$row->id])}}" onsubmit="return confirm('apakah anda yakin akan menghapus data ini?')">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <a href="{{route('bakuda.edit',[$row->id])}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('bakuda.reset',[$row->id])}}" onclick="return confirm('apakah anda yakin akan RESET data ini?')" class="btn btn-warning" >reset</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$bakuda->appends(Request::All())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection