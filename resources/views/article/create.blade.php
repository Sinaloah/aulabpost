<x-layout>
    <header class="container-fluid p-0">
        <div class="row min-vh-100 w-100 m-0">
            <div class="cstm-login-bg col-12 d-flex flex-column justify-content-center align-items-center text-center p-0 w-100 position-relative">
                @if ($errors->any())
                <div class="alert alert-danger cstm-alert-cards">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="cstm-show-bg-grain"></div>
                <div class="cstm-show-bg-frame"></div>
                <div class="cstm-show-gradient-grain"></div>
                <section class="min-vh-100 cstm-create-card">
                    <div class="container-fluid py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100 cstm-login-padding">
                            <div class="col-12">
                                <div class="card cstm-login-card-bg" style="border-radius: 1rem;">
                                    <div class="row g-0">
                                        <div class="col-12 d-flex align-items-center">
                                            <div class="card-body p-4 p-lg-5 text-black">

                                                <form class="" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <h5 class="fw-normal mb-4 mt-4 pb-3 cstm-login-accedi" style="letter-spacing: 1px;">Inserisci il tuo articolo</h5>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" label for="title">Titolo</label>
                                                        <input name="title" type="text" id="create-title" class="form-control form-control-md" value="{{ old('title') }}" />
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" label for="subtitle">Sottotitolo</label>
                                                        <input name="subtitle" type="text" id="create-subtitle" class="form-control form-control-md" value="{{ old('subtitle') }}" />
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" label for="image">Immagine</label>
                                                        <input name="image" type="file" id="create-image" class="form-control form-control-md" value="{{ old('image') }}" />
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label for="category" class="form-label mt-2">Categoria</label>
                                                        <select name="category" class="form-control form-control-md">
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label for="tags" class="form-label mt-2">Tags</label>
                                                        <input placeholder="Dividi ogni tag con una virgola" name="tags" id="tags" class="form-control form-control-md m-0" value="{{old('tags')}}">
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label for="body" class="form-label mt-2">Corpo del testo</label>
                                                        <textarea name="body" id="body" cols="30" rows="7" class="form-control form-control-md">{{old('body')}}</textarea>
                                                    </div>

                                                    <div class="pt-4 mb-4">
                                                        <button type="submit" class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black">Inserisci articolo
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </header>
</x-layout>