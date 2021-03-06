@extends('backends.dashboard.section')
@section('main')
<?php
    // dd($users);
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Table Roles
    </div>
    {{-- <div class="row w3-res-tb">

    </div> --}}
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
          @if(session()->has('messgaeedit'))
          <p style="color:red;font-size:14px;text-align: center">{{session()->get('messgaeedit')}}</p>
          @endif
        <thead>
          <tr>
            {{-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> --}}

            <th>name</th>
            <th>display_name</th>


            <th style=""></th>
          </tr>
        </thead>
        <tbody>
      @foreach($allRoles as $item)
          <tr>
            {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}

            <td><span class="text-ellipsis">{{$item->name ?? null }}</span></td>
            <td><span class="text-ellipsis">{{$item->display_name?? null }}</span></td>

            {{-- <td><span class="text-ellipsis">{{$roles->name ?? null }}</span></td> --}}


            <td>
              <a href="{{Route('edit.roles',$item->id ?? null)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i>
               </a>
               <a onclick="alert('bạn có chắc muốn xóa không?')"
                href="{{Route('deleted.roles',$item->id ?? null)}}" class="active" ui-toggle-class=""><i class="fas fa-trash-alt"></i>
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
              @if($allRoles)
            {{ $allRoles->links() }}
               @endif
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
