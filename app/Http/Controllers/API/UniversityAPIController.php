<?php

namespace App\Http\Controllers\API;

use App\Helpers\JsonMsg;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\University;
use Illuminate\Http\Request;

class UniversityAPIController extends Controller
{
    public function getUniversities(Request $req)
    {
        $data = ['universities'];
        $universities = (isset($req->name) ? University::where('name', 'like', "%$req->name%") : University::query())->get(['id', 'name']);

        return JsonMsg::create(compact($data));
    }

    public function getUniversity(University $university)
    {
        $data = ['university'];

        return JsonMsg::create(compact($data));
    }
}
