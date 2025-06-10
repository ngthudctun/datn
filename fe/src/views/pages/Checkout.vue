<template>
        <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="fa-light fa-tags"></span> <a href="#">Bạn có mã giảm giá?</a></h6>
                </div>
            </div>
            <form action="#" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Thông tin thanh toán</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Họ <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Tên <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Thành phố <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Tỉnh thành <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Địa chỉ <span>*</span></p>
                                    <input type="text" placeholder="Street Address">
                                    <input type="text" placeholder="Căn hộ, dãy phòng,... (không bắt buộc)">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Mã bưu điện (tuỳ chọn) <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Số điện thoại <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="note">
                                        Lưu ý về đơn hàng của bạn, ví dụ: số đặc biệt để giao hàng
                                        <input type="checkbox" id="note">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Ghi chú <span>*</span></p>
                                    <input type="text"
                                        placeholder="Lưu ý về đơn hàng của bạn">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Đơn hàng của bạn</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Sản phẩm</span>
                                        <span class="top__text__right">Tổng</span>
                                    </li>
                                    <li>01. Chain buck bag <span>$ 300.0</span></li>
                                    <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                    <li>03. Black jean <span>$ 170.0</span></li>
                                    <li>04. Cotton shirt <span>$ 110.0</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Subtotal <span>$ 750.0</span></li>
                                    <li>Total <span>$ 750.0</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="check-payment">
                                    Thanh toán khi giao hàng
                                    <input type="checkbox" id="check-payment">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    Momo
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Place oder</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
</template>

<script>
export default {
    name: 'CheckOut'
}
</script>

<style></style>