@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

@if(Auth::user()->level == '1')
@else
@endif
    </div>
</div>
@endsection
