<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
    public function productList()
    {

        $key = 'Products';
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
        $page = intval($page);
        $num_results_on_page = 8;
        $start = ($page-1) * $num_results_on_page;

        if (!Redis::hget($key, $page)) {
            $source = 'MySQL Server';
            $products = Book::select('*')->orderBy('id')->offset($start)->limit($num_results_on_page)->get();
            Redis::hset($key,$page, serialize($products));
            Redis::expire($key, 3600);
        } else {
            $source = 'Redis Server';
            $products = unserialize(Redis::hget($key, $page));
        }
        $total_pages = Book::select('*')->count();
        $cartItems = \Cart::getContent();


        return view('products', [
            'products' => $products,
            'page' => $page,
            'cart' => $cartItems,
            'source' => $source,
            'num_results_on_page' => $num_results_on_page,
            'total_pages' => $total_pages
        ]);
    }

    public function index()
    {
        $book = Book::all();
        return response()->json(['books' => $book], 200);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json(['book' => $book], 200);
        }
        return response()->json(['message' => 'no book found'], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'category_id' => 'required|max:191',
            'avatar' => 'required|max:191',
            'publisher_id' => 'required|max:191',
            'price' => 'required|max:191',
        ]);
        $book = new Book;
        $book->title = $request->title;
        $book->category_id = $request->category_id;
        $book->avatar = $request->avatar;
        $book->publisher_id = $request->publisher_id;
        $book->price = $request->price;
        $book->number_stock = $request->number_stock;
        $book->save();

        return response()->json(['message' => 'add book successed'], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:191',
            'category_id' => 'required|max:191',
            'avatar' => 'required|max:191',
            'price' => 'required|max:191',
        ]);
        $book = Book::find($id);
        if ($book) {
            $book->title = $request->title;
            $book->category_id = $request->category_id;
            $book->avatar = $request->avatar;
            $book->price = $request->price;
            $book->number_stock = $request->number_stock;
            $book->update();

            return response()->json(['message' => 'update successed'], 200);
        }
        return response()->json(['message' => 'no book found'], 404);

    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'delete successed'], 200);
        }
        return response()->json(['message' => 'no book found'], 404);

    }
}
