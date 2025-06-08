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
                  <th></th>
                  <th>Sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(product, index) in products"
                  :key="product.id"
                  :class="{ unselected: !product.selected }"
                >
                  <td>
                    <input type="checkbox" v-model="product.selected" />
                  </td>
                  <td class="cart__product__item">
                    <img :src="$imageUrl + product.image" alt="" />
                    <div class="cart__product__item__title">
                      <h6>{{ product.name }}</h6>
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

      <div class="cart__total__proccing">
        <div class="cart-row">
          <div class="discount__content">
            <div class="shopnow-voucher">ShopNow Voucher</div>
            <h6>Mã giảm giá</h6>
            <form class="coupon-form" @submit.prevent="applyCoupon">
              <input v-model="couponCode" type="text" placeholder="Nhập mã giảm giá" />
              <button type="submit" class="site-btn">Áp dụng</button>
            </form>
          </div>

          <div class="cart__total__procced">
            <h6>Tổng cộng ({{ totalCheckedProducts }} Sản phẩm):</h6>
            <ul>
              <li>Tiết kiệm <span>{{ formatPrice(discount) }}</span></li>
            </ul>

            <div class="total-summary">
              <div class="total-row final">
                <span>Tổng thanh toán:</span>
                <span>{{ formatPrice(totalAmount) }}</span>
              </div>
            </div>

            <button class="primary-btn" @click="checkout">Mua Hàng</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shop Cart Section End -->
</template>

<script setup>
import { reactive, computed } from 'vue'

const $imageUrl = '/images/' // hoặc theo giá trị của bạn

const products = reactive([
  {
    id: 1,
    name: 'Chain bucket bag',
    price: 150.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-1.jpg',
  },
  {
    id: 2,
    name: 'Zip-pockets pebbled tote briefcase',
    price: 170.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-2.jpg',
  },
  {
    id: 3,
    name: 'Black jean',
    price: 85.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-3.jpg',
  },
  {
    id: 4,
    name: 'Cotton Shirt',
    price: 55.0,
    quantity: 1,
    selected: true,
    image: 'shop-cart/cp-4.jpg',
  },
])

const couponCode = reactive('')

const discount = 0 // ví dụ tạm chưa xử lý giảm giá

function formatPrice(num) {
  return `$ ${num.toFixed(2)}`
}

// Tính tổng số sản phẩm được chọn dựa trên checkbox, bỏ qua quantity
const totalCheckedProducts = computed(() => products.filter(p => p.selected).length)

// Tổng tiền = tổng tiền các sản phẩm được chọn (tính theo price * quantity)
const totalAmount = computed(() =>
  products.reduce((acc, p) => (p.selected ? acc + p.price * p.quantity : acc), 0) - discount
)

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
}

function applyCoupon() {
  alert(`Áp dụng mã giảm giá: ${couponCode}`)
  // Xử lý mã giảm giá ở đây
}

function checkout() {
  alert(`Thanh toán tổng: ${formatPrice(totalAmount.value)}`)
}
</script>

<style scoped>
.unselected {
  color: red;
  opacity: 0.6;
}

.unselected td {
  color: red;
}
</style>
