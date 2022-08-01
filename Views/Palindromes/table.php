<div class="container text-align-center">
    <a href="?c=Palindromes" class="btn btn-secondary mt-4">Regresar a Formulario</a>
    <h2 class="mt-4 mb-3 ">Registro de Palabras</h2>
    <div class="alert alert-primary" role="alert">
        Usted Ha Registrado <?= $cantPalindromes?><?= $cantPalindromes == 1 ? ' Palindromo' : ' Palindromos'?>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Palabra</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($palindromes as $word) : ?>
                <tr class="<?= $word->getPalindrome() ? 'table-active' : '' ?>">
                    <th><?= $word->getId() ?></th>
                    <th><?= $word->getWords() ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>