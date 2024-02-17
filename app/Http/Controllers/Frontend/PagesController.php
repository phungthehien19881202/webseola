<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function DaoTaoSeo()
    {
        return view('frontend.pages.daotaoseo');
    }
    public function DichVuSeo()
    {
        return view('frontend.pages.dichvuseo');
    }
    public function ThietKeWeb()
    {
        return view('frontend.pages.thietkeweb');
    }
    public function Qcgoole()
    {
        return view('frontend.pages.qcgoole');
    }
    public function Qcfb()
    {
        return view('frontend.pages.qcfb');
    }
    public function Fanpage()
    {
        return view('frontend.pages.fanpage');
    }
    public function Csweb()
    {
        return view('frontend.pages.csweb');
    }
}
