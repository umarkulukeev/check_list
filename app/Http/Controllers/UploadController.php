<?php

namespace App\Http\Controllers;

use App\Models\ConsolidatedList;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // shows the create form
    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $file = $request->file('file_upload');
        $fileName = file_get_contents($file);

//        $fileName = file_get_contents('https://fiu.gov.kg/uploads/66795bf62c463.xml');
        $xml = simplexml_load_string($fileName);
        $json = json_encode($xml);
//        dd($json);
        $array = json_decode($json,TRUE);
        dd($array);

        foreach ($array['physicPersons']['KyrgyzPhysicPerson'] as $item) {
            $input = [
                'name'   => $item['Surname'],
                'un_list_type'   => $item['CategoryPerson'],
                'listed_on'   => $item['DateInclusion'],
                'comment'   => $item['BasicInclusion'],
            ];
//            dd($item['Surname'] .' '. $item['Name'] .' '. $item['Patronomic']);
            ConsolidatedList::create($input);
        }

//        foreach ($array['CONSOLIDATED_LIST']['INDIVIDUALS']['INDIVIDUAL'] as $item) {
//            $input = [
//                'name'   => $item['FIRST_NAME'],
//                'un_list_type'   => $item['UN_LIST_TYPE'],
//                'listed_on'   => $item['LISTED_ON'],
//                'comment'   => $item['COMMENTS1'],
//            ];
////            dd($input);
//            ConsolidatedList::create($input);
//        }


        // Redirect back to the index page with a success message
        return redirect()->back()->with('success', "Файл успешно загружен");
    }
}
