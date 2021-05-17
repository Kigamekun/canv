
<div style="z-index:10;position: fixed;width:100%;height: 20px;display:flex;flex-wrap:wrap;justify-content: space-between;">
    <div style="z-index:9999;padding:20px;">
		<input type="hidden" id="input">
<button style="display: none;" id="btn" class="btn btn-success">Change !</button>
</div>



    <div style="z-index:9999 ;padding:20px;">
        <button  class="btn btn-warning"> Help</button>        
<button onclick="post();" class="btn btn-info"> Save</button>
</div>
</div>


<div id="fills">
{!!$data->code!!}
</div>
     <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

     <script>
        var head = document.getElementsByTagName('HEAD')[0];
        var j = @json($data_css);
        var z = @json($host);
        var id = @json($data->resource_id);
        for (let x = 0; x < j.length; x++) {
            console.log('segini');
            var link = document.createElement('link');
       link.rel = 'stylesheet';
       link.type = 'text/css';
       link.href = z+"/resource/"+id+"/css/"+j[x];
       head.appendChild(link);
            
        }
        

       
       var meta = document.createElement('meta');
       meta.name = "csrf-token";
       meta.content = "{{ csrf_token() }}";
       head.appendChild(meta);
   </script>



    <script>


window.onclick = e => {
    // console.log(e.target);  // to get the element
	console.log(e.target.tagName);	
    if (e.target.tagName == "P" || e.target.tagName == "p") {
        document.getElementById("btn").style.display = "unset";
		document.getElementById("input").type = "text";
		document.getElementById("btn").onclick = function(){
			e.target.innerHTML = document.getElementById("input").value;
			
            
      document.getElementById("input").value = "";
      document.getElementById("btn").style.display = "none";
		document.getElementById("input").type = "hidden";
    }
		
	}
	else if(e.target.tagName == "IMG" || e.target.tagName == "img"){
		console.log(e.target.src);
		e.target.src = 'https://i.ytimg.com/vi/KXXNyh6OTbo/hqdefault.jpg';
	}
}


function post() {
            console.log($("body").html());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/update_design/",
                method: 'POST',
                data: {
                    sc : $("#fills").html(),
                },
                success: function(result) {
                    alert('sudahh');
                }
            });
        }






    </script>
   




