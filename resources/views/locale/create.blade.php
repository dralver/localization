@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{_i('Locales')}}</div>

                <div class="panel-body">
                    <form method="POST" action="{{url('locale')}}">
                        {{ csrf_field() }}
                        <label>{{ _i('Select Region')}}:</label>
                        <select name="region">
                            @foreach ($locales as $locale)
                            <option value="{{$locale->regional()}}">{{ $locale->name() }}</option>
                            @endforeach
                        </select>
                            <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
