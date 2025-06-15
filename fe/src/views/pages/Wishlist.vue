<template>
  <!-- Wishlist Section Begin -->
  <section class="wishlist-section spad">
    <div class="container">
      <!-- Header -->
      <div class="wishlist-header">
        <div class="header-content">
          <h2>
            <i class="fa fa-heart"></i>
            Danh sách yêu thích
          </h2>
          <p class="header-subtitle">{{ wishlistItems.length }} sản phẩm trong danh sách của bạn</p>
        </div>
        <div class="header-actions">
          <button @click="clearAllWishlist" class="btn btn--outline" v-if="wishlistItems.length > 0">
            <i class="fa fa-trash"></i>
            Xóa tất cả
          </button>
          <button @click="shareWishlist" class="btn btn--secondary">
            <i class="fa fa-share"></i>
            Chia sẻ
          </button>
        </div>
      </div>

      <!-- Empty State -->
      <div v-if="wishlistItems.length === 0" class="empty-wishlist">
        <div class="empty-icon">
          <i class="fa fa-heart-o"></i>
        </div>
        <h3>Danh sách yêu thích trống</h3>
        <p>Hãy thêm những sản phẩm yêu thích để dễ dàng theo dõi và mua sắm sau này!</p>
        <button class="btn btn--primary" @click="continueShopping">
          <i class="fa fa-shopping-bag"></i>
          Tiếp tục mua sắm
        </button>
      </div>

      <!-- Wishlist Grid -->
      <div v-else class="wishlist-grid">
        <div 
          v-for="(item, index) in wishlistItems" 
          :key="item.id"
          class="wishlist-card"
          :class="{ 'out-of-stock': !item.inStock }"
        >
          <!-- Product Image -->
          <div class="card-image">
            <img :src="$imageUrl + item.image" :alt="item.name" />
            <div class="image-overlay">
              <button @click="quickView(item)" class="overlay-btn">
                <i class="fa fa-eye"></i>
              </button>
              <button @click="removeFromWishlist(index)" class="overlay-btn remove-btn">
                <i class="fa fa-heart"></i>
              </button>
            </div>
            <div v-if="!item.inStock" class="stock-badge">Hết hàng</div>
            <div v-if="item.discount" class="discount-badge">-{{ item.discount }}%</div>
          </div>

          <!-- Product Info -->
          <div class="card-content">
            <div class="product-category">{{ item.category }}</div>
            <h4 class="product-name">{{ item.name }}</h4>
            
            <!-- Rating -->
            <div class="product-rating">
              <div class="stars">
                <i 
                  v-for="star in 5" 
                  :key="star"
                  :class="['fa', star <= item.rating ? 'fa-star' : 'fa-star-o']"
                ></i>
              </div>
              <span class="rating-count">({{ item.reviewCount }})</span>
            </div>

            <!-- Price -->
            <div class="product-price">
              <span v-if="item.originalPrice" class="original-price">{{ formatPrice(item.originalPrice) }}</span>
              <span class="current-price">{{ formatPrice(item.price) }}</span>
            </div>

            <!-- Variants -->
            <div class="product-variants">
              <div class="variant-group">
                <label>Size:</label>
                <select v-model="item.selectedSize" @change="updateVariant(index, 'size', item.selectedSize)">
                  <option v-for="size in item.availableSizes" :key="size" :value="size">
                    {{ size.toUpperCase() }}
                  </option>
                </select>
              </div>
              <div class="variant-group">
                <label>Màu:</label>
                <div class="color-options">
                  <button 
                    v-for="color in item.availableColors" 
                    :key="color"
                    :class="['color-option', `color--${color}`, { active: item.selectedColor === color }]"
                    @click="updateVariant(index, 'color', color)"
                    :title="color"
                  ></button>
                </div>
              </div>
            </div>

            <!-- Actions -->
            <div class="card-actions">
              <button 
                @click="addToCart(item, index)" 
                :disabled="!item.inStock"
                class="btn btn--primary add-to-cart-btn"
              >
                <i class="fa fa-shopping-cart"></i>
                {{ item.inStock ? 'Thêm vào giỏ' : 'Hết hàng' }}
              </button>
              <button @click="removeFromWishlist(index)" class="btn btn--icon remove-btn">
                <i class="fa fa-heart"></i>
              </button>
            </div>

            <!-- Added Date -->
            <div class="added-date">
              <i class="fa fa-clock-o"></i>
              Thêm vào {{ formatDate(item.addedDate) }}
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Actions -->
      <div v-if="wishlistItems.length > 0" class="wishlist-bottom-actions">
        <div class="actions-container">
          <div class="bulk-actions">
            <label class="select-all-checkbox">
              <input type="checkbox" v-model="selectAll" @change="toggleSelectAll" />
              <span class="checkmark"></span>
              Chọn tất cả ({{ selectedItems.length }}/{{ wishlistItems.length }})
            </label>
            <button 
              @click="addSelectedToCart" 
              :disabled="selectedItems.length === 0"
              class="btn btn--primary bulk-add-btn"
            >
              <i class="fa fa-shopping-cart"></i>
              Thêm {{ selectedItems.length }} sản phẩm vào giỏ
            </button>
          </div>
          <div class="summary-info">
            <div class="summary-row">
              <span>Tổng giá trị:</span>
              <span class="total-value">{{ formatPrice(totalWishlistValue) }}</span>
            </div>
            <div class="summary-row selected">
              <span>Đã chọn:</span>
              <span class="selected-value">{{ formatPrice(selectedItemsValue) }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Quick View Modal -->
  <div v-if="showQuickView" class="modal__overlay" @click.self="closeQuickView">
    <div class="modal__content quick-view-modal">
      <div class="modal__header">
        <h4>
          <i class="fa fa-eye"></i>
          Xem nhanh sản phẩm
        </h4>
        <button @click="closeQuickView" class="modal__close">
          <i class="fa fa-times"></i>
        </button>
      </div>
      
      <div class="modal__body" v-if="selectedProduct">
        <div class="quick-view-content">
          <div class="product-image-section">
            <img :src="$imageUrl + selectedProduct.image" :alt="selectedProduct.name" />
          </div>
          <div class="product-info-section">
            <div class="product-category">{{ selectedProduct.category }}</div>
            <h3>{{ selectedProduct.name }}</h3>
            
            <div class="product-rating">
              <div class="stars">
                <i 
                  v-for="star in 5" 
                  :key="star"
                  :class="['fa', star <= selectedProduct.rating ? 'fa-star' : 'fa-star-o']"
                ></i>
              </div>
              <span class="rating-count">({{ selectedProduct.reviewCount }} đánh giá)</span>
            </div>

            <div class="product-price">
              <span v-if="selectedProduct.originalPrice" class="original-price">{{ formatPrice(selectedProduct.originalPrice) }}</span>
              <span class="current-price">{{ formatPrice(selectedProduct.price) }}</span>
            </div>

            <div class="product-description">
              <p>{{ selectedProduct.description || 'Sản phẩm chất lượng cao với thiết kế hiện đại và tinh tế.' }}</p>
            </div>

            <div class="product-variants">
              <div class="variant-group">
                <label>Kích thước:</label>
                <div class="size-options">
                  <button 
                    v-for="size in selectedProduct.availableSizes" 
                    :key="size"
                    :class="['size-option', { active: selectedProduct.selectedSize === size }]"
                    @click="selectedProduct.selectedSize = size"
                  >
                    {{ size.toUpperCase() }}
                  </button>
                </div>
              </div>
              <div class="variant-group">
                <label>Màu sắc:</label>
                <div class="color-options">
                  <button 
                    v-for="color in selectedProduct.availableColors" 
                    :key="color"
                    :class="['color-option', `color--${color}`, { active: selectedProduct.selectedColor === color }]"
                    @click="selectedProduct.selectedColor = color"
                    :title="color"
                  ></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal__footer">
        <button @click="closeQuickView" class="btn btn--secondary">Đóng</button>
        <button 
          @click="addToCartFromQuickView" 
          :disabled="!selectedProduct?.inStock"
          class="btn btn--primary"
        >
          <i class="fa fa-shopping-cart"></i>
          {{ selectedProduct?.inStock ? 'Thêm vào giỏ hàng' : 'Hết hàng' }}
        </button>
      </div>
    </div>
  </div>

  <!-- Confirmation Modal -->
  <div v-if="showConfirmModal" class="modal__overlay" @click.self="closeConfirmModal">
    <div class="modal__content confirm-modal">
      <div class="modal__header">
        <h4>
          <i class="fa fa-question-circle"></i>
          Xác nhận
        </h4>
        <button @click="closeConfirmModal" class="modal__close">
          <i class="fa fa-times"></i>
        </button>
      </div>
      
      <div class="modal__body">
        <p>{{ confirmMessage }}</p>
      </div>

      <div class="modal__footer">
        <button @click="closeConfirmModal" class="btn btn--secondary">Hủy</button>
        <button @click="confirmAction" class="btn btn--primary">
          <i class="fa fa-check"></i>
          Xác nhận
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const wishlistItems = ref([
  {
    id: 1,
    name: 'Elegant Chain Bucket Bag',
    category: 'Túi xách',
    price: 150.0,
    originalPrice: 200.0,
    discount: 25,
    image: 'shop-cart/cp-1.jpg',
    inStock: true,
    rating: 4.5,
    reviewCount: 128,
    selectedSize: 'M',
    selectedColor: 'red',
    availableSizes: ['S', 'M', 'L'],
    availableColors: ['red', 'black', 'brown'],
    addedDate: new Date('2024-01-15'),
    selected: false,
    description: 'Túi xách cao cấp với thiết kế hiện đại và chất liệu da thật.'
  },
  {
    id: 2,
    name: 'Premium Leather Briefcase',
    category: 'Túi công sở',
    price: 170.0,
    originalPrice: null,
    discount: null,
    image: 'shop-cart/cp-2.jpg',
    inStock: true,
    rating: 4.8,
    reviewCount: 89,
    selectedSize: 'L',
    selectedColor: 'black',
    availableSizes: ['M', 'L', 'XL'],
    availableColors: ['black', 'brown'],
    addedDate: new Date('2024-01-20'),
    selected: false,
    description: 'Túi công sở sang trọng dành cho doanh nhân thành đạt.'
  },
  {
    id: 3,
    name: 'Classic Black Jeans',
    category: 'Quần jeans',
    price: 85.0,
    originalPrice: 120.0,
    discount: 30,
    image: 'shop-cart/cp-3.jpg',
    inStock: false,
    rating: 4.3,
    reviewCount: 256,
    selectedSize: 'M',
    selectedColor: 'black',
    availableSizes: ['S', 'M', 'L', 'XL'],
    availableColors: ['black', 'blue', 'grey'],
    addedDate: new Date('2024-02-01'),
    selected: false,
    description: 'Quần jeans cổ điển với form dáng ôm vừa phải, phù hợp mọi dáng người.'
  },
  {
    id: 4,
    name: 'Premium Cotton Shirt',
    category: 'Áo sơ mi',
    price: 55.0,
    originalPrice: null,
    discount: null,
    image: 'shop-cart/cp-4.jpg',
    inStock: true,
    rating: 4.6,
    reviewCount: 174,
    selectedSize: 'L',
    selectedColor: 'white',
    availableSizes: ['S', 'M', 'L', 'XL'],
    availableColors: ['white', 'blue', 'pink'],
    addedDate: new Date('2024-02-10'),
    selected: false,
    description: 'Áo sơ mi cotton cao cấp, mềm mại và thoáng mát.'
  },
  {
    id: 5,
    name: 'Designer Sneakers',
    category: 'Giày thể thao',
    price: 120.0,
    originalPrice: 160.0,
    discount: 25,
    image: 'shop-cart/cp-1.jpg',
    inStock: true,
    rating: 4.7,
    reviewCount: 203,
    selectedSize: '42',
    selectedColor: 'white',
    availableSizes: ['39', '40', '41', '42', '43'],
    availableColors: ['white', 'black', 'red'],
    addedDate: new Date('2024-02-15'),
    selected: false,
    description: 'Giày thể thao thiết kế độc đáo với công nghệ đệm khí tiên tiến.'
  }
])

const selectAll = ref(false)
const showQuickView = ref(false)
const selectedProduct = ref(null)
const showConfirmModal = ref(false)
const confirmMessage = ref('')
const confirmCallback = ref(null)

const selectedItems = computed(() => wishlistItems.value.filter(item => item.selected))
const totalWishlistValue = computed(() => 
  wishlistItems.value.reduce((total, item) => total + item.price, 0)
)
const selectedItemsValue = computed(() => 
  selectedItems.value.reduce((total, item) => total + item.price, 0)
)

function formatPrice(price) {
  return `$${price.toFixed(2)}`
}

function formatDate(date) {
  if (!(date instanceof Date) || isNaN(date)) return 'Không xác định'
  const now = new Date()
  const diffTime = Math.abs(now - date)
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))
  
  if (diffDays === 1) return 'hôm qua'
  if (diffDays < 7) return `${diffDays} ngày trước`
  if (diffDays < 30) return `${Math.ceil(diffDays / 7)} tuần trước`
  return `${Math.ceil(diffDays / 30)} tháng trước`
}

function toggleSelectAll() {
  wishlistItems.value.forEach(item => {
    if (item.inStock) {
      item.selected = selectAll.value
    }
  })
  updateSelectAll()
}

function updateSelectAll() {
  const inStockItems = wishlistItems.value.filter(item => item.inStock)
  selectAll.value = inStockItems.length > 0 && inStockItems.every(item => item.selected)
}

function updateVariant(index, type, value) {
  if (type === 'size') {
    wishlistItems.value[index].selectedSize = value
  } else if (type === 'color') {
    wishlistItems.value[index].selectedColor = value
  }
}

function removeFromWishlist(index) {
  confirmMessage.value = `Bạn có chắc muốn xóa "${wishlistItems.value[index].name}" khỏi danh sách yêu thích?`
  confirmCallback.value = () => {
    wishlistItems.value.splice(index, 1)
    updateSelectAll()
    closeConfirmModal()
    showNotification('Đã xóa sản phẩm khỏi danh sách yêu thích', 'success')
  }
  showConfirmModal.value = true
}

function clearAllWishlist() {
  confirmMessage.value = `Bạn có chắc muốn xóa tất cả ${wishlistItems.value.length} sản phẩm khỏi danh sách yêu thích?`
  confirmCallback.value = () => {
    wishlistItems.value.splice(0)
    closeConfirmModal()
    showNotification('Đã xóa tất cả sản phẩm khỏi danh sách yêu thích', 'success')
  }
  showConfirmModal.value = true
}

function addToCart(item, index) {
  if (!item.inStock) return
  
  const button = document.querySelectorAll('.add-to-cart-btn')[index]
  button.classList.add('added')
  setTimeout(() => button.classList.remove('added'), 1000)
  
  showNotification(`Đã thêm "${item.name}" vào giỏ hàng`, 'success')
}

function addSelectedToCart() {
  if (selectedItems.value.length === 0) return
  
  const inStockSelected = selectedItems.value.filter(item => item.inStock)
  showNotification(`Đã thêm ${inStockSelected.length} sản phẩm vào giỏ hàng`, 'success')
  
  wishlistItems.value.forEach(item => (item.selected = false))
  selectAll.value = false
  updateSelectAll()
}

function quickView(item) {
  selectedProduct.value = { ...item } // Deep copy to avoid mutating original
  showQuickView.value = true
}

function closeQuickView() {
  showQuickView.value = false
  selectedProduct.value = null
}

function addToCartFromQuickView() {
  if (selectedProduct.value && selectedProduct.value.inStock) {
    showNotification(`Đã thêm "${selectedProduct.value.name}" vào giỏ hàng`, 'success')
    closeQuickView()
  }
}

function shareWishlist() {
  showNotification('Đã sao chép link chia sẻ danh sách yêu thích', 'info')
}

function continueShopping() {
  showNotification('Chuyển đến trang sản phẩm', 'info')
}

function closeConfirmModal() {
  showConfirmModal.value = false
  confirmCallback.value = null
}

function confirmAction() {
  if (confirmCallback.value) {
    confirmCallback.value()
  }
}

function showNotification(message, type = 'info') {
  console.log(`[${type}] ${message}`)
}
</script>

<style scoped>
.wishlist-section {
  padding: 40px 0 120px;
  min-height: 100vh;
  background: #f8f9fa;
}

/* Header */
.wishlist-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 40px;
  padding: 20px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.header-content h2 {
  margin: 0 0 5px 0;
  color: #333;
  font-size: 28px;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 10px;
}

.header-content h2 i {
  color: #e74c3c;
}

.header-subtitle {
  margin: 0;
  color: #666;
  font-size: 14px;
}

.header-actions {
  display: flex;
  gap: 10px;
}

/* Empty State */
.empty-wishlist {
  text-align: center;
  padding: 80px 20px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.empty-icon {
  font-size: 80px;
  color: #ddd;
  margin-bottom: 20px;
}

.empty-wishlist h3 {
  color: #333;
  margin-bottom: 10px;
  font-size: 24px;
}

.empty-wishlist p {
  color: #666;
  margin-bottom: 30px;
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
}

/* Wishlist Grid */
.wishlist-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 25px;
  margin-bottom: 40px;
}

.wishlist-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  position: relative;
}

.wishlist-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.wishlist-card.out-of-stock {
  opacity: 0.7;
}

.wishlist-card.out-of-stock::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(255, 255, 255, 0.8);
  z-index: 1;
}

/* Card Image */
.card-image {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.wishlist-card:hover .card-image img {
  transform: scale(1.05);
}

.image-overlay {
  position: absolute;
  top: 15px;
  right: 15px;
  display: flex;
  flex-direction: column;
  gap: 8px;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.wishlist-card:hover .image-overlay {
  opacity: 1;
}

.overlay-btn {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: none;
  background: rgba(255, 255, 255, 0.9);
  color: #333;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.overlay-btn:hover {
  background: #fff;
  transform: scale(1.1);
}

.overlay-btn.remove-btn {
  color: #e74c3c;
}

.overlay-btn.remove-btn:hover {
  background: #e74c3c;
  color: #fff;
}

.stock-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background: #e74c3c;
  color: #fff;
  padding: 5px 10px;
  border-radius: 15px;
  font-size: 12px;
  font-weight: 600;
}

.discount-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background: #27ae60;
  color: #fff;
  padding: 5px 10px;
  border-radius: 15px;
  font-size: 12px;
  font-weight: 600;
}

/* Card Content */
.card-content {
  padding: 20px;
}

.product-category {
  color: #666;
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 500;
  margin-bottom: 8px;
  letter-spacing: 0.5px;
}

.product-name {
  margin: 0 0 10px 0;
  font-size: 18px;
  font-weight: 600;
  color: #333;
  line-height: 1.3;
}

.product-rating {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 12px;
}

.stars {
  display: flex;
  gap: 2px;
}

.stars i {
  color: #ffd700;
  font-size: 14px;
}

.stars i.fa-star-o {
  color: #ddd;
}

.rating-count {
  font-size: 13px;
  color: #666;
}

.product-price {
  margin-bottom: 15px;
}

.original-price {
  text-decoration: line-through;
  color: #999;
  font-size: 14px;
  margin-right: 8px;
}

.current-price {
  font-size: 20px;
  font-weight: 600;
  color: #e74c3c;
}

/* Variants */
.product-variants {
  margin-bottom: 20px;
}

.variant-group {
  margin-bottom: 12px;
}

.variant-group label {
  display: block;
  font-size: 13px;
  font-weight: 500;
  color: #333;
  margin-bottom: 6px;
}

.variant-group select {
  width: 100%;
  padding: 8px 12px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 14px;
  outline: none;
  transition: border-color 0.3s ease;
}

.variant-group select:focus {
  border-color: #007bff;
}

.color-options {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.color-option {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  border: 2px solid #ddd;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
}

.color-option.active {
  border-color: #007bff;
  transform: scale(1.1);
}

.color-option.active::after {
  content: '✓';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  font-size: 12px;
  font-weight: bold;
}

.color--red { background: #e74c3c; }
.color--black { background: #2c3e50; }
.color--brown { background: #8b4513; }
.color--white { background: #fff; border-color: #ccc; }
.color--blue { background: #3498db; }
.color--grey { background: #95a5a6; }
.color--pink { background: #e91e63; }

/* Card Actions */
.card-actions {
  display: flex;
  gap: 10px;
  align-items: center;
  margin-bottom: 15px;
}

.add-to-cart-btn {
  flex: 1;
  padding: 12px;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.add-to-cart-btn.added {
  background: #27ae60;
  color: #fff;
}

/* Bottom Actions */
.wishlist-bottom-actions {
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.actions-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.bulk-actions {
  display: flex;
  align-items: center;
  gap: 15px;
}

.select-all-checkbox {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 14px;
  color: #333;
}

.checkmark {
  width: 20px;
  height: 20px;
  border: 1px solid #ddd;
  border-radius: 4px;
  display: inline-block;
  position: relative;
}

.select-all-checkbox input:checked + .checkmark::after {
  content: '✓';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #007bff;
  font-size: 16px;
}

.summary-info {
  text-align: right;
}

.summary-row {
  font-size: 14px;
  margin-bottom: 8px;
  color: #333;
}

.summary-row span:first-child {
  margin-right: 10px;
}

.total-value, .selected-value {
  font-weight: 600;
  color: #e74c3c;
}

/* Modal Styles */
.modal__overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal__content {
  background: #fff;
  border-radius: 12px;
  max-width: 600px;
  width: 90%;
  max-height: 90vh;
  overflow-y: auto;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.modal__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  border-bottom: 1px solid #ddd;
}

.modal__header h4 {
  margin: 0;
  font-size: 18px;
  display: flex;
  align-items: center;
  gap: 8px;
}

.modal__close {
  background: none;
  border: none;
  font-size: 18px;
  cursor: pointer;
  color: #666;
}

.modal__body {
  padding: 20px;
}

.quick-view-content {
  display: flex;
  gap: 20px;
}

.product-image-section {
  flex: 1;
}

.product-image-section img {
  width: 100%;
  border-radius: 8px;
}

.product-info-section {
  flex: 1;
}

.product-description {
  margin: 15px 0;
  color: #666;
}

.modal__footer {
  padding: 15px 20px;
  border-top: 1px solid #ddd;
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .wishlist-grid {
    grid-template-columns: 1fr;
  }

  .wishlist-header {
    flex-direction: column;
    gap: 15px;
    align-items: flex-start;
  }

  .header-actions {
    width: 100%;
    justify-content: flex-start;
  }

  .actions-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 15px;
  }

  .summary-info {
    text-align: left;
  }

  .quick-view-content {
    flex-direction: column;
  }
}

/* Button Styles */
.btn {
  padding: 10px 15px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
  transition: all 0.3s ease;
}

.btn--primary {
  background: #007bff;
  color: #fff;
}

.btn--primary:disabled {
  background: #ccc;
  cursor: not-allowed;
}

.btn--secondary {
  background: #6c757d;
  color: #fff;
}

.btn--outline {
  background: none;
  border: 1px solid #ddd;
  color: #333;
}

.btn--icon {
  background: none;
  border: none;
  color: #e74c3c;
  font-size: 18px;
}

.btn--primary:hover:not(:disabled),
.btn--secondary:hover,
.btn--outline:hover {
  opacity: 0.9;
}
</style>