<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SummerNote;
class SummerNoteController extends Controller
{
 
    public function index()
    {
        $contents = SummerNote::all();
        return view('Admin.index',compact('contents'));
    }

    public function create()
    {
        return view('Admin.create');
    }

   
    public function store(Request $request)
    {
        // SummerNote::create($request->all());
          // return redirect()->route('summernote.index');
        // $summernote = SummerNote::create([
        //     'title' => $request['title'],
        //     'description' => $request['description'],
        // ]);
        $des=$request->description;
        $title = $request->title;
        $dom = new \domdocument();
        $dom->loadHtml($des, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
 
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
 
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/'. $image_name;
 
            file_put_contents($path, $data);
            
            $img->removeattribute('src');
            $img->setattribute('src','../../'.$image_name);
        }
 
        $des = $dom->savehtml();
        $summernote = new SummerNote;
        $summernote->description = $des;
        $summernote->title = $title;
        $summernote->save();
        return view('Admin.index',compact('summernote'));
      

    }

 
    public function show($id)
    {
        $summernote = SummerNote::find($id);
        return view('Admin.show', compact('summernote'));
    }

  
    public function edit($id)
    {
       $summernote = SummerNote::find($id);
       return view('Admin.edit',compact('summernote'));
    }


    public function update(Request $request, $id)
    {
        $summernote = SummerNote::find($id);
        $des=$request->description;
        $title = $request->title;
        $dom = new \domdocument();
        $dom->loadHtml($des, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getelementsbytagname('img');
 
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){

            $data = $img->getattribute('src');
            if(strlen($data) > 100){

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
     
                $data = base64_decode($data);
                $image_name= time().$k.'.png';
                $path = public_path() .'/'. $image_name;
     
                file_put_contents($path, $data);
                
                $img->removeattribute('src');
                $img->setattribute('src','../../'.$image_name);
            }
        }
 
        $des = $dom->savehtml();
        $summernote->description = $des;
        $summernote->title = $title;
        $summernote->save();
        return redirect()->route('summernote.index');
    }


    public function destroy($id)
    {   
        $summernote = SummerNote::find($id);
        $summernote->delete();
        return redirect()->route('summernote.index');
    }
}
