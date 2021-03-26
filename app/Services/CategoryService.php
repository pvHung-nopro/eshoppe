<?php
   namespace App\Services;
   use App\Models\Categorys;
   use Illuminate\Http\Request;

   class CategoryService
{
    public function all($limit = 10 )
    {
        return Categorys::limit($limit)->get() ;
    }
    public function getSubCategory()
    {
        // return Categorys::join('sub_categorys','categorys.id','=','sub_categorys.category_id')
        // ->select('sub_name','name','slug','sub_slug')
        // ->get();
        return Categorys::with('subcategory')->get();
    }

    public function findBySlug($slug)
    {
         return Categorys::where('slug',$slug)->first();
    }

    // backend
    public function categorySub()
    {
       $categorys  =  Categorys::select('id','name')->get();
    return $categorys;
    }

    // create category
    public function createCategory(Request $request){
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
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['meta_title']  = $request->title;
        $data['meta_desc'] =$request->desc;
        $data['meta_keyword'] = $request->keyword;
       return  Categorys::create($data);
    }

    //show categorys
    public function showcategory()
    {
      return    Categorys::paginate(3);
    }

   // edit categorys
    public function getCategorys($id)
    {
        return Categorys::find($id);

    }

    public function editCategorys(Request $request,$id)
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
        $editCategorysId = Categorys::find($id);
        $data = [];
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['meta_title']  = $request->title;
        $data['meta_desc'] =$request->desc;
        $data['meta_keyword'] = $request->keyword;

        return    $editCategorysId->update($data);
    }


    public function deletedCategory($id)
    {
        return Categorys::destroy($id);
    }


}
