@extends('layouts.site')
@section('title', 'Giới thiệu')
@section('maincontent')
    <section class="bread-crumb">
        <span class="crumb-border p-3"></span>
        <div class="container">
            <div class="rows">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="{{ route('site.home') }}" class="text-dark"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right" style="color: #94e3df;"></i>&nbsp;</span>
                        </li>
                        <li><strong><span style="color: #94e3df;">@yield('title')</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="main container">
        <div class="row ">
            <div class="container product col-md-9 mb-5">
                <div class="menu mt-5">
                    <div>
                        <h3 style=" font-weight: bold;">Giới thiệu</h3>
                    </div>
                </div>

                <hr>
                <div class="post">
                    <div class="content">
                        <div class="post_detail">
                            Delta Cosmetic Việt Nam trực tiếp sản xuất các dòng mỹ phẩm thiên nhiên, công ty đi theo hướng
                            phát triển bền vững và lâu dài các dòng mỹ phẩm thiên nhiên an toàn cho da nhưng không kém phần
                            hiệu quả. Hiện tại Delta Cosmetic có mạng lưới các nhà phân phối, đại lý bán lẻ các sản phẩm mỹ
                            phẩm thiên nhiên phủ rộng khắp Hà Nội và các tỉnh miền Bắc. Với phương châm “Beauty secret from
                            nature” Delta Cosmetic tin rằng mình chính là chìa khóa giúp kết nối con người đến gần hơn với
                            các sản phẩm mỹ phẩm từ thiên nhiên.
 
                            <br><b>Sứ mệnh:</b> Tự nhiên em đẹp là tràng web đem lại vẻ đẹp hoàn hảo, tự nhiên, lý tưởng nhất cho người
                            Việt Nam, vẻ đẹp xuất phát từ nội tại bộc lộ ra bên ngoài.

                            <br><b>Tầm nhìn</b> Phấn đấu trở thành cửa hàng kinh doanh mỹ phẩm 100% thiên nhiên đảm bảo chất lượng, có
                            kiểm nghiệm hiệu quả, đảm bảo an toàn tuyệt đối cho người sử dụng.

                            <br><b>Điểm nổi bật:</b> những mặt hàng mỹ phẩm tại cửa hàng luôn được kiểm duyệt chặc chẽ, luôn luôn tuân
                            theo tiêu chí 100% chiết xuất thiên nhiên, an toàn tuyệt đối cho người sử dụng. Những sản phẩm
                            luôn đạt chuẩn chất lượng và là những sản phẩm có nguồn gốc xuất xứ rõ ràng

                            <br>Mỹ phẩm từ thiên nhiên hay còn được gọi là mỹ phẩm hữu cơ với thành phần chính là những chiết
                            xuất từ những bộ phận của thực vật như hoa, quả, thân, lá cùng với những khoáng chất thiên nhiên
                            để vừa mang tính trị liệu, vừa nuôi dưỡng tế bào da.

                            <br>Do dược chiết xuất từ thiên nhiên nên những mỹ phẩm này rất an toàn cho da, kể cả những làn da
                            cực kỳ nhạy cảm. Nếu bạn là người có da nhạy cảm, hay bị kích ứng hoặc thường xuyên gặp các vấn
                            đề về da, hãy sử dụng những sản phẩm từ thiên nhiên với nhãn ghi trên vỏ hợp là hydro-allergenic
                            (ít gây kích ứng da) để chăm sóc cho da bạn nhé!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
