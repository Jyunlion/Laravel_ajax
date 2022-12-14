<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function showView()
    {
        return view('ajaxRequestView');
    }

    public function ajaxRequestPost(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');

        if (isset($name) && isset($age)) {
            $result = "你的姓名為: " . $name . "，年齡為: " . $age . "";
        } else {
            $result = "請確實填寫每項資料欄位!";
        }



        return $result;
    }
}