<template>
    <div>
        <div class="about-area pb-70">
            <div class="containp1 container">

                <div class="mt-2" style="text-align: -webkit-center;">
                    <div class="col-md-12 col-sm-12 mt-3 text-center">
                        <div class="ref-header">
                            <h3 class="title mt-5 mb-3">{{ ads.title }}</h3>
                            <span class="ref-header" style="color: #019aa2;    font-size: 14px;"> الرقم المرجعي:</span>
                            <span class="ref-header"
                                style="color: rgb(87 83 77) ;    font-size: 14px; padding-right: 5px;">
                                {{ ads.reference_number }}</span>
                            <div class="row mt-3">
                                <div class="col-md-9 col-sm-12  header-row">
                                    <span><i class="fas fa-star pr-2"
                                            style="color:#5b429d ; font-size: 17px;padding-left: 10px;"></i>0
                                        <span style="color:#9d9dab;">(لايوجد تقييمات)</span></span>
                                    <span style="margin-bottom: 2px;
                                        margin-right: 12px;
                                        height: 5px;
                                        width: 5px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: inline-block;"></span>
                                    <i class="fas fa-map-marker-alt	" style="color: #019aa2;font-size: 20px;
    margin-right: 20px;"></i>
                                    <span style=" margin-right: 6px;">{{ ads.city }} - {{ ads.neighborhood }}</span>
                                    <br class="bg-hidden">
                                    <span style="margin-bottom: 2px;
                                        margin-right: 12px;
                                        height: 5px;
                                        width: 5px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: inline-block;"></span>
                                    <i class="far fa-clock project-header"></i>
                                    <span style=" margin-right: 6px;">التاريخ : {{ ads.created }}</span>
                                    <span style="margin-bottom: 2px;
                                        margin-right: 12px;
                                        height: 5px;
                                        width: 5px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: inline-block;"></span>

                                    <span style="margin-right: 20px;">{{ ads.seenCount }}</span>
                                    <i class="far fa-eye" style="color: #019aa2;font-size: 20px;
    margin-right: 10px;"></i>
                                </div>
                                <div class="col-md-3 col-sm-12 text-center fav-share">
                                    <i class="far fa-heart" style="font-size:20px ;"></i>
                                    <span style=" margin-right: 6px; margin-bottom:2px ;">المفضلة</span>

                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                        style="enable-background:new 0 0 512 512; width: 20px;margin-right: 20px;"
                                        xml:space="preserve">
                                        <g>
                                            <polygon
                                                points="334.9,120.6 256,41.7 177.1,120.6 156.3,99.7 256,0 355.7,99.7 	" />
                                            <rect x="241.1" y="20.8" width="29.8" height="312.6" />
                                            <path d="M404.8,512H107.2c-25.3,0-44.7-19.4-44.7-44.7V199.4c0-25.3,19.3-44.7,44.7-44.7h104.2v29.8H107.2c-8.9,0-14.9,6-14.9,14.9
		v267.9c0,8.9,6,14.9,14.9,14.9h297.7c8.9,0,14.9-6,14.9-14.9V199.4c0-8.9-6-14.9-14.9-14.9H300.7v-29.8h104.2
		c25.3,0,44.7,19.3,44.7,44.7v267.9C449.5,492.6,430.1,512,404.8,512z" />
                                        </g>
                                    </svg>
                                    <span style=" margin-right: 6px; margin-bottom:2px ;">المشاركة</span>

                                </div>
                            </div>

                        </div>
                        <div class="text-center">
                            <div v-if="images.length >= 5" class="hh-gallery hh-grid-gallery hiden-item mt-4"
                                style="position: relative;  Height: 30%;Overflow: hidden;">
                                <div class="controls">
                                    <a @click="openModal(); currentSlide(1)" href="javascript: void(0);"
                                        class="view-gallery item-link">
                                        <img alt=""
                                            srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                            src="../../assets/images/photos.svg" decoding="async" data-nimg="intrinsic">
                                        <span style="padding-right: 5px;">عرض كل الصور</span>
                                        <i class="ti-gallery"></i>
                                    </a>
                                    <span><a @click="openModal(); currentSlide(1)" href="javascript: void(0);"
                                            class="view-gallery item-link">
                                            <img alt=""
                                                srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                                src="../../assets/images/photos.svg" decoding="async"
                                                data-nimg="intrinsic">
                                            <span style="padding-right: 5px;">عرض كل الفيديوهات</span>
                                            <i class="ti-gallery"></i>
                                        </a></span>
                                </div>
                                <div class="item" style="flex: 2 1 0%; padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[0]" alt="10" class="img1"
                                            style=" border-radius: 1px 18px 18px 1px;position: absolute;top: 0;left: 0;width: 100%;object-fit: cover;">
                                    </div>
                                </div>
                                <div class="item" style="flex: 2 1 0%;padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[1]" alt="7" class="img1"
                                            style="position: absolute;top: 0;  left: 0; width: 100%;   object-fit: cover;">
                                    </div>
                                </div>
                                <div class="item item-small" style="padding: 4px;flex: 1 1 0%;">
                                    <div class="item-outer" style="height: calc(50% - 2px);">
                                        <div class="item-inner"
                                            style="height: 100%; padding-top: 0;padding-top: 130%; position: relative;">
                                            <img :src="'/image/' + images[2]" alt="9"
                                                style="position: absolute; top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="space" style=" margin-top: 4px;">
                                    </div>
                                    <div class="item-outer" style="height: calc(50% - 2px);">
                                        <div class="item-inner"
                                            style="height: 100%;width: 100%;position: relative; padding-top: 0;">
                                            <img :src="'/image/' + images[3]" alt="8"
                                                style="position: absolute;top: 0;left: 0; width: 100%;height: 100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                                <div class="item" style="flex: 2 1 0%;padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[4]" alt="4" class="img1"
                                            style=" border-radius: 18px 1px 1px 18px;position: absolute;top: 0px;left: 0px;width: 100%;object-fit: cover;">
                                    </div>
                                </div>
                                <div class="data-gallery"
                                    data-gallery="W3sic3JjIjoiaHR0cHM6XC9cL2JsYWdhdC5zYVwvc3RvcmFnZVwvdS0xNDRcLzIwMjJcLzA0XC8xMVwvMTAtMTY0OTY4MjAwNS5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzctMTY0OTY4MjAwNC5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzktMTY0OTY4MjAwNC5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzgtMTY0OTY4MjAwNC5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzQtMTY0OTY4MjAwMy5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzEtMTY0OTY4MjAwMi5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzItMTY0OTY4MjAwMi5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzYtMTY0OTY4MjAwMy5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzMtMTY0OTY4MjAwMy5qcGcifSx7InNyYyI6Imh0dHBzOlwvXC9ibGFnYXQuc2FcL3N0b3JhZ2VcL3UtMTQ0XC8yMDIyXC8wNFwvMTFcLzUtMTY0OTY4MjAwMy5qcGcifV0=">
                                </div>
                            </div>
                            <div v-else-if="images.length == 4" class="hh-gallery hh-grid-gallery hiden-item mt-4"
                                style=" position: relative; Height: 30%;Overflow: hidden;">
                                <div class="controls">
                                    <a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                        class="view-gallery item-link">
                                        <img alt=""
                                            srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                            src="../../assets/images/photos.svg" decoding="async" data-nimg="intrinsic">
                                        <span style="padding-right: 5px;">عرض كل الصور</span>
                                        <i class="ti-gallery"></i>
                                    </a>
                                    <span><a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                            class="view-gallery item-link">
                                            <img alt=""
                                                srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                                src="../../assets/images/photos.svg" decoding="async"
                                                data-nimg="intrinsic">
                                            <span style="padding-right: 5px;">عرض كل الفيديوهات</span>
                                            <i class="ti-gallery"></i>
                                        </a></span>
                                </div>
                                <div class="item" style="flex: 2 1 0%; padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[0]" alt="10"
                                            style=" border-radius: 1px 18px 18px 1px;position: absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;">
                                    </div>
                                </div>

                                <div class="item item-small" style="padding: 4px;flex: 1 1 0%;">
                                    <div class="item-outer" style="height: calc(50% - 2px);">
                                        <div class="item-inner"
                                            style="height: 100%; padding-top: 0;padding-top: 130%; position: relative;">
                                            <img :src="'/image/' + images[1]" alt="9"
                                                style="position: absolute; top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="space" style=" margin-top: 4px;">
                                    </div>
                                    <div class="item-outer" style="height: calc(50% - 2px);">
                                        <div class="item-inner"
                                            style="height: 100%;width: 100%;position: relative; padding-top: 0;">
                                            <img :src="'/image/' + images[2]" alt="8"
                                                style="position: absolute;top: 0;left: 0; width: 100%;height: 100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                                <div class="item" style="flex: 2 1 0%;padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[3]" alt="4"
                                            style=" border-radius: 18px 1px 1px 18px;position: absolute;top: 0px;left: 0px;width: 100%; height: 100%;object-fit: cover;">
                                    </div>
                                </div>

                            </div>
                            <div v-else-if="images.length == 3" class="hh-gallery hh-grid-gallery hiden-item mt-4"
                                style=" position: relative; Height: 30%;Overflow: hidden;">
                                <div class="controls">
                                    <a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                        class="view-gallery item-link">
                                        <img alt=""
                                            srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                            src="../../assets/images/photos.svg" decoding="async" data-nimg="intrinsic">
                                        <span style="padding-right: 5px;">عرض كل الصور</span>
                                        <i class="ti-gallery"></i>
                                    </a>
                                    <span><a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                            class="view-gallery item-link">
                                            <img alt=""
                                                srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                                src="../../assets/images/photos.svg" decoding="async"
                                                data-nimg="intrinsic">
                                            <span style="padding-right: 5px;">عرض كل الفيديوهات</span>
                                            <i class="ti-gallery"></i>
                                        </a></span>
                                </div>
                                <div class="item" style="flex: 2 1 0%; padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[0]" alt="10"
                                            style=" border-radius: 1px 18px 18px 1px;position: absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;">
                                    </div>
                                </div>

                                <div class="item item-small" style="padding: 4px;flex: 1 1 0%;">

                                    <div class="space" style=" margin-top: 4px;">
                                    </div>

                                    <div class="item-inner"
                                        style="height: 100%;width: 100%;position: relative; padding-top: 0;">
                                        <img :src="'/image/' + images[1]" alt="8"
                                            style="position: absolute;top: -4px;left: 0; width: 100%;height: 100%;object-fit: cover;">
                                    </div>

                                </div>
                                <div class="item" style="flex: 2 1 0%;padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[2]" alt="4"
                                            style=" border-radius: 18px 1px 1px 18px;position: absolute;top: 0px;left: 0px;width: 100%; height: 100%;object-fit: cover;">
                                    </div>
                                </div>

                            </div>
                            <div v-else-if="images.length == 2" class="hh-gallery hh-grid-gallery hiden-item mt-4"
                                style=" position: relative; Height: 30%;Overflow: hidden;">
                                <div class="controls">
                                    <a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                        class="view-gallery item-link">
                                        <img alt=""
                                            srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                            src="../../assets/images/photos.svg" decoding="async" data-nimg="intrinsic">
                                        <span style="padding-right: 5px;">عرض كل الصور</span>
                                        <i class="ti-gallery"></i>
                                    </a>
                                    <span><a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                            class="view-gallery item-link">
                                            <img alt=""
                                                srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                                src="../../assets/images/photos.svg" decoding="async"
                                                data-nimg="intrinsic">
                                            <span style="padding-right: 5px;">عرض كل الفيديوهات</span>
                                            <i class="ti-gallery"></i>
                                        </a></span>
                                </div>
                                <div class="item" style="flex: 2 1 0%; padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[0]" alt="10"
                                            style=" border-radius: 1px 18px 18px 1px;position: absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;">
                                    </div>
                                </div>


                                <div class="item" style="flex: 2 1 0%;padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[1]" alt="4"
                                            style=" border-radius: 18px 1px 1px 18px;position: absolute;top: 0px;left: 0px;width: 100%; height: 100%;object-fit: cover;">
                                    </div>
                                </div>

                            </div>
                            <div v-else-if="images.length == 1" class="hh-gallery hh-grid-gallery hiden-item mt-4"
                                style=" position: relative;  Height: 30%;Overflow: hidden;">
                                <div class="controls">
                                    <a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                        class="view-gallery item-link">
                                        <img alt=""
                                            srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                            src="../../assets/images/photos.svg" decoding="async" data-nimg="intrinsic">
                                        <span style="padding-right: 5px;">عرض كل الصور</span>
                                        <i class="ti-gallery"></i>
                                    </a>
                                    <span><a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                            class="view-gallery item-link">
                                            <img alt=""
                                                srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                                src="../../assets/images/photos.svg" decoding="async"
                                                data-nimg="intrinsic">
                                            <span style="padding-right: 5px;">عرض كل الفيديوهات</span>
                                            <i class="ti-gallery"></i>
                                        </a></span>
                                </div>
                                <div class="item" style="flex: 2 1 0%; padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[0]" alt="10"
                                            style=" border-radius: 18px 18px 18px 18px;position: absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;">
                                    </div>
                                </div>




                            </div>
                            <div class="hh-gallery hh-grid-gallery show-item mt-4"
                                style=" position: relative;  Height: 30%;Overflow: hidden;">
                                <div class="controls">
                                    <a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                        class="view-gallery item-link">
                                        <img alt=""
                                            srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                            src="../../assets/images/photos.svg" decoding="async" data-nimg="intrinsic">
                                        <span style="padding-right: 5px;">عرض كل الصور</span>
                                        <i class="ti-gallery"></i>
                                    </a>
                                    <span><a href="javascript: void(0);" @click="openModal(); currentSlide(1)"
                                            class="view-gallery item-link">
                                            <img alt=""
                                                srcset="../../assets/images/photos.svg 1x, ../../assets/images/photos.svg 2x"
                                                src="../../assets/images/photos.svg" decoding="async"
                                                data-nimg="intrinsic"> <span style="padding-right: 5px;">عرض كل
                                                الفيديوهات</span>
                                            <i class="ti-gallery"></i>
                                        </a></span>
                                </div>
                                <div class="item" style="flex: 2 1 0%; padding: 4px;">
                                    <div class="item-inner" style="width: 100%;padding-top: 130%;position: relative;">
                                        <img :src="'/image/' + images[0]" alt="10"
                                            style=" border-radius: 18px 18px 18px 18px;position: absolute;top: 0;left: 0;width: 100%;height: 50%;object-fit: cover;">
                                    </div>
                                </div>




                            </div>
                            <div id="myModal" class="modal" style=" padding-top: 130px;background-color: black;"
                                @click="closeModal()">
                                <span class="close cursor" @click="closeModal()"
                                    style=" cursor: pointer; color: #999;position: fixed;top: 10px;right: 25px;font-size: 35px;font-weight: bold;">&times;</span>
                                <div class="modal-content" @click.stop=""
                                    style="position: relative;background-color: #fefefe;margin: auto; padding: 0; width: 60%; max-width: 1200px;    height: 80%;    direction: ltr;">

                                    <div v-for="i in AllImage.length" :key="i" class="mySlides">
                                        <div class="numbertext"
                                            style="font-size: 18px; color: #999;padding: 8px 12px;position: fixed;top: 10px; left: 60px;">
                                            {{ i }} / {{ AllImage.length }}</div>
                                        <img :src="'/image/' + AllImage[i - 1].file">
                                        <a class="close cursor" href="" :download="'/image/' + AllImage[i - 1].file"
                                            style="cursor: pointer; color: #999; position: fixed; top: 22px;right: 100px; font-size: 18px;"><i
                                                class="fa fa-download"></i></a>
                                    </div>

                                    <!-- <div class="mySlides">
                    <div class="numbertext">4 / 4</div>
                    <video width="400" controls style="width: 100%;height: 100%;">
                        <source src="mov_bbb.mp4" type="video/mp4">
                        <source src="mov_bbb.ogg" type="video/ogg">
                        Your browser does not support HTML video.
                    </video>

                </div> -->
                                    <a class="next" @click="plusSlides(-1)"
                                        style=" right: 0; border-radius: 3px 0 0 3px;background-color: rgba(0, 0, 0, 0.5); cursor: pointer;position: fixed;top: 50%;width: auto; padding: 16px; color: white; font-weight: bold; font-size: 20px;transition: 0.6s ease; border-radius: 0 3px 3px 0;user-select: none;-webkit-user-select: none;"><i
                                            class="fa fa-arrow-right"></i></a>
                                    <a class="prev" @click="plusSlides(1)"
                                        style="top: 50%;font-size: 22px;left: 10px; cursor: pointer; position: fixed;width: auto; padding: 16px;  color: white;font-weight: bold; transition: 0.6s ease; border-radius: 0 3px 3px 0; user-select: none; -webkit-user-select: none; "><i
                                            class="fa fa-arrow-left"></i></a>

                                </div>
                            </div>
                            <div style="display:none ;">
                                <div class="row">

                                    <div v-for="img in AllImage" v-bind:key="img.id" class="column">
                                        <img :src="'/image/' + img.file" style="width:100% cursor: pointer;"
                                            @click="openModal(); currentSlide(img.id)" class="hover-shadow cursor">
                                    </div>

                                </div>




                            </div>
                        </div>
                        <div class="row" style="    padding-right: 0px; 
    padding-left: 0px;">
                            <div class="col-md-7  col-sm-12 text-end mt-3">
                                <div style="border-bottom: 1px solid rgb(238, 239, 241); padding-bottom: 10%;">

                                    <h6 style="color:#0d0d0d ;padding-top: 5%; font-weight: 700;">الوصف</h6>
                                    <!-- <p style="max-width: 52ch; color: rgb(13, 13, 13);font-weight: 400;" >
                                        {{ ads.description }}</p> -->
                                    <div id="description">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8  project-deadline">
                                        <p
                                            style=" padding-right: 2%;padding-top: 5%;font-weight: 500; font-size: 13px;">
                                            اخر موعد لتقديم العروض </p>
                                        <i class="far fa-calendar-alt"
                                            style="color:#37D337;padding-right: 2%;   font-size: 15px; "></i>
                                        <span style="color:rgb(87 83 77);font-size:15px;padding-right:2%;"> {{
                                                ads.created
                                        }}
                                        </span>
                                        <span style="color:rgb(87 83 77);font-size:15px;padding-right:5px;">
                                            <i class="far fa-clock" style="color:#37D337;    font-size: 15px;"></i>
                                            12:00</span>
                                    </div>
                                    <div class="col-md-4 project-activite">
                                        <span style="color: #019aa2;    font-size: 14px;">
                                            النشاط:</span>
                                        <span style="color: rgb(87 83 77) ;    font-size: 14px; padding-right: 5px;">
                                            {{ ads.activity }}</span>

                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="tab">
                                            <button id="buttonlinks" class="tablinks first"
                                                @click="openCity($event, 'London')">الميزات
                                                المقدمة</button>
                                            <button v-if="ads.type == 5" class="tablinks"
                                                @click="openCity($event, 'Paris')">ملفات
                                                ال{{ ads.infoArray.dealsOrAuction }}</button>
                                            <button v-else class="tablinks" @click="openCity($event, 'Paris')">ملفات
                                                المشروع</button>

                                            <button v-if="ads.type == 5" class="tablinks"
                                                @click="openCity($event, 'Tokyo')">
                                                شروط الشراء</button>
                                            <button v-else class="tablinks" @click="openCity($event, 'Tokyo')">
                                                شروط التقديم</button>
                                        </div>

                                        <div id="London" class="tabcontent">
                                            <h3 style="color:#000000; display: block;">المواصفات والميزات</h3>
                                            <div class="row mt-5"
                                                style=" border-bottom: 1px solid rgb(238, 239, 241);padding-bottom: 3%;">
                                                <div class="row"
                                                    style=" border-bottom: 1px solid rgb(238, 239, 241);padding-bottom: 3%;">

                                                    <div class="col-md-4 col-6 conditional"
                                                        style="padding-right:0px ; padding-left:0px ;"><svg
                                                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="30" height="64" viewBox="0 0 64 64"
                                                            style=" fill:#039ca4;">
                                                            <path
                                                                d="M 32 3 L 1 28 L 1.4921875 28.654297 C 2.8591875 30.477297 5.4694688 30.791703 7.2304688 29.345703 L 32 9 L 56.769531 29.345703 C 58.530531 30.791703 61.140812 30.477297 62.507812 28.654297 L 63 28 L 54 20.742188 L 54 8 L 45 8 L 45 13.484375 L 32 3 z M 32 13 L 8 32 L 8 56 L 56 56 L 56 35 L 32 13 z M 26 34 L 38 34 L 38 52 L 26 52 L 26 34 z">
                                                            </path>
                                                        </svg><span
                                                            style="color:#c2c2c2 ; padding-right: 5px; padding-left:0px ;">هل
                                                            يوجد
                                                            سكن</span> <span
                                                            style="margin-bottom: 2px;      margin-left: 15px; margin-right: 20px; height: 7px; width: 7px; background-color: rgb(187, 187, 187); border-radius: 50%; display: inline-block;"></span>
                                                        <br><i v-if="arrayInfo['هل يوجد سكن ؟'] == 'on'"
                                                            class="fa fa-check text-center"
                                                            style="font-size: 24px;margin-right: 65px;color: #35b348;"></i>
                                                        <i v-else class="fa fa-close text-center"
                                                            style="font-size: 24px;margin-right: 65px;color: #de0000;"></i>
                                                    </div>

                                                    <div class="col-md-4 col-6 conditional"
                                                        style="padding-right:0px ; padding-left:0px ;"><i
                                                            class="fa fa-house-damage"
                                                            style="    font-size: 25px;  color: #039ca4; margin-top: 15px;"></i>
                                                        <span style="color:#c2c2c2 ; padding-right: 5px;">هل تتوفر
                                                            كهرباء</span> <span
                                                            style="margin-bottom: 2px;      margin-right: 10px; height: 7px; width: 7px; background-color: rgb(187, 187, 187); border-radius: 50%; display: inline-block;"></span>
                                                        <br><i v-if="arrayInfo['هل يوجد كهرباء ؟'] == 'on'"
                                                            class="fa fa-check text-center"
                                                            style="font-size: 24px;margin-right: 65px;color: #35b348;     margin-top: 20px;"></i>
                                                        <i v-else class="fa fa-close text-center"
                                                            style="font-size: 24px;margin-right: 65px;color: #de0000;     margin-top: 20px;"></i>
                                                    </div>

                                                    <div class="col-md-4 col-6 conditional"
                                                        style="padding-right:0px ;margin-right:0px;">
                                                        <i class="fa fa-bus"
                                                            style="    font-size: 25px;  color: #039ca4; margin-top: 15px;"></i>
                                                        <span style="color:#c2c2c2 ; padding-right: 5px;">هل تتوفر
                                                            مواصلات</span>
                                                        <br><i v-if="arrayInfo['هل يوجد مواصلات ؟'] == 'on'"
                                                            class="fa fa-check text-center"
                                                            style="font-size: 24px;margin-right: 65px;color: #35b348;     margin-top: 20px;"></i>
                                                        <i v-else class="fa fa-close text-center"
                                                            style="font-size: 24px;margin-right: 65px;color: #de0000;     margin-top: 20px;"></i>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 conditional mt-3"
                                                    style="padding-right:0px ; margin-right:2px;"><i
                                                        class="fa fa-money-bill-wave"
                                                        style="    font-size: 25px;  color: #039ca4; margin-top: 15px;"></i>
                                                    <span style="color:#c2c2c2 ; padding-right: 5px;">
                                                        دفعة مقدمة</span>
                                                    <br><i v-if="arrayInfo['هل يوجد دفعة أولى ؟'] == 'on'"
                                                        class="fa fa-check text-center"
                                                        style="font-size: 24px;margin-right: 65px;color: #35b348;     margin-top: 20px;"></i>
                                                    <i v-else class="fa fa-close text-center"
                                                        style="font-size: 24px;margin-right: 65px;color: #de0000;     margin-top: 20px;"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="Paris" class="tabcontent">

                                            <h3 v-if="ads.type == 5" style="color:#000000">تحميل ملفات
                                                ال{{ ads.infoArray.dealsOrAuction }}</h3>
                                            <h3 v-else style="color:#000000">تحميل ملفات المشروع</h3>
                                            <div class="mt-5"
                                                style="border: 1px solid rgb(204, 204, 204); border-radius: 25px; padding: 20px; padding-top: 0px;">
                                                <div class="row mt-4">
                                                    <div class="col-md-4 col-6 text-center"
                                                        style="border-left: 1px solid #ccc;">
                                                        <small style="">الكميات والمواصفات</small>
                                                        <br>
                                                        <br>
                                                        <img src="../../assets/images/pdf.png" alt=""
                                                            style="width: 70px;">
                                                        <br>
                                                        <br>
                                                        <a href="javascript:void(0);"
                                                            style="color: rgb(1, 154, 162);">حمل الأن</a>
                                                    </div>
                                                    <div class="col-md-4 col-6 text-center"
                                                        style="border-left: 1px solid #ccc;">
                                                        <small style="">تصاميم </small>
                                                        <br>
                                                        <br>
                                                        <img src="../../assets/images/3d.png" alt=""
                                                            style="width: 70px;">
                                                        <br>
                                                        <br>
                                                       <a href="javascript:void(0);"
                                                            style="color: rgb(1, 154, 162);">حمل الأن</a>
                                                    </div>
                                                    <div class="col-md-4 col-6 text-center">
                                                        <small style=""> مخططات</small>
                                                        <br>
                                                        <br>
                                                        <img src="../../assets/images/autoca.png" alt=""
                                                            style="width: 70px;">
                                                        <br>
                                                        <br>
                                                        <a href="javascript:void(0);"
                                                            style="color: rgb(1, 154, 162);">حمل الأن</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="Tokyo" class="tabcontent">

                                            <h3 v-if="ads.type == 5" style="color:#000000">شروط التقديم
                                                لل{{ ads.infoArray.dealsOrAuction }}</h3>
                                            <h3 v-else style="color:#000000">شروط التقديم للمشروع</h3>
                                            <div class="mt-5"
                                                style="    border: 1px solid #ccc;border-radius: 25px;padding: 20px;">
                                                <div class="row mt-4">
                                                    <div class="col-md-4 col-6  text-center">
                                                        <img src="../../assets/images/amala.png" alt=""
                                                            style="width:45px;">
                                                        <br>
                                                        <small style="color:#333333 ;">العمالة</small>
                                                        <br>
                                                        <small
                                                            v-if="application_conditions['employment'] == 'on warranty'"
                                                            style="color:#019aa2 ;">على الكفالة</small>
                                                        <small v-else style="color:#019aa2 ;"> عقد اجير</small>
                                                    </div>

                                                    <div class="col-md-4  col-6 text-center">
                                                        <img src="../../assets/images/tasnef.png" alt=""
                                                            style="width:40px;">
                                                        <br>
                                                        <small style="color:#333333 ;">فئة التصنيف</small>
                                                        <br>
                                                        <small v-if="arrayInfo['Category_Category'] == null"
                                                            style="color:#019aa2 ;">لايهم</small>
                                                        <small v-else style="color:#019aa2 ;">{{
                                                                arrayInfo['Category_Category']
                                                        }}</small>
                                                    </div>
                                                    <div class="col-md-4 col-6 text-center">
                                                        <img src="../../assets/images/daman.png" alt=""
                                                            style="width:50px;">
                                                        <br>
                                                        <small style="color:#333333 ;">ضمان بنكي</small>
                                                        <br>
                                                        <small v-if="application_conditions['Bank_guarantee'] == 0"
                                                            style="color:#019aa2 ;">لايهم</small>
                                                        <small v-else style="color:#019aa2 ;">مطلوب</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <small
                                                style="position: relative; top: 26px;right: 40px; background-color: #ffffff;padding: 0px 10px 0px 10px;">الاوراق
                                                المطلوبة</small>
                                            <div class="mt-3"
                                                style="border: 1px solid #ccc;border-radius: 25px;padding: 20px;">
                                                <div class="row">
                                                    <div v-for="paper in papers" v-bind:key="paper"
                                                        class="col-md-4 col-6 text-center">
                                                        <a href="javascript:void(0);" class="btn paper">{{ paper }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-5 col-sm-12 price-card">
                                <div class="first-card">
                                    <div style="border-bottom: 1px solid #eeeff1 ;">
                                        <h5 v-if="ads.type == 5"
                                            style="padding-top: 8%;text-align: right;padding-right: 10%;color: #62bbc0;">
                                            قيمة ال{{ ads.infoArray.dealsOrAuction }}
                                        </h5>
                                        <h5 v-else
                                            style="padding-top: 8%;text-align: right;padding-right: 10%;color: #62bbc0;">
                                            قيمة المشروع
                                        </h5>
                                        <h6 v-if="ads.pricestatus == 'on'"
                                            style="color: #f4a23e; text-align: right;padding-right: 15%;">
                                            الأفضل سعر
                                        </h6>
                                        <h6 v-else style="color: #f4a23e; text-align: right;padding-right: 15%;">
                                            {{ ads.price }} ريال
                                        </h6>
                                    </div>
                                    <div style="text-align: right;">
                                        <p
                                            style=" color:#019aa2 ; text-align: right; padding-right: 13%;padding-top: 10%;font-weight: 500; font-size: 13px;">
                                            اخر موعد لتقديم العروض </p>
                                        <i class="far fa-calendar-alt"
                                            style="color:#37D337;padding-right: 13%;   font-size: 15px; "></i>
                                        <span style="color:rgb(87 83 77);font-size:15px;padding-right:2%;">
                                            {{ ads.created }}
                                        </span>
                                        <span style="color:rgb(87 83 77);font-size:15px;padding-right:5px;">
                                            <i class="far fa-clock"
                                                style="color:#37D337;      padding-right: 15px;  font-size: 15px;"></i>
                                            12:00</span>
                                        <div v-if="isLoggedIn == true" style="text-align:center ;">

                                            <router-link v-if="ads.type == 5"
                                                :to="{ name: 'SubmitQuotes', params: { id: ads.id } }"
                                                class="btn btn-logo btn-animation"
                                                style="border-radius:25px;background-color:#039ca4; width:85%;color:white;margin-top:25px;padding:10px 30px 10px 30px;">
                                                تقديم
                                                عرض سعر لل{{ ads.infoArray.dealsOrAuction }} </router-link>
                                            <router-link v-else :to="{ name: 'SubmitQuotes', params: { id: ads.id } }"
                                                class="btn btn-logo btn-animation"
                                                style="border-radius:25px;background-color:#039ca4; width:85%;color:white;margin-top:25px;padding:10px 30px 10px 30px;">
                                                تقديم
                                                عرض سعر للمشروع </router-link>
                                        </div>
                                        <div v-else style="text-align:center ;">

                                            <a v-if="ads.type == 5" href="/login" class="btn btn-logo btn-animation"
                                                style="border-radius:25px;background-color:#039ca4; width:85%;color:white;margin-top:25px;padding:10px 30px 10px 30px;">
                                                تقديم
                                                عرض سعر لل{{ ads.infoArray.dealsOrAuction }} </a>
                                            <a v-else href="/login" class="btn btn-logo btn-animation"
                                                style="border-radius:25px;background-color:#039ca4; width:85%;color:white;margin-top:25px;padding:10px 30px 10px 30px;">
                                                تقديم
                                                عرض سعر للمشروع </a>
                                        </div>
                                        <div class="text-center mt-5">

                                            <span v-if="ads.type == 5" class="text-end "
                                                style="color: #019aa2;    font-size: 12px;">
                                                الرقم
                                                المرجعي لل{{ ads.infoArray.dealsOrAuction }}:</span>
                                            <span v-else class="text-end " style="color: #019aa2;    font-size: 12px;">
                                                الرقم
                                                المرجعي للمشروع:</span>
                                            <span class="text-end"
                                                style="color: rgb(87 83 77) ;font-size: 12px; padding-right: 5px;">
                                                {{ ads.reference_number }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="second-card">
                                    <div style="border-bottom: 1px solid #eeeff1 ;">
                                        <h5
                                            style="padding-top: 8%;text-align: center;    color: #62bbc0;font-size: 95%;">
                                            معلومات صاحب
                                            الطلب
                                        </h5>


                                    </div>
                                    <div class="mt-3" style="text-align: center;  padding-bottom: 15px; ">
                                        <span class="text-end " style="color: #019aa2;    font-size: 14px;"> مقدم
                                            الطلب:</span>
                                        <span class="text-end"
                                            style="color: rgb(87 83 77) ;    font-size: 14px; padding-right: 5px;"> {{
                                                    author.name
                                            }}</span>


                                        <div style="text-align:center ;">
                                            <router-link :to="'/profile/' + author.id + '/details'"
                                                class="btn btn-logo btn-animation"
                                                style=" border-radius: 25px; background-color: rgb(3, 156, 164);   width: 69%;   color: white; font-size: 90%; margin-top: 25px;  padding: 10px 23px;">
                                                الملف الشخصي للمنشآة </router-link>

                                        </div>
                                        <div class="mt-3">
                                            20/100
                                            <span class="far fa-star " style="  color:#ffd203 ; font-size: 20px;"
                                                aria-hidden></span>
                                            <span class="far fa-star "
                                                style="  color:#ffd203 ;  font-size: 20px;"></span>
                                            <span class="fas fa-star checked" style="    font-size: 20px;"></span>
                                            <span class="fas fa-star checked" style="    font-size: 20px;"></span>
                                            <span class="fas fa-star checked" style="    font-size: 20px;"></span>
                                        </div>
                                        <div class="row text-center mt-2">
                                            <div class="col-md-5 col-sm-2"
                                                style="text-align: center;margin-bottom: 12px;">
                                                <a :href="'/chat/' + author.id" style="color: #039ca4;"
                                                    class="message-owner">
                                                    <p style="position: relative; top: 18px">رسالة</p>
                                                    <i class="far fa-comment-alt mb-2"
                                                        style="font-size: 25px; color: #039ca4;"></i>
                                                </a>

                                            </div>
                                            <div class="col-md-7 col-sm-10">

                                                <a v-if="ads.type == 5" href="javascript:void(0);" class="btn report">
                                                    تقديم بلاغ على ال{{ ads.infoArray.dealsOrAuction }} </a>
                                                <a v-else href="javascript:void(0);" class="btn report">
                                                    تقديم بلاغ على المشروع </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">مشاريع مشابهة</h5>
                            <div class="mobile-quotes-action"
                                style="background: #f5f5f5;position: fixed;width: 100%;bottom: 0;left: 0;padding: 9px 0;z-index: 9;    border-top-left-radius: 20px;border-top-right-radius: 20px;">
                                <div class="container">
                                    <div class="action-inner"
                                        style="display: flex;align-items: center;justify-content: space-between;">
                                        <div class="action-price-wrapper" style="margin-right: 20px;">
                                            <p v-if="ads.type == 5" class="unit"
                                                style="font-size: 13px;color: #039ca4;font-weight: 600; margin: 0;">
                                                قيمة ال{{ ads.infoArray.dealsOrAuction }}
                                            </p>
                                            <p v-else class="unit"
                                                style="font-size: 13px;color: #039ca4;font-weight: 600;margin: 0;">
                                                قيمة المشروع
                                            </p>

                                            <p v-if="ads.pricestatus == 'on'" class="price"
                                                style="font-size: 15px;font-weight: 500; color:#f4a23e;margin: 0;">
                                                الأفضل سعر
                                            </p>
                                            <p v-else class="price"
                                                style="font-size: 15px;font-weight: 500; color:#f4a23e;margin: 0;">
                                                {{ ads.price }} ريال
                                            </p>

                                        </div>
                                        <router-link v-if="isLoggedIn == true"
                                            :to="{ name: 'SubmitQuotes', params: { id: ads.id } }"
                                            class="btn action-button " id="mobile-check-availability"
                                            style=" padding: 9px 15px; color: #fff;text-decoration: none;    height: 45px; width: 150px;border-radius: 12px;background: #039ca4; border-color: #039ca4;">
                                            تقديم عرض سعر
                                        </router-link>
                                        <a v-else href="/login" class="btn action-button "
                                            id="mobile-check-availability"
                                            style=" padding: 9px 15px; color: #fff;text-decoration: none;    height: 45px; width: 150px;border-radius: 12px;background: #039ca4; border-color: #039ca4;">
                                            تقديم عرض سعر
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>


    </div>
</template>

<script>

import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from "vue-router";
const loadUserData = async () => {
    var id = useRoute().params.projectId;
    console.log(id);
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(axios.get(
                '/api/ads/' + id + '/details'
            ))

        }, 3000)
    })
}
var slideIndex = 1;
export default {

    methods: {
        data() {
            return {
                isLoggedIn: false,
            }
        },
        openModal() {
            document.getElementById("myModal").style.display = "block";
        },
        closeModal() {
            document.getElementById("myModal").style.display = "none";
        },
        plusSlides(n) {
            this.showSlides(slideIndex += n);
        },

        currentSlide(n) {
            this.showSlides(slideIndex = n);
        },

        showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex - 1].style.display = "block";


        },

        openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";

            evt.currentTarget.className += " active";
        },
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;

        }
    },

    async mounted() {

        var element = document.getElementById("buttonlinks");
        element.classList.add("active");
        document.getElementById('London').style.display = "block";
        document.getElementById('description').innerHTML = this.ads.description;

    },
    async setup() {
        const ads = ref(await loadUserData())['_rawValue']['data'];
        console.log(ads);
        var author = [], papers = [], files = [], arrayInfo = [], images = [], AllImage = [], application_conditions = [];
        author = ads['author'];
        papers = ads['req_paper'];
        arrayInfo = ads['infoArray'];
        application_conditions = ads['application_conditions'];
        ads['files'].forEach(element => {

            files[element['info']['type']] = element['file'];
        });
        ads['files'].forEach(element => {

            images.push(element['file']);
        });
        ads['files'].forEach(element => {

            AllImage.push(element);
        });
        console.log(images);
        return {
            ads, author, papers, files, arrayInfo, images, AllImage, application_conditions
        }
    },
}

</script>
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    border-radius: 30px;
    padding: 4px;
    padding-left: 0px;

}

/* Style the buttons inside the tab */



/* Create an active/current tablink class */

/* Style the tab content */
</style>
<style>
table {
    border-collapse: unset;
    width: 100%;
}
</style>

<style>
.close:hover,
.close:focus {
    color: #999;
    text-decoration: none;
    cursor: pointer;
}

.mySlides {
    display: none;
    width: 100%;
    height: 100%;
}
</style>