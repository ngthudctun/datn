<template>
    <!-- User Profile Section Begin -->
    <section class="user-profile spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="user-profile__sidebar">
                        <div class="user-profile__avatar">
                            <div class="avatar-wrapper">
                                <img :src="user.avatar" :alt="user.name" class="avatar-img">
                                <div class="avatar-overlay">
                                    <i class="fa fa-camera"></i>
                                    <input type="file" @change="handleAvatarChange" accept="image/*" class="avatar-input">
                                </div>
                            </div>
                            <h4>{{ user.name }}</h4>
                            <p class="user-email">{{ user.email }}</p>
                            <div class="user-stats">
                                <div class="stat-item">
                                    <h6>Đơn hàng</h6>
                                    <span>{{ user.totalOrders }}</span>
                                </div>
                                <div class="stat-item">
                                    <h6>Điểm tích lũy</h6>
                                    <span>{{ user.points }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="user-profile__menu">
                            <h5>Menu tài khoản</h5>
                            <ul>
                                <li>
                                    <a href="#" @click="activeTab = 'profile'" :class="{ active: activeTab === 'profile' }">
                                        <i class="fa fa-user"></i> Thông tin cá nhân
                                    </a>
                                </li>
                                <li>
                                    <a href="#" @click="activeTab = 'orders'" :class="{ active: activeTab === 'orders' }">
                                        <i class="fa fa-shopping-bag"></i> Đơn hàng của tôi
                                    </a>
                                </li>
                                <li>
                                    <a href="#" @click="activeTab = 'addresses'" :class="{ active: activeTab === 'addresses' }">
                                        <i class="fa fa-map-marker"></i> Địa chỉ giao hàng
                                    </a>
                                </li>
                                <li>
                                    <a href="#" @click="activeTab = 'wishlist'" :class="{ active: activeTab === 'wishlist' }">
                                        <i class="fa fa-heart"></i> Yêu thích
                                    </a>
                                </li>
                                <li>
                                    <a href="#" @click="activeTab = 'security'" :class="{ active: activeTab === 'security' }">
                                        <i class="fa fa-lock"></i> Bảo mật
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="user-profile__content">
                        <!-- Profile Tab -->
                        <div v-if="activeTab === 'profile'" class="profile-tab">
                            <div class="profile-tab__header">
                                <h5>Thông tin cá nhân</h5>
                                <button @click="editMode = !editMode" class="site-btn-outline">
                                    {{ editMode ? 'Hủy' : 'Chỉnh sửa' }}
                                </button>
                            </div>
                            <div class="profile-tab__form">
                                <form @submit.prevent="updateProfile">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input 
                                                    type="text" 
                                                    v-model="userForm.name" 
                                                    :disabled="!editMode"
                                                    placeholder="Nhập họ và tên"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input 
                                                    type="email" 
                                                    v-model="userForm.email" 
                                                    :disabled="!editMode"
                                                    placeholder="Nhập email"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input 
                                                    type="text" 
                                                    v-model="userForm.phone" 
                                                    :disabled="!editMode"
                                                    placeholder="Nhập số điện thoại"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Ngày sinh</label>
                                                <input 
                                                    type="date" 
                                                    v-model="userForm.birthday" 
                                                    :disabled="!editMode"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <select v-model="userForm.gender" :disabled="!editMode">
                                                    <option value="">Chọn giới tính</option>
                                                    <option value="male">Nam</option>
                                                    <option value="female">Nữ</option>
                                                    <option value="other">Khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <textarea 
                                                    v-model="userForm.address" 
                                                    :disabled="!editMode"
                                                    placeholder="Nhập địa chỉ"
                                                    rows="3"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="editMode" class="form-actions">
                                        <button type="submit" class="site-btn">Cập nhật thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Orders Tab -->
                        <div v-if="activeTab === 'orders'" class="orders-tab">
                            <div class="orders-tab__header">
                                <h5>Đơn hàng của tôi</h5>
                                <div class="order-filters">
                                    <button 
                                        v-for="status in orderStatuses" 
                                        :key="status.value"
                                        @click="filterOrders(status.value)"
                                        :class="{ active: selectedOrderStatus === status.value }"
                                        class="filter-btn"
                                    >
                                        {{ status.label }}
                                    </button>
                                </div>
                            </div>
                            <div class="orders-tab__list">
                                <div v-for="order in filteredOrders" :key="order.id" class="order-item">
                                    <div class="order-item__header">
                                        <div class="order-info">
                                            <h6>Đơn hàng #{{ order.id }}</h6>
                                            <span class="order-date">{{ formatDate(order.date) }}</span>
                                        </div>
                                        <div class="order-status">
                                            <span :class="'status-' + order.status">{{ getStatusText(order.status) }}</span>
                                        </div>
                                    </div>
                                    <div class="order-item__content">
                                        <div class="order-products">
                                            <div v-for="product in order.products" :key="product.id" class="product-item">
                                                <img :src="product.image" :alt="product.name">
                                                <div class="product-info">
                                                    <h6>{{ product.name }}</h6>
                                                    <p>Số lượng: {{ product.quantity }}</p>
                                                </div>
                                                <div class="product-price">
                                                    {{ formatPrice(product.price) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-total">
                                            <span>Tổng tiền: <strong>{{ formatPrice(order.total) }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Addresses Tab -->
                        <div v-if="activeTab === 'addresses'" class="addresses-tab">
                            <div class="addresses-tab__header">
                                <h5>Địa chỉ giao hàng</h5>
                                <button @click="showAddressForm = !showAddressForm" class="site-btn">
                                    {{ showAddressForm ? 'Hủy' : 'Thêm địa chỉ mới' }}
                                </button>
                            </div>
                            
                            <div v-if="showAddressForm" class="address-form">
                                <form @submit.prevent="saveAddress">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" v-model="addressForm.name" placeholder="Họ và tên">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="addressForm.phone" placeholder="Số điện thoại">
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea v-model="addressForm.address" placeholder="Địa chỉ chi tiết" rows="3"></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-checkbox">
                                                <input type="checkbox" v-model="addressForm.isDefault" id="default-address">
                                                <label for="default-address">Đặt làm địa chỉ mặc định</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="site-btn">Lưu địa chỉ</button>
                                </form>
                            </div>

                            <div class="addresses-list">
                                <div v-for="address in addresses" :key="address.id" class="address-item">
                                    <div class="address-content">
                                        <div class="address-info">
                                            <h6>{{ address.name }}</h6>
                                            <p><i class="fa fa-phone"></i> {{ address.phone }}</p>
                                            <p><i class="fa fa-map-marker"></i> {{ address.address }}</p>
                                            <span v-if="address.isDefault" class="default-badge">Mặc định</span>
                                        </div>
                                        <div class="address-actions">
                                            <button @click="editAddress(address)" class="edit-btn">Sửa</button>
                                            <button @click="deleteAddress(address.id)" class="delete-btn">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security Tab -->
                        <div v-if="activeTab === 'security'" class="security-tab">
                            <div class="security-tab__header">
                                <h5>Bảo mật tài khoản</h5>
                            </div>
                            <div class="security-tab__form">
                                <form @submit.prevent="changePassword">
                                    <div class="form-group">
                                        <label>Mật khẩu hiện tại</label>
                                        <input type="password" v-model="passwordForm.currentPassword" placeholder="Nhập mật khẩu hiện tại">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" v-model="passwordForm.newPassword" placeholder="Nhập mật khẩu mới">
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu mới</label>
                                        <input type="password" v-model="passwordForm.confirmPassword" placeholder="Xác nhận mật khẩu mới">
                                    </div>
                                    <button type="submit" class="site-btn">Đổi mật khẩu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Profile Section End -->
</template>

<script>
export default {
    name: 'UserProfile',
    data() {
        return {
            activeTab: 'profile',
            editMode: false,
            showAddressForm: false,
            selectedOrderStatus: 'all',
            user: {
                name: 'Nguyễn Văn A',
                email: 'user@example.com',
                avatar: 'https://via.placeholder.com/150x150?text=Avatar',
                totalOrders: 12,
                points: 2580
            },
            userForm: {
                name: 'Nguyễn Văn A',
                email: 'user@example.com',
                phone: '0123456789',
                birthday: '1990-01-01',
                gender: 'male',
                address: 'Thành phố Hồ Chí Minh'
            },
            passwordForm: {
                currentPassword: '',
                newPassword: '',
                confirmPassword: ''
            },
            addressForm: {
                name: '',
                phone: '',
                address: '',
                isDefault: false
            },
            addresses: [
                {
                    id: 1,
                    name: 'Nguyễn Văn A',
                    phone: '0123456789',
                    address: '123 Nguyễn Huệ, Quận 1, TP.HCM',
                    isDefault: true
                },
                {
                    id: 2,
                    name: 'Nguyễn Văn A',
                    phone: '0123456789',
                    address: '456 Lê Lợi, Quận 3, TP.HCM',
                    isDefault: false
                }
            ],
            orders: [
                {
                    id: '001',
                    date: '2024-06-10',
                    status: 'delivered',
                    total: 500000,
                    products: [
                        {
                            id: 1,
                            name: 'Áo thun nam',
                            image: 'https://via.placeholder.com/60x60?text=Product',
                            quantity: 2,
                            price: 250000
                        }
                    ]
                },
                {
                    id: '002',
                    date: '2024-06-08',
                    status: 'shipping',
                    total: 800000,
                    products: [
                        {
                            id: 2,
                            name: 'Quần jeans',
                            image: 'https://via.placeholder.com/60x60?text=Product',
                            quantity: 1,
                            price: 800000
                        }
                    ]
                }
            ],
            orderStatuses: [
                { value: 'all', label: 'Tất cả' },
                { value: 'pending', label: 'Chờ xử lý' },
                { value: 'processing', label: 'Đang xử lý' },
                { value: 'shipping', label: 'Đang giao' },
                { value: 'delivered', label: 'Đã giao' },
                { value: 'cancelled', label: 'Đã hủy' }
            ]
        }
    },
    computed: {
        filteredOrders() {
            if (this.selectedOrderStatus === 'all') {
                return this.orders;
            }
            return this.orders.filter(order => order.status === this.selectedOrderStatus);
        }
    },
    methods: {
        handleAvatarChange(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.user.avatar = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        updateProfile() {
            // API call to update profile
            console.log('Updating profile:', this.userForm);
            this.editMode = false;
        },
        filterOrders(status) {
            this.selectedOrderStatus = status;
        },
        saveAddress() {
            // API call to save address
            const newAddress = {
                id: Date.now(),
                ...this.addressForm
            };
            this.addresses.push(newAddress);
            this.addressForm = { name: '', phone: '', address: '', isDefault: false };
            this.showAddressForm = false;
        },
        editAddress(address) {
            this.addressForm = { ...address };
            this.showAddressForm = true;
        },
        deleteAddress(addressId) {
            this.addresses = this.addresses.filter(addr => addr.id !== addressId);
        },
        changePassword() {
            // API call to change password
            console.log('Changing password');
            this.passwordForm = { currentPassword: '', newPassword: '', confirmPassword: '' };
        },
        formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('vi-VN');
        },
        formatPrice(price) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(price);
        },
        getStatusText(status) {
            const statusMap = {
                pending: 'Chờ xử lý',
                processing: 'Đang xử lý',
                shipping: 'Đang giao',
                delivered: 'Đã giao',
                cancelled: 'Đã hủy'
            };
            return statusMap[status] || status;
        }
    }
}
</script>

<style scoped>
.spad {
    padding: 100px 0;
}

.user-profile__sidebar {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.user-profile__avatar {
    text-align: center;
    margin-bottom: 30px;
}

.avatar-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 15px;
}

.avatar-img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.avatar-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    cursor: pointer;
}

.avatar-wrapper:hover .avatar-overlay {
    opacity: 1;
}

.avatar-overlay i {
    color: white;
    font-size: 24px;
}

.avatar-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.user-profile__avatar h4 {
    margin-bottom: 5px;
    font-weight: 600;
}

.user-email {
    color: #666;
    margin-bottom: 20px;
}

.user-stats {
    display: flex;
    justify-content: space-around;
    padding: 20px 0;
    border-top: 1px solid #eee;
}

.stat-item {
    text-align: center;
}

.stat-item h6 {
    margin-bottom: 5px;
    color: #666;
    font-weight: 500;
}

.stat-item span {
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.user-profile__menu h5 {
    margin-bottom: 20px;
    font-weight: 600;
}

.user-profile__menu ul {
    list-style: none;
    padding: 0;
}

.user-profile__menu li {
    margin-bottom: 10px;
}

.user-profile__menu a {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    color: #666;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s;
}

.user-profile__menu a:hover,
.user-profile__menu a.active {
    background: #007bff;
    color: white;
    text-decoration: none;
}

.user-profile__menu a i {
    margin-right: 10px;
    width: 20px;
}

.user-profile__content {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 30px;
}

.profile-tab__header,
.orders-tab__header,
.addresses-tab__header,
.security-tab__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.profile-tab__header h5,
.orders-tab__header h5,
.addresses-tab__header h5,
.security-tab__header h5 {
    margin: 0;
    font-weight: 600;
}

.site-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.site-btn:hover {
    background: #0056b3;
}

.site-btn-outline {
    background: transparent;
    color: #007bff;
    border: 1px solid #007bff;
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
}

.site-btn-outline:hover {
    background: #007bff;
    color: white;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.form-group input:disabled,
.form-group select:disabled,
.form-group textarea:disabled {
    background: #f8f9fa;
    color: #666;
}

.form-actions {
    text-align: right;
    margin-top: 30px;
}

.order-filters {
    display: flex;
    gap: 10px;
}

.filter-btn {
    padding: 8px 15px;
    border: 1px solid #ddd;
    background: white;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
}

.filter-btn.active,
.filter-btn:hover {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.order-item {
    border: 1px solid #eee;
    border-radius: 8px;
    margin-bottom: 20px;
    overflow: hidden;
}

.order-item__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.order-info h6 {
    margin: 0;
    font-weight: 600;
}

.order-date {
    color: #666;
    font-size: 13px;
}

.order-status span {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 500;
}

.status-pending { background: #fff3cd; color: #856404; }
.status-processing { background: #d1ecf1; color: #0c5460; }
.status-shipping { background: #d4edda; color: #155724; }
.status-delivered { background: #d1ecf1; color: #0c5460; }
.status-cancelled { background: #f8d7da; color: #721c24; }

.order-item__content {
    padding: 20px;
}

.product-item {
    display: flex;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.product-item:last-child {
    border-bottom: none;
}

.product-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 15px;
}

.product-info {
    flex: 1;
}

.product-info h6 {
    margin: 0 0 5px 0;
    font-weight: 500;
}

.product-info p {
    margin: 0;
    color: #666;
    font-size: 13px;
}

.product-price {
    font-weight: 600;
    color: #007bff;
}

.order-total {
    text-align: right;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.address-form {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.form-checkbox {
    display: flex;
    align-items: center;
    margin-top: 15px;
}

.form-checkbox input {
    width: auto;
    margin-right: 10px;
}

.addresses-list {
    display: grid;
    gap: 20px;
}

.address-item {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 20px;
}

.address-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.address-info h6 {
    margin: 0 0 10px 0;
    font-weight: 600;
}

.address-info p {
    margin: 5px 0;
    color: #666;
}

.address-info i {
    margin-right: 8px;
    width: 15px;
}

.default-badge {
    background: #007bff;
    color: white;
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 11px;
}

.address-actions {
    display: flex;
    gap: 10px;
}

.edit-btn,
.delete-btn {
    padding: 5px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.3s;
}

.edit-btn {
    background: white;
    color: #007bff;
    border-color: #007bff;
}

.edit-btn:hover {
    background: #007bff;
    color: white;
}

.delete-btn {
    background: white;
    color: #dc3545;
    border-color: #dc3545;
}

.delete-btn:hover {
    background: #dc3545;
    color: white;
}

@media (max-width: 768px) {
    .spad {
        padding: 50px 0;
    }
    
    .user-profile__sidebar {
        margin-bottom: 30px;
    }
    
    .profile-tab__header,
    .orders-tab__header,
    .addresses-tab__header {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .order-filters {
        flex-wrap: wrap;
    }
    
    .address-content {
        flex-direction: column;
        gap: 15px;
    }
    
    .address-actions {
        align-self: flex-start;
    }
}
</style>