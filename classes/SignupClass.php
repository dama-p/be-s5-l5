<?php 
include_once __DIR__ . '/Database.php';

//in questa classe interagiremo con il DB
class SignupClass extends Database {

    protected function setUser($username, $password, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (id, password, email) VALUES (?, ?, ?);');

        //prima di eseguire lo stmt, per motivi di sicurezza, bisogna hashare la PW
        $hashedPw = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPw, $email))) {
            $stmt = null; //cancelliamo lo stmt
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        $stmt = null; //cancellare lo stmt ???

    }

    //controlliamo se l'user esiste

    protected function checkUser($username, $email) {
        //prendiamo la variabile connect creata in database
        $stmt = $this->connect()->prepare('SELECT id FROM users WHERE id = ? OR email = ?;');
        
        //separare in prepare ed execute permette di effettuare controlli più precisi
        // i placeholder "?" del prepare vengono sostituiti dai dati della query nel momento dell'execute
        // quindi il prepare PASSA la query all'interno del database
        // e DOPO con l'execute riempiamo i campi richiesti con veri e propri dati
        // ciò permette di evitare l'SQL injection nel DB, perché SEPARIAMO i dati dalla query

        //dato che abbiamo un set di più dati, essi devono venir inseriti nell'execute sotto forma di array
        //con l'if controlliamo se l'esecuzione della query fallisce
        if(!$stmt->execute(array($username, $email))) {
            $stmt = null; //cancelliamo lo stmt
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        //impostiamo cosa succede se lo stmt va a buon fine
        // rowCount() funzione che ritorna il numero di righe
        // sarà ovviamente > 0 se la query va a buon fine
        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
         } else {
            $resultCheck = true;
         }
         return $resultCheck;

}

}