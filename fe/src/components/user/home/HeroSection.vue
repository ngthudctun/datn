<template>
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item">
                        <!-- Layer cũ -->
                        <div class="slide" :style="{ backgroundImage: 'url(' + images[prevIndex] + ')' }"
                            :class="{ 'fade-out': isTransitioning }"></div>
                        <!-- Layer mới -->
                        <div class="slide" :style="{ backgroundImage: 'url(' + images[currentIndex] + ')' }"
                            :class="{ 'fade-in': isTransitioning }">
                        </div>

                        <button @click="prevSlide" class="btn-slide prev">‹</button>
                        <button @click="nextSlide" class="btn-slide next">›</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0" v-for="(item, index) in categories" :key="index">
                            <div class="categories__item"
                                :style="{ backgroundImage: 'url(' + $baseImageUrl + item.image + ')' }">
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
    name: "HeroSection",
    data() {
        return {
            categories: [
                { title: "Men’s fashion", count: 358, image: "categories/category-2.jpg" },
                { title: "Kid’s fashion", count: 273, image: "categories/category-3.jpg" },
                { title: "Cosmetics", count: 159, image: "categories/category-4.jpg" },
                { title: "Accessories", count: 792, image: "categories/category-5.jpg" },
            ],
            currentIndex: 0,
            prevIndex: 0,
            isTransitioning: false,
            images: [
                "http://localhost:8000/storage/images/categories/category-1.jpg",
                "http://localhost:8000/storage/images/categories/category-2.jpg",
                "http://localhost:8000/storage/images/categories/category-3.jpg",
            ],
            titles: [
                "Women’s fashion",
                "Men’s fashion",
                "Kid’s fashion",
            ],
            descriptions: [
                "Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.",
                "358 items",
                "273 items",
            ],
            $baseImageUrl: "http://localhost:8000/storage/images/",
            autoSlideInterval: null,
        };
    },
    methods: {
        nextSlide() {
            if (this.isTransitioning) return; // tránh nhấn liên tục
            this.prevIndex = this.currentIndex;
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
            this.transitionEffect();
        },
        prevSlide() {
            if (this.isTransitioning) return;
            this.prevIndex = this.currentIndex;
            this.currentIndex =
                (this.currentIndex - 1 + this.images.length) % this.images.length;
            this.transitionEffect();
        },
        transitionEffect() {
            this.isTransitioning = true;
            setTimeout(() => {
                this.isTransitioning = false;
            }, 600); // thời gian hiệu ứng fade, trùng với CSS
        },
        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.nextSlide();
            }, 2000); // 2 giây
        },
        stopAutoSlide() {
            clearInterval(this.autoSlideInterval);
            this.autoSlideInterval = null;
        },
    },
    mounted() {
        this.startAutoSlide();
    },
    beforeUnmount() {
        this.stopAutoSlide();
    },
};
</script>

<style scoped>
.categories__large__item {
    position: relative;
    overflow: hidden;
    color: white;
    padding: 20px;
}

.categories__large__item:hover .btn-slide {
    opacity: 1;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    transition: opacity 0.6s ease;
    opacity: 1;
    z-index: 0;
}

.slide.fade-in {
    opacity: 0;
    animation: fadeIn 0.6s forwards;
    z-index: 2;
}

.slide.fade-out {
    opacity: 1;
    animation: fadeOut 0.6s forwards;
    z-index: 1;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    to {
        opacity: 0;
    }
}

.categories__text {
    position: relative;
    z-index: 3;
    max-width: 400px;
    margin-top: 100px;
}

.btn-slide {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.3);
    border: none;
    color: white;
    font-size: 2rem;
    padding: 0 15px;
    cursor: pointer;
    user-select: none;
    z-index: 4;
    opacity: 0;
    transition: all 0.3s ease;
}

.prev {
    left: 0px;
}

.next {
    right: 0px;
}
</style>
