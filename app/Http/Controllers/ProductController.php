<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Storage::get('public/data.json');
        //parse file contents and convert it to collection for easy manipulation
        $products = json_decode($products);
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Storage::get('public/data.json');
        //parse file contents
        $products = json_decode($products, true);
        //get data fields
        $new_product = $request->validate(['name' => 'required', 'qte' => 'required', 'price' => 'required']);
        //unique id
        $ui = uniqid();
        $new_product['id'] = $ui;
        //assign the current date
        $new_product['created_at'] = Carbon::now()->toDateString();
        $products[] = $new_product;

        //save new data to file
        Storage::put('public/data.json', json_encode($products));
        return response()->json($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Storage::get('public/data.json');
        //parse file contents
        $products = json_decode($products, true);
        //get data fields
        $data = $request->validate(['name' => 'required', 'qte' => 'required', 'price' => 'required']);
        //search and update
        // the given product
        foreach ($products as &$pr) {
            if ($pr['id'] == $id) {
                $pr['name'] = $data['name'];
                $pr['qte'] = $data['qte'];
                $pr['price'] = $data['price'];

            }

        }

        //save new data to file
        Storage::put('public/data.json', json_encode($products));
        return response()->json($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Storage::get('public/data.json');
        //parse file contents and convert it to collection for easy manipulation
        $products = collect(json_decode($products));


        //delete the given product
        $products = $products->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
        //save new data to file
        Storage::put('public/data.json', json_encode($products));
        return response()->json($products);
    }
}
