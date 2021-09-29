<?php

namespace App\Http\Controllers;

use App\Models\Poffice;
use App\Http\Requests\PofficeRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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


    public function create(Request $request)
    {
        $method = 'GET';
        $zipcode = $request->input('zipcode');
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $zipcode;

        $client = new Client();

        try {
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $customer = json_decode($body, false);
            $results = $customer->results[0];
            $address = $results->address1 . $results->address2 . $results->address3;
        } catch (\Throwable $th) {
            return back();
        }

        return view('poffices.create')->with(compact('customer', 'address'));
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

    public function search(Poffice $poffice)
    {
        return view('poffices.search');
    }
}
