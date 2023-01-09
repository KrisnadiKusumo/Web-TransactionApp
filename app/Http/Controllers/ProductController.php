<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ProductController extends PwlBaseController
{
    public function dashboard()
    {
        return view('content/product/dashboard');
    }

    public function index()
    {
        $data = [
            'products' => Product::all()
        ];
        return view('content/product/list', $data);
    }

    public function  formTambah()
    {
        return view('content/product/formNew');
    }

    public function create()
    {
        $product = new Product();
        $product->code = request('code');
        $product->name = request('name');
        $product->price = request('price');
        $product->expired = request('expired');
        $product->stock = request('stock');
        $product->save();
        return redirect(route('pr.list'));
    }

    public function formUbah($id)
    {
        $this->onlySuperAdmin();
        $product = Product::getByPrimaryKey($id);
        return view('content/product/formUpdate', compact('product'));
    }

    public function update($id)
    {
        $this->onlySuperAdmin();
        $product = Product::where('id',$id)->first();
        $product->name = request('name');
        $product->price = request('price');
        $product->expired = request('expired');
        $product->stock = request('stock');
        $product->save();
        return redirect(route('pr.list'));
    }

    public function formHapus($id)
    {
        $product = Product::getByPrimaryKey($id);
        return view('content/product/formDelete', compact('product'));
    }

    public function delete($id)
    {
        $this->onlySuperAdmin();
        Product::where('id',$id)->delete();
        return redirect(route('pr.list'));
    }
}
