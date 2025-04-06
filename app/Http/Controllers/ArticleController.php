<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Spatie\Permission\Models\Role;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
 use Illuminate\Routing\Controllers\Middleware;


class ArticleController extends Controller   implements HasMiddleware
{

    public static function middleware():array{
    return [
        new Middleware('permission:article view',['index']),
        new Middleware('permission:article edit',['edit']),
        new Middleware('permission:article create',['create']),
        new Middleware('permission:article delete',['delete']),
    ];
    }


    public function index()
    {
        $Articles = Article::all();

        return view('Article.list', ['articles' => $Articles]);
    }

    // create Article
    public function create()
    {
        $Role = Role::all();

        return view('Article.create', ['Roles' => $Role]);
    }

    // store Article in db
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:Articles|min:5',
            'author' => 'required|min:5'
            
        ]);

        if ($validator->passes()) {

            $Article = article::create(
                [
                    'author' => $request->author,
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
            return redirect()->route('Article')->with('success', 'Article added successfully');
        } else {
            return redirect()->route('Article.create')->withInput()->withErrors($validator);
        }

    }

    // edit Article in db
    public function edit($id)
    {   $Role = Role::all();
        $Article = Article::where('id', '=', $id)->first();
        return view('Article.edit', ['article' => $Article,'Roles' => $Role]);

    }
    // update Article in db
    public function update(Request $request, $id)
    {
        $Article = Article::where('id', '=', $id)->first();
        $validator = Validator::make($request->all(), [
           'title' => 'required|min:5',
            'author' => 'required|min:5'
        ]);

        if ($validator->passes()) {

            $Article = article::where('id','=',$id)->first();
                
                $Article->author= $request->author;
                $Article->title= $request->title;
                $Article->description= $request->description;
                $Article->save();
            
            return redirect()->route('Article')->with('success', 'Article added successfully');
        } else {
            return redirect()->route('Article.edit')->withInput()->withErrors($validator);
        }

    }
    // delete Article in db
    public function destroy($id)
    {
        $Article = Article::find($id, 'id');
        $Article->delete();
        return redirect()->route('Article')->with('success', 'Article deleted successfully');
    }
}
