<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/controllers/usuario.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/my-login.js"></script>
<script>
window.fbAsyncInit = function() {
    FB.init({
        appId: '2041089209333003',
        autoLogAppEvents: true,
        xfbml: true,
        version: 'v3.3'
    });
};
</script>
<script async defer src="https://connect.facebook.net/es_LA/sdk.js"></script>
<script>
// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('Buscando información... ');
            FB.api('/me', 'GET', {
                "fields": "email,first_name,last_name,id,gender"
            }, function(response) {
                var pass = Math.random().toString(36).substr(2, 5);
                //creamos un registro con jquery para el usuario
                $.post("usuario/login", {
                        nombre: response.first_name,
                        apellido: response.last_name,
                        email: response.email,
                        password: pass,
                        facebook: true
                    })
                    .done(function(data) {
                        //refrescamos la página
                        location.reload();
                    });
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    });
}
</script>
</body>

</html>