@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="d-flex justify-content-between ">
            <h4>{{translate('languages')}} </h4>
            <form action="#" method="get" class="my-2 w-75 ">
                @csrf
                <input type="text" name="search" class="form-control w-100 " placeholder="Type & Enter">
                <input type="text" value="{{ $language->key }}" name="lang_key" class="d-none" placeholder="Type & Enter">
            </form>
        </div>
        <form action="{{ route('Translation.update',app()->getLocale())}}" method="post">
            @csrf
            <table id="example1" class="table table-bordered ">
                <thead>
                    <th>#</th>
                    <th>key</th>
                    <th>value</th>
                </thead>
                <tbody>
                    <input type="text" name="lang_key" value="{{ $language->key }}" class="d-none" placeholder="Type & Enter">
                    @foreach($words as $word)
                    <tr>
                        <td>
                            {{ $word->id }}
                        </td>
                        <td>
                            {{ $word->lang_key }}
                        </td>
                        <td>
                            <input class="form-control" name="words[]" value=" {{ $word->lang_value }}" type="text">
                            <input class="d-none" name="keys[]" value="{{ $word->lang_key }}" type="text">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">{{translate('update')}}</button>
            </div>
        </form>
{{ $words->links()}}
    </div>
</div>
@stop
@section('managment_script')

@stop