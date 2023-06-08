<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
use App\Models\BidangKeahlian;

class SurveyController extends Controller
{
    public function create(Request $request)
    {
        $survey = new Survey();
        $survey->buyer_id = $request->user_id;
        $survey->tema = $request->tema;
        $survey->target = $request->target;
        $survey->target_umur = $request->target_umur;
        $survey->harga = $request->harga;
        $survey->pertanyaan = $request->pertanyaan;
        $survey->save();
        return redirect('/');
    }
    public function read(){
        return view('permintaan-responden', [
            'surveys' => Survey::all(),
        ]);
    }
    public function readDetail($id){
        return view('permintaan-responden-detail', [
            'survey' => Survey::where('id', $id)->first(),
        ]);
    }
    public function changeState(Request $request){
        $survey = Survey::where('id', $request->id)->first();
        if(Auth::user()->role != 2) return redirect('/permintaan-responden/'.$request->id);
        $survey->status = $request->status;
        if(isset($request->jumlahResponden)) $survey->responden = $request->jumlahResponden;
        $survey->save();
        if($request->status == 3 || $request->status == '3'){
            $buyer = User::where('id', $survey->buyer->id)->first();
            $buyer->saldo = $buyer->saldo-($survey->harga*$survey->responden);
            $buyer->save();
        }
        if(Auth::user()->kategori == 0) return redirect('/permintaan-responden/'.$request->id);
        else  return redirect('/permintaan-responden/'.$request->id);

    }
}
