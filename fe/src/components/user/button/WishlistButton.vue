<template>
    <a href="#" @click.prevent="toggleWishlist" :class="{ 'wishlist-active': isWishlisted, 'disabled': isLoading }">
        <span class="fa-light fa-heart"></span>
    </a>
</template>

<script>
import axios from 'axios';
import { useToast } from '@/assets/js/toast';

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
        // Khởi tạo toast trong setup để sử dụng trong component
        const { toast } = useToast();
        return { toast };
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

            // Kiểm tra đăng nhập
            const token = localStorage.getItem('token');
            if (!token) {
                this.toast({
                    title: 'Lỗi',
                    message: 'Vui lòng đăng nhập để thêm vào danh sách yêu thích',
                    type: 'error',
                    duration: 3000
                });
                this.$router.push('/dang-nhap');
                return;
            }

            this.isLoading = true;
            try {
                const response = await axios.post(
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
                this.toast({
                    title: 'Thành công',
                    message: response.data.message || (this.isWishlisted ? 'Đã thêm vào danh sách yêu thích' : 'Đã xóa khỏi danh sách yêu thích'),
                    type: 'success',
                    duration: 3000
                });
            } catch (error) {
                console.error('Lỗi khi cập nhật danh sách yêu thích:', error);
                this.toast({
                    title: 'Lỗi',
                    message: error.response?.data?.message || 'Không thể cập nhật danh sách yêu thích',
                    type: 'error',
                    duration: 3000
                });
            } finally {
                this.isLoading = false;
            }
        }
    }
};
</script>

<style scoped>
</style>