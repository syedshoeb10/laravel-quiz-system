<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Models\category;
use App\Models\Quiz;
use App\Models\Mcq;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        $validation = $request->validate([
            "name" => 'required',
            "password" => 'required',
        ]);
        $admin = Admin::where([
            ['name', '=', $request->name],
            ['password', '=', $request->password],
        ])->first();
        if (!$admin) {
            $validation = $request->validate([
                "user" => 'required',
            ], [
                "user.required" => "user doesn't exist"
            ]);
        }
        // return $admin->name;
        session::put('admin', $admin);
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $admin = session::get('admin');
        if ($admin) {
            return view('admin', ["name" => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }

    public function categories()
    {
        $categories = category::get();
        $admin = session::get('admin');
        if ($admin) {
            return view('categories', ["name" => $admin->name, "categories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }
    public function logout()
    {
        session::forget('admin');
        return redirect('admin-login');
    }

    public function addCategory(Request $request)
    {
        $validation = $request->validate([
            "category" => "required | min:5 |unique:categories,name",
        ]);
        $admin = session::get('admin');
        $category = new category();
        $category->name = $request->category;
        $category->creator = $admin->name;
        if ($category->save()) {
            session::flash('category', "category" . $request->category .  "added");
        }
        return redirect('admin-categories');
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('category', 'Category deleted successfully');
    }

    public function addquiz()
    {
        $categories = category::get();
        $admin = session::get('admin');
        if ($admin) {
            $quizName = request('quiz');
            $category_id = request('category_id');
            if ($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                }
            }

            return view('add-quiz', ["name" => $admin->name, "categories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    public function addMCQs(Request $request)
    {
        // return $request;
        $mcq = new Mcq();
        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');

        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_answer = $request->correct_answer;

        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;

        if($mcq->save()){
            if($request->submit=="add-more"){
                return redirect(url()->previous());
            }else{
                Session::forget('quizDetails');
                return redirect("/admin-categories");
            }
        }
    }
}
