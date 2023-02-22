<div class="table-responsive m-0 p-0">
    <table class="table table-striped border table-borderless">
        <thead class="cstm-table cstm-bg-black cstm-white-font-clr cstm-table-fs">
            <tr class="cstm-table">
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">#</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Nome</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Email</th>
                <th class="text-nowrap cstm-table-titles cstm-table-col" scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roleRequests as $user)
            <tr class="cstm-table-fs">
                <th class="" scope="row">{{$user->id}}</th>
                <td class="">{{$user->name}}</td>
                <td class="">{{$user->email}}</td>
                <td class="">
                    @switch($role)
                        @case('amministratore')
                        <a href="{{route('admin.setAdmin', compact('user'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Attiva {{$role}}</button></a>
                        @break

                        @case('revisore')
                        <a href="{{route('admin.setRevisor', compact('user'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Attiva {{$role}}</button></a>
                        @break

                        @case('redattore')
                        <a href="{{route('admin.setWriter', compact('user'))}}"><button type="submit" class="cst-button-just-open-multicolor text-uppercase cst-button-just-open-multicolor-margins cstm-btn-black-bg-clr01">Attiva {{$role}}</button></a>
                        @break
                    @endswitch
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>