<template>
    <section class="category-section py-5">
        <div class="container">
            <div class="section-title mb-4">
                <h4>Danh mục</h4>
            </div>
            <div class="owl-carousel owl-theme" ref="owlCarousel">
                <div class="item" v-for="(group, index) in groupedCategories" :key="index">
                    <div class="category-grid">
                        <router-link :to="cat.slug" class="category-item" v-for="cat in group" :key="cat.category_name + cat.image">
                            <div class="p-3 text-center h-100 d-flex flex-column align-items-center">
                                <img :src="$imageUrl + cat.image" :alt="cat.category_name" class="img-fluid mb-2"
                                    style="height: 100px; object-fit: cover; width: 100%; max-width: 120px;" />
                                <h6 class="fw-semibold mt-auto">{{ cat.category_name }}</h6>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: "Categories",
    data() {
        return {
            categories: [], // ban đầu rỗng, sẽ được gán sau từ API
        };
    },
    computed: {
        groupedCategories() {
            const groups = [];
            for (let i = 0; i < this.categories.length; i += 4) {
                groups.push(this.categories.slice(i, i + 4));
            }
            return groups;
        },
    },
    methods: {
        async fetchCategories() {
            try {
                const res = await axios.get('/api/categories');
                this.categories = res.data.data; // đảm bảo API trả về mảng trong `data`
                console.log(this.categories)
                this.initOwlCarousel(); // khởi tạo sau khi gán data
            } catch (err) {
                console.error("Lỗi khi tải danh mục:", err);
            }
        },
        initOwlCarousel() {
            this.$nextTick(() => {
                $(this.$refs.owlCarousel).owlCarousel({
                    loop: true,
                    margin: 4,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 10000,
                    autoplayHoverPause: true,
                    items: 1,
                    responsive: {
                        0: { items: 1 },
                        576: { items: 1.5 },
                        768: { items: 2 },
                        992: { items: 3 },
                        1200: { items: 4 }
                    }
                });
            });
        }
    },
    mounted() {
        this.fetchCategories(); // Gọi API khi component mount
    }
};

</script>
<style scoped>
.category-grid {
    display: grid !important;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, auto);
    gap: 4px;
}

.category-item {
    cursor: pointer;
    border: none;
    &:hover{
        box-shadow: var(--box-shadow);
    }
}

.category-item:hover img {
    transition: transform 0.3s ease;
    transform: scale(1.1);
}

.category-section:hover :deep(.owl-nav button.owl-prev),
.category-section:hover :deep(.owl-nav button.owl-next) {
    opacity: 1;
}

:deep(.owl-carousel .owl-nav button.owl-prev),
:deep(.owl-carousel .owl-nav button.owl-next) {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #000;
    border: none;
    padding: 4px 15px !important;
    border-radius: 50%;
    cursor: pointer;
    font-size: 18px;
    z-index: 10;
    opacity: 0;
    transition: all .3s ease;
    background: var(--gradient-gray);
}

:deep(.owl-carousel .owl-nav button.owl-prev) {
    left: -50px;
}

:deep(.owl-carousel .owl-nav button.owl-next) {
    right: -50px;
}

</style>