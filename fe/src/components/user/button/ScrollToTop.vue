<template>
    <button class="scroll-to-top" :class="{ show: showScrollTop }" @click="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </button>
</template>

<script>
export default {
    name: 'ScrollToTop',
    data() {
        return {
            showScrollTop: false,
        };
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        },
        handleScroll() {
            this.showScrollTop = window.pageYOffset > 300;
        },
    },
};
</script>

<style scoped>
.scroll-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #dc3545;
    /* --primary-red */
    color: white;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(100px);
}

.scroll-to-top.show {
    opacity: 1;
    transform: translateY(0);
}

.scroll-to-top:hover {
    background: #c82333;
    /* --dark-red */
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
}
</style>