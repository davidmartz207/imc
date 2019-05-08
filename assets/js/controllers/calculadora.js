

app.controller('calculadora', function ($scope, $http, $timeout, $compile) {

    $scope.tabla = false;
    $scope.listar = function () {
        $http({
            method: 'get',
            url: "medida/listar"
        }).then(function (success) {
            //resultados miembros
            $scope.medidas = success.data;

            if ($scope.medidas.length > 0) {
                $('#tabla').html("");
                //generamos el html de la tabla
                angular.element(document.getElementById('tabla')).append(
                    $compile(
                        '<tr ng-repeat="medida in medidas">' +
                        '<td ng-bind="medida.fecha"></td>' +
                        '<td ng-bind="medida.altura"></td>' +
                        '<td ng-bind="medida.peso"></td>' +
                        '<td ng-bind="medida.imc"></td>' +
                        '<td ng-bind="medida.clasificacion"></td>' +
                        '</tr>'
                    )($scope)
                );
            }
            //regeneramos el datatable
            $timeout(function () {
                generardatatable();
            })
            //muestra la tabla
            $scope.tabla = true;

        }, function (error) {
        });
    }


    $scope.listar();

    $scope.calcular = function () {
        //calcula el índice de masa corporal
        $scope.formData.imc = parseFloat($scope.formData.peso) / Math.pow(parseFloat($scope.formData.altura), 2);
        //fijamos la salida a sólo 2 decimales
        $scope.formData.imc = Number($scope.formData.imc.toFixed(2));

        //determinamos la clasificación dependiendo del IMC
        if ($scope.formData.imc < 16.00) {
            $scope.formData.clasificacion = "Infrapeso: Delgadez Severa";
        } else if ($scope.formData.imc >= 16.00 && $scope.formData.imc <= 16.99) {
            $scope.formData.clasificacion = "Infrapeso: Delgadez Severa";
        } else if ($scope.formData.imc >= 17.00 && $scope.formData.imc <= 18.49) {
            $scope.formData.clasificacion = "Infrapeso: Delgadez aceptable";
        } else if ($scope.formData.imc >= 18.50 && $scope.formData.imc <= 24.99) {
            $scope.formData.clasificacion = "Peso Normal";
        } else if ($scope.formData.imc >= 25.00 && $scope.formData.imc <= 29.99) {
            $scope.formData.clasificacion = "Sobrepeso";
        } else if ($scope.formData.imc >= 30.00 && $scope.formData.imc <= 34.99) {
            $scope.formData.clasificacion = "Obeso: Tipo I";
        } else if ($scope.formData.imc >= 15.00 && $scope.formData.imc <= 40.00) {
            $scope.formData.clasificacion = "Obeso: Tipo II";
        } else if ($scope.formData.imc > 40.00) {
            $scope.formData.clasificacion = "Obeso: Tipo III";
        }

        //guardamos automáticamente el resultado
        $scope.guardar();

    }



    //función para guardar nueva medida
    $scope.guardar = function () {
        $http({
            method: 'post',
            url: "medida/crear",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            data: $.param($scope.formData)
        }).then(function (success) {
            //refrescamos los resultados
            $timeout(function () {
                //primero destruimos el datatable para poder cambiarlo
                destruirdatatable();
            })
            $scope.listar();

        }, function (error) {
        });

    }

    $scope.cerrar = function () {
        $http({
            method: 'post',
            url: "usuario/cerrar"
        }).then(function (success) {
            location.reload();

        }, function (error) {
        });

    }

});