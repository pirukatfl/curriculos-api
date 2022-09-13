<?php

namespace App\Http\Controllers;
use App\Models\Logs;

use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function store(Request $request) {
        return Logs::create(
            [
                'user_id' => $request->all()['user_id'],
                'search' => $request->all()['search']
            ]
        );
    }
}
