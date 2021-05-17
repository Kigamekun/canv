@extends('layouts.app')


@section('content')

<div class="container">
    <form action="/create_template/" method="POST" enctype="multipart/form-data">
        
        @csrf
        <div class="input-group mb-3">
            
            <input type="text" class="form-control" placeholder="title" aria-label="title" name="title" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            
            <input type="text" class="form-control" placeholder="author" aria-label="author" name="author" aria-describedby="basic-addon1">
          </div>
          
          <div class="input-group mb-3">
            <input type="file" class="form-control" name="thumb" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">thumb</label>   
          </div>

          <div class="input-group">
            <span class="input-group-text">Source Code HTML</span>
            <textarea name="code" class="form-control" aria-label="With textarea"></textarea>
          </div>
          <br>
          <div class="input-group mb-3">
            <input type="file" class="form-control"  name="attachment[]" multiple id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload CSS File</label>   
          </div>
          <div class="input-group mb-3">
            <input type="file" class="form-control"  name="jsfile[]" multiple id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload JS File</label>   
          </div>
          
          

          <button type="submit" class="btn btn-success">Send !</button>
    </form>
    
</div>

@endsection