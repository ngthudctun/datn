<template>
  <!-- Shop Cart Section Begin -->
  <section class="shop-cart spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="shop__cart__table">
            <table>
              <thead>
                <tr>
                  <th style="min-width: 30px;">
                    <label class="custom-checkbox">
                      <input type="checkbox" v-model="selectAll" @change="toggleSelectAll" />
                      <span class="checkmark"></span>
                    </label>
                  </th>
                  <th>Sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(product, index) in products" :key="product.id" :class="{ unselected: !product.selected }">
                  <td>
                    <label class="custom-checkbox">
                      <input type="checkbox" v-model="product.selected" @change="updateSelectAll" />
                      <span class="checkmark"></span>
                    </label>
                  </td>
                  <td class="cart__product__item">
                    <img :src="$imageUrl + product.image" alt="" />
                    <div class="cart__product__item__title pt-0">
                      <h6>{{ product.name }}</h6>
                      <span @click="openVariantPopup(product, index)" class="variant-info">
                        <i class="fa-light fa-edit"></i>
                        Size: {{ product.size }}, Màu: {{ product.color }}, Chất liệu: {{ product.material }}
                      </span>
                      <div class="rating">
                        <i class="fa fa-star" v-for="star in 5" :key="star"></i>
                      </div>
                    </div>
                  </td>
                  <td class="cart__price">{{ formatPrice(product.price) }}</td>
                  <td class="cart__quantity">
                    <div class="pro-qty">
                      <span class="dec qtybtn" @click="decreaseQty(index)">-</span>
                      <input type="text" v-model.number="product.quantity" @input="checkQty(index)" />
                      <span class="inc qtybtn" @click="increaseQty(index)">+</span>
                    </div>
                  </td>
                  <td class="cart__total">{{ formatPrice(product.price * product.quantity) }}</td>
                  <td class="cart__close">
                    <span class="fa-light fa-xmark" @click="removeProduct(index)"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Fixed Bottom Cart Summary -->
      <div class="cart__bottom__summary">
        <div class="summary__container">
          <!-- Left: Coupon Section -->
          <div class="coupon__section">
            <div class="coupon__header">
              <i class="fa-light fa-ticket"></i>
              <span>Mã giảm giá</span>
            </div>
            <div class="coupon__input">
              <input 
                v-model="couponCode" 
                type="text" 
                placeholder="Nhập hoặc chọn mã giảm giá"
                readonly
                @click="showCouponPopup = true"
              />
              <button @click="showCouponPopup = true" class="coupon__select__btn">
                <i class="fa fa-chevron-down"></i>
              </button>
            </div>
          </div>

          <!-- Right: Order Summary -->
          <div class="order__summary">
            <div class="summary__info">
              <div class="summary__row">
                <span class="summary__label">{{ totalCheckedProducts }} sản phẩm</span>
                <span class="summary__value">{{ formatPrice(subtotal) }}</span>
              </div>
              <div class="summary__row discount" v-if="discount > 0">
                <span class="summary__label">
                  <i class="fa fa-tag"></i>
                  Giảm giá
                </span>
                <span class="summary__value">-{{ formatPrice(discount) }}</span>
              </div>
              <div class="summary__row total">
                <span class="summary__label">Tổng thanh toán:</span>
                <span class="summary__value">{{ formatPrice(totalAmount) }}</span>
              </div>
            </div>
            <button class="checkout__btn" @click="checkout" :disabled="totalCheckedProducts === 0">
              <i class="fa fa-shopping-bag"></i>
              Mua ngay ({{ totalCheckedProducts }})
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Improved Variant Modal -->
  <div v-if="showVariantPopup" class="modal__overlay" @click.self="closeVariantPopup">
    <div class="modal__content variant__modal">
      <div class="modal__header">
        <h4>
          <i class="fa fa-cog"></i>
          Chọn thuộc tính sản phẩm
        </h4>
        <button @click="closeVariantPopup" class="modal__close">
          <i class="fa fa-times"></i>
        </button>
      </div>
      
      <div class="modal__body">
        <div class="variant__group">
          <label class="variant__label">Kích thước</label>
          <div class="variant__options">
            <label 
              v-for="size in sizes" 
              :key="size"
              :class="['variant__option', { active: tempProduct.size === size }]"
            >
              <input type="radio" :value="size" v-model="tempProduct.size" />
              <span>{{ size.toUpperCase() }}</span>
            </label>
          </div>
        </div>

        <div class="variant__group">
          <label class="variant__label">Màu sắc</label>
          <div class="variant__options">
            <label 
              v-for="color in colors" 
              :key="color"
              :class="['variant__option', 'color__option', { active: tempProduct.color === color }]"
            >
              <input type="radio" :value="color" v-model="tempProduct.color" />
              <span :class="`color--${color}`">{{ color }}</span>
            </label>
          </div>
        </div>

        <div class="variant__group">
          <label class="variant__label">Chất liệu</label>
          <div class="variant__options">
            <label 
              v-for="material in materials" 
              :key="material"
              :class="['variant__option', { active: tempProduct.material === material }]"
            >
              <input type="radio" :value="material" v-model="tempProduct.material" />
              <span>{{ material }}</span>
            </label>
          </div>
        </div>
      </div>

      <div class="modal__footer">
        <button @click="closeVariantPopup" class="btn btn--secondary">Hủy</button>
        <button @click="applyVariant" class="btn btn--primary">
          <i class="fa fa-check"></i>
          Xác nhận
        </button>
      </div>
    </div>
  </div>

  <!-- Improved Coupon Modal -->
  <div v-if="showCouponPopup" class="modal__overlay" @click.self="showCouponPopup = false">
    <div class="modal__content coupon__modal">
      <div class="modal__header">
        <h4>
          <i class="fa fa-ticket"></i>
          Chọn mã giảm giá
        </h4>
        <button @click="showCouponPopup = false" class="modal__close">
          <i class="fa fa-times"></i>
        </button>
      </div>
      
      <div class="modal__body">
        <div class="coupon__list">
          <div 
            v-for="coupon in availableCoupons" 
            :key="coupon.code"
            :class="['coupon__item', { active: couponCode === coupon.code }]"
            @click="selectCoupon(coupon.code)"
          >
            <div class="coupon__info">
              <div class="coupon__code">{{ coupon.code }}</div>
              <div class="coupon__desc">{{ coupon.description }}</div>
            </div>
            <div class="coupon__value">{{ coupon.value }}</div>
          </div>
        </div>
      </div>

      <div class="modal__footer">
        <button @click="showCouponPopup = false" class="btn btn--secondary">Đóng</button>
        <button @click="applyCoupon" class="btn btn--primary" :disabled="!couponCode">
          <i class="fa fa-check"></i>
          Áp dụng
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, computed, ref, onMounted } from 'vue'

const products = reactive([
  {
    id: 1,
    name: 'Chain bucket bag',
    price: 150.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-1.jpg',
    size: 'xs',
    color: 'red',
    material: 'cotton',
  },
  {
    id: 2,
    name: 'Zip-pockets pebbled tote briefcase',
    price: 170.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-2.jpg',
    size: 'xs',
    color: 'black',
    material: 'polyester',
  },
  {
    id: 3,
    name: 'Black jean',
    price: 85.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-3.jpg',
    size: 'xs',
    color: 'blue',
    material: 'wool',
  },
  {
    id: 4,
    name: 'Cotton Shirt',
    price: 55.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-4.jpg',
    size: 'xs',
    color: 'red',
    material: 'cotton',
  },
])

const couponCode = ref('')
const selectAll = ref(true)
const discount = ref(0)

// Available coupons data
const availableCoupons = reactive([
  { code: 'SALE20', description: 'Giảm 20% cho đơn hàng từ $100', value: '20%' },
  { code: 'FREESHIP', description: 'Miễn phí vận chuyển', value: 'Free Ship' },
  { code: 'SHOPNOW10', description: 'Giảm $10 cho đơn hàng đầu tiên', value: '$10' },
])

function formatPrice(num) {
  return `$${num.toFixed(2)}`
}

const totalCheckedProducts = computed(() => products.filter(p => p.selected).length)

const subtotal = computed(() => 
  products.reduce((acc, p) => (p.selected ? acc + p.price * p.quantity : acc), 0)
)

const totalAmount = computed(() => subtotal.value - discount.value)

function toggleSelectAll() {
  products.forEach(p => (p.selected = selectAll.value))
}

function updateSelectAll() {
  selectAll.value = products.every(p => p.selected)
}

function increaseQty(index) {
  if (!products[index].selected) return
  products[index].quantity++
}

function decreaseQty(index) {
  if (!products[index].selected) return
  if (products[index].quantity > 1) {
    products[index].quantity--
  }
}

function checkQty(index) {
  if (!products[index].selected) return
  if (products[index].quantity < 1 || isNaN(products[index].quantity)) {
    products[index].quantity = 1
  }
}

function removeProduct(index) {
  products.splice(index, 1)
  updateSelectAll()
}

function applyCoupon() {
  if (couponCode.value) {
    const coupon = availableCoupons.find(c => c.code === couponCode.value)
    if (coupon) {
      // Calculate discount based on coupon
      if (coupon.code === 'SALE20') {
        discount.value = subtotal.value * 0.2
      } else if (coupon.code === 'SHOPNOW10') {
        discount.value = 10
      }
      showCouponPopup.value = false
    }
  }
}

function checkout() {
  if (totalCheckedProducts.value === 0) return
  alert(`Thanh toán ${totalCheckedProducts.value} sản phẩm với tổng tiền: ${formatPrice(totalAmount.value)}`)
}

// Variant popup functionality
const showVariantPopup = ref(false)
const selectedProductIndex = ref(null)
const tempProduct = reactive({ size: '', color: '', material: '' })
const sizes = ['xs', 's', 'm', 'l', 'xl']
const colors = ['red', 'black', 'blue', 'white', 'green']
const materials = ['cotton', 'polyester', 'wool', 'silk']

function openVariantPopup(product, index) {
  selectedProductIndex.value = index
  tempProduct.size = product.size
  tempProduct.color = product.color
  tempProduct.material = product.material
  showVariantPopup.value = true
}

function closeVariantPopup() {
  showVariantPopup.value = false
}

function applyVariant() {
  const index = selectedProductIndex.value
  if (index !== null) {
    products[index].size = tempProduct.size
    products[index].color = tempProduct.color
    products[index].material = tempProduct.material
  }
  showVariantPopup.value = false
}

// Coupon popup functionality
const showCouponPopup = ref(false)

function selectCoupon(code) {
  couponCode.value = code
}

onMounted(() => {
  const footer = document.querySelector('footer')
  if (footer) footer.style.display = 'none'
})
</script>

<style scoped>
.unselected td {
  color: #999;
}

.shop__cart__table th,
.shop__cart__table td {
  vertical-align: middle;
}

.variant-info {
  cursor: pointer;
  color: #007bff;
  font-size: 13px;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  margin-top: 5px;
  padding: 2px 6px;
  border-radius: 4px;
  transition: all 0.3s ease;
}

.variant-info:hover {
  background-color: #f8f9fa;
  color: #0056b3;
}

.variant-info i {
  font-size: 12px;
}

/* Fixed Bottom Summary */
.cart__bottom__summary {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  background: #fff;
  border-top: 1px solid #e9ecef;
  box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  padding: 16px 0;
}

.summary__container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  display: flex;
  gap: 20px;
  align-items: center;
  justify-content: space-between;
}

.coupon__section {
  flex: 1;
  max-width: 300px;
}

.coupon__header {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 8px;
  font-size: 14px;
  font-weight: 600;
  color: #495057;
}

.coupon__header i {
  color: #28a745;
}

.coupon__input {
  display: flex;
  border: 1px solid #ced4da;
  border-radius: 6px;
  overflow: hidden;
}

.coupon__input input {
  flex: 1;
  padding: 10px 12px;
  border: none;
  outline: none;
  font-size: 14px;
  cursor: pointer;
  background: #f8f9fa;
}

.coupon__select__btn {
  background: #007bff;
  color: white;
  border: none;
  padding: 10px 15px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.coupon__select__btn:hover {
  background: #0056b3;
}

.order__summary {
  flex: 1;
  max-width: 500px;
  display: flex;
  gap: 20px;
  align-items: center;
}

.summary__info {
  flex: 1;
}

.summary__row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 4px;
  font-size: 14px;
}

.summary__row.discount {
  color: #28a745;
}

.summary__row.total {
  font-size: 16px;
  font-weight: 600;
  color: #212529;
  margin-top: 8px;
  padding-top: 8px;
  border-top: 1px solid #e9ecef;
}

.summary__row.total .summary__value {
  color: #dc3545;
  font-size: 18px;
}

.checkout__btn {
  background: #dc3545;
  color: white;
  border: none;
  padding: 12px 24px;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
}

.checkout__btn:hover:not(:disabled) {
  background: #c82333;
  transform: translateY(-1px);
}

.checkout__btn:disabled {
  background: #6c757d;
  cursor: not-allowed;
}

.shop-cart {
  padding-bottom: 120px;
}

/* Modal Styles */
.modal__overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  backdrop-filter: blur(4px);
}

.modal__content {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  max-width: 500px;
  width: 90%;
  max-height: 80vh;
  overflow: hidden;
  animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.modal__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #e9ecef;
  background: #f8f9fa;
}

.modal__header h4 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
  color: #212529;
  display: flex;
  align-items: center;
  gap: 8px;
}

.modal__close {
  background: none;
  border: none;
  font-size: 18px;
  cursor: pointer;
  color: #6c757d;
  padding: 5px;
  border-radius: 4px;
  transition: all 0.3s ease;
}

.modal__close:hover {
  background: #e9ecef;
  color: #495057;
}

.modal__body {
  padding: 20px;
  max-height: 400px;
  overflow-y: auto;
}

.modal__footer {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  padding: 20px;
  border-top: 1px solid #e9ecef;
  background: #f8f9fa;
}

/* Variant Modal Specific */
.variant__group {
  margin-bottom: 24px;
}

.variant__label {
  display: block;
  font-weight: 600;
  margin-bottom: 10px;
  color: #495057;
  font-size: 14px;
}

.variant__options {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.variant__option {
  cursor: pointer;
  padding: 8px 16px;
  border: 2px solid #e9ecef;
  border-radius: 6px;
  transition: all 0.3s ease;
  background: #fff;
  font-size: 14px;
  font-weight: 500;
}

.variant__option input {
  display: none;
}

.variant__option:hover {
  border-color: #ca1515;
  background: #f8f9fa;
}

.variant__option.active {
  border-color: #ca1515;
  color: #ca1515;
}

.color__option span {
  display: inline-block;
  padding: 2px 8px;
  border-radius: 4px;
  text-transform: capitalize;
}

/* Coupon Modal Specific */
.coupon__list {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.coupon__item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 16px;
  border: 2px solid #e9ecef;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  background: #fff;
}

.coupon__item:hover {
  border-color: #007bff;
  background: #f8f9fa;
}

.coupon__item.active {
  border-color: #007bff;
  background: #e3f2fd;
}

.coupon__info {
  flex: 1;
}

.coupon__code {
  font-weight: 600;
  font-size: 16px;
  color: #007bff;
  margin-bottom: 4px;
}

.coupon__desc {
  font-size: 13px;
  color: #6c757d;
}

.coupon__value {
  font-weight: 600;
  font-size: 16px;
  color: #28a745;
}

/* Button Styles */
.btn {
  border: none;
  padding: 10px 18px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.btn--primary {
  background: #ca1515;
  color: white;
}

.btn--primary:hover:not(:disabled) {
  background: #FF4444;
  color: white;
}

.btn--secondary {
  background: #6c757d;
  color: white;
}

.btn--secondary:hover {
  background: #545b62;
}

.btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

/* Responsive Design */
@media (max-width: 768px) {
  .summary__container {
    flex-direction: column;
    gap: 15px;
    padding: 0 15px;
  }

  .coupon__section,
  .order__summary {
    max-width: 100%;
    width: 100%;
  }

  .order__summary {
    flex-direction: column;
    gap: 15px;
  }

  .checkout__btn {
    width: 100%;
    justify-content: center;
  }

  .shop-cart {
    padding-bottom: 180px;
  }

  .modal__content {
    width: 95%;
    margin: 10px;
  }

  .variant__options {
    justify-content: center;
  }

  .modal__footer {
    flex-direction: column;
  }

  .modal__footer .btn {
    width: 100%;
  }
}
</style>