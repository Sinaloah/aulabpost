<div class="table-responsive m-0 p-0">
    <table class="table table-striped border table-borderless">
        <thead class="cstm-table cstm-bg-black cstm-white-font-clr cstm-table-fs">
            <tr class="cstm-table">
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">#</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Titolo</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Sottotitolo</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Redattore</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr class="cstm-table-fs">
                <th class="" scope="row">{{$article->id}}</th>
                <td class="">{{$article->title}}</td>
                <td class="">{{$article->subtitle}}</td>
                <td class="">{{$article->user->name}}</td>
                <td class="">
                    @if (is_null($article->is_accepted))
                    <a href="{{route('article.show', compact('article'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Leggi l'articolo</button></a>
                    @else

                    <a href="{{route('revisor.undoArticle', compact('article'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Riporta in revisione</button></a>

                    <form action="{{route('article.destroy', compact('article'))}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr02">Elimina l'articolo</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>