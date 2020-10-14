@extends('layouts.app')
@section('content')
<div class="container">
　<div class="row justify-content-center">
　　<div class="col-md-8">
　@foreach ($cartlessons as $cartlesson)
　　<div class="card">
　　　<div class="card-header">
　　　　<a href="/lesson/{{ $cartlesson->lesson_id }}">{{ $cartlesson->name }}</a>                        　　　</div>
　　　<div class="card-body">
　　　　　<div>
　　　　　　　 {{ $cartlesson->amount }}円 
　　　　　</div>
　　　　　<div class="form-inline">
        　　<form method="POST" action="{{ route('update' , $cartlesson) }}">                                    　　　@method('PUT')
        　　　@csrf 
        　　　<input type="text" class="form-control" name="quantity" value="{{ $cartlesson->quantity }}">個 
        　　<button type="submit" class="btn btn-primary">更新</button>
            </form>
        　　<form method="POST" action="{{ route('delete' , $cartlesson) }}">                                    　　　@method('DELETE')
        　　　@csrf
        　　<button type="submit" class="btn btn-primary ml-1">カートから削除する</button>                             　　</form>
        </div>
　　　</div>
　　</div>
　@endforeach
　</div>
　<div class="col-md-4">
　　<div class="card">
　　　<div class="card-header">
　　　　小計
　　　</div>
　　　<div class="card-body">
　　　　{{ $subtotal }}円
　　　</div>
　　</div>
　</div>
</div>
</div>
@endsection