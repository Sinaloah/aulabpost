<x-layout>
    <header class="container-fluid p-0 m-0">
        <div class="row m-0 cstm-index-box cstm-index-padding-bottom min-vh-100 cstm-index-bg position-relative">
            <div class="cstm-show-bg-grain"></div>
            <div class="cstm-index-bg-frame"></div>
            <div class="col-12 d-flex justify-content-center p-0">
                <h1 class="cstm-index-title">Scrittore {{ $user->name }}</h1>
            </div>
            @foreach ($articles as $article)
            @if ($counter % 2)
            <div class="cstm-index-card-container col-12 d-flex justify-content-center align-items-center my-3 px-4">
                <div class="cstm-index-card container-fluid p-0 m-0">
                    <div class="row p-0 m-0 h-100">
                        <div class="col-12 col-md-5 h-100 p-0 m-0 cstm-index-img-box">
                            <img src="/img/cerchietti.svg" class="cstm-index-cerchietti-right" />
                            <img class="cstm-index-card-img cstm-index-card-img-right" src="{{ Storage::url($article->image) }}" alt="">
                        </div>
                        <div class="col-12 col-md-7 d-flex flex-column justify-content-center cstm-index-int-card-padding m-0 p-4 p-md-5">
                            <h2 class="cstm-index-card-title-fs custom-fw-medium mb-2">
                                @if(strlen($article->title) > 50)
                                {{substr($article->title, 0, 50)}} ...
                                @else
                                {{$article->title}}
                                @endif
                            </h2>
                            <h4 class="cstm-index-card-subtitle-fs custom-fw-light mb-2">
                                @if(strlen($article->subtitle) > 65)
                                {{substr($article->subtitle, 0, 65)}} ...
                                @else
                                {{$article->subtitle}}
                                @endif
                            </h4>
                            <div class="d-flex mb-4">
                                <div class="me-4 cstm-index-card-details-fs">
                                    <span class="me-2"><i class="fa-solid fa-calendar-days cstm-black-trans-font-clr"></i></span><span class="cstm-black-trans-font-clr">Redatto il {{$article->created_at->format('d/m/Y')}}</span>
                                </div>
                                <div class="cstm-index-reading-time d-flex justify-content-center align-items-center cstm-index-card-details-fs text-nowrap">
                                    <span class="me-2"><i class="fa-solid fa-clock cstm-black-trans-font-clr"></i></span><span class="cstm-black-trans-font-clr">{{$article->readDuration()}} min.</span>
                                </div>
                            </div>
                            <a class="mb-2" href="{{route('article.show', compact('article'))}}"><button class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black">Leggi l'articolo
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
            {{$counter++}}
            @else
            <div class="cstm-index-card-container col-12 d-flex justify-content-center align-items-center my-3 px-4">
                <div class="cstm-index-card container-fluid p-0 m-0 ">
                    <div class="row p-0 m-0 h-100 cstm-index-column-reverse">
                        <div class="col-12 col-md-7 d-flex flex-column justify-content-center cstm-index-int-card-padding m-0 p-4 p-md-5">
                            <h2 class="cstm-index-card-title-fs custom-fw-medium mb-2">
                                @if(strlen($article->title) > 50)
                                {{substr($article->title, 0, 50)}} ...
                                @else
                                {{$article->title}}
                                @endif
                            </h2>
                            <h4 class="cstm-index-card-subtitle-fs custom-fw-light mb-2">
                                @if(strlen($article->subtitle) > 65)
                                {{substr($article->subtitle, 0, 65)}} ...
                                @else
                                {{$article->subtitle}}
                                @endif
                            </h4>
                            <div class="d-flex mb-4">
                                <div class="me-4">
                                    <span class="me-2"><i class="fa-solid fa-calendar-days cstm-black-trans-font-clr"></i></span><span class="cstm-black-trans-font-clr">Redatto il {{$article->created_at->format('d/m/Y')}}</span>
                                </div>
                                <div class="cstm-index-reading-time d-flex justify-content-center align-items-center cstm-index-card-details-fs text-nowrap">
                                    <span class="me-2"><i class="fa-solid fa-clock cstm-black-trans-font-clr"></i></span><span class="cstm-black-trans-font-clr">{{$article->readDuration()}} min.</span>
                                </div>
                            </div>
                            <a class="mb-2" href="{{route('article.show', compact('article'))}}"><button class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black">Leggi l'articolo
                                </button></a>
                        </div>
                        <div class="col-12 col-md-5 h-100 p-0 m-0 cstm-index-img-box">
                            <img src="/img/cerchietti.svg" class="cstm-index-cerchietti-left" />
                            <img class="cstm-index-card-img cstm-index-card-img-left" src="{{ Storage::url($article->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            {{$counter++}}
            @endif
            @endforeach
        </div>
    </header>
</x-layout>