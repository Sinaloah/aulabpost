<x-layout>
    <div>
        <header class="container-fluid p-0">
            <div class="row vh-100 w-100 m-0">
                <div class="cstm-show-bg-grain"></div>
                <div class="cstm-show-bg-frame"></div>
                <div class="cstm-show-bg-frame02"></div>
                <div class="cstm-show-gradient-grain"></div>
                <div class="cstm-show-bg col-12 d-flex flex-column justify-content-center align-items-center text-center p-0">
                    <h1 class="cstm-show-title">{{$article->title}}</h1>
                    <div class="cstm-show-title-sub-box">
                        <a class="cstm-home-writer-link cstm-black-font-clr" href="{{route('article.byUser', ['user' => $article->user->id])}}">
                            <h4 class="fs-2 cstm-tertiary-font my-4">By {{ $article->user->name }}</h4>
                        </a>
                        <a class="cstm-black-font-clr cstm-home-writer-link" href="{{route('article.byCategory', ['category' => $article->category->id])}}">
                            <p class="cstm-tertiary-font fs-3">Categoria {{ $article->category->name }}</p>
                        </a>
                        <p>Redatto il {{$article->created_at->format('d/m/Y')}}</p>
                        <meta name="keywords" class="mt-5 cstm-tertiary-font fs-2 cstm-black-font-clr" content="@foreach($article->tags as $tag){{$tag->name}}, @endforeach">
                        @foreach($article->tags as $tag)
                        #{{$tag->name}}
                        @endforeach
                        </meta>
                    </div>
                </div>
            </div>
        </header>
        <section class="container-fluid p-0">
            <div class="cstm-detail-section-bg-grain"></div>
            <div class="cstm-show-section-gradient"></div>
            <div class="cstm-show-section-gradient-grain"></div>
            <div class="row m-0 cstm-show-section-row position-relative">
            <div class="cstm-detail-mobile-section-bg-grain"></div>
            <div class="cstm-show-section-gradient-bottom"></div>
            <div class="cstm-show-section-gradient-grain-bottom"></div>
                <div class="col-12 col-md-6 d-flex justify-content-end cstm-show-section cstm-tertiary-font p-0">
                    <h2 class="cstm-show-sub-title cstm-show-section-padding-02">{{ $article->subtitle }}</h2>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-start cstm-show-section p-0">

                    <div class="cstm-show-right-section-container">
                        <p class="cstm-show-section-padding cstm-show-article-txt">{{$article->body}}</p>
                    </div>
                </div>
                <div class="cstm-show-buttons-box col-12 d-flex justify-content-start">

                    <a href="{{route('article.index')}}" class="ms-1 me-1 mb-1">
                        <div class="text-decoration-none cst-nav-button-box" href="">
                            <span>
                                <button class="cst-nav-hbg-button-close cst-show-all-btn text-uppercase cstm-black-font-clr"><i class="fa-solid fa-chevron-left"></i>
                                </button>
                                <button class="cst-nav-hbg-button-open text-uppercase cstm-black-font-clr">Tutti gli articoli
                                </button>
                            </span>
                        </div>
                    </a>

                    @if (Auth::user() && Auth::user()->is_revisor && $article->is_accepted == false)

                    <a class="me-1 mb-1" href="{{route('revisor.acceptArticle', compact('article'))}}"><button class="cst-button-just-open-multicolor text-uppercase cstm-btn-accept-bg-clr">Accetta articolo</button></a>

                    <a class="me-1 mb-1" href="{{route('revisor.rejectArticle', compact('article'))}}"><button class="cst-button-just-open-multicolor text-uppercase cstm-btn-danger-bg-clr">Rifiuta articolo</button></a>

                    @endif
                </div>

            </div>
        </section>
    </div>
</x-layout>