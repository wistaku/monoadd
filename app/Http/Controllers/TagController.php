<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Models\Belonging;

class TagController extends Controller
{
    public function index()
    {
        //tagsテーブルからuser_idがマッチするモノを取得し、
        //tag.indexのビューファイルに渡す
        $user_id = Auth::id();
        $tags = Tag::where("user_id", $user_id)->latest()->get();

        return view("tag.index")
            ->with(["tags" => $tags]);
    }


    public function show(Tag $tag)
    {
        $user_id = Auth::id();
        $tag_id = $tag->id;

        $belongings = Belonging::where("user_id", $user_id)->where("tag_id", $tag_id)->latest()->get();

        return view("tag.show")
            ->with([
                "belongings" => $belongings,
                "tag" => $tag,
            ]);
    }


    public function store(TagRequest $request)
    {
        // user_id, tag_nameの定義
        $user_id = Auth::id();
        $tag_name = $request->tag_name;

        // tagカラムへの登録
        $tag = new Tag;
        $tag->user_id = $user_id;
        $tag->tag_name = $tag_name;
        $tag->save();

        return redirect()
            ->route("belonging.create");
    }


    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()
            ->route("tag.index");
    }
}
