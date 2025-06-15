<template>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Sản phẩm mới</h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
                <div v-for="product in products" :key="product.id" class="col-lg-3 col-md-4 col-sm-6 mix"
                    :class="getCategoryClass(product.category_id)">
                    <router-link :to="'/san-pham/' + product.slug" class="product__item">
                        <div class="product__item__pic set-bg"
                            :style="{ backgroundImage: 'url(' + $imageUrl + product.image + ')' }">
                            <div v-if="isNewProduct(product.created_at)" class="label new">New</div>
                            <ul class="product__hover">
                                <li>
                                    <WishlistButton :product-id="product.id"
                                        :initial-wishlisted="product.is_wishlisted" />
                                </li>
                                <li>
                                    <router-link to="/gio-hang">
                                        <span class="fa-light fa-cart-shopping"></span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="'/thanh-toan/' + product.slug">
                                        <span class="fal fa-bag-shopping"></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <router-link :to="'/san-pham/' + product.slug">{{ truncateName(product.product_name)
                                    }}</router-link>
                            </h6>
                            <div class="rating">
                                <!-- Giả định rating không có trong dữ liệu, mặc định 5 sao -->
                                <i v-for="star in 5" :key="star" class="fa fa-star"></i>
                            </div>
                            <div class="product__price">
                                <!-- Giả định giá không có trong dữ liệu, cần thêm trường price -->
                                {{ product.price ? (product.price | formatPrice) : 'Liên hệ' }}
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import WishlistButton from '@/components/user/button/WishlistButton.vue';

export default {
    name: 'New',
    components: {
        WishlistButton
    },
    data() {
        return {
            products: [], // Lưu danh sách sản phẩm từ API
            isLoading: false
        };
    },
    created() {
        this.fetchLatestProducts();
    },
    methods: {
        async fetchLatestProducts() {
            this.isLoading = true;
            try {
                const response = await axios.get('/api/products/latest');
                this.products = response.data;
            } catch (error) {
                console.error('Lỗi khi lấy sản phẩm mới:', error);
            } finally {
                this.isLoading = false;
            }
        },
        getCategoryClass(categoryId) {
            // Ánh xạ category_id thành các class như women, men, kid, accessories, cosmetic
            const categoryMap = {
                2: 'kid', // Giả định category_id 2 là kid
                // Thêm các ánh xạ khác nếu cần
            };
            return categoryMap[categoryId] || 'accessories';
        },
        isNewProduct(createdAt) {
            // Kiểm tra sản phẩm có phải là mới (ví dụ: trong vòng 7 ngày)
            const createdDate = new Date(createdAt);
            const now = new Date();
            const diffDays = (now - createdDate) / (1000 * 60 * 60 * 24);
            return diffDays <= 7;
        },
        truncateName(name) {
            // Cắt ngắn tên sản phẩm nếu quá dài
            return name.length > 50 ? name.substring(0, 50) + '...' : name;
        }
    },
    filters: {
        formatPrice(value) {
            return `$${Number(value).toFixed(1)}`; // Định dạng giá
        }
    }
};
</script>
<style scoped></style>