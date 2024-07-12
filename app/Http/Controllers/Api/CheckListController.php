<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Base\ApiResponse;
use App\Models\ConsolidatedList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckListController extends Controller
{
    protected $response;
    protected $list;

    public function __construct(ConsolidatedList $list, ApiResponse $apiResponse)
    {
        $this->list = $list;
        $this->response = $apiResponse;
    }

    public function checkList(Request $request)
    {
        try {
            $name = ConsolidatedList::where('name','like',"%{$request->name}%")->first();
            if(empty($name)) {
//                dd(13);
                $this->response->setMessage("Данное имя не найдено в системе");
                return $this->response;
            } else {
//                dd(32);
                $this->response->setMessage("Данное имя `{$name->name}` найдено в системе");
                return $this->response;
            }
        } catch (\Exception $exception) {
            $this->response->setData($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            return $this->response;
        }
    }
}
