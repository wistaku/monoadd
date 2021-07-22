<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BelongingRequest;
use App\Models\Belonging;
use App\Models\Tag;
use App\Models\Address;

class BelongingController extends Controller
{
    public function index()
    {
        //belongingsテーブルからuser_idがマッチするモノを取得し、
        //belonging.indexのビューファイルに渡す
        $user_id = Auth::id();
        $belongings = Belonging::where("user_id", $user_id)->latest()->get();

        return view("belonging.index")
            ->with(["belongings" => $belongings]);
    }

    public function create()
    {
        $user_id = Auth::id();
        $addresses = Address::where("user_id", $user_id)->latest()->get();
        $tags = Tag::where("user_id", $user_id)->latest()->get();

        return view("belonging.create")
            ->with([
                "addresses" => $addresses,
                "tags" => $tags,
            ]);
    }

    public function store(BelongingRequest $request)
    {
        // user_id, address_id, tag_idの定義
        $user_id = Auth::id();

        $address_name = $request->address_option;
        $address = Address::where("user_id", $user_id)->where("address_name", $address_name)->first();
        $address_id = $address->id;

        $tag_name = $request->tag_option;
        $tag = Tag::where("user_id", $user_id)->where("tag_name", $tag_name)->first();
        $tag_id = $tag->id;

        // belongingカラムへの登録
        $belonging = new Belonging;
        $belonging->user_id = $user_id;
        $belonging->address_id = $address_id;
        $belonging->tag_id = $tag_id;
        $belonging->belonging_name = $request->belonging_name;
        $belonging->save();

        return redirect()
            ->route("address.index");
    }


    public function edit(Belonging $belonging)
    {
        $user_id = Auth::id();
        $addresses = Address::where("user_id", $user_id)->latest()->get();
        $tags = Tag::where("user_id", $user_id)->latest()->get();

        return view("belonging.edit")
            ->with([
                "belonging" => $belonging,
                "addresses" => $addresses,
                "tags" => $tags,
        ]);
    }


    public function update(Belonging $belonging, BelongingRequest $request)
    {
        $user_id = Auth::id();

        $address_name = $request->address_option;
        $address = Address::where("user_id", $user_id)->where("address_name", $address_name)->first();
        $address_id = $address->id;

        $tag_name = $request->tag_option;
        $tag = Tag::where("user_id", $user_id)->where("tag_name", $tag_name)->first();
        $tag_id = $tag->id;

        $belonging->belonging_name = $request->belonging_name;
        $belonging->address_id = $address_id;
        $belonging->tag_id = $tag_id;
        $belonging->save();

        return redirect()
            ->route("address.index");
    }


    public function delete(Belonging $belonging)
    {
        $belonging->delete();

        return redirect()
            ->route("belonging.index");
    }
}
