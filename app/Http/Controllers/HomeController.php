<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    private $qna_pairs = [
        [
            "question" => "What is the purpose of this app?",
            "answer" => "This app is designed to help students learn and practice math in a fun and interactive way."
        ],
        [
            "question" => "How do I get started?",
            "answer" => "You can get started by creating an account and logging in. If you are a student, you will need an invitation code from your teacher to create an account."
        ],
        [
            "question" => "How do I get an invitation code?",
            "answer" => "Your teacher will provide you with an invitation code that you can use to create an account."
        ],
        [
            "question" => "How do I create an account?",
            "answer" => "You can create an account by clicking on the 'Register' button on the home page and filling out the registration form."
        ],
        [
            "question" => "How do I log in?",
            "answer" => "You can log in by clicking on the 'Login' button on the home page and entering your email and password."
        ],
        [
            "question" => "How do I log out?",
            "answer" => "You can log out by clicking on the 'Logout' button on the dashboard page."
        ]
    ];

    public function index()
    {
        if (session('token')) {
            return redirect('/dashboard');
        }
        return view('onboarding');
    }

    public function homeController(Request $request)
    {
        if (!session('token')) {
            return redirect('/');
        }

        if (auth()->user()->role == 'teacher') {
            return $this->parentNavController($request);
        } else {
            return $this->studentNavController($request);
        }
    }

    public function parentNavController(Request $request)
    {
        $url = explode('/', $request->url());
        $page = $url[count($url) - 1];
        $user = auth()->user();

        $teacher = $user->teacher;
        $students = $teacher->students;
        $students_user = $students->map(function ($student) {
            return $student->user;
        });
        $current_student = $students_user[0];
        $student = $current_student->student;
        if ($request->student) {
            $current_student = User::query()->find($request->student);
            $student = $current_student->student;
        }

        $all_students_sorted = User::where('role', 'student')->get()->sortBy('points');
        $created_missions = $teacher->missions;
        $created_missions_category_based = $created_missions->groupBy('category');

        $current_student_ongoing_missions = $student->ongoingMissions;
        $current_student_completed_missions = $student->completedMissions;
        $current_student_failed_missions = $student->failedMissions;
        $current_student_missions = $current_student_ongoing_missions->merge($current_student_completed_missions)->merge($current_student_failed_missions);
        return view('parent.' . $page, [
            'user' => $user,
            'teacher' => $teacher,
            'students' => $students_user,
            'student' => $student,
            'current_student' => $current_student,
            'page' => $page,
            'qna_pairs' => $this->qna_pairs,
            'all_students_sorted' => $all_students_sorted,
            'created_missions' => $created_missions,
            'created_missions_category_based' => $created_missions_category_based,
            'current_student_missions' => $current_student_missions,
            'current_student_ongoing_missions' => $current_student_ongoing_missions,
            'current_student_completed_missions' => $current_student_completed_missions,
            'current_student_failed_missions' => $current_student_failed_missions
        ]);
    }

    public function studentNavController(Request $request)
    {
        $url = explode('/', $request->url());
        $page = $url[count($url) - 1];
        $user = auth()->user();

        $teacher = $user->student->teacher;

        $all_students_sorted = User::where('role', 'student')->get()->sortBy('points');

        $ongoing_missions = $user->student->ongoingMissions;
        $completed_missions = $user->student->completedMissions;
        $failed_missions = $user->student->failedMissions;
        $untaken_missions = Mission::all()->diff($ongoing_missions)->diff($completed_missions)->diff($failed_missions);
        $untaken_missions_category_based = $untaken_missions->groupBy('category');
        
        return view('child.' . $page, [
            'user' => $user,
            'teacher' => $teacher,
            'page' => $page,
            'qna_pairs' => $this->qna_pairs,
            'all_students_sorted' => $all_students_sorted,
            'ongoing_missions' => $ongoing_missions,
            'completed_missions' => $completed_missions,
            'failed_missions' => $failed_missions,
            'untaken_missions' => $untaken_missions,
            'untaken_missions_category_based' => $untaken_missions_category_based
        ]);
    }
}
