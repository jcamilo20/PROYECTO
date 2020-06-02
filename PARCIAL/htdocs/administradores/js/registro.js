function validar_clave(e) {

      var caract_invalido = " ";
      var caract_longitud = 6;
      var cla1 = $('#register-form #password').val();
      var cla2 = $('#register-form #confirm_password').val();
      if (cla1 == '' || cla2 == '') {
         swal({
  type: 'error',
  title: 'Oops...',
  text: 'Debes introducir tu clave en los dos campos',
})
        //document.registro
        e.preventDefault();
        return false;
      }
      if (cla1.length < caract_longitud) {


          swal({
  type: 'error',
  title: 'Oops...',
  text: 'Tu clave debe constar de '  + caract_longitud + ' car\u00E1cteres.',
})
        //document.registro
        e.preventDefault();
        return false;
      }
      if (cla1.indexOf(caract_invalido) > -1) {
          swal({
  type: 'error',
  title: 'Oops...',
  text: 'Las claves no pueden contener espacios.',
})
        //document.registro
        e.preventDefault();
        return false;
      } else {
        if (cla1 != cla2) {
          swal({
  type: 'error',
  title: 'Oops...',
  text: 'Las claves introducidas no son iguales.',
})
     //document.registro
          e.preventDefault();
          return false;
        }
      }
    }

    $(function() {

      $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });
      $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });

      $('#register-form').submit(function(e) {
        validar_clave(e);
      });
    });