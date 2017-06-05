@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{_i('Locales')}}</div>
                <div class="panel-body">
                    <a href="{{ url('locale/pot') }}">Get .pot File</a>
                    <form action="{{ url('locale/upload') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    @foreach ($locales as $locale)
                    <div class="panel">
                        <label>{{$locale->region}}</label>
                        Po: <input type="file" name="{{$locale->region}}[po]">
                        Mo: <input type="file" name="{{$locale->region}}[mo]">
                    </div>
                    @endforeach
                    <button tyoe="submit">Submit</button>
                    </form>
                    <a href="{{url('locale/create')}}" class="btn btn-primary">{{_i('Create New')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
