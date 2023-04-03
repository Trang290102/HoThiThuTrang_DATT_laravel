<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductSale;
use App\Models\ProductOption;
use App\Models\ProductValue;
use App\Models\ProductStore;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    #GET:admin/product, admin/product/index
    public function index()
    {
        $user_name = Auth::user()->name;
        //cách 1: truy vấn từ csdl dùng groupby
        $list_product = Product::join('httt_product_image', 'httt_product_image.product_id', '=', 'httt_product.id')
            ->join('httt_category', 'httt_category.id', '=', 'httt_product.category_id')
            ->join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
            ->select('httt_product.*', 'httt_product_image.*', 'httt_brand.name as brand_name', 'httt_category.name as category_name')
            ->where('httt_product.status', '!=', 0)
            ->groupBy('httt_product_image.product_id')
            ->orderBy('httt_product.created_at', 'desc')
            ->get();
        //cách 2: quan hệ một-nhiều
        // $list_product = Product::join('httt_product_image', 'httt_product_image.product_id', '=', 'httt_product.id')
        //     ->join('httt_category', 'httt_category.id', '=', 'httt_product.category_id')
        //     ->join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
        //     ->select('httt_product.*', 'httt_brand.name as brand_name', 'httt_category.name as category_name')
        //     ->where('httt_product.status', '!=', 0)
        //     ->orderBy('httt_product.created_at', 'desc')->get();
        return view('backend.product.index', compact('list_product', 'user_name'));
    }
    #GET:admin/product/trash
    public function trash()
    {
        $user_name = Auth::user()->name;

        $list_product = Product::join('httt_product_image', 'httt_product_image.product_id', '=', 'httt_product.id')
            ->join('httt_category', 'httt_category.id', '=', 'httt_product.category_id')
            ->join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
            ->select('httt_product.*', 'httt_product_image.*', 'httt_brand.name as brand_name', 'httt_category.name as category_name')
            ->where('httt_product.status', '=', 0)
            ->groupBy('httt_product_image.product_id')
            ->orderBy('httt_product.created_at', 'desc')
            ->get();
        return view('backend.product.trash', compact('list_product', 'user_name'));
    }

    #GET: admin/product/create
    public function create()
    {
        $user_name = Auth::user()->name;

        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();

        $html_category_id = '';
        foreach ($list_category as $item) {
            $html_category_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        $html_brand_id = '';
        foreach ($list_brand as $item) {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.create', compact('html_category_id', 'html_brand_id', 'user_name'));
    }


    public function store(ProductStoreRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $product = new Product; //tạo mới mẫu tin
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = $user_id;
        $product->status = $request->status;
        if ($product->save()) {
            //upload image
            if ($request->has('image')) {
                $path_dir = "public/images/product/";
                $array_file =  $request->file('image');
                $i = 1;
                foreach ($array_file as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = $product->slug . "-" . $i . '.' . $extension;
                    $file->move($path_dir, $filename);
                    //echo $filename;
                    $product_image = new ProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->image = $filename;
                    $product_image->save();
                    $i++;
                }
            }
            //khuyến mãi
            if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
                $product_sale = new ProductSale();
                $product_sale->product_id = $product->id;
                $product_sale->price_sale = $request->price_sale;
                $product_sale->date_begin = $request->date_begin;
                $product_sale->date_end = $request->date_end;
                $product_sale->save();
            }
            //Nhập kho
            if (strlen($request->price) && strlen($request->qty)) {
                $product_store = new ProductStore();
                $product_store->product_id = $product->id;
                $product_store->price = $request->price;
                $product_store->qty = $request->qty;
                $product_store->created_at = date('Y-m-d H:i:s');
                $product_store->created_by = $user_id;
                $product_store->save();
            }
        }
        return redirect()->route('product.index')->with('message', ['type' => 'dangers', 'msg' => 'Thêm sản phẩm không thành công!']);
    }

    public function show(string $id)
    {
        $user_name = Auth::user()->name;

        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.product.show', compact('product', 'user_name'));
    }

    public function edit(string $id)
    {
        $user_name = Auth::user()->name;

        $product = Product::find($id);
        $list_product = Product::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_product as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.product.edit', compact('product', 'html_parent_id', 'html_sort_order', 'user_name'));
    }

    public function update(ProductUpdateRequest $request, string $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $product = Product::find($id); //lấy mẫu tin
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->parent_id = $request->parent_id;
        $product->sort_order = $request->sort_order;
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->created_by = $user_id;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/product/";
            if (File::exists(($path_dir . $product->image))) {
                File::delete(($path_dir . $product->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $product->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $product->image = $filename;
        }
        //end upload
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'dangers', 'msg' => 'Cập nhật sản phẩm không thành công!']);
    }

    #GET:admin/product/destroy/{id}
    public function destroy(string $id)
    {
        $product = Product::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/product/";
        $path_image_delete = $path_dir . $product->image;
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($product->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa sản phẩm thành công!']);
        }
        return redirect()->route('product.trash')->with('message', ['type' => 'dangers', 'msg' => 'Xóa sản phẩm không thành công!']);
    }
    #GET:admin/product/status/{id}
    public function status($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = $user_id;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/product/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = $user_id;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/product/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = $user_id;
        $product->save();
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
