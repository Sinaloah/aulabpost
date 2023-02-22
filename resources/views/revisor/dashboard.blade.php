<x-layout>
    <header class="container-fluid h-100 p-0 m-0">
        <div class="row m-0 min-vh-100 cstm-dash-bg position-relative">
            <div class="cstm-dash-bg-grain"></div>
            <div class="cstm-dash-bg-title"></div>
            <div class="cstm-dash-bg-frame"></div>
            <div class="col-12 d-flex justify-content-center p-0 position-relative">
                <h1 class="cstm-index-title">Bentornato, Revisore</h1>
            </div>
            @if(session('message'))
            <div class="alert alert-success text-center">
                {{session('message')}}
            </div>
            @endif
            <div class="col-12 cstm-dash-col my-3">
                @if(count($unrevisionedArticles) == 0)
                <h2 class="fs-5 pb-2 text-uppercase custom-fw-bold">Non ci sono articoli da revisionare</h2>
                @else
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles" />
                @endif
            </div>
            <div class="col-12 cstm-dash-col my-3">
                @if(count($acceptedArticles) == 0)
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Non ci sono articoli pubblicati</h2>
                @else
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Articoli pubblicati:</h2>
                <x-articles-table :articles="$acceptedArticles" />
                @endif
            </div>
            <div class="col-12 cstm-dash-col my-3">
                @if(count($rejectedArticles) == 0)
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Non ci sono articoli respinti</h2>
                @else
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Articoli respinti:</h2>
                <x-articles-table :articles="$rejectedArticles" />
                @endif
            </div>
        </div>
    </header>
</x-layout>