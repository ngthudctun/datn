<template>
    <div>
        <HeroSection />
        <Categories />
        <New />
        <Suggesstion />
    </div>
</template>

<script>
import HeroSection from '@/components/user/home/HeroSection.vue';
import Banner from '@/components/user/home/Banner.vue';
import Categories from '@/components/user/home/Categories.vue';
import New from '@/components/user/home/New.vue';
import Suggesstion from '@/components/user/home/Suggestion.vue';

export default {
    name: 'Home',
    components: {
        HeroSection,
        Banner,
        Categories,
        New,
        Suggesstion,
        
    }
}
</script>

<style></style>