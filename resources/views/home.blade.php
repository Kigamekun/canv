@extends('layouts.app')

@section('content')
<div class="container">
    <center><h1>list template</h1></center>
    <div class="card-group">
        @foreach ($data as $dt)
            
        <div class="card">
            <img src="{{ url($dt->thumb) }}" class="card-img-top" alt="...">
          <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <a href="/design/{{$dt->id}}" class="btn btn-success">pilih</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        
        @endforeach
        
      </div>
</div>
@endsection
