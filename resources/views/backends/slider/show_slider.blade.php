@extends('backends.dashboard.section')
@section('main')
<?php
    // dd($allSlider);
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Table Slider
    </div>
    {{-- <div class="row w3-res-tb">

    </div> --}}
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
          @if(session()->has('messageDeleted'))
          <p>{{session()->get('messageDeleted')}}</p>
          @endif
        <thead>
          <tr>
            {{-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> --}}
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      @foreach($allSlider as $item)
          <tr>
            {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
            <td><img style="height: 40px ; width: 50px"src="{{asset('frontend/images/home/'.$item->image)}}" /></td>
            <td><span class="text-ellipsis">{{$item->title ?? null }}</span></td>
            @if($item->status == '0')
            <td><span class="text-ellipsis"><a href="{{Route('post.update.status',$item->id)}}">

                <i class="fas fa-eye-slash"></i>
            </a></span></td>
            @else
            <td><span class="text-ellipsis"><a  href="{{Route('post.update.status',$item->id)}}"><i class="fas fa-eye"></i></a></span></td>
            @endif
            <td>
              <a href="{{Route('edit.slider',$item->id)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i>
               </a>
               <a onclick="alert('bạn có chắc muốn xóa không?')"
                href="{{Route('deleted.slider',$item->id)}}" class="active" ui-toggle-class=""><i class="fas fa-trash-alt"></i>
               </a>
            </td>
          </tr>
      @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{ $allSlider->links() }}
            {{-- <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li> --}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
@endsection
