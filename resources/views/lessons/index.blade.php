@extends('layouts.app')
@section('content')
    <div class="container">
       <div class="row justify-content-left">
          @foreach ($lessons as $lesson)
            <div class="col-md-4 mb-2">
               <div class="card">
				　　<div class="card-header">
				　　　　<a href="/lesson/{{ $lesson->id }}">{{ $lesson->name }}</a>
				　　</div>
				　　<div class="card-body">
				　　　　{{ $lesson->amount }}円
				　　</div>
				</div>
				@auth
				<form method = "POST" action="purchase" class ="form-inline m-1">
			　　　　{{ csrf_field() }} 
				　　<select name="quantity" class="form-control col-md-2 mr-1">
				　　　<option selected>1</option>
				　　　<option>2</option>
				　　　<option>3</option>
				　　　<option>4</option>
				　　　<option>5</option>
				　　</select>
				　　<input type="hidden" name="lesson_id" value="{{ $lesson -> id }}">                                　　　　<button type="submit" class="btn btn-primary" col-md-6>カートに入れる</button>
				</form>
				@endauth
        　　</div>
			
　　　　　　@endforeach
　　　　</div>
		<div class="row justify-content-center"> 
			{{ $lessons->appends(['keyword' => Request::get ('keyword') ]) ->links() }}
		</div>
   </div>
@endsection