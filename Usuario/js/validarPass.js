function validarPassword(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = "ÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";
  mayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

  if (mayusculas.indexOf(tecla) == 1) {
    letraespecial = "$%!@.";
    if (letraespecial.indexOf(tecla) == 1) {
      if (key > 47 && key < 58) {
        if (letras.indexOf(tecla) == 1) {
          return true;
        }
      }
    }
  }
}
