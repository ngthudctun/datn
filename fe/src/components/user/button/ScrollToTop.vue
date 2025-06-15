<template>
    <button class="scroll-to-top" :class="{ show: showScrollTop }" @click="scrollToTop">
        <i class="fa-light fa-arrow-up"></i>
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
    background: var(--gradient-primary);
    /* --primary-red */
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    font-size: 1rem;
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
    background: var(--gradient-primary);
    /* --dark-red */
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
}
</style>