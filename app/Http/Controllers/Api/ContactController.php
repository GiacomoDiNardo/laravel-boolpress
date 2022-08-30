<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ContactController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        return [
            "id" => rand(1, 1000),
            "name" => $data["name"],
            "message" => $data["message"],
            "created_at" => Carbon::now()->toDateTimeString(),
            "updated_at" => Carbon::now()->toDateTimeString(),
        ];
    }
}
