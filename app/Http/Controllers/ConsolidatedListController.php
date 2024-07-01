<?php

namespace App\Http\Controllers;

use App\Models\ConsolidatedList;
use Illuminate\Http\Request;

class ConsolidatedListController extends Controller
{
    public function list()
    {
        return view('check');
    }

    public function check(Request $request)
    {
        $name = ConsolidatedList::where('name','like',"%{$request->name}%")->first();

        if(empty($name)) {
            return redirect()->back()->with('success', "Данное имя не найдено в системе");
        } else {
            return redirect()->back()->with('danger', "Данное имя `{$name->name}` найдено в системе");
        }
    }
}
