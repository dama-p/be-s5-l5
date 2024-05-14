<?php 
include __DIR__ . '/Database.php';

//in questa classe interagiremo con il DB
class Signup extends Database {

    //controlliamo se l'user esiste

    protected function checkUser($username, $email) {
        //prendiamo la variabile connect creata in database
        $stmt = $this->connect()->prepare('SELECT id FROM users WHERE id = ? OR email = ?;');
        
        //separare in prepare ed execute permette di effettuare controlli più precisi
        // i "?" del prepare vengono sostituiti dai dati della query nel momento dell'execute
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