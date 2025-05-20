<template>
    <div>
        <HeroSection />
        <Categories />
        <New />
        <Banner/>
    </div>
</template>

<script>
import HeroSection from '@/components/user/home/HeroSection.vue';
import Banner from '@/components/user/home/Banner.vue';
import Categories from '@/components/user/home/Categories.vue';
import New from '@/components/user/home/New.vue';

export default {
    name: 'Home',
    components: {
        HeroSection,
        Banner,
        Categories,
        New,
        
    }
}
</script>

<style></style>