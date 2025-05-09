<template>
  <div
    class="bg-white w-100 position-fixed"
    style="
      z-index: 1110;

      box-sizing: border-box;

      top: 0;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    "
  >
    <nav class="row p-lg-3">
      <div class="col-lg-2 col-2 d-flex align-items-center justify-content-center">
        <i class="ti ti-menu-2"></i>
        <div class="ms-2 d-none d-lg-flex">xin chào trường nguyễn</div>
      </div>

      <div
        class="col-lg-3 col-9 border border-black rounded d-flex d-flex align-items-center"
      >
        <form class="d-flex align-items-center">
          <i class="fas fa-search"></i>
          <input
            class="form-control search-input border-0 ps-5"
            type=""
            placeholder="Search anything..."
            aria-label=""
          />
        </form>
      </div>
    </nav>
  </div>
</template>