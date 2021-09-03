@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="d-flex justify-content-between ">
            <h4>{{translate('languages')}} </h4>
            <form action="#" method="get">
                @csrf
                <input type="text" name="search" class="form-control" placeholder="Type & Enter">
            </form>
        </div>

        <div class="row my-2">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <th>#</th>
                    <th>key</th>
                    <th>value</th>
                </thead>
                <tbody>
                @foreach($words as $word)
                    <tr>
                        <td>
                            {{ $word->id }}
                        </td>
                        <td>
                            {{ $word->ang_key }}
                        </td>
                        <td>
                            {{ $word->lang_value }}
                        </td>
                        <td>
                           <a href="#"  title="modifier des mots" ><i class="mx-1 fas fa-language"></i></a>
                           <a href="#" title="delete" ><i class=" mx-1 text-danger fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
@section('managment_script')

@stop
