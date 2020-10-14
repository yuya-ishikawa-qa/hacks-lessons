@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class = "col-md-8">
           <div class="card">
                <div class="card-header">
                    {{ $lesson->name }}
                </div>
                <div class = "card-body">
                   {{ $lesson -> amount }}
                </div>
            </div>
       </div>
    </div>
</div>
@endsection