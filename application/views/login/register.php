<body class="my-login-page" ng-controller="usuario">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="assets/img/logo.png" alt="IMC Calc">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Registro</h4>
                            <form name="form" class="my-login-validation" novalidate>
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input id="name" type="text" class="form-control" name="nombre"
                                        ng-model="formData.nombre" required autofocus autocomplete="off">
                                    <div ng-show="form.nombre.$dirty && form.nombre.$invalid"
                                        class="alert alert-danger">
                                        El nombre es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Apellido</label>
                                    <input id="apellido" type="text" class="form-control" name="apellido"
                                        ng-model="formData.apellido" required autofocus autocomplete="off">
                                    <div ng-show="form.apellido.$dirty && form.apellido.$invalid"
                                        class="alert alert-danger">
                                        El apellido es requerido
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        ng-model="formData.email" required autocomplete="off">
                                    <div ng-show="form.email.$dirty && form.email.$invalid" class="alert alert-danger">
                                        El email es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        ng-model="formData.password" required data-eye autocomplete="off">
                                    <div ng-show="form.password.$dirty && form.password.$invalid"
                                        class="alert alert-danger">
                                        La contraseña es requerida
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirmar Contraseña</label>
                                    <input id="rpassword" type="password" class="form-control" name="rpassword "
                                        ng-model="formData.rpassword" required data-eye autocomplete="off">
                                    <div ng-show="formData.rpassword != formData.password" class="alert alert-danger ">
                                        La contraseña debe ser igual.
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button
                                        ng-disabled="!formData.nombre || !formData.email || !formData.apellido || !formData.password || !formData.rpassword"
                                        type="button" class="btn btn-primary btn-block" ng-click="guardar()">
                                        Registrar
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    ¿Ya tienes una cuenta? <a href="usuario">Ingresa</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>