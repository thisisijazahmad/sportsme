<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programs;
use DB;
class ProgramsController extends Controller
{
    public function programList()
    {
        $programs = DB::table('programs')->orderBy('id', 'DESC')->paginate(7);
        $active = 'program';
        return view('admin.programs.programs_list',compact('programs','active'));
    }
    public function addPrograms($id=null)
    {
        $program = DB::table('programs')->where('id',$id)->first();
        $active = 'program';
        return view('admin.programs.program_form',compact('program','active'));
    }
    public function savePrograms(Request $request)
    {
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $filenameWithExt= $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $logo_img = $filename. '_'.time().'.'.$extension;
            $file->move(public_path('uploads'), $logo_img);
            $data['image'] = $logo_img;
        }
        $data['name'] = $request->name;
        if(isset($request->id))
        {
            Programs::where('id',$request->id)->update($data);
            return redirect('programs/list')->with(['success'=>'Data Update Successfully']);
        }
        else
        {
            Programs::insert($data);
            return redirect('programs/list')->with(['success'=>'Data Insert Successfully']);
        }
        
        
    }
}
