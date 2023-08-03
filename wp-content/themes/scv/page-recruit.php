<?php get_header();

/* Template Name: Recruit */
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();

?>

<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div id="recruit" class="recruit-page <?php if ($current_language != "ja") { echo "en";}?>">
        <div class="header-page">
            <div class="inner">
                <div class="header-description">
                    <div class="title-content" data-aos="fade-right">
                        <h2 class="heading">
                            <?php if ($current_language == "ja"):?>
                                採用情報
                            <?php elseif ($current_language == "en") :?>
                                Recruitment information
                            <?php elseif ($current_language == "vi") :?>
                                Thông tin tuyển dụng
                            <?php endif; ?>
                        </h2>
                    </div>
                    <div class="text-description" data-aos="fade-left">
                        <?php if ($current_language == "ja"):?>
                            ベトナムキャムコムでは各職種で社員を募集しております。お気軽にお問合せください。
                        <?php elseif ($current_language == "en") :?>
                            Vietnam Camcom is looking for new employees in each occupation. Please feel free to contact us.
                        <?php elseif ($current_language == "vi") :?>
                            Việt Nam Camcom đang tuyển dụng mới nhiều ngành nghề. Đừng ngần ngại mà hãy ứng tuyển ngay!!
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="headerImg-banner">
                <picture class="image">
                    <source srcset="/wp-content/uploads/recruit_mainImg_sp.png" media="(max-width: 767px)"/>
                </picture>
                <picture class="image">
                    <source srcset="/wp-content/uploads/recruit_mainImg_pc.png" media="(min-width: 768px)"/>
                </picture>
                <picture class="image"><img class="sizes" src="/wp-content/uploads/recruit_mainImg_pc.png" alt=""/>
                </picture>
                <div class="title">
                    <div data-aos="fade-up">
                        <p class="t1 en">VIETNAM CAMCOM RECRUITING</p>
                        <p class="t2 en">
                            <picture class="">
                                <source srcset="/wp-content/themes/scv/images/recruit_ttl_main_img.svg"/>
                                <img class="sizes" src="/wp-content/themes/scv/images/recruit_ttl_main_img.svg" alt="">
                            </picture>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-page inner">
            <div class="recruit-content">
                <div class="recruit-sidebar">
                    <div class="padding-sidebar"></div>
                    <div class="nav-recruitTab">
                        <ul class="recruit-tabList">
                            <!--<li class="recruit-tabItem"><a class="scroll" href="#working">
                       ベトナムキャムコム
                       で働く意義
                       </a></li>
                            <li class="recruit-tabItem"><a class="scroll" href="#office">
                       オフィス
                       </a></li>-->
                            <li class="recruit-tabItem">
                                <a class="scroll" href="#recruitment-type">
                                    <?php if ($current_language == "ja"):?>
                                        募集職種
                                    <?php elseif ($current_language == "en") :?>
                                        Recruitment job
                                    <?php elseif ($current_language == "vi") :?>
                                        Công việc tuyển dụng
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="recruit-main">
                    <!--<div id="working">
                    <h2 class="heading-block" data-aos="fade-up">ベトナムキャムコムで働く意義</h2>
                    <ul class="interview-list">
                         <li class="interview-item">
                    <div class="imageContent" data-aos="fade-up"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></div>
                    <div class="infoContent" data-aos="fade-up">
                    <p class="ttl"><span class="text-gradient en">Interview 1</span></p>

                    <h3 class="title">テキストテキストテキスト</h3>
                    <p class="sub-ttl">〇〇〇〇部署</p>
                    <p class="text">テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト</p>

                    </div></li>
                         <li class="interview-item">
                    <div class="infoContent" data-aos="fade-up">
                    <p class="ttl"><span class="text-gradient en">Interview 2</span></p>

                    <h3 class="title">テキストテキストテキスト</h3>
                    <p class="sub-ttl">〇〇〇〇部署</p>
                    <p class="text">テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト</p>

                    </div>
                    <div class="imageContent" data-aos="fade-up"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></div></li>
                         <li class="interview-item">
                    <div class="imageContent" data-aos="fade-up"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></div>
                    <div class="infoContent" data-aos="fade-up">
                    <p class="ttl"><span class="text-gradient en">Interview 3</span></p>

                    <h3 class="title">テキストテキストテキスト</h3>
                    <p class="sub-ttl">〇〇〇〇部署</p>
                    <p class="text">テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト テキスト</p>

                    </div></li>
                    </ul>
                    </div>
                    <div id="office">
                    <div class="production-header" data-aos="fade-up">
                    <h2 class="heading-block">オフィス</h2>
                    <div class="arrow-slider"><button class="arrow-prev arrow-icon" type="button"><img style="transform: scaleX(-1);" src="/wp-content/uploads/scv_icon_more_blue.png" alt="" width="14" /></button>
                    <button class="arrow-next arrow-icon" type="button"><img src="/wp-content/uploads/scv_icon_more_blue.png" alt="" width="14" /></button></div>
                    </div>
                    <div class="office-slider" data-aos="fade-up">
                    <div class="slider-inner">
                    <ul class="office-list">
                         <li class="office-item"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></li>
                         <li class="office-item"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></li>
                         <li class="office-item"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></li>
                         <li class="office-item"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></li>
                         <li class="office-item"><picture class="image"> <source srcset="/wp-content/uploads/web_image_slider01_pc.png" /></picture>
                    <picture class="image"><img class="sizes" src="/wp-content/uploads/web_image_slider01_pc.png" alt="" /></picture></li>
                    </ul>
                    </div>
                    </div>
                    </div>-->

                    <div id="recruitment-type">
                        <h2 class="heading-block" data-aos="fade-up">
                            <?php if ($current_language == "ja"):?>
                                募集職種
                            <?php elseif ($current_language == "en") :?>
                                Recruitment job
                            <?php elseif ($current_language == "vi") :?>
                                Công việc tuyển dụng
                            <?php endif; ?>
                        </h2>
                        <ul class="recruitment-list">
                            <li class="recruitment-item is-open" data-aos="fade-up">
                                <div class="content-toggle">
                                    <h3 class="title">
                                        <?php if ($current_language == "ja"):?>
                                            データ入力リーダー
                                        <?php elseif ($current_language == "en") :?>
                                            Data Entry Team Leader
                                        <?php elseif ($current_language == "vi") :?>
                                            Trưởng nhóm nhập dữ liệu
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text"><?php the_field('description_1'); ?></p>
                                    <div class="link-more">
                                        <span class="box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g id="Group_350" data-name="Group 350" transform="translate(-1432 -2595)"><rect id="Rectangle_256" data-name="Rectangle 256" width="16" height="2" rx="1" transform="translate(1432 2602)" fill="#fff"></rect><rect id="Rectangle_257" data-name="Rectangle 257" width="16" height="2" rx="1" transform="translate(1441 2595) rotate(90)" fill="#fff"></rect></g></svg></span>
                                    </div>
                                </div>
                                <div class="info-toggle">
                                    <div class="infoList">
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務地
                                                <?php elseif ($current_language == "en") :?>
                                                    Working Headquarters
                                                <?php elseif ($current_language == "vi") :?>
                                                    Trụ sở làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('work_location_1'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務時間
                                                <?php elseif ($current_language == "en") :?>
                                                    Working hours
                                                <?php elseif ($current_language == "vi") :?>
                                                    Giờ làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('working_hours_1'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    給与
                                                <?php elseif ($current_language == "en") :?>
                                                    Salary
                                                <?php elseif ($current_language == "vi") :?>
                                                    Lương
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('salary_1'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recruitment-item" data-aos="fade-up">
                                <div class="content-toggle">
                                    <h3 class="title">
                                        <?php if ($current_language == "ja"):?>
                                            データ入力 オペレーター
                                        <?php elseif ($current_language == "en") :?>
                                            Data entry operator
                                        <?php elseif ($current_language == "vi") :?>
                                            Nhân viên nhập dữ liệu
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text"><?php the_field('description_2'); ?></p>
                                    <div class="link-more">
                                        <span class="box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g id="Group_350" data-name="Group 350" transform="translate(-1432 -2595)"><rect id="Rectangle_256" data-name="Rectangle 256" width="16" height="2" rx="1" transform="translate(1432 2602)" fill="#fff"></rect><rect id="Rectangle_257" data-name="Rectangle 257" width="16" height="2" rx="1" transform="translate(1441 2595) rotate(90)" fill="#fff"></rect></g></svg></span>
                                    </div>
                                </div>
                                <div class="info-toggle">
                                    <div class="infoList">
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務地
                                                <?php elseif ($current_language == "en") :?>
                                                    Working Headquarters
                                                <?php elseif ($current_language == "vi") :?>
                                                    Trụ sở làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('work_location_2'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務時間
                                                <?php elseif ($current_language == "en") :?>
                                                    Working hours
                                                <?php elseif ($current_language == "vi") :?>
                                                    Giờ làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('working_hours_2'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    給与
                                                <?php elseif ($current_language == "en") :?>
                                                    Salary
                                                <?php elseif ($current_language == "vi") :?>
                                                    Lương
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('salary_2'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recruitment-item" data-aos="fade-up">
                                <div class="content-toggle">
                                    <h3 class="title">
                                        <?php if ($current_language == "ja"):?>
                                            法人営業
                                        <?php elseif ($current_language == "en") :?>
                                            Corporate business
                                        <?php elseif ($current_language == "vi") :?>
                                            Nhân viên kinh doanh
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text"><?php the_field('description_3'); ?></p>
                                    <div class="link-more">
                                        <span class="box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g id="Group_350" data-name="Group 350" transform="translate(-1432 -2595)"><rect id="Rectangle_256" data-name="Rectangle 256" width="16" height="2" rx="1" transform="translate(1432 2602)" fill="#fff"></rect><rect id="Rectangle_257" data-name="Rectangle 257" width="16" height="2" rx="1" transform="translate(1441 2595) rotate(90)" fill="#fff"></rect></g></svg></span>
                                    </div>
                                </div>
                                <div class="info-toggle">
                                    <div class="infoList">
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務地
                                                <?php elseif ($current_language == "en") :?>
                                                    Working Headquarters
                                                <?php elseif ($current_language == "vi") :?>
                                                    Trụ sở làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('work_location_3'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務時間
                                                <?php elseif ($current_language == "en") :?>
                                                    Working hours
                                                <?php elseif ($current_language == "vi") :?>
                                                    Giờ làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('working_hours_3'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    給与
                                                <?php elseif ($current_language == "en") :?>
                                                    Salary
                                                <?php elseif ($current_language == "vi") :?>
                                                    Lương
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('salary_3'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recruitment-item" data-aos="fade-up">
                                <div class="content-toggle">
                                    <h3 class="title">
                                        <?php if ($current_language == "ja"):?>
                                            財務経理
                                        <?php elseif ($current_language == "en") :?>
                                            Finance accounting
                                        <?php elseif ($current_language == "vi") :?>
                                            Kế toán tài chính
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text"><?php the_field('description_4'); ?></p>
                                    <div class="link-more">
                                        <span class="box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g id="Group_350" data-name="Group 350" transform="translate(-1432 -2595)"><rect id="Rectangle_256" data-name="Rectangle 256" width="16" height="2" rx="1" transform="translate(1432 2602)" fill="#fff"></rect><rect id="Rectangle_257" data-name="Rectangle 257" width="16" height="2" rx="1" transform="translate(1441 2595) rotate(90)" fill="#fff"></rect></g></svg></span>
                                    </div>
                                </div>
                                <div class="info-toggle">
                                    <div class="infoList">
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務地
                                                <?php elseif ($current_language == "en") :?>
                                                    Working Headquarters
                                                <?php elseif ($current_language == "vi") :?>
                                                    Trụ sở làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('work_location_4'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務時間
                                                <?php elseif ($current_language == "en") :?>
                                                    Working hours
                                                <?php elseif ($current_language == "vi") :?>
                                                    Giờ làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('working_hours_4'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    給与
                                                <?php elseif ($current_language == "en") :?>
                                                    Salary
                                                <?php elseif ($current_language == "vi") :?>
                                                    Lương
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('salary_4'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recruitment-item" data-aos="fade-up">
                                <div class="content-toggle">
                                    <h3 class="title">
                                        <?php if ($current_language == "ja"):?>
                                            Web制作 リーダー
                                        <?php elseif ($current_language == "en") :?>
                                            Web production leader
                                        <?php elseif ($current_language == "vi") :?>
                                            Trưởng nhóm lập trình Web
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text"><?php the_field('description_5'); ?></p>
                                    <div class="link-more">
                                        <span class="box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g id="Group_350" data-name="Group 350" transform="translate(-1432 -2595)"><rect id="Rectangle_256" data-name="Rectangle 256" width="16" height="2" rx="1" transform="translate(1432 2602)" fill="#fff"></rect><rect id="Rectangle_257" data-name="Rectangle 257" width="16" height="2" rx="1" transform="translate(1441 2595) rotate(90)" fill="#fff"></rect></g></svg></span>
                                    </div>
                                </div>
                                <div class="info-toggle">
                                    <div class="infoList">
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務地
                                                <?php elseif ($current_language == "en") :?>
                                                    Working Headquarters
                                                <?php elseif ($current_language == "vi") :?>
                                                    Trụ sở làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('work_location_5'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務時間
                                                <?php elseif ($current_language == "en") :?>
                                                    Working hours
                                                <?php elseif ($current_language == "vi") :?>
                                                    Giờ làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('working_hours_5'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    給与
                                                <?php elseif ($current_language == "en") :?>
                                                    Salary
                                                <?php elseif ($current_language == "vi") :?>
                                                    Lương
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('salary_5'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recruitment-item" data-aos="fade-up">
                                <div class="content-toggle">
                                    <h3 class="title">
                                        <?php if ($current_language == "ja"):?>
                                            Web制作 オペレーター
                                        <?php elseif ($current_language == "en") :?>
                                            Web production operator
                                        <?php elseif ($current_language == "vi") :?>
                                            Nhân viên lập trình Web
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text"><?php the_field('description_6'); ?></p>
                                    <div class="link-more">
                                        <span class="box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g id="Group_350" data-name="Group 350" transform="translate(-1432 -2595)"><rect id="Rectangle_256" data-name="Rectangle 256" width="16" height="2" rx="1" transform="translate(1432 2602)" fill="#fff"></rect><rect id="Rectangle_257" data-name="Rectangle 257" width="16" height="2" rx="1" transform="translate(1441 2595) rotate(90)" fill="#fff"></rect></g></svg></span>
                                    </div>
                                </div>
                                <div class="info-toggle">
                                    <div class="infoList">
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務地
                                                <?php elseif ($current_language == "en") :?>
                                                    Working Headquarters
                                                <?php elseif ($current_language == "vi") :?>
                                                    Trụ sở làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('work_location_6'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    勤務時間
                                                <?php elseif ($current_language == "en") :?>
                                                    Working hours
                                                <?php elseif ($current_language == "vi") :?>
                                                    Giờ làm việc
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('working_hours_6'); ?></p>
                                        </div>
                                        <div class="info-item">
                                            <p class="ttl">
                                                <?php if ($current_language == "ja"):?>
                                                    給与
                                                <?php elseif ($current_language == "en") :?>
                                                    Salary
                                                <?php elseif ($current_language == "vi") :?>
                                                    Lương
                                                <?php endif; ?>
                                            </p>
                                            <p class="text"><?php the_field('salary_6'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="fb-contact" data-aos="fade-up">
                        <a target="_blank" href="https://www.facebook.com/VIETNAM.CAMCOM" rel="noopener">
                            <picture class="image">
                                <source srcset="/wp-content/uploads/icon_fb_pc.png 2x">
                                <img class="sizes" src="/wp-content/uploads/icon_fb_pc.png" alt="">
                            </picture>
                            <span>Facebookでも受付中</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php endwhile;
else :
    echo '<p class="no-post">お探しの記事、ページは見つかりませんでした。</p>';
endif;
?>

<?php get_footer(); ?>
