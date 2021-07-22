<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Belonging;


class AddressController extends Controller
{

    public function index()
    {
        //addressesテーブルからuser_idがマッチするモノを取得し、
        //address.indexのビューファイルに渡す
        $user_id = Auth::id();
        $addresses = Address::where("user_id", $user_id)->latest()->get();

        return view("address.index")
            ->with(["addresses" => $addresses]);
    }


    public function show(Address $address)
    {
        $user_id = Auth::id();
        $address_id = $address->id;

        $belongings = Belonging::where("user_id", $user_id)->where("address_id", $address_id)->latest()->get();

        return view("address.show")
            ->with([
                "belongings" => $belongings,
                "address" => $address,
            ]);
    }


    public function store(AddressRequest $request)
    {
        // user_id, address_nameの定義
        $user_id = Auth::id();
        $address_name = $request->address_name;

        // addressカラムへ登録
        $address = new Address;
        $address->user_id = $user_id;
        $address->address_name = $address_name;
        $address->save();

        return redirect()
            ->route("belonging.create");
    }


    public function delete(Address $address)
    {
        $address->delete();

        return redirect()
            ->route("address.index");
    }
}
