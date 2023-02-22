<x-layout>
    <header class="container-fluid p-0 cstm-home-container">
        <div class="row vh-100 justify-content-center align-items-center m-0">
            <div class="col-12 m-0 p-0 d-flex justify-content-center align-items-center">
                <!-- Swiper Start-->
                <div class="cstm-home-moving-bg-box">
                    <img src="/img/movingBG01.png" alt="" class="cstm-home-card-floating-img-01 movingHomeElement01">
                    <img src="/img/movingBG04.png" alt="" class="cstm-home-card-floating-img-02 movingHomeElement03">
                    <img src="/img/movingBG03.png" alt="" class="cstm-home-card-floating-img-03 movingHomeElement02">
                    <img src="/img/movingBG05.png" alt="" class="cstm-home-card-floating-img-04 movingHomeElement04">
                    <img src="/img/movingBG06.png" alt="" class="cstm-home-card-floating-img-05 movingHomeElement05">
                    <img src="/img/bird.png" alt="" class="cstm-home-card-floating-img-06 movingHomeElement06">
                    <img src="/img/bird.png" alt="" class="cstm-home-card-floating-img-07 movingHomeElement07">
                    <img src="/img/bird.png" alt="" class="cstm-home-card-floating-img-08 movingHomeElement05">
                    <img src="/img/bird.png" alt="" class="cstm-home-card-floating-img-09 movingHomeElement01">
                </div>
                <div class="cstm-home-card-noise m-0 p-0"></div>
                <div class="cstm-home-center-sun"></div>
                <div class="cstm-home-center-sun-mobile"></div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($articles as $article)
                        <div class="swiper-slide">
                            <div class="container-fluid cstm-home-card-container m-0 p-0">
                                <div class="cstm-home-bg-box">
                                    <img src="{{ Storage::url($article->image) }}" class="cstm-home-card-img m-0 p-0" alt="...">
                                </div>
                                <div class="cstm-home-bg-cerchietti-box">
                                    <img src="/img/cerchietti.svg" class="cstm-home-card-img m-0 p-0" alt="...">
                                </div>
                                <div class="row d-flex cstm-home-card-box vh-100 w-100">
                                    <div class="col-12 col-md-7 col-lg-6 cstm-home-card">
                                        <h2 class="fs-1 custom-fw-bold cstm-text-animation cstm-home-title">
                                            {{$article->title}}
                                        </h2>
                                        <a class="cstm-black-font-clr cstm-home-writer-link" href="{{route('article.byUser', ['user' => $article->user->id])}}">
                                            <h4 class="cstm-tertiary-font my-4">By {{ $article->user->name }}</h4>
                                        </a>
                                        <a href="{{route('article.show', compact('article'))}}">
                                            <button type="submit" class="cst-button-just-open-white text-uppercase cstm-black-font-clr cstm-bg-white">Leggi l'articolo</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-box">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <!-- Swiper End-->
            </div>
            <div class="cstm-home-arrow-box col-12 justify-content-center">
                <span class="cstm-home-arrow-left"></span><span class="fs-6 cstm-tertiary-font mx-3">Swipe</span><span class="cstm-home-arrow-right"></span>
            </div>
        </div>
    </header>
</x-layout>