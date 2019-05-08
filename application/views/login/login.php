<body class="my-login-page" ng-controller="usuario">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="assets/img/logo.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Iniciar Sesión</h4>
                            <form class="my-login-validation" novalidate name="form">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" name="email" value=""
                                        ng-model="formData.email" required autofocus autocomplete="off">
                                    <div ng-show="form.email.$dirty && form.email.$invalid" class="alert alert-danger">
                                        Email incorrecto
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>

                                    <input id="password" type="password" class="form-control" name="password"
                                        ng-model="formData.password" autocomplete="off" required data-eye>
                                    <div ng-show="form.password.$dirty && form.password.$invalid"
                                        class="alert alert-danger">
                                        Contraseña requerida
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button ng-disabled="!formData.password || !formData.email " type="button"
                                        ng-click="login()" class="btn btn-primary btn-block">
                                        Ingresar
                                    </button>
                                </div>
                            </form>
                            <div class="mt-4 text-center">
                                ¿No tienes una cuenta?
                                <a href="register">Crea una</a>
                            </div>
                            <div class="mt-4 text-center">
                                -o-
                                <div>
                                    <button onclick="fbLogin()" class="btn btn-primary btn-block">
                                        Ingresa con Facebook
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>