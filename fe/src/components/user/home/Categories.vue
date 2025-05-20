<template>
    <section class="category-section py-5">
        <div class="container">
            <div class="section-title mb-4">
                <h4>Danh mục</h4>
            </div>
            <div class="owl-carousel owl-theme" ref="owlCarousel">
                <div class="item" v-for="(group, index) in groupedCategories" :key="index">
                    <div class="category-grid">
                        <div class="category-item" v-for="cat in group" :key="cat.name + cat.img">
                            <div class="p-3 border rounded text-center h-100 d-flex flex-column align-items-center">
                                <img :src="cat.img" :alt="cat.name" class="img-fluid mb-2"
                                    style="height: 100px; object-fit: cover; width: 100%; max-width: 120px;" />
                                <h6 class="fw-semibold mt-auto">{{ cat.name }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            categories: [
                { name: "Áo Thun", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Quần Jean", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Giày", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Túi Xách", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Mũ", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Đồng Hồ", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Áo Thun 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Quần Jean 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Giày 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Túi Xách 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Mũ 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Đồng Hồ 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Áo Thun", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Quần Jean", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Giày", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Túi Xách", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Mũ", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Đồng Hồ", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Áo Thun 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Quần Jean 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Giày 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Túi Xách 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Mũ 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
                { name: "Đồng Hồ 2", img: "https://cdn-imgix.headout.com/tour/7064/TOUR-IMAGE/b2c74200-8da7-439a-95b6-9cad1aa18742-4445-dubai-img-worlds-of-adventure-tickets-02.jpeg?auto=format&w=900&h=562.5&q=90&fit=crop&ar=16%3A10" },
            ],
        };
    },
    computed: {
        groupedCategories() {
            const groups = [];
            for (let i = 0; i < this.categories.length; i += 12) {
                groups.push(this.categories.slice(i, i + 12));
            }
            return groups;
        },
    },
    mounted() {
        // Khởi tạo Owl Carousel trên phần tử ref
        $(this.$refs.owlCarousel).owlCarousel({
            loop: true,
            margin: 10,
            nav: true,          // nút prev/next
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            items: 1,           // 1 slide hiển thị 12 mục (grid 2 hàng 6 cột)
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                }
            }
        });
    },
};
</script>

<style scoped>
.category-grid {
    display: grid !important;
    grid-template-columns: repeat(6, 1fr);
    /* 6 cột */
    grid-template-rows: repeat(2, auto);
    /* 2 hàng */
    gap: 15px;
}

.category-item {
    /* Style mỗi mục */
    cursor: pointer;
    transition: transform 0.3s ease;
}

.category-item:hover {
    transform: scale(1.05);
}

::v-deep .owl-carousel .owl-nav button.owl-prev,
::v-deep .owl-carousel .owl-nav button.owl-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.1);
    color: white;
    border: none;
    padding: 4px 15px !important;
    border-radius: 50%;
    cursor: pointer;
    font-size: 18px;
    z-index: 10;
    transition: all .3s ease;
    &:hover {
        background: rgba(0, 0, 0, 0.5);
    }
}

::v-deep .owl-carousel .owl-nav button.owl-prev {
    left: -50px;
}

::v-deep .owl-carousel .owl-nav button.owl-next {
    right: -50px;
}
</style>
