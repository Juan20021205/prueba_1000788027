<div class="container-form">
    <div class="form">
        <h3>Digite su palabra o su oración</h3>
        <div class="alert alert-warning" role="alert">
            <p>
                Para Ingesar Más De Una Palabra U Oracion Diferente Se Requiere Separar
                Sus Palabras U Oraciones Con El Simbolo /
            </p>
        </div>
        <form class="needs-validation" action="?c=Palindrome&a=save" method="post" onsubmit="Validate(event)">
            <input class="form-control" type="text" name="palindrome" id="palindrome">
            <div class="invalid-feedback" id="message"></div>
            <div class="butons">
                <a class="btn btn-secondary me-2" href="?c=Palindrome&a=table">Ver Tabla</a>
                <button class="btn btn-primary ms-2" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>