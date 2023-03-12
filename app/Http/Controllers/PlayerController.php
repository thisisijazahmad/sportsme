<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Session;
use Cookie;
class PlayerController extends Controller
{
    public function playerProfile()
    {
        $programs = DB::table('programs')->get();
        return view('player_profile_form',compact('programs'));
    }
    public function saveProfile(Request $request)
    {
        dd($request->input());
        $find = User::where('email',$request->email)->first();
        
         
            if($request->hasFile('p_image'))
            {
                $file = $request->p_image;
                $filenameWithExt= $request->file('p_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('p_image')->getClientOriginalExtension();
                $logo_img = $filename. '_'.time().'.'.$extension;
                $file->move(public_path('player'), $logo_img);
                $data['profile_image'] = $logo_img;
            }
            if($request->hasFile('b_image'))
            {
                
                $file = $request->b_image;
                $filenameWithExt= $request->file('b_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('b_image')->getClientOriginalExtension();
                $logo_img = $filename. '_'.time().'.'.$extension;
                $file->move(public_path('player'), $logo_img);
                $data['banner_image'] = $logo_img;
            }
            $player_images=array();
            if($files=$request->file('upload_img_file'))
            {
                foreach($files as $file)
                {
                    $name=$file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $file->move('player',$name);
                    if($extension === 'mp4')
                        $type = "Video";
                    else
                        $type = "Image";
                        $data = [
                            'name'=>$name,
                            'type'=>$type,
                        ];
                        
                        array_push($player_images,$data);
                }
            }
        
         $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone'=>$request->phone,
            'is_admin' => 'User',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'f_link'=>$request->facebook_link,
            't_link'=>$request->twitter_link,
            'insta_link'=>$request->insta_link,
            'tiktok_link'=>$request->tiktok_link,
            'program_id'=>$request->program_id,
            'about_me'=>$request->about_me,
            
         ];
         
         if(isset($request->id))
         {
            
           User::where('id',$request->id)->update($data);
           
            for($i=0;$i<count($player_images);$i++)
            {
                $image_data = [
                    'player_img_videos'=>$player_images[$i]['name'],
                    'type'=> $player_images[$i]['type'],
                    'player_id'=>  $request->id,
                    'description'=>$request->description,
                ];
                DB::table('player_images')->where('player_id',$request->id)->delete();
                DB::table('player_images')->insert($image_data);
            }
            return back()->with(['success'=>'Data Update Successfully']);
        }
        else
        {
            if(isset($find))
            {
                return back()->with(['error'=>'Email already registred']);
            }
            else
            {
                $user_id = DB::table('users')->insertGetId($data);
                for($i=0;$i<count($player_images);$i++)
                {
                    $image_data = [
                        'player_img_videos'=>$player_images[$i]['name'],
                        'type'=> $player_images[$i]['type'],
                        'player_id'=>  $user_id,
                        'description'=>$request->description,
                    ];
                    
                    DB::table('player_images')->insert($image_data);
                }
                return redirect('login')->with(['success'=>'Data Insert Successfully']);
            }
        }
          
    }

    public function Follow($id=null)
    {
        $find = DB::table('fellow')->where('followed_id',$id)->where('follower_id',Auth::user()->id)->first();
        if(isset($find))
        {
            $value = Cookie::get('follow');
            if($value == 'Follow'){
            DB::table('fellow')->where('followed_id',$id)->where('follower_id',Auth::user()->id)->update(['status'=>'1']);
            Cookie::forget('follow');
            Cookie::queue('follow', 'Unfollow',525600);
            }else{
            DB::table('fellow')->where('followed_id',$id)->where('follower_id',Auth::user()->id)->update(['status'=>'0']);
            Cookie::forget('follow');
            Cookie::queue('follow', 'Follow',525600);
            }
            return back();
        }
        else
        {
        $data = [
            'followed_id'=>$id,
            'follower_id'=>Auth::user()->id,
            'status'=>'1'
        ];
        DB::table('fellow')->insert($data);
        Cookie::queue('follow', 'Unfollow',525600);
        return back();
        }
    }
}
