<template>
    <div>
        <Banner/>
        <Categories />
    </div>
</template>

<script>
import Banner from '@/components/user/home/Banner.vue';
import Categories from '@/components/user/home/Categories.vue';

export default {
    name: 'Home',
    components: {
        Banner,
        Categories
        
    }
}
</script>

<style></style>