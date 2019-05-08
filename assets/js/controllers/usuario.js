//controladores angular para la aplicacion
//controlador para los procesos de usuario
app.controller('usuario', function ($scope, $http) {

    //formulario no ha sido enviado
    $scope.guardar = function () {

        $http({
            method: 'post',
            url: "usuario/create",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            data: $.param($scope.formData)
        }).then(function (success) {
            //enviamos el mensaje de error
            if (success.data.message) {
                swal(JSON.stringify(success.data.message));
            } else {
                swal(JSON.stringify("Usuario registrado con éxito"));

            }

        }, function (error) {
        });

    }

    //función para hacer login normal
    $scope.login = function () {
        $http({
            method: 'post',
            url: "usuario/login",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            data: $.param($scope.formData)
        }).then(function (success) {
            //recargamos la página
            if (success.data.message) {
                swal(JSON.stringify(success.data.message));
            } else {
                swal("¡¡Te Damos la Bienvenida!!");
                location.reload();
            }


        }, function (error) {
        });
    }


});

