<?php
   namespace App\Services;
   use App\Models\Slider;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use File;
   class SliderService
{
    public function all($limit = 2 )
    {
        return Slider::limit($limit)->where('status',1)->get() ;
    }

    // backend
    public function createFile(Request $request)
    {

        $imageSlider = $request->file('imageSlider');
        if($imageSlider){
            $data  = [];
            $get_name_image =  $imageSlider->getClientOriginalName();

            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,100000).'.'.$imageSlider->getClientOriginalExtension();

            $imageType = $imageSlider->getMimeType();
            $imageTypeArray = explode('/', $imageType );
            if( $imageTypeArray['0'] != 'image'){
                return redirect()->route('create.slider')->with('messageImage','không phải là ảnh');
            }else{

                $data['image'] = $new_image;
                $data['title'] = $request->title;
                $data['status'] = $request->sliderHome;
                 Slider::create($data) ;

            $imageSlider->move('frontend/images/home',$new_image);
            return redirect()->route('create.slider')->with('messageImage','thêm thành công!') ;
            }
    }else{
          return redirect()->route('create.slider')->with('messageImage','bạn chưa chọn ảnh!');
    }
}

  public function showSliders()
  {
      $all_slider = Slider::paginate(3);
      return $all_slider;

  }
  public function updateSlider($id)
  {
      $statusSlider = Slider::find($id);
    //   dd($statusSlider);
      $data = [];
      if($statusSlider->status == '0'){
        $statusSlider->update(['status'=> 1]);
      }else{
          $statusSlider->update(['status'=> 0]);
      }


  }

  public function editSliders($id)
  {
      $editId = Slider::find($id);
      return $editId;
  }

  public function postEdit($request,$id,$image)
  {

      $data = [];
     $updateId = Slider::find($id);
      $imageSlider = $request->file('imageSlider');
      $data  = [];
      if($imageSlider){

          $get_name_image =  $imageSlider->getClientOriginalName();

          $name_image = current(explode('.',$get_name_image));

          $new_image =  $name_image.rand(0,100000).'.'.$imageSlider->getClientOriginalExtension();

          $imageType = $imageSlider->getMimeType();
          $imageTypeArray = explode('/', $imageType );
          if( $imageTypeArray['0'] != 'image'){
              return redirect()->route('edit.slider',$id)->with('messageImage','không phải là ảnh');
          }else{

              $data['image'] = $new_image;
              $data['title'] = $request->title;
              $data['status'] = $request->sliderHome;
              $updateId->update($data);

          $imageSlider->move('frontend/images/home',$new_image);
          File::move('frontend/images/home/'.$image,'upload/slider/update'.$image);
        //   unlink('frontend/images/home/'.$image);
          return redirect()->route('show.slider')->with('messageImage','cập nhật thành công') ;
          }
  }else{
    $data['title'] = $request->title;
    $data['status'] = $request->sliderHome;
    $updateId->update($data);
    return redirect()->route('show.slider')->with('messageImage','cập nhật thành công') ;
  }

  }

  public function deleteSliders($id)
  {
           $image = Slider::find($id)->image;
            Slider::destroy($id);
            File::move('frontend/images/home/'.$image,'upload/slider/deleted'.$image);
            return redirect()->route('show.slider')->with('messageDeleted','xóa thanh công');

  }
}
