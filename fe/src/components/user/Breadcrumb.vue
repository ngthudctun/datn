<template>
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <template v-for="(item, index) in items" :key="index">
                            <router-link v-if="item.url && index !== items.length - 1" :to="item.url">
                                <i v-if="index === 0" class="fa fa-home"></i> {{ item.label }}
                            </router-link>
                            <span v-else>{{ item.label }}</span>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    items: {
        type: Array,
        required: true,
        default: () => []
    }
})
</script>