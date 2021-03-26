<?php
   namespace App\Services;
   use App\Models\Brand;

   class BrandService
{
     public function all($limit = 7)
     {
         return Brand::limit($limit)->get();
     }
     public function findByBrand($slug)
     {
        return Brand::where('slug',$slug)->first();
     }
}
