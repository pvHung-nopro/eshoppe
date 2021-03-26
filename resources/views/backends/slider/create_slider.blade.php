@extends('backends.dashboard.section')
@section('main')
<section id="main-content">
	<section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                        <section class="panel">

<div class="panel-body">
    <div class="position-center">
        @if(session()->has('messageImage'))
        <div class="invalid-feedback">
             {{session()->get('messageImage')}}
          </div>
        @endif
        <form role="form" action="{{Route('post.create.slider')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Title</label>

                    <input class=" form-control" id="cname" name="title" minlength="2" type="text" required="">

            </div>
            <div class="form-group">
                <div class="form-check">
                     <label for="exampleInputFile">show home</label>
                     <br/>
                    <input class="form-check-input" type="radio" name="sliderHome" value="1" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sliderHome" value="0" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                     No
                    </label>
                  </div>

                </div>
                <div class="form-group">
                    <label for="exampleInputFile">select image</label>
                    <input type="file" id="exampleInputFile" name="imageSlider" >

                </div>
                <button type="submit" class="btn btn-info">create</button>
            </div>




    </form>
    </div>

</div>

</div>
</div>
</div>
    </section>
    </section>
</section>
@endsection
