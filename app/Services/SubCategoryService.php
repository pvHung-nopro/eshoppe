<?php
   namespace App\Services;
   use App\Models\SubCategorys;
   use App\Models\Categorys;
   use Illuminate\Http\Request;
   class SubCategoryService
   {
       public function findBySubSlug($slug)
       {
          return SubCategorys::where('sub_slug',$slug)->first();
       }

       // backend

       // create subcategory
       public function postCreateCategorys(Request $request)
       {

    $request->validate([
        'name'=>'required|min:3',
        'slug'=>'required|min:3',
        'title'=>'max:20',
        'desc'=>'max:20',
        'keyword'=>'max:20',
     ],[
        'name.required'=>'không được để trống',
        'name.min'=>'tên quá ngắn ',
        'slug.required'=>'không được để trống',
        'slug.max'=>'slug quá dài',
        'title.max'=>'title quá dài ',
        'desc.max' => 'desc quá dài '
     ]);
            $data = [] ;
            $data['sub_name'] = $request->name;
            $data['sub_slug'] = $request->slug;
            $data['meta_title'] =$request->title ;
            $data['meta_desc'] = $request->desc ;
            $data['meta_keyword'] = $request->keyword;
            $data['category_id'] = $request->category;

           return  SubCategorys::create($data);
       }
    // show subcategory
       public function  showSubCategory(){
         return  SubCategorys::join('categorys','categorys.id','sub_categorys.category_id')
         ->addselect('sub_categorys.id','sub_categorys.sub_name','sub_categorys.sub_slug','sub_categorys.meta_title',
        'sub_categorys.meta_desc','sub_categorys.meta_keyword','sub_categorys.category_id','categorys.name')->paginate(3);

       }


       // edit subcategory
       public function getEditSubCategory($id){
         $SubId =  SubCategorys::find($id);
          return $SubId;
       }

       public function categorysNotId($id)
       {
           $CategoryId = Categorys::where('id','!=',$id)->get();
           return $CategoryId;
       }

       public function categorysId($id){
           return Categorys::find($id);
       }

       public function postupdateSub(Request $request , $id )
       {

    $request->validate([
        'name'=>'required|min:3',
        'slug'=>'required|min:3',
        'title'=>'max:20',
        'desc'=>'max:20',
        'keyword'=>'max:20',
     ],[
        'name.required'=>'không được để trống',
        'name.min'=>'tên quá ngắn ',
        'slug.required'=>'không được để trống',
        'slug.max'=>'slug quá dài',
        'title.max'=>'title quá dài ',
        'desc.max' => 'desc quá dài '
     ]);
           $data = [];
           $subcategoryId = subCategorys::find($id);
           $data['sub_name'] = $request->name;
           $data['sub_slug'] = $request->slug;
           $data['meta_title'] =$request->title ;
           $data['meta_desc'] = $request->desc ;
           $data['meta_keyword'] = $request->keyword;
           $data['category_id'] = $request->category;
           return $subcategoryId->update($data);

       }

       // deleted
       public function deletedSub($id)
       {
           return SubCategorys::destroy($id);
       }
   }

