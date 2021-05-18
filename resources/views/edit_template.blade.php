

@if (Auth::user()->id == $data->user_id)
    
<div style="z-index:10;position: fixed;width:100%;height: 20px;display:flex;flex-wrap:wrap;justify-content: space-between;">
    <div style="z-index:9999;padding:20px;">
		<input type="hidden" id="input">
        <button style="display: none;" id="btn" class="btn btn-success">Change !</button>
    </div>

    

    <div style="z-index:9999 ;padding:20px;">
        <button class="btn btn-success" onclick="copyToClipboard('{{ $host.'/invitation'.'/?x='.$hashed }}')">Share Link !</button>
        <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-warning"> Help</button>        
<button onclick="post();" class="btn btn-info"> Save</button>
</div>
</div>

@endif

  {{-- <!-- Modal -->
  <div style="z-index:9999 ;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Guide Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item disabled" aria-disabled="true">Iqra</li>
                <li class="list-group-item">edit by pressing the part you want to change the content</li>
                <li class="list-group-item">Item can edited just H1 - H6,P,IMG,VIDEO,Background color of DIV</li>
                <li class="list-group-item">if button can't click is not bug but is a features try to scroll a little and try to click again</li>
                <li class="list-group-item">Invitation will not be saved if you haven't pressed the save button</li>
              </ul>
        </div>
        
      </div>
    </div>
  </div>
   --}}


<div id="fills">
{!!$data->code!!}
</div>

@if (Auth::user()->id == $data->user_id)


<script>
    function copyToClipboard(text) {
    var inputc = document.body.appendChild(document.createElement("input"));
    inputc.value = text;
    inputc.focus();
    inputc.select();
    document.execCommand('copy');
    inputc.parentNode.removeChild(inputc);
    alert("URL Copied.");
    }
    </script>
    

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
    if (e.target.tagName == "P" || e.target.tagName == "p" || e.target.tagName == "H1" || e.target.tagName == "h1" || e.target.tagName == "H2" || e.target.tagName == "h2" || e.target.tagName == "H3" || e.target.tagName == "h3" || e.target.tagName == "H4" || e.target.tagName == "h4" || e.target.tagName == "H5" || e.target.tagName == "h5" || e.target.tagName == "H6" || e.target.tagName == "h6") {
        document.getElementById("btn").style.display = "inline-block";
		document.getElementById("input").type = "text";
        document.getElementById("input").placeholder = "Masukkan Text baru anda!";
		document.getElementById("btn").onclick = function(){
		e.target.innerHTML = document.getElementById("input").value;
		document.getElementById("input").value = "";
        document.getElementById("btn").style.display = "none";
		document.getElementById("input").type = "hidden";
    }
		
	}
	else if(e.target.tagName == "IMG" || e.target.tagName == "img"){
		console.log(e.target.src);
        document.getElementById("btn").style.display = "inline-block";
		document.getElementById("input").type = "text";
        document.getElementById("input").placeholder = "Masukkan url gambar anda !";
        document.getElementById("btn").onclick = function(){
        e.target.src = document.getElementById("input").value;
		document.getElementById("input").value = "";
        document.getElementById("btn").style.display = "none";
		document.getElementById("input").type = "hidden";
    }
		
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
                    alert('All already Saved');
                }
            });
        }






    </script>
   





   @endif