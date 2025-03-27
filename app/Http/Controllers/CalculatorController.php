<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function showCalculator(){
        return view('calculator');
    }
    public function kqca(Request $request){
        $s1=$request->input('s1');
        $s2=$request->input('s2');
        $dau=$request->input('dau');

        switch($dau){
            case '+' : $kq= $s1 +$s2;
            break;
            case '-' : $kq= $s1-$s2;
            break;
            case '*' : $kq=$s1*$s2;
            break;
            case '/' : $kq=$s2!=0 ? $s1/$s2 : 'Không THể chia cho 0';
            break;

                    default: $kq = 'Phép toán không hợp lệ'; break;
        }

        return view('kqca', compact( 's1','s2','dau','kq'));



    }
}
