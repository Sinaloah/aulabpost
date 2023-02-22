<div class="table-responsive m-0 p-0">
    <table class="table table-striped border table-borderless">
        <thead class="cstm-table cstm-bg-black cstm-white-font-clr cstm-table-fs">
            <tr class="cstm-table">
                <th class="text-nowrap cstm-table-titles" scope="col">#</th>
                <th class="text-nowrap cstm-table-titles" scope="col">Nome tag</th>
                <th class="text-nowrap cstm-table-titles" scope="col">Q.ta articoli collegati</th>
                <th class="text-nowrap cstm-table-titles" scope="col">Aggiorna</th>
                <th class="text-nowrap cstm-table-titles" scope="col">Cancella</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metaInfos as $metaInfo)
            <tr class="cstm-table-fs">
                <th class="" scope="row">{{$metaInfo->id}}</th>
                <td class="">{{$metaInfo->name}}</td>
                <td class="">{{count($metaInfo->articles)}}</td>
                @if($metaType == "tags")
                <td class="">
                    <form class="d-flex cstm-tags-box" action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="post">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline me-2 cstm-tag-input">
                        <button type="submit" class="cst-button-just-open-white text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Aggiorna</button>
                    </form>
                </td>
                <td class="">
                    <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="cst-button-just-open-black text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr02">Elimina</button>
                    </form>
                </td>
                @else
                <td class="">
                    <form class="d-flex cstm-tags-box" action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="post">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline me-2 cstm-tag-input">
                        <button type="submit" class="cst-button-just-open-white text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Aggiorna</button>
                    </form>
                </td>
                <td class="">
                    <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="cst-button-just-open-black text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr02">Elimina</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>