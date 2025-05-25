<template>
    <section class="category-section py-5">
        <div class="container">
            <div class="section-title mb-4">
                <h4>Danh mục</h4>
            </div>
            <div class="owl-carousel owl-theme" ref="owlCarousel">
                <div class="item" v-for="(group, index) in groupedCategories" :key="index">
                    <div class="category-grid">
                        <a href="" class="category-item" v-for="cat in group" :key="cat.name + cat.img">
                            <div class="p-3 text-center h-100 d-flex flex-column align-items-center">
                                <img :src="cat.img" :alt="cat.name" class="img-fluid mb-2"
                                    style="height: 100px; object-fit: cover; width: 100%; max-width: 120px;" />
                                <h6 class="fw-semibold mt-auto">{{ cat.name }}</h6>
                            </div>
                        </a>
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
            for (let i = 0; i < this.categories.length; i += 4) {
                groups.push(this.categories.slice(i, i + 4));
            }
            return groups;
        },
    },
    mounted() {
        // Khởi tạo Owl Carousel trên phần tử ref
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
}

.category-item:hover img {
    transition: transform 0.3s ease;
    transform: scale(1.05);
}

.category-section:hover ::v-deep(.owl-nav button.owl-prev),
.category-section:hover ::v-deep(.owl-nav button.owl-next) {
    opacity: 1;
}


::v-deep .owl-carousel .owl-nav button.owl-prev,
::v-deep .owl-carousel .owl-nav button.owl-next {
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
    background: #e1e1e1;
}

::v-deep .owl-carousel .owl-nav button.owl-prev {
    left: -50px;
}

::v-deep .owl-carousel .owl-nav button.owl-next {
    right: -50px;
}
</style>
