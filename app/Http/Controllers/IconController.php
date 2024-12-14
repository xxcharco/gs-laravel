<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icon;

class IconController extends Controller
{
    /**
     *
     * Iconデータ一覧を表示
     *
     */
    public function index()
    {
        $icons = Icon::all();
        return view('icon.index', compact('icons'));
    }

    /**
     *
     * Iconデータ新規登録画面を表示
     *
     */
    public function create(){
        return view('icon.create');
    }

    public function show($icon_id)
    {
        $icon = Icon::find($icon_id);
        return view('icon.detail', compact('icon'));
    }

    // classは関数と変数のまとまりなので
    // このように関数は他のものと並行の位置になるように記述する
    public function store(Request $request){
    
        /*
        * 1. データを受け取る
        */

        /*
        * 2. バリデーション処理
        */
   
        /*
        * 3. データ登録
        */
        $new_icon = new Icon();
		$new_icon->title = $request->title;
		$new_icon->description = $request->description;
		
		$new_icon->save();
   
        /*
        * 4. リダイレクト
        */
        return redirect('/dashboard');

    
    }

    /*
     * update関数はこちら
     */
    public function update(Request $request, $icon_id){
        /**
		  * 以下処理を追加
		  */
        $icon = Icon::find($icon_id);
        
        $icon->title = $request->title;
        $icon->description = $request->description;
        
        $icon->save();

        return redirect('/dashboard');

    }
    /*
     * destroy関数はこちら
     */
    public function destroy($icon_id){

        $icon = Icon::find($icon_id);
        $icon->delete();

        return redirect('/dashboard');

    }
}