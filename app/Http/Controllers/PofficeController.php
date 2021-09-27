<?php

namespace App\Http\Controllers;

use App\Models\Poffice;
use App\Http\Requests\PofficeRequest;

class PofficeController extends Controller
{
    public function index()
    {
        $poffices = Poffice::all();
        // Itemsティレクトリーの中のindexページを指定し、itemsの連想配列を代入
        return view('poffices.index', ['poffices' => $poffices]);
    }

    public function show($id)
    {
        $poffice = Poffice::find($id);
        return view('poffices.show', ['poffice' => $poffice]);
    }


    public function create()
    {
        return view('poffices.create');
    }

    public function store(PofficeRequest $request)
    {
        $poffice = new Poffice;

        $poffice->name = $request->name;
        $poffice->email = $request->email;
        $poffice->postcode = $request->postcode;
        $poffice->address = $request->address;
        $poffice->phoneNumber = $request->phoneNumber;

        $poffice->save();

        return redirect('/poffices');
    }

    public function edit($id)
    {
        $poffice = Poffice::find($id);
        return view('poffices.edit', ['poffice' => $poffice]);
    }

    public function update(PofficeRequest $request, $id)
    {
        $poffice = Poffice::find($id);

        $poffice->name = $request->name;
        $poffice->email = $request->email;
        $poffice->postcode = $request->postcode;
        $poffice->address = $request->address;
        $poffice->phoneNumber = $request->phoneNumber;

        $poffice->save();

        return redirect('/poffices');
    }

    public function destroy($id)
    {
        $poffice = Poffice::find($id);
        $poffice->delete();

        return redirect('/poffices');
    }

    public function search()
    {
        return view('poffices.search');
    }
}
