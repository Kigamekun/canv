{!!$data->code!!}

<style>
    @import url(https://fonts.googleapis.com/css?family=Lily+Script+One);

#fr {
	margin:10% auto 0 auto;
	padding:30px;
	width:400px;
	height:auto;
	overflow:hidden;
	background:white;
	border-radius:10px;
}



#in {
	margin:15px 0;
	padding:15px 10px;
	width:100%;
	outline:none;
	border:1px solid #bbb;
	border-radius:20px;
	display:inline-block;
	-webkit-box-sizing:border-box;
	   -moz-box-sizing:border-box;
	        box-sizing:border-box;
    -webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

#in:focus {
	border-color:cornflowerblue;
}

.sub {
	padding:15px 50px;
	width:auto;
	background:#1abc9c;
	border:none;
	color:white;
	cursor:pointer;
	display:inline-block;
	float:right;
	clear:right;
	-webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

.sub:hover {
	opacity:0.8;
}

.sub:active {
	opacity:0.4;
}


</style>


<div style="width: 100%;">
<center><h1>Comments</h1></center>
<ul style="list-style: none">
    <li>
      <h2>Akiga</h2>
      <h4>Waww they are beautifull</h4>
    </li>
    <hr>
</ul>
<form id="fr" method="post" action="">
    @csrf
<input id="in" type="text"  name="text" placeholder="Enter your password.." autocomplete="off" required />

<input type="submit" name="submit" class="sub" value="Log In" />

</form>
</div>
     <script>
         var head = document.getElementsByTagName('HEAD')[0];
         var css = @json($data_css);
        
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

		 var meta = document.createElement('meta');
       meta.name = "csrf-token";
       meta.content = "{{ csrf_token() }}";
       head.appendChild(meta);
    </script>







