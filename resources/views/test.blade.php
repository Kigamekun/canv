
@if (is_null(\App\Models\view_client::where(['user_id' => Auth::user()->id])->first()))
<a href="/edit_template/{{ $data->id }}" style="position: absolute;display: fixed;z-index: 9999;margin:20px;" id="btn" class="btn btn-success">Select this template !</a>
@else 
<button  style="position: absolute;display: fixed;z-index: 9999;margin:20px;" id="btn" class="btn btn-danger">You already select template !</button>
@endif

{!!$data->source_code!!}

     <script>
         var head = document.getElementsByTagName('HEAD')[0];
         var css = @json($data_css);
         var js = @json($data_js);
         var z = @json($host);
         var id = @json($data->resource_id);
         for (let x = 0; x < css.length; x++) {
             console.log('segini');
             var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = z+"/resource/"+id+"/css/"+css[x];
        head.appendChild(link);
             
         }

        //  for (let x = 0; x < js.length; x++) {
        //     console.log('ada'+js[x]);
        //      var script = document.createElement('script');
        //      script.type = 'text/javascript';
        //     script.src = z+"/resource/"+id+"/js/"+js[x];;    
        
        //         document.body.appendChild(script);
             
        //  }
         
         

        
        var meta = document.createElement('meta');
        meta.name = "csrf-token";
        meta.content = "{{ csrf_token() }}";
        head.appendChild(meta);
    </script>







