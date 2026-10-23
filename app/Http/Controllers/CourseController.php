<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                  ->orWhere('instructor', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        $courses = $query->get();

        $categories = Course::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('courses.index', compact('courses', 'categories'));
    }

    public function show(Course $course)
    {
        $relatedCourses = Course::where('category', $course->category)
            ->where('id', '!=', $course->id)
            ->take(3)
            ->get();

        return view('courses.show', compact('course', 'relatedCourses'));
    }
}
