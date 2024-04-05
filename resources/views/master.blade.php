<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href=" {{asset('assets/main.css')}}">
</head>


<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <div class="row">
                <h1 class="mt-2">@yield('title')</h1>

                <div id="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer3">
            <div class="container ">
                <p><a href="">AliExpress</a> | <a href="">1688.com</a> | <a href="">Tmall Taobao
                        World</a> | <a href="">Alipay</a> | <a href="">Lazada</a> |<a
                        href="">Taobao Global</a> </p>
                <p><a href="">Chính sách và quy tắc</a> - <a href="">Thông báo pháp lý
                    </a> - <a href="">Chính sách về danh sách sản phẩm</a> - <a href="">Bảo vệ tài sản trí
                        tuệ
                    </a> - <a href="">Chính sách Quyền riêng tư
                    </a> -<a href="">Điều khoản Sử dụng</a> - <a href="">Tuân thủ tính chính trực</a></p>
                <p>© 1999-2024 hahahahahah.com. Đã bảo lưu mọi quyền.
                    浙公网安备 33010002000092号
                    浙B2-20120091-4</p>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/main.js')}}"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
