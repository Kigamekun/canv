<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use File;
use App\Models\html_data;
use App\Models\css_data;
use App\Models\view_client;
use App\Models\resource;
use App\Models\js_data;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function design($design_id,Request $request)
    {
        
        $data = html_data::where('resource_id',$design_id)->first();
        $data_css = css_data::where('resource_id',$design_id)->first();
        $css = explode(',',$data_css->file);
        // $data_js = js_data::where('resource_id',$design_id)->first();
        // $js = explode(',',$data_js->file);
        
        
        return view('test',["data"=>$data,'data_css'=>$css,'host'=>$request->getSchemeAndHttpHost()]);


        // return File::get(public_path().'/'.'test.html',['data'=>"data"]);
    }
    public function home()
    {
        $data = resource::all();
        return view('home',['data'=>$data]);
    }
    public function update_design(Request $request)
    {
        
        // $update = explode('<body>',$request->sc);
        
        // $update = explode('</body>',$update[1]);


        // $solved = [];
        // $code = view_client::where('user_id',Auth::id())->first();
        // $initial = explode('<body>',$code);
        // $solved[] = $initial[0];
        // $solved[] = $update[0];
        // $initial = explode('</body>',$initial[1]);
        // $solved[] = $initial[1];
        

        // $solve = join('',$solved);
        
        view_client::where('user_id',Auth::id())->update(['code'=>$request->sc]);
        // $data = view_client::where('user_id',Auth::id())->first();
        // $data->code = $request->sc;
        // $data->save();


        return response()->json(['success'=>'Article updated successfully']);
    }

    public function add_template()
    {
        return view('add_template');
    }

    public function create_template(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'author'=> 'required',
            'thumb'=> 'required|file|image',
            'code'=> 'required',
            ]);

            $file = $request->file('thumb');
		// menyimpan data file yang diupload ke variabel $file
        
		$nama_file = time()."_".$file->getClientOriginalName();
        
        $upload_to = 'resource/img';
		

		$file->move($upload_to,$nama_file);

        
        $res = resource::create([
            'title'=>$request->title,
            'author'=>$request->thumb,
            'thumb'=>"/resource/img/".$nama_file
        ]);
        
        html_data::create([
            'resource_id'=>$res->id,
            'source_code'=>$request->code
            ]);

        File::makeDirectory(public_path().'/resource'.'/'.$res->id.'/css',0777,true);
        File::makeDirectory(public_path().'/resource'.'/'.$res->id.'/js',0777,true);
        $path = 'resource'.'/'.$res->id.'/css';
        if ($request->hasfile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $name = $file->getClientOriginalName();
                
		
            $file->move($path,$name);

                $data[] = $name;
            }
            
        }
        css_data::create([
            'resource_id'=>$res->id,
            'file'=>join(",",$data)
            ]);

            $path2 = 'resource'.'/'.$res->id.'/js';
            if ($request->hasfile('jsfile')) {
                foreach ($request->file('jsfile') as $file) {
                    $name = $file->getClientOriginalName();
                    
            
                $file->move($path2,$name);
    
                    $data2[] = $name;
                }
                
            }

            js_data::create([
                'resource_id'=>$res->id,
                'file'=>join(",",$data2)
            ]);

            return redirect('/');
    }

    public function client_edit(Request $request,$data_id)
    {
        $data = html_data::where('id',$data_id)->first();
        if (is_null(view_client::where('user_id',Auth::id())->first())) {
            
$data_cl = view_client::create([
    'user_id'=>Auth::id(),
    'resource_id'=>$data->resource_id,
    'code'=>$data->source_code
]);
            
        }
        else {
            $data_cl = view_client::where('user_id',Auth::id())->first();
        }

        $data_css = css_data::where('resource_id',$data_cl->resource_id)->first();
        // dd($data_css);
        $css = explode(',',$data_css->file);
        // dd(public_path().'/');
        // dd($data_cl);
        return view('edit_template',["data"=>$data_cl,'data_css'=>$css,'host'=>$request->getSchemeAndHttpHost()]);

        
    }

    public function my_template(Request $request)
    {
        try {
            $data_cl = view_client::where('user_id',Auth::id())->first();
            $data_css = css_data::where('resource_id',$data_cl->resource_id)->first();
            $css = explode(',',$data_css->file);

        return view('edit_template',["data"=>$data_cl,'data_css'=>$css,'host'=>$request->getSchemeAndHttpHost()]);




        } catch (Exception $th) {
            return view('template_not_exists');
        }
    }




}


