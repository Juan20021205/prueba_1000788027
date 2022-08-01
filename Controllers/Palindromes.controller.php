<?php

require_once 'Model/Palindromes.php';

class PalindromerController
{

    private $model;

    function __CONSTRUCT()
    {
        $this->model = new Palindromes();
    }

    function index()
    {
        require 'Views/header.php';
        require 'Views/Palindromes/form.php';
        require 'Views/footer.php';
    }

    function table()
    {
        $palindrome = new Palindromes();
        $palindromes = $palindrome->List();
        $cantPalindromes = $palindrome->getNumPalindromes();

        require 'Views/header.php';
        require 'Views/Palindromes/table.php';
        require 'Views/footer.php';
    }

    function save()
    {
        $palindromes = new Palindromes();
        $word = $_POST['palindrome'];

        $wordsToSave = $this->addInArray($word);
        $word = $this->formatString($word);
        $words = $this->addInArray($word);

        for ($i = 0; $i < sizeof($words); $i++) {
            $palindromes->setWords(ucfirst($wordsToSave[$i]));

            $palindromes->setPalindrome($this->verifyWord($words[$i]));
            $palindromes->Insert();            
        }

        header('location:?c=Palindromes');
    }

    function verifyWord($word)
    {
        if (strlen($word) > 2) {
            for ($i = 0; $i < strlen($word); $i++) {
                if ($word[$i] != $word[strlen($word) - $i - 1]) {
                    return 0;
                }
            }
            return 1;
        }
    }

    function addInArray($word)
    {
        $words = [];

        if (strpos($word, '/') == '') {
            array_push($words, substr($word, 0, strlen($word)));
        } else {
            while (strpos($word, '/') != '') {
                array_push($words, substr($word, 0, strpos($word, '/')));
                $word =  substr($word, strpos($word, '/') + 1);
                if (strpos($word, '/') == '' && strlen($word) != 0) {
                    array_push($words, substr($word, 0, strlen($word)));
                }
            }
        }

        return $words;
    }

    function formatString($word)
    {
        $String = strtolower($word);

        $String = str_replace([" ", ",", "."], "", $String);

        $String = str_replace(['á', 'à'], 'a', $String);
        $String = str_replace(['é', 'è'], 'e', $String);
        $String = str_replace(['í', 'ì'], 'i', $String);
        $String = str_replace(['ó', 'ò'], 'o', $String);
        $String = str_replace(['ú', 'ù', 'ü'], 'u', $String);

        return $String;
    }
}
