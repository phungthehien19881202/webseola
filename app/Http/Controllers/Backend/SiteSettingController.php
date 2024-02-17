<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Seo;
use Image;



class SiteSettingController extends Controller
{


    public function SiteSetting(){

        $setting = SiteSetting::find(1);
        return view('backend.seo.setting_update',compact('setting'));
    }
     public function SiteSettingUpdate(Request $request){
        
        $setting_id = $request->id;
         

        if ($request->file('logo')) {
        if($request->old_img){
            unlink($request->old_img);
        }
       
        
         
        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(241,58)->save('upload/logo/'.$name_gen);
        $save_url = 'upload/logo/'.$name_gen;

        SiteSetting::findOrFail($setting_id)->update([
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'google_analytic' => $request->google_analytic,
        'pixel_facebook' => $request->pixel_facebook,
        'logo' => $save_url,

        ]);

        $notification = array(
            'message' => 'Setting Updated with Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

        }else{

        SiteSetting::findOrFail($setting_id)->update([
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'google_analytic' => $request->google_analytic,
        'pixel_facebook' => $request->pixel_facebook,
        

        ]);

        $notification = array(
            'message' => 'Setting Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

        } // end else 
    } // end method 



}
