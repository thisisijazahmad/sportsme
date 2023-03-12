<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Cookie;


class mainController extends Controller
{
    public function index(Request $request)
    {
        if($request->password == '123456')
        return redirect('home');
        else
        return back();
    }
    public function Home(Request $request)
    {
        $programs = DB::table('programs')->get();
        $home = 'home';
         return view('index',compact('programs','home'));
    }
    public function aboutUs()
    {
        return view('about');
    }
    public function Profile($id=null)
    {
        $half_profiles = DB::table('users')->where('program_id',$id)->get();
        $profile_variable = 'profile_data';
        $user_id = Cookie::get('user');
        $like = DB::table('liked_unlike')->where('user_id',$user_id)->get();
//        $url = url('view_profile/'.Auth::user()->id);

//        $shareComponent = \Share::page(
//            'zXCsa',
//            'Your share text comes here',
//        )
//            ->facebook()
//            ->twitter()
//            ->whatsapp();

        return view('profile',compact('half_profiles','profile_variable','user_id','like'));
    }
    public function viewProfile($id=null)
    {
        $user_data = DB::table('users')->where('id',$id)->first();
        $player_data = DB::table('player_images')
                        ->leftjoin('users','users.id','player_images.player_id')
                        ->select('users.*','player_images.player_img_videos','player_images.description')
                        ->where('player_id',$id)
                        ->get();
        $active = '';

             $profile_url = asset('view_profile/'. $user_data->id);
              $shareComponent = \Share::page(
              $profile_url,
              'Click On Link and check the profile',
              )
              ->facebook()
              ->twitter()
              ->whatsapp();
              $profile_vew = 'profile_data';
            //   dd($shareComponent);
            // $user_data = DB::table('fellow')->where('id',$id)->first();
        return view('view_profile',compact('shareComponent','active','user_data','player_data','profile_vew'));
    }
    public function Works()
    {
        return view('how_it_works');
    }
    public function Events()
    {
        $programs = DB::table('programs')->get();
        return view('events',compact('programs'));
    }
    public function Register()
    {
        return view('register');
    }
    public function Login()
    {
        $rand = rand(1,1000000);
        Cookie::queue('user', $rand, 43800);
        return view('layouts.login');
    }
    public function messagePost()
    {
        return view('message');
    }
    public function saveMessage(Request $request)
    {
        DB::table('messages')->insert([
            'commenter_id'  => $request->sender_id,
            'message'       => $request->message
        ]);
        return back()->with(['success'=>'Your query submitted successfully']);
    }
    public function Affiliate(){
        $random = Str::random(40);
        $link = url('reward/'.$random);

        $check_user = DB::table('affiliate')->where('user_id',Auth::user()->id)->first();
        if(filled($check_user))
        DB::table('affiliate')->where('user_id',Auth::user()->id)->update(['link'=>$random,'reward'=>5,'user_id'=>Auth::user()->id]);
        else
        DB::table('affiliate')->insert(['link'=> $random,'reward'=>5,'user_id'=>Auth::user()->id]);
        return view('affiliate',compact('link'));
    }
    public function Rewards($link)
    {
       return view('auth.login',compact('link'));
    }

    public function likeUnlike(Request $request)
    {

        $like = DB::table('liked_unlike')->where('user_id',$request->user_id)->where('liked_id' ,$request->liked_id)->first();
        if(!isset($like))
        {
            DB::table('liked_unlike')->insert([
                'user_id' => $request->user_id,
                'liked_id' => $request->liked_id,
                'status' => 1
            ]);
        }else{
            DB::table('liked_unlike')->where('user_id',$like->user_id)->where('liked_id' ,$like->liked_id)->update([
                'status' => $like->status == 0 ? 1 : 0
            ]);
        }

        $result = DB::table('liked_unlike')->where('user_id',$request->user_id)->where('liked_id' ,$request->liked_id)->first();
        return $result;
    }
}
