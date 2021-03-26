<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Services\CategoryService;
use App\Services\SubCategoryService;

class CategoryController extends Controller
{
   protected $categoryService;

   protected $subCategoryService;

    public function __construct(CategoryService $categoryService , SubCategoryService $subCategoryService){
       $this->categoryService = $categoryService;
       $this->subCategoryService = $subCategoryService;
    }

    //create subcategory
     public function createCategory()
     {
         if(Auth::check()){
           $category =  $this->categoryService->categorySub();

             return view('backends.subcategory.create_category',[
                 'category' => $category ?? null,
             ]);
         }else{
            return redirect()->route('get.login.admin');
         }

     }

     public function postCreateCategory(Request $request)
     {
        $this->subCategoryService->postCreateCategorys($request);
        return redirect()->back()->with('messagesub','thêm menu  con thành công');
     }

      // show subcategory
     public function showCategory()
     {
        if(Auth::check()){
          $subCategory  =   $this->subCategoryService->showSubCategory();
        //   dd(  $subCategory );
            return view('backends.subcategory.show',[
                'subCategory'=>  $subCategory ?? null
            ]);
        }else{
           return redirect()->route('get.login.admin');
        }
     }

     public function editsubCategory($id){
         if(Auth::check()){
            $subCategoryId = $this->subCategoryService->getEditSubCategory($id);
            $categoryNotId = $this->subCategoryService->categorysNotId($id);
            $categoryId = $this->subCategoryService->categorysId($id);
             return view('backends.subcategory.edit_sub_category',[
                 'subCategoryId' =>  $subCategoryId ?? null,
                  'categoryId' =>  $categoryId ?? null,
                  'categoryNotId' =>   $categoryNotId ?? null

             ]);
         }else{
            return redirect()->route('get.login.admin');
         }
     }

     public function postEditSubCategory(Request $request,$id)
     {
        $this->subCategoryService->postupdateSub($request , $id);
        return redirect()->route('show.category')->with('messages','update thành công');
     }

     public function deletedSubcategory($id)
     {
         $this->subCategoryService->deletedSub($id);
         return redirect()->route('show.category')->with('messages','xóa thành công');
     }

     // category

     //create category
     public function createCategorys(){
         if(Auth::check()){
             return view('backends.categorys.create_category');
         }else{
            return redirect()->route('get.login.admin');
         }
     }

     public function postCreateCategorys(Request $request){
          $this->categoryService->createCategory($request);
          return redirect()->back()->with('messagecategory','thêm category thành công');
     }

     // show category
     public function showCategorys()
     {
         if(Auth::check()){
             $categorys  = $this->categoryService->showcategory() ;
             return view('backends.categorys.show_category',[
                 'categorys'=>$categorys ?? null,
             ]);
         }else{
            return redirect()->route('get.login.admin');
         }
     }


     // edit category
     public function editCategory($id)
     {
         if(Auth::check()){
             $categorysId = $this->categoryService->getCategorys($id);
             return view('backends.categorys.edit_category',[
                 'categorysId' =>   $categorysId ?? null
             ]);
         }else{
            return redirect()->route('get.login.admin');
         }
     }

    public function postEditCategorys(Request $request , $id)
    {
      $editCategoryId =  $this->categoryService->editCategorys($request,$id);
      return redirect()->route('show.categorys')->with('messgaeedit','cập nhập category thành công!');

    }

    public function deletedCategorys($id)
    {
        $this->categoryService->deletedCategory($id);
        return redirect()->route('show.categorys')->with('messgaeedit','xóa category thành công!');
    }
}
