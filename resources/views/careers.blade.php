<x-layout>
    <header class="container-fluid p-0">
        <div class="row min-vh-100 w-100 m-0">
            <div class="cstm-login-bg col-12 d-flex flex-column justify-content-center align-items-center text-center p-0 position-relative">
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
                <section class="min-vh-100 cstm-login-card">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100 cstm-login-padding">
                            <div class="col col-xl-10">
                                <div class="card cstm-login-card-bg" style="border-radius: 1rem;">
                                    <div class="row g-0">
                                        <div class="col-md-6 col-lg-5 d-none d-md-block text-start">
                                            <div class="card-body p-4 p-lg-5 mt-2 text-center d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                                <h2 class="cstm-tertiary-font fs-1 pt-3 m-0">Amministratore</h2>
                                                <p class="pb-5">Potrai gestire il nostro sito</p>
                                                <h2 class="cstm-tertiary-font fs-1">Revisore</h2>
                                                <p class="pb-5">Potrai gestire i nostri articoli, approvandoli o rimuovendoli</p>
                                                <h2 class="cstm-tertiary-font fs-1">Redattore</h2>
                                                <p>Potrai essere un nostro redattore, scrivendo e modificando articoli</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                            <div class="card-body p-4 p-lg-5 text-black">

                                                <form action="{{ route('careers.submit') }}" method="post">
                                                    @csrf

                                                    <h5 class="fw-normal mb-4 mt-5 pb-3 cstm-login-accedi" style="letter-spacing: 1px;">per quale ruolo ti stai candidando?</h5>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" for="role">Scegli il tuo ruolo</label>
                                                        <select name="role" id="role" class="form-control form-control-md cursor-pointer cstm-cursor-pointer">
                                                            <option value="">scegli qui</option>
                                                            <option value="admin">amministratore</option>
                                                            <option value="revisor">revisore</option>
                                                            <option value="writer">redattore</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" for="email">Indirizzo E-mail</label>
                                                        <input name="email" type="email" id="login-email" class="form-control form-control-md" value="{{old('email') ?? Auth::user()->email}}" />
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label for="message" class="form-label mt-2">parlaci di te</label>
                                                        <textarea name="message" id="message" cols="30" rows="7" class="form-control form-control-md">{{old('message')}}</textarea>
                                                    </div>

                                                    <div class="pt-1 mb-4">
                                                        <button type="submit" class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black">invia la candidatura
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