<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\FooterContact;
use Auth;
use DB;
use App\BecomeMember;
use App\PrayerRequestBg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function index()
    {
        if (Auth()->user()->type == 0) {
            return view('admin.home');
        } elseif (Auth()->user()->type == 1) {
            return view('home');
        } elseif (Auth()->user()->type == 2) {
            return view('vender.home');
        }
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function admin_setting()
    {
        if (Auth()->user()->type == 0) {
            return view('admin.admin_setting');
        }
        if (Auth()->user()->type == 2) {
            return view('vender.admin_setting');
        }
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function update_admin_details(Request $request)
    {
        if ((Auth()->user()->type == 0) || (Auth()->user()->type == 2)) {
            $request->validate([
                'name'  => 'required',
                'email' => 'required|email',
            ]);
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            DB::table('users')->where('id', Auth()->user()->id)->update(['name' => $request->name, 'email' => $request->email]);
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            return redirect()->back()->with('success', 'Details updated successfully.');
        }
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function update_admin_password(Request $request)
    {
        if ((Auth()->user()->type == 0) || (Auth()->user()->type == 2)) {
            $request->validate([
                'old_password'         => 'required',
                'new_password'         => 'required',
                'confirm_new_password' => 'required|same:new_password',
            ]);
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            if (Hash::check($request->old_password, Auth()->user()->password)) {
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                DB::table('users')->where('id', Auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                return redirect()->back()->with('success', 'Password updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Sorry!! password update fail.Old password didnot match.');
            }
        }
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function footer_contact()
    {
        if (Auth()->user()->type == 0) {
            $data['single_info'] = FooterContact::find(1);
            return view('admin.footer_contact', $data);
        }
        
    }
   //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function footer_contact_update_post(Request $request)

    {

        if (Auth()->user()->type == 0) {

       

                $request->validate([

                    'phone'     => 'required',
                'email'     => 'required',
                'address'     => 'required',
                 'copyright'                => 'required',

                    'id_id'                => 'required',

                ]);

              if ($request->hasFile('picture')) {
                $image_cover    = $request->file('picture');
                $file_extension = $image_cover->getClientOriginalExtension();
                if (($file_extension == 'jpg') || ($file_extension == 'jpeg') || ($file_extension == 'png') || ($file_extension == 'gif')) {
                    $file_document   = time() . '.' . $image_cover->getClientOriginalExtension();
                    $destinationPath_cover = public_path('/upload');
                    $image_cover->move($destinationPath_cover, $file_document);
                } else {
                    return redirect()->back()->with('error', 'Opps!! File Not Upload.Please try again!');
                }
            }

            if ($request->hasFile('picture2')) {
                $image_cover    = $request->file('picture2');
                $file_extension = $image_cover->getClientOriginalExtension();
                if (($file_extension == 'jpg') || ($file_extension == 'jpeg') || ($file_extension == 'png') || ($file_extension == 'gif')) {
                    $file_document2   = time() . '.' . $image_cover->getClientOriginalExtension();
                    $destinationPath_cover = public_path('/upload');
                    $image_cover->move($destinationPath_cover, $file_document2);
                } else {
                    return redirect()->back()->with('error', 'Opps!! File Not Upload.Please try again!');
                }
            }

            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ +

            $obj = FooterContact::find($request->id_id);

            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

          
                    $obj->phone     = $request->phone;
                $obj->email     = $request->email;
                $obj->address     = $request->address;
                $obj->facebook     = $request->facebook;
                $obj->twitter     = $request->twitter;
                $obj->linkedin     = $request->linkedin;
                $obj->app_store     = $request->app_store;
                $obj->google_store     = $request->google_store;
                $obj->copyright     = $request->copyright;

                 if ($request->hasFile('picture')) {
                $obj->logo = $file_document;
            }
            if ($request->hasFile('picture2')) {
                $obj->logo_foot = $file_document2;
            }

                    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

                    if ($obj->save()) {

                        return redirect()->back()->with('success', 'Data updated successfully.');

                    } else {

                        return redirect()->back()->with('error', 'Opps!! sorry!! problem occurred.Please try again!');

                    }

                

            

        }

    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function member_list()
    {
        if (Auth()->user()->type == 0) {
            $data['member_list'] = BecomeMember::all();
            return view('admin.member_list', $data); 
        }
        
    }
    public function member_list_remove($id)
    {
         if (Auth()->user()->type == 0 && $id) {
            $destroy = BecomeMember::destroy($id);
            return redirect()->back()->with('success', 'Data deleted successfully.');
        }
        
    }
     public function prayer_bg_update_view()
    {
         if (Auth()->user()->type == 0) {
            $data['single_info'] = PrayerRequestBg::find(1);
            return view('admin.prayer_bg_update_view', $data);
        }
        
    }
public function prayer_bg_update_post(Request $request)

    {

        if (Auth()->user()->type == 0) {

       

          
              if ($request->hasFile('picture')) {
                $image_cover    = $request->file('picture');
                $file_extension = $image_cover->getClientOriginalExtension();
                if (($file_extension == 'jpg') || ($file_extension == 'jpeg') || ($file_extension == 'png') || ($file_extension == 'gif')) {
                    $file_document   = time() . '.' . $image_cover->getClientOriginalExtension();
                    $destinationPath_cover = public_path('/upload');
                    $image_cover->move($destinationPath_cover, $file_document);
                } else {
                    return redirect()->back()->with('error', 'Opps!! File Not Upload.Please try again!');
                }
            }

            if ($request->hasFile('picture2')) {
                $image_cover    = $request->file('picture2');
                $file_extension = $image_cover->getClientOriginalExtension();
                if (($file_extension == 'jpg') || ($file_extension == 'jpeg') || ($file_extension == 'png') || ($file_extension == 'gif')) {
                    $file_document2   = time() . '.' . $image_cover->getClientOriginalExtension();
                    $destinationPath_cover = public_path('/upload');
                    $image_cover->move($destinationPath_cover, $file_document2);
                } else {
                    return redirect()->back()->with('error', 'Opps!! File Not Upload.Please try again!');
                }
            }
             if ($request->hasFile('picture3')) {
                $image_cover    = $request->file('picture3');
                $file_extension = $image_cover->getClientOriginalExtension();
                if (($file_extension == 'jpg') || ($file_extension == 'jpeg') || ($file_extension == 'png') || ($file_extension == 'gif')) {
                    $file_document2   = time() . '.' . $image_cover->getClientOriginalExtension();
                    $destinationPath_cover = public_path('/upload');
                    $image_cover->move($destinationPath_cover, $file_document3);
                } else {
                    return redirect()->back()->with('error', 'Opps!! File Not Upload.Please try again!');
                }
            }

             if ($request->hasFile('picture4')) {
                $image_cover    = $request->file('picture4');
                $file_extension = $image_cover->getClientOriginalExtension();
                if (($file_extension == 'jpg') || ($file_extension == 'jpeg') || ($file_extension == 'png') || ($file_extension == 'gif')) {
                    $file_document2   = time() . '.' . $image_cover->getClientOriginalExtension();
                    $destinationPath_cover = public_path('/upload');
                    $image_cover->move($destinationPath_cover, $file_document4);
                } else {
                    return redirect()->back()->with('error', 'Opps!! File Not Upload.Please try again!');
                }
            }


            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ +

            $obj = PrayerRequestBg::find(1);

            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

          
                  
                 if ($request->hasFile('picture')) {
                $obj->image1 = $file_document;
            }
            if ($request->hasFile('picture2')) {
                $obj->image2 = $file_document2;
            }
             if ($request->hasFile('picture3')) {
                $obj->image3 = $file_document3;
            }
             if ($request->hasFile('picture4')) {
                $obj->image4 = $file_document4;
            }

                    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

                    if ($obj->save()) {

                        return redirect()->back()->with('success', 'Data updated successfully.');

                    } else {

                        return redirect()->back()->with('error', 'Opps!! sorry!! problem occurred.Please try again!');

                    }

                

            

        }

    }
}
