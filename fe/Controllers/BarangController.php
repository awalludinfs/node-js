<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost:3000/barang/');
        $barangs = json_decode($response->getBody());
        return view('barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost:3000/brand/');
        $brands = json_decode($response->getBody());
        return view('barang.create',compact('brnds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/barang/";
        $request = $client->post($url, ['form_params' =>$request->all()]);
        // $response = $request->getBody();
        return redirect("/barangs")->with('status','Data Berhasil Disimpan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/barang/".$id;
        $request = $client->delete($url);
        // $response = $request->getBody();
        return redirect("/barangs")->with('status','Data Berhasil Disimpan!!');
    }
    public function cari($key)
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/barang/search/".$key;
        $response = $client->get($url);
        $barangs = json_decode($response->getBody());
        return redirect("/barangs")->with('status','Data Berhasil Disimpan!!');
    }
}