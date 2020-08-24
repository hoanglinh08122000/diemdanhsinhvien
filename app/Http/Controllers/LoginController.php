<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Students;
use App\Models\Teacher;
use Hash;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller {
	public function login() {
		return view('login.login2');
	}

	// login students
	public function login_student() {
		return view('login.login_student2');
	}
	public function process_login_student(Request $rq) {
		$student = Students::where('email', $rq->email)->first();
		if (isset($student) && Hash::check($rq->password, $student->password)) {
			Session::put('id', $student->id);
			Session::put('last_name', $student->last_name);
			Session::put('first_name', $student->first_name);
			Session::put('level', $student->level);

			return redirect()->route('index');

		} else {
			return redirect()->route('login')->with('error', 'Sai');
		}
	}

	// login admin
	public function login_admin() {
		return view('login.login_admin2');
	}
	public function process_login_admin(Request $rq) {
		$admin = Admin::where('email', $rq->email)->first();

		if (isset($admin) && Hash::check($rq->password, $admin->password)) {
			Session::put('id', $admin->id);
			Session::put('last_name', $admin->first_name);
			Session::put('last_name', $admin->last_name);
			Session::put('level', $admin->level);
			return redirect()->route('index');

		} else {
			return redirect()->route('login')->with('error', 'Sai');
		}
	}

	// login teacher
	public function login_teacher() {
		return view('login.login_teacher2');
	}
	public function process_login_teacher(Request $rq) {
		$teacher = Teacher::where('email', $rq->email)->first();

		if (isset($teacher) && Hash::check($rq->password, $teacher->password)) {
			Session::put('id', $teacher->id);
			Session::put('first_name', $teacher->first_name);
			Session::put('last_name', $teacher->last_name);
			Session::put('level', $teacher->level);

			return redirect()->route('index');

		} else {
			return redirect()->route('login');
		}
	}

	// log out
	public function logout() {
		Session::flush();

		return redirect()->route('login')->with('sussess', 'Bye');

	}

}
