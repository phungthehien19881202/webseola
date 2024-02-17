<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;

use DB;

class DonHangController extends Controller
{
    public function ThemDonHang(Request $request)

    {

        $request->validate([
            'tenkhach' => 'required',
            'sdtkhach' => 'required',
        ]);


        $data = array();
        $data['tensp'] = $request->tensp;
        $data['giasp'] = $request->giasp;
        $data['tenkhach'] = $request->tenkhach;
        $data['sdtkhach'] = $request->sdtkhach;
        $data['ghichu'] = $request->ghichu;
        DB::table('donhang')->insert($data);
        Mail::to('phungthehien19881202@gmail.com')->send(new GuiEmail($data));

        $notification = array(
            'message' => 'Bạn đã đặt hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
