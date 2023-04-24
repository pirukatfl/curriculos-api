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
            $district = $request->input('district');
            $initial_age = $request->input('initial_age');
            $final_age = $request->input('final_age');
            $cnh_categories = $request->input('cnh_categories');

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
                'favoriteCompanies',
            ])->select(['id', 'email']);

            if ($name) {
                $query->whereHas('profile', function (Builder $query2) use($name) {
                    $query2->where('name', 'ilike', '%'.$name.'%');
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
            if ($district) {
                $query->whereHas('profile', function (Builder $query2) use($district) {
                    $query2->where('district', 'ilike', '%'.$district.'%');
                });
            }

            if ($initial_age && $final_age) {
                $query->whereHas('profile', function (Builder $query2) use($initial_age, $final_age) {
                    $query2->whereBetween('age', [$initial_age, $final_age]);
                });
            }

            if ($initial_age && !$final_age) {
                $query->whereHas('profile', function (Builder $query2) use($initial_age) {
                    $query2->where('age', $initial_age);
                });
            }

            if (!$initial_age && $final_age) {
                $query->whereHas('profile', function (Builder $query2) use($final_age) {
                    $query2->where('age', $final_age);
                });
            }

            if ($cnh_categories) {
                $arr = explode(",", $cnh_categories);
                foreach($arr as $item) {
                    $query->whereHas('profile', function (Builder $query2) use($item) {
                        $query2->where('cnh_categories', 'ilike', '%'.$item.'%');
                    });
                }
            }

            // return $query;
            return $query->paginate($per_page=10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id) {
        try {
            return User::where('id', $id)
            ->select(['id', 'email'])
            ->with([
                'profile',
                'experiences',
                'courses',
                'contacts',
                'schoolings',
                'address',
                'favoriteCompanies',
            ])->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
