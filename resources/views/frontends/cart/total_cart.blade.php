<?php
//    dd($array_form);
?>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bạn thich lam gi tiêp theo?</font></font></h3>
            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chọn xem bạn có mã giảm giá hoặc điểm thưởng muốn sử dụng hoặc muốn ước tính chi phí giao hàng của mình.</font></font></p>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sử dụng mã phiếu giảm giá</font></font></label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sử dụng phiêu qua tặng</font></font></label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ước tính hàng &amp; Thuế</font></font></label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quốc gia:</font></font></label>
                            <select>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoa Kỳ</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bangladesh</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vương quốc Anh</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ấn Độ</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pakistan</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ucrane</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Canada</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dubai</font></font></option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vùng / Bang:</font></font></label>
                            <select>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lựa chọn</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dhaka</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">London</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dillih</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lahore</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alaska</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Canada</font></font></option>
                                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dubai</font></font></option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mã Bưu Chính:</font></font></label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lấy một lời trích dẫn</font></font></a>
                    <a class="btn btn-default check_out" href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tiếp tục</font></font></a>
                </div>
            </div> --}}
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                    <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total product </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$array_form['total_qty'] ??null }}</font></font></span></li>
                    <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Total cost </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">${{$array_form['total_cart'] ?? null }}</font></font></span></li>
                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Shipping Cost </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Miễn phí</font></font></span></li>
                        <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$</font></font></span></li>
                    </ul>
             <?php

               if(empty(session()->get('cart')) == false )
               {
             ?>

                <a class="btn btn-default check_out" href="{{Route('fontend.cart.order')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thủ tục thanh toán</font></font></a>

               @php
               }
               @endphp

                </div>
            </div>
        </div>
    </div>
</section>
