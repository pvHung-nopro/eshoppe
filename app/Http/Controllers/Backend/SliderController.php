<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SliderService;
use Illuminate\Http\Request;
use Auth;

class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService ;
    }
    public function createSlider()
    {
        if(Auth::check()){
            return view('backends.slider.create_slider');
        }else{
            return redirect()->route('get.login.admin');
        }
    }
    public function postCreateSilder(Request $request)
    {
       $createSlider =   $this->sliderService->createFile($request);
       return  $createSlider;
    }

    public function showSlider()
    {
        // $allSlider = $this->sliderService->showSliders();
        // dd($allSlider);
        if(Auth::check()){
            $allSlider = $this->sliderService->showSliders();
            return view('backends.slider.show_slider',[
                'allSlider' => $allSlider ?? null
            ]);
        }else{
            return redirect()->route('get.login.admin');
        }
    }

    public function postUpdateStatus($id)
    {
           if(Auth::check()){
               $statusSliders = $this->sliderService->updateSlider($id);
               return redirect()->route('show.slider');
           }else{
            return redirect()->route('get.login.admin');
           }
    }

    public function editSlider($id)
    {
          if(Auth::check()){
              $editSliders = $this->sliderService->editSliders($id);
              return view('backends.slider.edit_slider',[
                  'id'=>$id,
                  'editSliders'=>$editSliders ?? null
              ]);
          }else{
            return redirect()->route('get.login.admin');
          }
    }

    public function postEditSlider(Request $request,$id,$image)
    {

    return  $this->sliderService->postEdit($request,$id,$image);

    }

    public function deletedSlider($id)
    {
     return     $this->sliderService->deleteSliders($id);
    }
}
