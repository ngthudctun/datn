

<template>
  <div class="w-100 header">
    <div
      class="w-100 bg-success d-flex align-items-center justify-content-center"
      style="height: 50px"
    >
   <!--    <img src="" alt="hinh anh" /> -->
    </div>
    <div class="w-100 border" style="height: 100px">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-1 d-flex justify-content-center align-items-center "><img :src="'/favicon.ico'" alt="Hình ảnh từ public" height="70px" width="70px"></div>
          <div
            class="col-7 bg row d-flex justify-content-center align-items-center"
          >
            <div class="serch_input-header col-12">
              <div class="search-wrapper">
                <!--    thanh tim kiem -->
                <div class="search-box">
                  <i class="fas fa-search search-icon"></i>
                  <input
                    type="text"
                    class="form-control search-input"
                    placeholder="Search anything..."
                  />
                  <button class="btn btn-primary search-button">Search</button>
                </div>
                <!-- thanh duoi tim kiem -->
                <div class="d-flex mt-1">
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>
                </div>
              </div>
            </div>
          </div>

          <div
            class="col-4 row d-flex justify-content-center align-items-center"
          >
            <div class="serch_input-header col-12">
              <div class="search-wrapper">
                <!--    thanh tim kiem -->
                <button
                  type="button"
                  class="btn btn-header_ff col-4 m-1 btn-outline-primary"
                >
                  Trang chu
                </button>
                <button type="button" class="btn btn-header_ff col-4 m-1 btn-outline-primary">
                  tai khoan
                </button> l
                <button type="button" class="btn col-2 m-1 btn-outline-primary">
                  <i class="fa-solid fa-cart-shopping"></i>
                </button>
                <!-- thanh duoi tim kiem -->
                <div class="d-flex align-items-center mt-1 justify-content-center">
                  <i class="fa-solid fa-cart-shopping "></i>Giao đến
                  <a href="#" class="text-secondary px-2"
                    >Q. 1, P. Bến Nghé, Hồ Chí Minh</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-100 border" style="height: 50px">
      <div class="container h-100 ">
          <div class="d-flex align-items-center h-100 ">
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>l
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>l
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>l
                </div></div>
    </div>


  </div>
</template>

<style>
a {
  text-decoration: none;
}

.search-box {
  position: relative;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
  border-radius: 5px;
  border: 1px solid rgb(179, 179, 179);
  transition: all 0.3s ease;
}

.search-box:focus-within {
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.1);
  transform: translateY(-2px);
}

.search-input {
  border-radius: 20;
  padding: 10px 0;

  padding-left: 45px;
  padding-right: 20px;

  border: 2px solid transparent;
  transition: all 0.3s ease;
}

.search-input:focus {
  border-color: #0d6efd;
  box-shadow: none;
}

.search-icon {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: #6c757d;
  z-index: 10;
}

.search-button {
  position: absolute;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 10px;
  padding: 8px 20px;
  transition: all 0.3s ease;
}

.search-button:hover {
  background-color: #0b5ed7;
  transform: translateY(-50%) scale(1.05);
}

/* Dark theme search box */
.search-box.dark {
  background-color: #212529;
}

.search-box.dark .search-input {
  background-color: #212529;
  color: #fff;
}

.search-box.dark .search-input::placeholder {
  color: #6c757d;
}

.search-box.dark .search-icon {
  color: #6c757d;
}
.btn-header_ff {
  border: none;
}
</style>