function Validate(e) {
  let inp = document.getElementById("palindrome");
  let invalid = document.getElementById("message");
  let inpVal = inp.value;

  inp.classList.remove("is-invalid");
  invalid.textContent = "";

  if (inpVal != "") {
    if (inpVal[0] == "/") {
      inp.classList.add("is-invalid");
      invalid.textContent = "el simbolo / no puede ir antes de una palabra";
      e.preventDefault();
    } else if (inpVal[inpVal.length - 1] == "/") {
      inp.classList.add("is-invalid");
      invalid.textContent = "el simbolo / no puede ir al final de una palabra si no hay una palabra despues";
      e.preventDefault();
    }
  } else {
    inp.classList.add("is-invalid");
    invalid.textContent = "Este campo es obligatorio";
    e.preventDefault();
  }
}
