<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('assets')}}/main.css">
    <script src="{{asset('assets')}}/main.js" defer></script>
</head>


<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
 
            <div class="row">
                <h1 class="mt-2">@yield('title')</h1>

                <div id="content">
                    @yield('content')
                </div>
            </div>
       
    </main>
    <footer>
        <div class="container footer1">
            <div class="row">
                <div class="col">
                    <a href=""><strong>Nhận hỗ trợ</strong></a>
                    <a href="">Trung tâm trợ giúp</a>
                    <a href="">Trò chuyện trực tiếp</a>
                    <a href="">Kiểm tra trạng thái đơn hàng</a>
                    <a href="">Hoàn tiền</a>
                    <a href="">Báo cáo vi phạm</a>
                </div>

                <div class="col">
                    <a href=""><strong>Trade Assurance</strong></a>
                    <a href="">Thanh toán an toàn và dễ dàng</a>
                    <a href="">Chính sách hoàn tiền</a>
                    <a href="">Vận chuyển đúng hạn</a>
                    <a href="">Bảo vệ sau bán hàng</a>
                    <a href="">Dịch vụ giám sát sản phẩm</a>
                </div>

                <div class="col">
                    <a href=""><strong>Tìm nguồn hàng trên Alibaba.com</strong></a>
                    <a href="">Yêu cầu báo giá</a>
                    <a href="">Chương trình Thành viên</a>
                    <a href="">Kho vận Alibaba.com</a>
                    <a href="">Thuế bán hàng và VAT</a>
                    <a href="">Alibaba.com Tin chuyên ngành</a>
                </div>

                <div class="col">
                    <a href=""><strong>Bán hàng trên Alibaba.com</strong></a>
                    <a href="">Bắt đầu bán hàng</a>
                    <a href="">Trung tâm người bán</a>
                    <a href="">Trở thành Nhà cung cấp đã được xác minh</a>
                    <a href="">Quan hệ đối tác</a>
                    <a href="">Tải ứng dụng cho nhà cung cấp</a>
                </div>

                <div class="col">
                    <a href=""><strong>Làm quen với chúng tôi</strong></a>
                    <a href="">Giới thiệu về Alibaba.com</a>
                    <a href="">Trách nhiệm doanh nghiệp</a>
                    <a href="">Trung tâm tin tức</a>
                    <a href="">Cơ hội nghề nghiệp</a>
                </div>
            </div>
        </div>

        <div class="container footer2">
            <div class="row">
                <div class="col">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-linkedin"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-youtube"></i>
                    <i class="bi bi-tiktok"></i>
                </div>

                <div class="col">
                    <p>Giao dịch mọi lúc, mọi nơi với <a href=""><strong>ứng dụng Alibaba.com</strong></a></p>
                    <img src="https://via.placeholder.com/120x40" alt="">
                    <img src="https://via.placeholder.com/120x40" alt="">
                </div>
            </div>
        </div>

        <div class="footer3">
            <div class="container ">
                <p><a href="">AliExpress</a> | <a href="">1688.com</a> | <a href="">Tmall Taobao World</a> | <a
                        href="">Alipay</a> | <a href="">Lazada</a> |<a href="">Taobao Global</a> </p>
                <p><a href="">Chính sách và quy tắc</a> - <a href="">Thông báo pháp lý
                    </a> - <a href="">Chính sách về danh sách sản phẩm</a> - <a href="">Bảo vệ tài sản trí tuệ
                    </a> - <a href="">Chính sách Quyền riêng tư
                    </a> -<a href="">Điều khoản Sử dụng</a> - <a href="">Tuân thủ tính chính trực</a></p>
                <p>© 1999-2024 hahahahahah.com. Đã bảo lưu mọi quyền.
                    浙公网安备 33010002000092号
                    浙B2-20120091-4</p>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>
