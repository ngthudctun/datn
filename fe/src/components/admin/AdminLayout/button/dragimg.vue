<template>
  <div class="">
    <form
      class="file-upload-form mt-2"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasExample22"
      aria-controls="offcanvasExample"
    >
      <label class="file-upload-label">
        <div class="file-upload-design">
          <svg height="1em" viewBox="0 0 640 512">
            <path
              d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"
            ></path>
          </svg>
          <p>Drag and Drop</p>

          <span class="browse-button">Browse file</span>
        </div>
      </label>
    </form>

    <div
      class="offcanvas offcanvas-start"
      style="z-index: 2000; width: 90%"
      tabindex="-1"
      id="offcanvasExample22"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
          Thư mục hình ảnh
        </h5>
        <button
          type="button"
          class="btn-close text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">
        <div
          class="row justify-content-center p-2"
          style="border: 1px solid; box-sizing: border-box"
        >
          <div class="col-2">
            <div
              class="py-2 link-primary"
              style="border-bottom: 1px solid black"
            >
              Hình ảnh sản phẩm
            </div>
            <div
              class="py-2 link-primary"
              style="border-bottom: 1px solid black"
            >
              Hình ảnh Danh mục
            </div>
          </div>
          <div
            class="col-7 d-flex justify-content-center flex-wrap"
            style="border-right: 1px solid black; border-left: 1px solid black"
          >
            <div class="w-100 d-flex justify-content-between">
              <div class="col-3">
                <label for="usr"><b>Lọc theo:</b></label>

                <select
                  class="mt-1 form-select"
                  aria-label="Default select example"
                >
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-3 px-1" style="box-sizing: border-box">
                <label for="usr" style="visibility: hidden"><b>.</b></label
                ><br />
                <button type="button" class="mt-1 btn btn-primary">
                  Thêm Hình ảnh
                </button>
              </div>
              <div class="col-1"></div>
              <div class="col-5">
                <label for="usr"><b>Tìm kiếm:</b></label>

                <input
                  type="text"
                  class="mt-1 form-control"
                  id="usr"
                  placeholder="tìm kiếm sản phẩm"
                  style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                />
              </div>
            </div>
            <div
              class="row mt-4"
              style="box-sizing: border-box; max-height: 500px"
            >
              <div class="col-3 mb-1">
                <img
                  :src="$imagebaseUrl + 'images.jpg'"
                  class="border border-black"
                  width="100%"
                  height="150px"
                  alt=""
                />
              </div>
              <div class="col-3 mb-2">
                <img
                  :src="$imagebaseUrl + 'images.jpg'"
                  class="border border-black"
                  width="100%"
                  height="150px"
                  alt=""
                />
              </div>
              <div class="col-3 mb-2">
                <img
                  :src="$imagebaseUrl + 'images.jpg'"
                  class="border border-black"
                  width="100%"
                  height="150px"
                  alt=""
                />
              </div>
              <div class="col-3 mb-2">
                <img
                  :src="$imagebaseUrl + 'images.jpg'"
                  class="border border-black"
                  width="100%"
                  height="150px"
                  alt=""
                />
              </div>
              <div class="col-3 mb-2">
                <img
                  :src="$imagebaseUrl + 'images.jpg'"
                  class="border border-black"
                  width="100%"
                  height="150px"
                  alt=""
                />
              </div>
              <div class="col-3 mb-2">
                <img
                  :src="$imagebaseUrl + 'images.jpg'"
                  class="border border-black"
                  width="100%"
                  height="150px"
                  alt=""
                />
              </div>
            </div>
          </div>
          <div class="col-3 rounded" style="background: #0034ff0a">
            <label for="usr"><b>URL:</b></label>

            <input
              type="text"
              class="mt-1 form-control"
              id="usr"
              placeholder="url..."
              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
            />
            <br />
            <label for="usr"><b>Tiêu đề:</b></label>

            <input
              type="text"
              class="mt-1 form-control"
              id="usr"
              placeholder="url..."
              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
            /><br />
            <label for="usr"><b>URL:</b></label>

            <input
              type="text"
              class="mt-1 form-control"
              id="usr"
              placeholder="url..."
              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<style>
.offcanvas-backdrop {
  z-index: 1900;
}
</style>
<script>
</script>