<?php

class Palindromes
{
    private $Id = null;
    private $Words = null;
    private $Palindrome = null;

    private $connection;

    function __CONSTRUCT()
    {
        $this->connection = Database::Connection();
    }

    public function List()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM palindromes;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getNumPalindromes()
    {
        try {
            $query = $this->connection->prepare("SELECT COUNT(*) FROM palindromes WHERE Palindrome = 1");
            $query->execute();
            return $query->fetchColumn();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Insert()
    {
        try {
            $query = "INSERT INTO palindromes(Words,Palindrome) VALUES(?,?);";
            $this->connection->prepare($query)
                ->execute(array(
                    $this->Words,
                    $this->Palindrome
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getId()
    {
        return $this->Id;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }
    public function getWords()
    {
        return $this->Words;
    }
    public function setWords($Words)
    {
        $this->Words = $Words;
    }
    public function getPalindrome()
    {
        return $this->Palindrome;
    }
    public function setPalindrome($Palindrome)
    {
        $this->Palindrome = $Palindrome;
    }
}
