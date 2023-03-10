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
                <section class="min-vh-100 cstm-login-02-card">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100 cstm-login-padding">
                            <div class="col col-xl-10">
                                <div class="card cstm-login-card-bg" style="border-radius: 1rem;">
                                    <div class="row g-0">
                                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                                            <img src="/img/login_bg.jpg" alt="login form" class="img-fluid cstm-login-card-img" style="border-radius: 1rem 0 0 1rem;" />
                                        </div>
                                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                            <div class="card-body p-4 p-lg-5 text-black">

                                                <form class="cstm-edit-form" action="{{route('login')}}" method="post">
                                                    @csrf

                                                    <h5 class="fw-normal mb-4 mt-5 pb-3 cstm-login-accedi" style="letter-spacing: 1px;">Accedi al tuo account</h5>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" for="email">Indirizzo E-mail</label>
                                                        <input name="email" type="email" id="login-email" class="form-control form-control-md" value="{{old('email')}}" />
                                                    </div>

                                                    <div class="form-outline mb-4 text-start">
                                                        <label class="form-label mt-2" for="password">Password</label>
                                                        <input name="password" type="password" id="login-password" class="form-control form-control-md" />
                                                    </div>

                                                    <div class="pt-1 mb-4">
                                                        <button type="submit" class="cst-button-just-open-black text-uppercase cstm-white-font-clr cstm-bg-black">Accedi
                                                        </button>
                                                    </div>

                                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Non hai un account? <a href="{{route('register')}}" style="color: #393f81;">Registrati qui</a></p>
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