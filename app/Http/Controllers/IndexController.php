<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $items = Index::paginate(10);

        return view('list-item', compact('items'));
    }

    public function create()
    {
        return view('create-item');
    }

    public function store(IndexRequest $request)
    {
        $validate = $request->all();

        $validate['image'] = $request->file('image')->store('asset/gallery', 'public');

        Index::create($validate);

        return redirect()->route('list-item')->with('success', 'Data berhasil ditambahkan');
    }

    public function delete(Request $id)
    {
        Index::find($id)->each->delete();

        return redirect()->route('list-item');
    }
}
