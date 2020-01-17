<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));// listado
    }
    public function create()
    {
        return view('admin.categories.create');// Formulario de registro
    }
    public function store(Request $request)
    {
        //Validar
        $this->validate($request, Category::$rules, Category::$messages);
        //registrar en la base de datos
        //dd($request->all());
        Category::create($request->all()); //mass assinment 

        return redirect('/admin/categories');
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category'));// Formulario de registro
    }
    public function update(Request $request, Category $category)
    {
        //Validar
        $this->validate($request, Category::$rules, Category::$messages);
        //Actualizar producto
        $category->update($request->all());

        return redirect('/admin/categories');
    }
    public function destroy(Category $category)
    {
        //Eliminar categoría
        $category->delete();//Delete

        return back();
    }
}
