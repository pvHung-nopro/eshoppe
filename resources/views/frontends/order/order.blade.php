<?php
//   if(empty(session()->get('cart'))){
//       return redirect()->route()
//   }
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang Chủ</font></font></a></li>
              <li class="active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thủ tục thanh toán</font></font></li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bước 1</font></font></h2>
        </div>
        <div class="checkout-options">
            <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Người dùng mới</font></font></h3>
            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tùy chọn thanh toán</font></font></p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> đăng ký tài khoản</font></font></label>
                </li>
                <li>
                    <label><input type="checkbox"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Thanh toán của khách</font></font></label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Huỷ bỏ</font></font></a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui lòng sử dụng Đăng ký và Thanh toán để dễ dàng truy cập vào lịch sử đơn đặt hàng của bạn hoặc sử dụng Thanh toán với tư cách Khách</font></font></p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <form action="{{Route('frontend.cart.post')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-sm-3">

             <div class="shopper-info">

                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thông tin người mua hàng</font></font></p>

                    <input id="phone" class="form_two_zz" type="text" name="phone"  value=""  placeholder="phone">
                    <input id="address" class="form_two_zz" type="text" name="address" value=""  placeholder="Địa chỉ ">

            </div>



                </div>
                <div class="col-sm-4 clearfix">
                    <div class="bill-to">
                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa đơn để</font></font></p>
                        <div class="form-one">
                            {{-- <form> --}}

                                {{-- <input id="email" class="form_two_zz" type="text"  value=""  placeholder="E-mail*"> --}}
                                {{-- <input id="phone" class="form_two_zz" type="text"  value=""  placeholder="phone">
                                <input id="address" class="form_two_zz" type="text"  value=""  placeholder="Địa chỉ "> --}}
                                <textarea id="content" name="content"  value=""  placeholder="Ghi chú về đơn đặt hàng của bạn, Ghi chú đặc biệt khi giao hàng" rows="16"></textarea>
                        </div>
                        {{-- <div class="form-two">
                            <form>
                                <input type="text" placeholder="Mã Zip / Mã Bưu điện *">
                                <select>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-- Quốc gia --</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bangladesh</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vương quốc Anh</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ấn Độ</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pakistan</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ucrane</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Canada</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dubai</font></font></option>
                                </select>
                                <select>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">- Bang / Tỉnh / Vùng -</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bangladesh</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vương quốc Anh</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ấn Độ</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pakistan</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ucrane</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Canada</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dubai</font></font></option>
                                </select>
                                <input type="password" placeholder="Xác nhận mật khẩu">
                                <input type="text" placeholder="Điện thoại *">
                                <input type="text" placeholder="Điện thoại di động">
                                <input type="text" placeholder="Số fax">
                            </form>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Để vận chuyển</font></font></p>
                        {{-- <textarea id="content" name="message"  value=""  placeholder="Ghi chú về đơn đặt hàng của bạn, Ghi chú đặc biệt khi giao hàng" rows="16"></textarea> --}}
                        <label><input type="checkbox" value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Thanh toán khi nhận hàng </font></font></label>
                        <br/>
                        <label><input type="checkbox" value="2"> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Chuyển khoản trực tiếp</font></font></label>
                        <br/>
                        <label><input type="checkbox" value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Paypal</font></font></label>
                        <br/>
                        <a class="btn btn-primary" href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lấy một lời trích dẫn</font></font></a>
                        <button type="summit
                        " id="checkout" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tiếp tục</font></font></button>

                    </div>
                </div>

            </div>
            </form>
        </div>
        <div class="review-payment">
            <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Xem lại &amp; Thanh toán</font></font></h2>
        </div>

        @include('frontends.cart.table_cart')


        <div class="payment-options">
                <span>
                    <label><input type="checkbox"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Chuyển khoản trực tiếp</font></font></label>
                </span>
                <span>
                    <label><input type="checkbox"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Kiểm tra thanh toán</font></font></label>
                </span>
                <span>
                    <label><input type="checkbox"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Paypal</font></font></label>
                </span>
            </div>
    </div>
</section>
