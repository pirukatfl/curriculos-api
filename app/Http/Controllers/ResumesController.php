<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ResumesController extends Controller
{
    public function index() {
        return User::where('permission_id', 3)
            ->with([
                'profile',
                'contacts',
                'address',
                'courses',
                'experiences',
                'schoolings'
            ])
            ->select(['id', 'email'])
            ->get();
    }
}
