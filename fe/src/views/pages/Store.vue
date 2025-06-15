<template>
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <!-- Categories -->
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Danh mục</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading" :class="{ active: selectedCategory === 'women' }">
                                            <a data-toggle="collapse" data-target="#collapseOne"
                                                @click="selectCategory('women')">Women</a>
                                        </div>
                                        <div id="collapseOne" class="collapse"
                                            :class="{ show: selectedCategory === 'women' }"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('coats')">Coats</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jackets')">Jackets</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('dresses')">Dresses</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('shirts')">Shirts</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('t-shirts')">T-shirts</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jeans')">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading" :class="{ active: selectedCategory === 'men' }">
                                            <a data-toggle="collapse" data-target="#collapseTwo"
                                                @click="selectCategory('men')">Men</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse"
                                            :class="{ show: selectedCategory === 'men' }"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('coats')">Coats</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jackets')">Jackets</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('dresses')">Dresses</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('shirts')">Shirts</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('t-shirts')">T-shirts</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jeans')">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading" :class="{ active: selectedCategory === 'kids' }">
                                            <a data-toggle="collapse" data-target="#collapseThree"
                                                @click="selectCategory('kids')">Kids</a>
                                        </div>
                                        <div id="collapseThree" class="collapse"
                                            :class="{ show: selectedCategory === 'kids' }"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('coats')">Coats</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jackets')">Jackets</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('dresses')">Dresses</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('shirts')">Shirts</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('t-shirts')">T-shirts</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jeans')">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading"
                                            :class="{ active: selectedCategory === 'accessories' }">
                                            <a data-toggle="collapse" data-target="#collapseFour"
                                                @click="selectCategory('accessories')">Accessories</a>
                                        </div>
                                        <div id="collapseFour" class="collapse"
                                            :class="{ show: selectedCategory === 'accessories' }"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('coats')">Coats</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jackets')">Jackets</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('dresses')">Dresses</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('shirts')">Shirts</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('t-shirts')">T-shirts</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jeans')">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading" :class="{ active: selectedCategory === 'cosmetic' }">
                                            <a data-toggle="collapse" data-target="#collapseFive"
                                                @click="selectCategory('cosmetic')">Cosmetic</a>
                                        </div>
                                        <div id="collapseFive" class="collapse"
                                            :class="{ show: selectedCategory === 'cosmetic' }"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('coats')">Coats</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jackets')">Jackets</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('dresses')">Dresses</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('shirts')">Shirts</a></li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('t-shirts')">T-shirts</a>
                                                    </li>
                                                    <li><a href="#"
                                                            @click.prevent="selectSubCategory('jeans')">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Filter by Price -->
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Lọc theo giá</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div ref="slider" class="price-range"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" :value="formatPrice(minPrice)" readonly>
                                        <input type="text" :value="formatPrice(maxPrice)" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Filter by Color -->
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Màu sắc</h4>
                            </div>
                            <div class="size__list color__list">
                                <label v-for="color in colors" :key="color.id" :for="color.id">
                                    {{ color.name }}
                                    <input type="checkbox" :id="color.id" v-model="selectedColors" :value="color.id"
                                        @change="applyFilter">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <!-- Filter by Rating -->
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Đánh giá</h4>
                            </div>
                            <div class="size__list review">
                                <label v-for="rating in ratings" :key="rating.value" :for="'rating-' + rating.value">
                                    <span class="rating">
                                        <i v-for="star in 5" :key="star"
                                            :class="star <= rating.value ? 'fa fa-star' : 'fa-light fa-star'"></i>
                                    </span>
                                    <input type="checkbox" :id="'rating-' + rating.value" v-model="selectedRatings"
                                        :value="rating.value" @change="applyFilter">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <!-- Sort Section -->
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="shop__product__option">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__left">
                                            <p>Hiển thị {{ products.length }} sản phẩm</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__right">
                                            <p>Sắp xếp theo:</p>
                                            <select v-model="sortBy" @change="sortProducts">
                                                <option value="default">Mặc định</option>
                                                <option value="name-asc">Tên A-Z</option>
                                                <option value="name-desc">Tên Z-A</option>
                                                <option value="price-asc">Giá thấp - cao</option>
                                                <option value="price-desc">Giá cao - thấp</option>
                                                <option value="rating-desc">Đánh giá cao nhất</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="row" v-if="loading">
                        <div class="col-12 text-center">
                            <p>Đang tải sản phẩm...</p>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4" v-for="product in products" :key="product.id">
                            <div class="product__item" :class="{ 'sale': product.onSale }">
                                <div class="product__item__pic set-bg"
                                    :style="{ backgroundImage: 'url(' + $imageUrl + product.image + ')' }">
                                    <div v-if="product.isNew" class="label new">New</div>
                                    <div v-if="product.onSale" class="label">Sale</div>
                                    <div v-if="product.outOfStock" class="label stockout stockblue">Out Of Stock</div>
                                    <ul class="product__hover">
                                        <li><a :href="product.image" class="image-popup"><span
                                                    class="arrow_expand"></span></a></li>
                                        <li><a href="#" @click.prevent="addToWishlist(product)"><span
                                                    class="icon_heart_alt"></span></a></li>
                                        <li><a href="#" @click.prevent="addToCart(product)"><span
                                                    class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ product.name }}</a></h6>
                                    <div class="rating">
                                        <i v-for="star in 5" :key="star"
                                            :class="star <= product.rating ? 'fa fa-star' : 'fa-light fa-star'"></i>
                                    </div>
                                    <div class="product__price">
                                        $ {{ product.price }}
                                        <span v-if="product.originalPrice">$ {{ product.originalPrice }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="row" v-if="!loading && products.length > 0">
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#" @click.prevent="changePage(currentPage - 1)" v-if="currentPage > 1"><i
                                        class="fa fa-angle-left"></i></a>
                                <a v-for="page in visiblePages" :key="page" :class="{ active: page === currentPage }"
                                    @click.prevent="changePage(page)" href="#">{{ page }}</a>
                                <a href="#" @click.prevent="changePage(currentPage + 1)"
                                    v-if="currentPage < totalPages"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
</template>

<script>
import axios from 'axios'

export default {
    name: 'Store',
    data() {
        return {
            min: 3000,
            max: 100000,
            minPrice: 3000,
            maxPrice: 100000,
            products: [],
            originalProducts: [],
            loading: true,
            sortBy: 'default',
            currentPage: 1,
            productsPerPage: 12, // Đồng bộ với API (12 sản phẩm/trang)
            totalPages: 1,
            nextPageUrl: null,
            prevPageUrl: null,
            selectedCategory: null,
            selectedSubCategory: null,
            selectedColors: [],
            selectedRatings: [],
            colors: [
                { id: 'black', name: 'Đen' },
                { id: 'white', name: 'Trắng' },
                { id: 'red', name: 'Đỏ' },
                { id: 'grey', name: 'Xám' },
                { id: 'blue', name: 'Xanh dương' },
                { id: 'beige', name: 'Be' },
                { id: 'green', name: 'Xanh lá' },
                { id: 'yellow', name: 'Vàng' }
            ],
            ratings: [
                { value: 5 },
                { value: 4 },
                { value: 3 },
                { value: 2 },
                { value: 1 }
            ]
        }
    },
    computed: {
        visiblePages() {
            // Giới hạn số trang hiển thị (ví dụ: 5 trang xung quanh trang hiện tại)
            const maxPages = 5;
            const half = Math.floor(maxPages / 2);
            let start = Math.max(1, this.currentPage - half);
            let end = Math.min(this.totalPages, start + maxPages - 1);
            if (end - start + 1 < maxPages) {
                start = Math.max(1, end - maxPages + 1);
            }
            return Array.from({ length: end - start + 1 }, (_, i) => start + i);
        }
    },
    async mounted() {
        // Khởi tạo jQuery UI slider
        $(this.$refs.slider).slider({
            range: true,
            min: this.min,
            max: this.max,
            values: [this.min, this.max],
            slide: (event, ui) => {
                this.minPrice = ui.values[0];
                this.maxPrice = ui.values[1];
                this.applyFilter();
            }
        });

        // Load products from API
        await this.loadProducts();
    },
    methods: {
        async loadProducts(page = 1) {
            try {
                this.loading = true;
                // Xây dựng query parameters
                const params = {
                    page,
                    min_price: this.minPrice,
                    max_price: this.maxPrice,
                    category: this.selectedCategory,
                    sub_category: this.selectedSubCategory,
                    colors: this.selectedColors.join(','),
                    ratings: this.selectedRatings.join(',')
                };

                // Gọi API với các tham số
                const response = await axios.get('/api/products', { params });

                // Ánh xạ dữ liệu API
                this.originalProducts = response.data.data.map(item => ({
                    id: item.id,
                    name: item.product_name,
                    price: item.sale_price || item.regular_price || 0,
                    originalPrice: item.regular_price && item.sale_price ? item.regular_price : null,
                    rating: item.rating || 5, // Mặc định nếu không có
                    image: item.image,
                    isNew: item.is_new || false,
                    onSale: !!item.sale_price,
                    outOfStock: item.out_of_stock || false
                }));

                // Cập nhật thông tin phân trang
                this.currentPage = response.data.current_page;
                this.totalPages = response.data.last_page;
                this.nextPageUrl = response.data.next_page_url;
                this.prevPageUrl = response.data.prev_page_url;
                this.products = this.originalProducts; // API đã xử lý phân trang
                this.loading = false;
            } catch (error) {
                console.error('Lỗi khi gọi API products:', error);
                // Fallback to mock data
                this.originalProducts = this.getMockProducts();
                this.products = this.originalProducts;
                this.totalPages = Math.ceil(this.originalProducts.length / this.productsPerPage);
                this.loading = false;
            }
        },

        getMockProducts() {
            return [
                {
                    id: 1,
                    name: 'Furry hooded parka',
                    price: 59.0,
                    originalPrice: null,
                    rating: 5,
                    image: 'img/shop/shop-1.jpg',
                    isNew: true,
                    onSale: false,
                    outOfStock: false
                },
                // ... các sản phẩm mẫu khác
            ];
        },

        sortProducts() {
            let sortedProducts = [...this.originalProducts];

            switch (this.sortBy) {
                case 'name-asc':
                    sortedProducts.sort((a, b) => a.name.localeCompare(b.name));
                    break;
                case 'name-desc':
                    sortedProducts.sort((a, b) => b.name.localeCompare(a.name));
                    break;
                case 'price-asc':
                    sortedProducts.sort((a, b) => a.price - b.price);
                    break;
                case 'price-desc':
                    sortedProducts.sort((a, b) => b.price - a.price);
                    break;
                case 'rating-desc':
                    sortedProducts.sort((a, b) => b.rating - a.rating);
                    break;
                default:
                    break;
            }

            this.originalProducts = sortedProducts;
            this.currentPage = 1;
            this.products = this.originalProducts;
        },

        async changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                await this.loadProducts(page);
            }
        },

        formatPrice(value) {
            return Math.round(value / 1000) + 'K';
        },

        selectCategory(category) {
            this.selectedCategory = this.selectedCategory === category ? null : category;
            this.selectedSubCategory = null;
            this.currentPage = 1;
            this.loadProducts();
        },

        selectSubCategory(subCategory) {
            this.selectedSubCategory = this.selectedSubCategory === subCategory ? null : subCategory;
            this.currentPage = 1;
            this.loadProducts();
        },

        async applyFilter() {
            console.log(`Lọc: Giá từ ${this.minPrice} đến ${this.maxPrice}, Màu: ${this.selectedColors}, Đánh giá: ${this.selectedRatings}`);
            this.currentPage = 1;
            await this.loadProducts();
        },

        addToWishlist(product) {
            console.log('Added to wishlist:', product);
            // Implement wishlist logic
        },

        addToCart(product) {
            console.log('Added to cart:', product);
            // Implement cart logic
        }
    }
}
</script>

<style>
/* Style giữ nguyên và bổ sung */
.shop__product__option {
    margin-bottom: 30px;
    padding: 20px 0;
    border-bottom: 1px solid #f2f2f2;
}

.shop__product__option__left p {
    color: #111111;
    font-weight: 600;
    margin: 0;
}

.shop__product__option__right {
    text-align: right;
}

.shop__product__option__right p {
    color: #111111;
    font-weight: 600;
    margin: 0;
    display: inline-block;
    margin-right: 15px;
}

.shop__product__option__right select {
    border: 1px solid #f2f2f2;
    padding: 8px 15px;
    border-radius: 4px;
    color: #111111;
    font-size: 14px;
    min-width: 180px;
}

.shop__product__option__right select:focus {
    outline: none;
    border-color: #ca1515;
}


@media (max-width: 768px) {

    .shop__product__option__left,
    .shop__product__option__right {
        text-align: center;
        margin-bottom: 15px;
    }

    .shop__product__option__right {
        text-align: center;
    }
}
</style>