<template>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Sản phẩm mới</h4>
                    </div>
                </div>
                <!-- <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".women">Women’s</li>
                        <li data-filter=".men">Men’s</li>
                        <li data-filter=".kid">Kid’s</li>
                        <li data-filter=".accessories">Accessories</li>
                        <li data-filter=".cosmetic">Cosmetics</li>
                    </ul>
                </div> -->
            </div>
            <div class="row property__gallery">
                <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                    <router-link to="/cua-hang" class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg"
                            :style="{ backgroundImage: 'url(' + $imageUrl + 'product/product-1.jpg)' }">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li>
                                    <router-link to="img/product/product-1.jpg">
                                        <span class="fa-light fa-heart"></span>
                                    </router-link>
                                </li>
                                <li><router-link to="/"><span class="fa-light fa-cart-shopping"></span></router-link>
                                </li>
                                <li><router-link to="/"><span class="fal fa-credit-card"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Buttons tweed blazerButtons tweed blazerButtons tweed
                                    blazerButtons tweed blazerButtons tweed blazerButtons tweed blazerButtons tweed
                                    blazerButtons tweed blazerButtons tweed blazer</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </router-link>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix men">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-2.jpg">
                                        <span class="fa-light fa-heart"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Flowy striped skirt</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix accessories">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <div class="label stockout">out of stock</div>
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-3.jpg"><span
                                            class="arrow_expand"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Cotton T-Shirt</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-4.jpg"><span
                                            class="arrow_expand"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Slim striped pocket shirt</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix kid">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-5.jpg">
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-5.jpg"><span
                                            class="arrow_expand"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Fit micro corduroy shirt</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-6.jpg">
                            <div class="label sale">Sale</div>
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-6.jpg"><span
                                            class="arrow_expand"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Tropical Kimono</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-7.jpg"><span
                                            class="arrow_expand"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Contrasting sunglasses</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-8.jpg">
                            <div class="label">Sale</div>
                            <ul class="product__hover">
                                <li><router-link to="img/product/product-8.jpg"><span
                                            class="arrow_expand"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_heart_alt"></span></router-link></li>
                                <li><router-link to="/"><span class="icon_bag_alt"></span></router-link></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><router-link to="/">Water resistant backpack</router-link></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'New',
}
</script>

<style></style>