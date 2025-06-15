<template>
    <section class="product product__suggest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Gợi ý cho bạn</h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery g-1">
                <router-link v-for="product in products" :key="product.id" :to="'/san-pham/' + product.slug"
                    class="col-lg-2 col-md-3 col-sm-6 p-1">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            :style="{ backgroundImage: `url(${$imageUrl + product.image})` }">
                            <div v-if="isNewProduct(product.created_at)" class="label new">New</div>
                            <ul class="product__hover">
                                <li>
                                    <WishlistButton :product-id="product.id"
                                        :initial-wishlisted="product.is_wishlisted" />
                                </li>
                                <li>
                                    <router-link to="/gio-hang">
                                        <i class="fa-light fa-cart-shopping"></i>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="'/thanh-toan/' + product.slug">
                                        <i class="fal fa-credit-card"></i>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <router-link :to="'/san-pham/' + product.slug">
                                    {{ truncateName(product.product_name) }}
                                </router-link>
                            </h6>
                            <div class="rating">
                                <i v-for="star in 5" :key="star" class="fa fa-star"></i>
                            </div>
                            <div class="product__price">
                                {{ product.price ? formatPrice(product.price) : 'Liên hệ' }}
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
            <div class="col-lg-12 text-center mt-3" v-if="nextPageUrl">
                <a href="#" class="primary-btn load-btn" @click.prevent="loadMore">Xem thêm</a>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import WishlistButton from '@/components/user/button/WishlistButton.vue';

export default {
    name: 'Suggesstion',
    components: {
        WishlistButton
    },
    data() {
        return {
            products: [],
            nextPageUrl: null,
        };
    },
    created() {
        this.fetchSuggestedProducts(); // Lấy trang đầu
    },
    methods: {
        async fetchSuggestedProducts(url = '/api/products') {
            try {
                const res = await axios.get(url);
                this.products.push(...res.data.data);
                this.nextPageUrl = res.data.next_page_url;
            } catch (err) {
                console.error('Lỗi khi gọi API sản phẩm gợi ý:', err);
            }
        },
        loadMore() {
            if (this.nextPageUrl) {
                this.fetchSuggestedProducts(this.nextPageUrl);
            }
        },
        isNewProduct(createdAt) {
            const created = new Date(createdAt);
            const now = new Date();
            const diffDays = (now - created) / (1000 * 60 * 60 * 24);
            return diffDays <= 7;
        },
        truncateName(name) {
            return name.length > 50 ? name.substring(0, 50) + '...' : name;
        },
        formatPrice(value) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(value);
        }
    }
};
</script>

<style scoped>
/* Tuỳ chỉnh thêm nếu cần */
</style>
