<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $product = Product::query()->where('status', '=', 1);
        if (!isset($request)) {
            $product->orderBy('created_at', 'desc');
        }
        if (isset($request->new)) {
            $product->orderBy('created_at', 'desc');
        }
        if (isset($request->old)) {
            $product->orderBy('created_at', 'asc');
        }
        if (isset($request->increase)) {
            $product->orderBy('price', 'asc');
        }
        if (isset($request->decrease)) {
            $product->orderBy('price', 'desc');
        }
        $list = $product
            ->paginate(9);
        return view('frontend.product', compact('list'));
    }



    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)
            ->select('id', 'brand_id', 'category_id', 'image', 'name', 'description', 'price', 'pricesale', 'status', 'slug', 'detail')
            ->first();
        return view('frontend.product_detail', compact('product'));
    }

    public function category($slug, Request $request)
    {
        $args_row = [
            ['slug', '=', $slug],
            ['status', '=', 1]
        ];
        $row = Category::where($args_row)->select("id", "name", "slug")->first();
        $listcatid = [];
        if ($row != null) {
            array_push($listcatid, $row->id);
            $list1 = Category::where([['parent_id', '=', $row->id], ['status', '=', 1]])->select("id")->get();
            if ($list1 && count($list1) > 0) {
                foreach ($list1 as $row1) {
                    array_push($listcatid, $row1->id);
                    $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select("id")->get();
                    if ($list2 && count($list2) > 0) {
                        foreach ($list2 as $row2) {
                            array_push($listcatid, $row2->id);
                        }
                    }
                }
            }
        }
        $product = Product::query()->where('status', '=', 1);
        if (!isset($request)) {
            $product->orderBy('created_at', 'desc');
        }
        if (isset($request->new)) {
            $product->orderBy('created_at', 'desc');
        }
        if (isset($request->old)) {
            $product->orderBy('created_at', 'asc');
        }
        if (isset($request->increase)) {
            $product->orderBy('price', 'asc');
        }
        if (isset($request->decrease)) {
            $product->orderBy('price', 'desc');
        }
        $list = $product
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('frontend.product_category', compact('list', 'row'));
    }

    public function brand($slug, Request $request)
    {
        $args_row = [
            ['slug', '=', $slug],
            ['status', '=', 1]
        ];
        $brand = Brand::where($args_row)->select("id", "name", "slug")->first();
        $listbrandid = [];
        if ($brand != null) {
            array_push($listbrandid, $brand->id);
            $list1 = Brand::where([['id', '=', $brand->id], ['status', '=', 1]])->select("id", "name", "slug")->get();
        }
        $product = Product::query()->where('status', '=', 1);
        if (!isset($request)) {
            $product->orderBy('created_at', 'desc');
        }
        if (isset($request->new)) {
            $product->orderBy('created_at', 'desc');
        }
        if (isset($request->old)) {
            $product->orderBy('created_at', 'asc');
        }
        if (isset($request->increase)) {
            $product->orderBy('price', 'asc');
        }
        if (isset($request->decrease)) {
            $product->orderBy('price', 'desc');
        }
        $list = $product
            ->whereIn('brand_id', $listbrandid)
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('frontend.product_brand', compact('list', 'brand'));
    }

    public function search_product(Request $request)
    {
        $query = $request->input('query');
        $listsp = Product::where('name', 'LIKE', "%$query%")
            ->paginate(9);

        return view('frontend.search_product', compact('query', 'listsp'));
    }
}
