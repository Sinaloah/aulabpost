<x-layout>
    <header class="container-fluid h-100 p-0 m-0">
        <div class="row m-0 min-vh-100 cstm-dash-bg position-relative">
            <div class="cstm-dash-bg-grain"></div>
            <div class="cstm-dash-bg-title"></div>
            <div class="cstm-dash-bg-frame"></div>
            <div class="col-12 d-flex justify-content-center p-0 position-relative">
                <h1 class="cstm-index-title">Bentornato, Amministratore</h1>
            </div>
            @if(session('message'))
            <div class="alert alert-success text-center">
                {{session('message')}}
            </div>
            @endif
            <div class="col-12 cstm-dash-col my-3">
                @if(count($adminRequests) == 0)
                <h2 class="fs-5 pb-2 text-uppercase custom-fw-bold">Non ci sono richieste per il ruolo d'amministratore</h2>
                @else
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Richieste per ruolo amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
                @endif
            </div>
            <div class="col-12 cstm-dash-col my-3">
                @if(count($revisorRequests) == 0)
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Non ci sono richieste per il ruolo di revisore</h2>
                @else
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Richieste per ruolo revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
                @endif
            </div>
            <div class="col-12 cstm-dash-col my-3">
                @if(count($writerRequests) == 0)
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Non ci sono richieste per il ruolo di redattore</h2>
                @else
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Richieste per ruolo redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore" />
                @endif
            </div>

            <div class="col-12 cstm-dash-col my-3">
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">I tags della piattaforma</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags" />
            </div>

            <div class="col-12 cstm-dash-col my-3">
                <h2 class="pb-2 text-uppercase custom-fw-bold fs-5">Le categorie della piattaforma</h2>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
            </div>

            <div class="col-12 cstm-dash-col my-5">
                <div class="w-100 d-flex justify-content-center">
                    <h2 class="text-uppercase custom-fw-bold fs-5 pb-2">Inserisci una nuova categoria</h2>
                </div>
                <form class="cstm-tags-box cstm-category-box mb-5" action="{{route('admin.storeCategory')}}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Inserisci categoria" class="form-control w-50 d-inline cstm-category-input">
                    <button type="submit" class="cst-button-just-open-white text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Aggiungi</button>
                </form>
            </div>
        </div>
    </header>
</x-layout>