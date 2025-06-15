<template>
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="container">
                <div class="header-content text-center">
                    <div class="brand-logo">
                        <i class="fas fa-shopping-bag me-3"></i>ShopNow
                    </div>
                    <h1 class="h3 mb-0">Điều Khoản Dịch Vụ</h1>
                    <p class="lead mt-3">Hiệu lực từ ngày {{ effectiveDate }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mb-5">
            <div class="terms-container">
                <!-- Navigation -->
                <div class="terms-nav">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div v-for="(section, index) in sections" :key="index" class="nav-item"
                            :class="{ active: activeSection === index }" @click="scrollToSection(index)">
                            <i :class="section.icon" class="me-2"></i>
                            {{ section.title }}
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="terms-content">
                    <div v-for="(section, index) in sections" :key="index" :id="'section-' + index"
                        class="section-content">
                        <h2 class="section-title">
                            <i :class="section.icon" class="me-3"></i>
                            {{ section.title }}
                        </h2>
                        <div v-html="section.content"></div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="contact-section">
                    <h3><i class="fas fa-envelope me-2"></i>Liên Hệ Với Chúng Tôi</h3>
                    <p>Nếu bạn có bất kỳ câu hỏi nào về Điều Khoản Dịch Vụ này, vui lòng liên hệ với chúng tôi:</p>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>support@shopnow.vn</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>1900 1234</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Đường ABC, Quận 1, TP.HCM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TermsOfService',
    data() {
        return {
            activeSection: 0,
            effectiveDate: '15/06/2025',
            sections: [
                {
                    title: 'Giới Thiệu',
                    icon: 'fas fa-info-circle',
                    content: `
            <p>Chào mừng bạn đến với <strong>ShopNow</strong> - nền tảng thương mại điện tử hàng đầu Việt Nam. Bằng cách truy cập và sử dụng website của chúng tôi, bạn đồng ý tuân thủ các điều khoản và điều kiện được quy định dưới đây.</p>
            <div class="highlight-box">
              <h5><i class="fas fa-exclamation-triangle text-warning me-2"></i>Lưu ý quan trọng:</h5>
              <p class="mb-0">Việc sử dụng dịch vụ của chúng tôi đồng nghĩa với việc bạn đã đọc, hiểu và đồng ý với tất cả các điều khoản này.</p>
            </div>
            <p>ShopNow cam kết mang đến trải nghiệm mua sắm tốt nhất với chính sách minh bạch và dịch vụ chuyên nghiệp.</p>
          `
                },
                {
                    title: 'Định Nghĩa',
                    icon: 'fas fa-book',
                    content: `
            <p>Trong Điều Khoản Dịch Vụ này, các thuật ngữ sau có ý nghĩa như được định nghĩa:</p>
            <ul class="list-unstyled">
              <li class="mb-3"><strong>"ShopNow", "Chúng tôi", "Của chúng tôi":</strong> Đề cập đến công ty ShopNow và các dịch vụ do chúng tôi cung cấp.</li>
              <li class="mb-3"><strong>"Người dùng", "Bạn", "Khách hàng":</strong> Đề cập đến bất kỳ cá nhân hoặc tổ chức nào sử dụng dịch vụ của chúng tôi.</li>
              <li class="mb-3"><strong>"Dịch vụ":</strong> Bao gồm website, ứng dụng di động và tất cả các dịch vụ liên quan do ShopNow cung cấp.</li>
              <li class="mb-3"><strong>"Sản phẩm":</strong> Tất cả các mặt hàng được bán trên nền tảng ShopNow.</li>
            </ul>
          `
                },
                {
                    title: 'Đăng Ký Tài Khoản',
                    icon: 'fas fa-user-plus',
                    content: `
            <h5>Yêu cầu đăng ký:</h5>
            <p>Để sử dụng đầy đủ các tính năng của ShopNow, bạn cần tạo tài khoản với thông tin chính xác và đầy đủ.</p>
            <div class="important-note">
              <h6><i class="fas fa-shield-alt text-warning me-2"></i>Bảo mật tài khoản:</h6>
              <ul>
                <li>Bạn có trách nhiệm bảo mật thông tin đăng nhập</li>
                <li>Không chia sẻ tài khoản với người khác</li>
                <li>Thông báo ngay cho chúng tôi nếu phát hiện tài khoản bị xâm phạm</li>
              </ul>
            </div>
            <h5>Điều kiện đăng ký:</h5>
            <ul>
              <li>Từ 18 tuổi trở lên hoặc có sự đồng ý của người giám hộ</li>
              <li>Cung cấp thông tin chính xác và cập nhật</li>
              <li>Tuân thủ các quy định pháp luật Việt Nam</li>
            </ul>
          `
                },
                {
                    title: 'Quy Định Mua Hàng',
                    icon: 'fas fa-shopping-cart',
                    content: `
            <h5>Quy trình đặt hàng:</h5>
            <ol>
              <li><strong>Chọn sản phẩm:</strong> Duyệt và chọn sản phẩm mong muốn</li>
              <li><strong>Thêm vào giỏ hàng:</strong> Kiểm tra thông tin và số lượng</li>
              <li><strong>Thanh toán:</strong> Chọn phương thức thanh toán phù hợp</li>
              <li><strong>Xác nhận đơn hàng:</strong> Nhận email xác nhận từ hệ thống</li>
            </ol>
            <div class="highlight-box">
              <h6>Giá cả và khuyến mãi:</h6>
              <p class="mb-0">Tất cả giá cả hiển thị đã bao gồm VAT. Các chương trình khuyến mãi có thể thay đổi mà không cần báo trước.</p>
            </div>
            <h5>Xác nhận đơn hàng:</h5>
            <p>Đơn hàng chỉ được xác nhận sau khi thanh toán thành công và có xác nhận từ hệ thống.</p>
          `
                },
                {
                    title: 'Thanh Toán',
                    icon: 'fas fa-credit-card',
                    content: `
            <h5>Phương thức thanh toán được chấp nhận:</h5>
            <div class="row">
              <div class="col-md-6">
                <ul>
                  <li>Thẻ tín dụng/ghi nợ (Visa, MasterCard)</li>
                  <li>Ví điện tử (MoMo, ZaloPay, VNPay)</li>
                  <li>Chuyển khoản ngân hàng</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul>
                  <li>Thanh toán khi nhận hàng (COD)</li>
                  <li>Thẻ ATM nội địa</li>
                  <li>Quét mã QR</li>
                </ul>
              </div>
            </div>
            <div class="important-note">
              <h6><i class="fas fa-lock text-success me-2"></i>Bảo mật thanh toán:</h6>
              <p class="mb-0">Tất cả giao dịch thanh toán được mã hóa SSL 256-bit và tuân thủ tiêu chuẩn bảo mật PCI DSS.</p>
            </div>
            <h5>Chính sách hoàn tiền:</h5>
            <p>Hoàn tiền sẽ được xử lý trong vòng 7-14 ngày làm việc tùy thuộc vào phương thức thanh toán ban đầu.</p>
          `
                },
                {
                    title: 'Giao Hàng',
                    icon: 'fas fa-truck',
                    content: `
            <h5>Thời gian giao hàng:</h5>
            <ul>
              <li><strong>Nội thành TP.HCM, Hà Nội:</strong> 1-2 ngày làm việc</li>
              <li><strong>Tỉnh thành khác:</strong> 2-5 ngày làm việc</li>
              <li><strong>Vùng sâu, vùng xa:</strong> 5-7 ngày làm việc</li>
            </ul>
            <div class="highlight-box">
              <h6>Miễn phí giao hàng:</h6>
              <p class="mb-0">Đơn hàng từ 500.000 VND trở lên được miễn phí giao hàng toàn quốc.</p>
            </div>
            <h5>Lưu ý khi nhận hàng:</h5>
            <ul>
              <li>Kiểm tra kỹ sản phẩm trước khi thanh toán (với COD)</li>
              <li>Giữ lại biên lai giao hàng</li>
              <li>Liên hệ ngay nếu có vấn đề với sản phẩm</li>
            </ul>
          `
                },
                {
                    title: 'Đổi Trả & Bảo Hành',
                    icon: 'fas fa-undo',
                    content: `
            <h5>Chính sách đổi trả:</h5>
            <div class="important-note">
              <h6><i class="fas fa-calendar-alt text-info me-2"></i>Thời hạn đổi trả: 15 ngày</h6>
              <p class="mb-0">Kể từ ngày nhận hàng, áp dụng cho sản phẩm còn nguyên vẹn, chưa sử dụng.</p>
            </div>
            <h5>Điều kiện đổi trả:</h5>
            <ul>
              <li>Sản phẩm trong tình trạng ban đầu</li>
              <li>Còn đầy đủ phụ kiện, hộp, nhãn mác</li>
              <li>Có hóa đơn mua hàng</li>
              <li>Không áp dụng cho sản phẩm đã qua sử dụng</li>
            </ul>
            <h5>Quy trình đổi trả:</h5>
            <ol>
              <li>Liên hệ bộ phận CSKH</li>
              <li>Cung cấp thông tin đơn hàng</li>
              <li>Gửi sản phẩm về kho</li>
              <li>Nhận xác nhận và xử lý</li>
            </ol>
          `
                },
                {
                    title: 'Quyền & Nghĩa Vụ',
                    icon: 'fas fa-balance-scale',
                    content: `
            <div class="row">
              <div class="col-md-6">
                <h5>Quyền lợi khách hàng:</h5>
                <ul>
                  <li>Được cung cấp thông tin chính xác về sản phẩm</li>
                  <li>Được bảo vệ thông tin cá nhân</li>
                  <li>Được hỗ trợ kỹ thuật 24/7</li>
                  <li>Được đổi trả theo chính sách</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h5>Nghĩa vụ khách hàng:</h5>
                <ul>
                  <li>Cung cấp thông tin chính xác</li>
                  <li>Thanh toán đúng hạn</li>
                  <li>Sử dụng dịch vụ đúng mục đích</li>
                  <li>Tuân thủ các quy định pháp luật</li>
                </ul>
              </div>
            </div>
            <div class="highlight-box">
              <h6>Cam kết của ShopNow:</h6>
              <p class="mb-0">Chúng tôi cam kết cung cấp sản phẩm chính hãng, dịch vụ chuyên nghiệp và hỗ trợ khách hàng tận tình.</p>
            </div>
          `
                },
                {
                    title: 'Bảo Mật Thông Tin',
                    icon: 'fas fa-shield-alt',
                    content: `
            <h5>Thu thập thông tin:</h5>
            <p>Chúng tôi chỉ thu thập thông tin cần thiết để cung cấp dịch vụ tốt nhất cho bạn.</p>
            <div class="important-note">
              <h6><i class="fas fa-user-shield text-primary me-2"></i>Cam kết bảo mật:</h6>
              <ul class="mb-0">
                <li>Không bán thông tin cá nhân cho bên thứ ba</li>
                <li>Sử dụng công nghệ mã hóa hiện đại</li>
                <li>Tuân thủ quy định về bảo vệ dữ liệu cá nhân</li>
              </ul>
            </div>
            <h5>Quyền của bạn:</h5>
            <ul>
              <li>Yêu cầu truy cập thông tin cá nhân</li>
              <li>Yêu cầu chỉnh sửa thông tin không chính xác</li>
              <li>Yêu cầu xóa thông tin (trong một số trường hợp)</li>
              <li>Rút lại sự đồng ý xử lý dữ liệu</li>
            </ul>
          `
                },
                {
                    title: 'Điều Khoản Khác',
                    icon: 'fas fa-gavel',
                    content: `
            <h5>Thay đổi điều khoản:</h5>
            <p>ShopNow có quyền cập nhật các Điều Khoản Dịch Vụ này. Mọi thay đổi sẽ được thông báo trước ít nhất 15 ngày.</p>
            <h5>Giải quyết tranh chấp:</h5>
            <div class="highlight-box">
              <p class="mb-0">Mọi tranh chấp phát sinh sẽ được giải quyết thông qua thương lượng. Nếu không thể thỏa thuận, tranh chấp sẽ được giải quyết tại Tòa án có thẩm quyền tại TP.HCM.</p>
            </div>
            <h5>Luật áp dụng:</h5>
            <p>Điều Khoản Dịch Vụ này được điều chỉnh bởi pháp luật Việt Nam.</p>
            <h5>Hiệu lực:</h5>
            <p>Điều Khoản này có hiệu lực từ ngày ${this.effectiveDate} và được áp dụng cho tất cả người dùng của ShopNow.</p>
          `
                }
            ],
        };
    },
    mounted() {
        window.addEventListener('scroll', this.observeSections);
        this.observeSections();
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.observeSections);
    },
    methods: {
        scrollToSection(index) {
            const element = document.getElementById('section-' + index);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            }
        },
        observeSections() {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const index = parseInt(entry.target.id.split('-')[1]);
                            this.activeSection = index;
                        }
                    });
                },
                { threshold: 0.3 }
            );

            this.sections.forEach((_, index) => {
                const element = document.getElementById('section-' + index);
                if (element) {
                    observer.observe(element);
                }
            });
        },
    },
};
</script>

<style scoped>
:root {
    --color-primary: #dc3545;
    --gradient-primary: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%);
}

.header-section {
    background: var(--gradient-primary);
    color: white;
    padding: 3rem 0;
    position: relative;
    overflow: hidden;
}

.header-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
    background-size: 50px 50px;
    animation: float 20s infinite linear;
}

@keyframes float {
    0% {
        transform: translateX(0px) translateY(0px);
    }

    100% {
        transform: translateX(-50px) translateY(-50px);
    }
}

.header-content {
    position: relative;
    z-index: 1;
}

.brand-logo {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.terms-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(220, 53, 69, 0.1);
    margin: -50px auto 0;
    position: relative;
    z-index: 2;
    max-width: 1000px;
    overflow: hidden;
}

.terms-nav {
    background: #FFE6E1;
    padding: 1.5rem;
    border-bottom: 3px solid var(--color-primary);
}

.nav-item {
    cursor: pointer;
    padding: 0.75rem 1.5rem;
    margin: 0.25rem;
    border-radius: 25px;
    transition: all 0.3s ease;
    background: white;
    border: 2px solid transparent;
    font-weight: 500;
}

.nav-item:hover {
    background: var(--gradient-primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
}

.nav-item.active {
    background: var(--gradient-primary);
    color: white;
    border-color: #c82333;
}

.terms-content {
    padding: 3rem;
}

.section-title {
    color: var(--color-primary);
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--gradient-primary);
    border-radius: 2px;
}

.section-content {
    margin-bottom: 2.5rem;
    animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.highlight-box {
    background: #FFE6E1;
    border-left: 5px solid var(--color-primary);
    padding: 1.5rem;
    margin: 1.5rem 0;
    border-radius: 0 10px 10px 0;
}

.important-note {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    border: 2px solid #ffc107;
    border-radius: 10px;
    padding: 1.5rem;
    margin: 1.5rem 0;
}

.contact-section {
    background: var(--gradient-primary);
    color: white;
    text-align: center;
    padding: 3rem;
    margin-top: 3rem;
}

.contact-info {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
    margin-top: 2rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 25px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.contact-item:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .header-section {
        padding: 2rem 0;
    }

    .brand-logo {
        font-size: 2rem;
    }

    .terms-content {
        padding: 2rem 1.5rem;
    }

    .nav-item {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
}
</style>