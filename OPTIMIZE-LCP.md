- code sau khi push lên dev site để check: https://vietnam-camcom.vccdev.vn/

# Thông tin chi tiết optimize FCP LCP TBT CLS

## Yêu cầu chặn hiển thị Mức tiết kiệm ước tính: 2.510 mili giây

- Các yêu cầu đang chặn quá trình kết xuất ban đầu của trang, điều này có thể làm trễ LCP. Việc hoãn hoặc dùng cùng dòng có thể di chuyển các yêu cầu mạng này ra khỏi đường dẫn quan trọng.LCPFCPKhông được tính

### URL

1. vccdev.vn
- https://vietnam-camcom.vccdev.vn/wp-content/litespeed/css/0deb80686762396040c4927c351e5632.css?ver=8427e

2. Google Fonts
- https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap

3. Google CDN
- https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js?ver=2.2.4

## Giảm JavaScript không dùng đến Mức tiết kiệm ước tính: 591 KiB

- Giảm JavaScript không dùng đến và trì hoãn việc tải các tập lệnh cho tới khi cần có các tập lệnh này để giảm số byte mà hoạt động mạng sử dụng. Tìm hiểu cách giảm JavaScript không dùng đến.LCPFCPKhông được tính

1. Google CDN
- https://www.gstatic.com/recaptcha/releases/TnA7HacJFoBWt9hnlunBlYfK/recaptcha__en.js
- https://www.gstatic.com/recaptcha/releases/TnA7HacJFoBWt9hnlunBlYfK/recaptcha__en.js
- https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js?ver=2.2.4

2. Google Tag Manager
- https://www.googletagmanager.com/gtag/js?id=G-NP7SDS9SHG&cx=c&gtm=4e66o1
- https://www.googletagmanager.com/gtm.js?id=GTM-MQCHJP3

## Cải thiện việc phân phối hình ảnh Mức tiết kiệm ước tính: 221 KiB

- Việc giảm thời gian tải hình ảnh xuống có thể cải thiện thời gian tải trang và LCP được cảm nhận. Tìm hiểu thêm về cách tối ưu hoá kích thước hình ảnhLCPFCPKhông được tính

1. vccdev.vn
   
- div.about > div.about-media > div.ph > img
   <img style="width: 100%; height: auto" src="/wp-content/uploads/home_service_banner_pc.png.webp" alt="">
   https://vietnam-camcom.vccdev.vn/wp-content/uploads/home_service_banner_pc.png.webp
   Tệp hình ảnh này lớn hơn mức cần thiết (1544x1790) so với kích thước hiển thị (648x751). Hãy sử dụng hình ảnh thích ứng để giảm kích thước tải xuống của hình ảnh.

   <img class="brand-logo brand-logo-white skip-lazy" src="/wp-content/themes/scv/images/scv_logo_white.png" alt="VIETNAM CAMCOM" loading="eager" fetchpriority="high" decoding="sync" data-no-lazy="1" data-skip-lazy="1">
   https://vietnam-camcom.vccdev.vn/wp-content/themes/scv/images/scv_logo_white.png
   Tệp hình ảnh này lớn hơn mức cần thiết (2254x191) so với kích thước hiển thị (490x42). Hãy sử dụng hình ảnh thích ứng để giảm kích thước tải xuống của hình ảnh.

## Giảm thời gian thực thi JavaScript 2,1 giây

- Hãy cân nhắc giảm thời gian dùng để phân tích cú pháp, biên soạn và thực thi JS. Bạn có thể giải quyết vấn đề này bằng cách phân phối các tải trọng JS nhỏ hơn. Tìm hiểu cách giảm thời gian thực thi JavaScript.TBTKhông được tính

1. Google CDN
- https://www.gstatic.com/recaptcha/releases/TnA7HacJFoBWt9hnlunBlYfK/recaptcha__en.js

2. vccdev.vn
- https://vietnam-camcom.vccdev.vn/wp-content/litespeed/js/afb8f448344020dcf9f8be3980c787d1.js?ver=787d1
- https://vietnam-camcom.vccdev.vn

3. Google Tag Manager
- https://www.googletagmanager.com/gtag/js?id=G-NP7SDS9SHG&cx=c&gtm=4e66o1
- https://www.googletagmanager.com/gtm.js?id=GTM-MQCHJP3

4. Other Google APIs/SDKs
- https://www.google.com/recaptcha/api2/anchor?ar=1&k=6LeIvzctAAAAAMaHoDFLSO8fiIlw3HxwzPBgAvTc&co=aHR0cHM6Ly92aWV0bmFtLWNhbWNvbS52Y2NkZXYudm46NDQz&hl=en&v=TnA7HacJFoBWt9hnlunBlYfK&size=invisible&anchor-ms=20000&execute-ms=30000&cb=hqzz2hmiyzr8


## Giảm thiểu công việc theo chuỗi chính 3,7 giây

- Hãy cân nhắc giảm thời gian dùng để phân tích cú pháp, biên dịch và thực thi JS. Bạn có thể giải quyết vấn đề này bằng cách phân phối các tải trọng JS nhỏ hơn. Tìm hiểu cách giảm thiểu công việc theo chuỗi chínhTBTKhông được tính

Danh mục - Thời gian sử dụng
Script Evaluation - 1.731 mili giây
Other - 893 mili giây
Style & Layout - 527 mili giây
Script Parsing & Compilation - 427 mili giây
Garbage Collection - 68 mili giây
Rendering - 61 mili giây
Parse HTML & CSS - 36 mili giây