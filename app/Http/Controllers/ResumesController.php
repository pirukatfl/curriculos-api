<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class ResumesController extends Controller
{
    public function index(Request $request) {
        try {
            $name = $request->input('name');
            $office = $request->input('office');
            $course_name = $request->input('course_name');
            $working_time_on_job = $request->input('working_time_on_job');

	    $query = User::where('permission_id', 3)
            ->with([
                'profile',
                'experiences',
                'courses',
                'contacts',
                'schoolings',
                'image',
                'permission',
                'address',
            ])->select(['id', 'email']);

            if ($name) {
                $query->whereHas('profile', function (Builder $query2) use($name) {
                    $query2->where('name', 'like', '%'.$name.'%');
                });
            }

            if ($course_name) {
                $query->whereHas('courses', function (Builder $query2) use($course_name) {
                    $query2->where('course_name', $course_name);
                });
            }

            if ($office) {
                $query->whereHas('experiences', function (Builder $query2) use($office) {
                    $query2->where('office', $office);
                });
            }

            if ($working_time_on_job) {
                $query->whereHas('experiences', function (Builder $query2) use($working_time_on_job) {
                    $query2->where('working_time_on_job', '=', $working_time_on_job);
                });
            }
            // return $query;
            return $query->paginate($per_page=10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Request $request, $id) {
        try {
            return User::where('id', $id)
            ->select(['id', 'email'])
            ->with([
                'profile',
                'experiences',
                'courses',
                'contacts',
                'schoolings',
                'image',
                'permission',
                'address',
            ])->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
