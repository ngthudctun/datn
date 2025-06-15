<template>
    <a href="#" @click.prevent="toggleWishlist" :class="{ 'wishlist-active': isWishlisted, 'disabled': isLoading }">
        <span class="fa-light fa-heart"></span>
    </a>
</template>

<script>
import axios from 'axios';
import { useShowtoast } from '@/assets/js/toast';

export default {
    name: 'WishlistButton',
    props: {
        productId: {
            type: Number,
            required: true
        },
        initialWishlisted: {
            type: Boolean,
            default: false
        }
    },
    setup() {
        const toastStore = useShowtoast();
        return { toastStore };
    },
    data() {
        return {
            isWishlisted: this.initialWishlisted,
            isLoading: false
        };
    },
    methods: {
        async toggleWishlist() {
            if (this.isLoading) return;
            const token = localStorage.getItem('token');
            if (!token) {
                this.toastStore.toast({
                    title: 'Thông báo',
                    message: 'Vui lòng đăng nhập để thêm vào danh sách yêu thích',
                    type: 'error',
                });
                this.$router.push('/dang-nhap');
                return;
            }

            this.isLoading = true;
            loadingStore.start();
            try {
                const response = await axios.get(
                    '/api/wishlist/toggle',
                    { product_id: this.productId },
                    {
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    }
                );
                this.isWishlisted = response.data.is_wishlisted;
                this.$emit('update:wishlisted', this.isWishlisted);
                this.toastStore.toast({
                    title: 'Thông báo',
                    message: response.data.message || (this.isWishlisted ? 'Đã thêm vào danh sách yêu thích' : 'Đã xóa khỏi danh sách yêu thích'),
                    type: response.data.type || 'success',
                });
            } catch (error) {
                console.error('Lỗi khi cập nhật danh sách yêu thích:', error);
                this.toastStore.toast({
                    title: 'Thông báo',
                    message: error.response?.data?.message || 'Không thể cập nhật danh sách yêu thích',
                    type: error.response?.data?.type || 'error',
                });
            } finally {
                this.isLoading = false;
                loadingStore.end();
            }
        }
    }
};
</script>

<style scoped>
</style>