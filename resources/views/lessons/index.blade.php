@extends('layouts.app')
@section('content')
    <div class="container">
       <div class="row justify-content-left">
          @foreach ($lessons as $lesson)
            <div class="col-md-4 mb-2">
               <div class="card">
                 <div class="card-header">{{ $lesson->name }}</div>
                 <div class="card-body">{{ $lesson->amount }}円</div>
             </div>
        　　</div>
　　　　　　@endforeach
　　　　</div>
		<div class="row justify-content-center"> 
			{{ $lessons->appends(['keyword' => Request::get ('keyword') ]) ->links() }}
		</div>
   </div>
@endsection