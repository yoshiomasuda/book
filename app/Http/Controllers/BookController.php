<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'item_code' => ['unique:books', 'required', 'min:1', "max:8"],
            'item_name' => ['min:3', "max:255"],
            'item_brand' => ['min:1', "max:100"],
            'item_maker' => ['min:1', "max:100"],
            'item_number' => ['min:1', "max:3"],        
            'item_amount' => ['min:0', "max:6"],
                    ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_subtotal_sum = Book::get()->sum("item_subtotal");
        $item_number_sum = Book::get()->sum("item_number");
        //dd ($sum);
        $books = Book::sortable()->orderBY('id', 'asc')->paginate(5);//並べ替え id基準（標準）
        return view('books', ['books' => $books, 'item_subtotal_sum' => $item_subtotal_sum, 'item_number_sum' => $item_number_sum]);//ViewのファイルにBooksから出力

    }

    public function index_update(Request $request)//補正処理
    {
        $item_code = $request->item_code;
        $item_number = $request->item_number;
        $item_amount = $request->item_amount;
        $item_subtotal = $item_number * $item_amount;
        $book = Book::where('item_code', '=', $item_code)->first()->update([
            //'item_name' => $request->item_name,
            'item_number' => $item_number,
            //'item_amount' => $item_amount,
            //'item_code' => $item_code,
            //'item_brand' => $request->item_brand,
            //'item_maker' => $request->item_maker,
            'item_subtotal' => $item_subtotal
       ]);

         return redirect("/");

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');//入力画面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $item_number = $request->item_number;
            $item_amount = $request->item_amount;
            $item_subtotal = $item_number * $item_amount;
            if ($request->hasFile('item_image')) {
                $item_image = $request->file('item_image')->getClientOriginalName();
                $request->file('item_image')->storeAs("public/img", $item_image);
                } else {
                $item_image = null;
                }
            Book::create([   //データを創る
                'item_name' => $request->item_name,
                'item_number' => $item_number,
                'item_amount' => $item_amount,
                'item_code' => $request->item_code,
                'item_brand' => $request->item_brand,
                'item_maker' => $request->item_maker,
                'item_subtotal' => $item_subtotal,
                'item_image' => $item_image
                ]);
            return redirect('/');

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
        $book = Book::where('id', '=', $id)->first();//並べ替え id基準（標準）
        return view('edit', ['book' => $book]);//ViewのファイルにBooksから出力
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
        $item_number = $request->item_number;
        $item_amount = $request->item_amount;
        $item_subtotal = $item_number * $item_amount;
        $book = Book::where('id', '=', $id)->first()
        ->update([   //データを創る
             'item_name' => $request->item_name,
              'item_number' => $item_number,
             'item_amount' => $item_amount,
             'item_code' => $request->item_code,
             'item_brand' => $request->item_brand,
             'item_maker' => $request->item_maker,
             'item_subtotal' => $item_subtotal
        ]);
        return redirect("/");

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//削除
    {
        $Book = Book::where('id', '=',$id)->first();
        $Book->delete();
        return redirect('/'); 
    }
}
