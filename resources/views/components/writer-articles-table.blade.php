<div class="table-responsive m-0 p-0">
    <table class="table table-striped border table-borderless">
        <thead class="cstm-table cstm-bg-black cstm-white-font-clr cstm-table-fs">
            <tr class="cstm-table">
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">#</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Titolo</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Sottotitolo</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Categoria</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Tags</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Creato il</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr class="cstm-table-fs">
                <th class="" scope="row">{{$article->id}}</th>
                <td class="">{{$article->title}}</td>
                <td class="">{{$article->subtitle}}</td>
                <td class="">{{$article->category->name ?? 'Non categorizzato'}}</td>
                <td class="">
                    @foreach($article->tags as $tag)
                    {{$tag->name}}
                    @endforeach
                </td>
                <td class="">{{$article->created_at->format('d/m/Y')}}</td>
                <td class="">
                    <a href="{{route('article.show', compact('article'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Leggi l'Articolo</button></a>

                    <a href="{{route('article.edit', compact('article'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Modifica l'articolo</button></a>

                    <form action="{{route('article.destroy', compact('article'))}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr02">Elimina l'articolo</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>