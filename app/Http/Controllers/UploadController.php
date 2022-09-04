<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    //
    public  function upload()
    {
        return view('dropzone.dropUI');
    }

    public  function uploadFile(Request $request)
    {
        return $request;

        $file = $request->file('file');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('file'),$fileName);

        return response()->json(['success'=>$fileName]);

    }

    public function uiUpload(){
        return view('dropzone.uui');

    }

    public function uiUploadFile(Request $request){
        $data = array();
        $validator = Validator::make($request->all(),[
            'file'=>'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($validator->fails()){
            $data['success']=0;
            $data['error']=$validator->errors()->first('file');//error response
        }else{
            $file = $request->file('file');
            $filename = $file;
//            $filename = time().'_'.$file->getClientOriginalName();

//            //file upload location
//            $location = 'files';
//
//            //uploadfiles
//            $file->move($location,$filename);

//            $request->file('file')->storeAs("public/photo",$filename);


            //Response
            $data['success']=1;
            $data['message']='Uploaded Successful';

            return response()->json(['data'=>$data,'fileName'=>$filename]);

        }
    }

}
