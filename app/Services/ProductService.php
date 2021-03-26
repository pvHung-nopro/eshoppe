<?php
   namespace App\Services;
   use App\Models\Products;
   use App\Models\Categorys;
   use App\Models\SubCategorys;
   use App\Models\Brand;
   use Illuminate\Http\Request;
   use App\Models\Comment;
   use Auth;
   use DB;
   use File;
 class ProductService
 {
     public function bestSeller()
     {
         return Products::join('order_details', 'order_details.product_id', 'products.id')
         ->selectRaw('sum(qty) as qty')
         ->groupBy('products.id')
         ->orderBy('qty', 'desc')
         ->limit(3)
         ->addSelect('products.id', 'products.name', 'products.image', 'products.price')
         ->get();
     }

     public function feature($limit = 6 )
   {
       return Products::where('is_feature', true)->limit($limit)->get();
   }

   public function  getByCategoryId($categoryId)
   {
        return Products::join('categorys','products.category_id','categorys.id')
        ->where('products.category_id',$categoryId)
        ->addSelect('products.id','products.name','products.image','products.price')->paginate(6);
   }

  public function getBySubCategoryId($subcategoryId)
  {
      return Products::join('sub_categorys','sub_categorys.id','products.subcategory_id')
      ->where('products.subcategory_id',$subcategoryId)
      ->addSelect('products.id','products.name','products.image','products.price')->paginate(6);
  }

  public function getByBrandId($brandId)
  {
     return Products::join('brands','brands.id','products.brand_id')
     ->where('products.brand_id',$brandId)
     ->addSelect('products.id','products.name','products.image','products.price')->paginate(6);
   }

   public function findById($id)
   {
        return Products::find($id);
   }


   //  lọc
   public function filter(array $data){
     $product_price =Products::select("*")
     ->whereBetween('price', [$data['min'], $data['max']])->where('is_feature',0)
     ->paginate(2);

     return  $product_price;


 }


    public function search($search)
    {
        $products=Products::where('name','LIKE','%'.$search."%")->get();

        return $products;
    }

    public function productSearchs($id)
    {
         $product_Search =  Products::Select('*')->where('id',$id)->get();
         return $product_Search;
    }

    public function product_category($id,$idProduct)
    {
        $product_category = Products::Select('*')->where('category_id',$id)->where('id','!=',$idProduct)->paginate(3);

        return $product_category;
    }

    public function product_subcategory($id,$idProduct)
    {
        $product_subcategory = Products::Select('*')->where('subcategory_id',$id)->where('id','!=',$idProduct)->paginate(3);
    }
  // product detail
    public function productDetails($id)
    {
       return Products::find($id);
    }

    public function productDetailsBrand($id)
    {
     return   Products::join('brands','brands.id','products.brand_id')->addSelect('brands.name as brand_name')->find($id);

    }

    public function product_Brand($id)
    {
        $brandId = Products::find($id)->brand_id;
        if($brandId != null)
        {
          return   Products::where('brand_id',$brandId)->limit(4)->get();
        }
        return null;
    }

    public function productCategorys($id)
    {
        $categoryId = Products::find($id)->category_id;
        if($categoryId != null)
        {
          return   Products::where('category_id',$categoryId)->limit(4)->get();
        }
        return null;
    }
    public function comment_product(Request $request)
    {
        $data = [];
        $data['name']  = $request->comment;
        $data['title'] = 'comment';
        $data['user_id'] = Auth::id();
        $data['product_id'] = session()->get('commentProductId');

      return   Comment::create($data);
    }





    // backend
    // create product
    public function productCategory()
    {
          $category = Categorys::select('id','name')->limit(9)->get();
         return $category;
    }

    public function productSubCategory()
    {
        $subCategory = SubCategorys::select('id','sub_name')->limit(6)->get();
        return $subCategory;
    }

    public function productBrand()
    {
        $brand = Brand::select('id','name')->limit(7)->get();
       return $brand;
    }


    public function createProduct(Request $request)
    {


        $request->validate([
            'name'=>'required|min:3',
            'slug'=>'required|min:3',
            'price'=>'required|alpha_num',
            'title'=>'max:20',
            'desc'=>'max:20',
            'keyword'=>'max:20',
         ],[
            'name.required'=>'không được để trống',
            'name.min'=>'tên quá ngắn ',
            'slug.required'=>'không được để trống',
            'slug.max'=>'slug quá dài',
            'price.required'=>'không được để trống',
            'price.alpha_num'=>'phải là số',
            'title.max'=>'title quá dài ',
            'desc.max' => 'desc quá dài '
         ]);

         $imageSlider = $request->file('imageProduct');
         if($imageSlider){
             $data  = [];
             $get_name_image =  $imageSlider->getClientOriginalName();

             $name_image = current(explode('.',$get_name_image));

             $new_image =  $name_image.rand(0,100000).'.'.$imageSlider->getClientOriginalExtension();

             $imageType = $imageSlider->getMimeType();
             $imageTypeArray = explode('/', $imageType );
             if( $imageTypeArray['0'] != 'image'){
                 return redirect()->route('create.product')->with('messageImage','không phải là ảnh');
             }else{

                $data = [];
                $data['name'] = $request->name;
                $data['slug']  =  $request->slug;
                $data['price']  =  $request->price;
                $data['meta_title'] = $request->title;
                $data['meta_desc'] = $request->desc;
                $data['meta_keyword'] = $request->keyword;
                $data['category_id'] = $request->category;
                $data['subcategory_id'] = $request->subcategory;
                $data['brand_id'] = $request->brand;
                $data['is_feature'] = $request->is_feature;
                $data['image'] =   $new_image;
                 Products::create($data);
            if($request->is_feature == '1'){
                $imageSlider->move('frontend/images/home',$new_image);
            }
            else{
                $imageSlider->move('frontend/images/shop',$new_image);
            }
             return redirect()->route('create.product')->with('messageImage','thêm thành công!') ;
             }
     }else{
           return redirect()->route('create.product')->with('messageImage','bạn chưa chọn ảnh!');
     }

    }

    // show product
    public function showProducts()
    {
     $product =   Products::leftjoin('categorys','products.category_id','=','categorys.id')
     ->leftjoin('sub_categorys','products.subcategory_id','=','sub_categorys.id')
     ->leftjoin('brands','products.brand_id','=','brands.id')
     ->addSelect('products.*','brands.name as brand_name','categorys.name as category_name','sub_categorys.sub_name as subCategory_name')
     ->orderBy('products.id', 'desc')
     ->paginate(6);


  return $product;

    }

    // edit product
    public function productId($id)
    {
      $productId =  Products::select('id', 'name','slug','price','image','is_feature','meta_title','meta_desc','meta_keyword')->find($id);
    //   dd($productId->name);
      return   $productId;
    }

    public function category_productId($id)
    {
      $category_productid =   Products::join('categorys','products.category_id','categorys.id')
        ->where('products.id',$id)
         ->addSelect('categorys.id as category_id','categorys.name as category_name')->get()->toArray();
        //  dd( $category_productid );
        return $category_productid ;
    }

    public function notCategory_product($id)
    {
      $category_id =  Products::find($id)->category_id;
    $category =   Categorys::select('id','name')->where('id','!=',$category_id)->get();

    return $category;

    }


    public function subcategory_productId($id)
    {
      $subcategory_productid =   Products::join('sub_categorys','products.subcategory_id','sub_categorys.id')
        ->where('products.id',$id)
         ->addSelect('sub_categorys.id as subcategory_id','sub_categorys.sub_name as subcategory_name')->get()->toArray();
        //  dd( $category_productid );
        return $subcategory_productid ;
    }

    public function notsubCategory_product($id)
    {
      $subcategory_id =  Products::find($id)->subcategory_id;
         $subcategory =   Subcategorys::select('id','sub_name')->where('id','!=',$subcategory_id)->get();

    return    $subcategory ;

    }

    public function brand_productId($id)
    {
      $brand_productid =   Products::join('brands','products.brand_id','brands.id')
        ->where('products.id',$id)
         ->addSelect('brands.id as brand_id','brands.name as brand_name')->get()->toArray();
        //  dd( $category_productid );
        return $brand_productid ;
    }

    public function notbrand_product($id)
    {
      $brand_id =  Products::find($id)->brand_id;
         $brand =   Brand::select('id','name')->where('id','!=',$brand_id)->get();

    return    $brand ;

    }

    // post
    public function postUpdateProduct(Request $request,$id,$check,$image)
    {

        $request->validate([
            'name'=>'required|min:3',
            'slug'=>'required|min:3',
            'price'=>'required|alpha_num',
            'title'=>'max:20',
            'desc'=>'max:20',
            'keyword'=>'max:20',
         ],[
            'name.required'=>'không được để trống',
            'name.min'=>'tên quá ngắn ',
            'slug.required'=>'không được để trống',
            'slug.max'=>'slug quá dài',
            'price.required'=>'không được để trống',
            'price.alpha_num'=>'phải là số',
            'title.max'=>'title quá dài ',
            'desc.max' => 'desc quá dài '
         ]);

         $imageSlider = $request->file('imageProduct');
         if($imageSlider){
             $data  = [];
             $get_name_image =  $imageSlider->getClientOriginalName();

             $name_image = current(explode('.',$get_name_image));

             $new_image =  $name_image.rand(0,100000).'.'.$imageSlider->getClientOriginalExtension();

             $imageType = $imageSlider->getMimeType();
             $imageTypeArray = explode('/', $imageType );
             if( $imageTypeArray['0'] != 'image'){
                 return redirect()->route('create.product')->with('messageImage','không phải là ảnh');
             }else{

                $data = [];
                $data['name'] = $request->name;
                $data['slug']  =  $request->slug;
                $data['price']  =  $request->price;
                $data['meta_title'] = $request->title;
                $data['meta_desc'] = $request->desc;
                $data['meta_keyword'] = $request->keyword;
                $data['category_id'] = $request->category;
                $data['subcategory_id'] = $request->subcategory;
                $data['brand_id'] = $request->brand;
                $data['is_feature'] = $request->is_feature;
                $data['image'] =   $new_image;
                 $productUpdate = Products::find($id);
                 $productUpdate->update($data);
                 if($request->is_feature == '1')
                 {
                    $imageSlider->move('frontend/images/home',$new_image);
                    File::move('frontend/images/home/'.$image,'upload/product/update/'.$image);
                 }else{
                    $imageSlider->move('frontend/images/shop',$new_image);
                    File::move('frontend/images/shop/'.$image,'upload/product/update/'.$image);
                 }


             return redirect()->route('show.product')->with('messageImage','cập nhật thành công !') ;
             }
     }else{
        $data = [];
        $data['name'] = $request->name;
        $data['slug']  =  $request->slug;
        $data['price']  =  $request->price;
        $data['meta_title'] = $request->title;
        $data['meta_desc'] = $request->desc;
        $data['meta_keyword'] = $request->keyword;
        $data['category_id'] = $request->category;
        $data['subcategory_id'] = $request->subcategory;
        $data['brand_id'] = $request->brand;
        $data['is_feature'] = $request->is_feature;
        $productUpdate = Products::find($id);
        $productUpdate->update($data);
        if($check == '0')
        {
             if($request->is_feature == '1'){
                File::move('frontend/images/shop/'.$image,'frontend/images/home/'.$image);
             }
        }else{
            if($request->is_feature == '0')
            {
                File::move('frontend/images/shop/'.$image,'frontend/images/home/'.$image);
            }
        }

        return redirect()->route('show.product')->with('messageImage','cập nhật thành công !') ;
     }
    }

   public function deleteProducts($id,$check,$image)
   {
       if($check == '1')
       {
            Products::destroy($id);
            File::move('frontend/images/home/'.$image,'upload/product/deleted/'.$image);
       }else{
        Products::destroy($id);
        File::move('frontend/images/shop/'.$image,'upload/product/deleted/'.$image);
       }
       return redirect()->route('show.product');
   }




    public function fileProduct()
    {

    }
}
