<?

//REGOLE PER IMPOSTARE LA PASSWORD
// 1. Password sia lunga almeno 8 caratteri
// 2. La password contenga almeno 1 numero
// 3. La password contenga almeno un carattere maiuscolo
// 4. La password contenga almeno un carattere speciale



$password = readline('Inserisci qui la password: ');   // readline è una built-function di php che mi permette di accettare in input una strnga dall'utente e come parametro gli passo un prompt

echo "Password inserita: " . $password . "\n";  // Concatenazione 





//----------------------------- 1.--------------------------------------------------------------------------
function checkLenght($password){     // Tu accetterai un valore che è $password

    if(strlen($password) >= 8){   // strlen Con questa funzione riesco a determinare la lunghezza della stringa e ci applico un controllo caratteri usando if

    echo "La password è lunga almeno 8 caratteri \n";

    return true; //Se è >0 ritornami un valore ossia true

 }
else {

    echo "La password deve essere lunga di 8 caratteri \n";

    return false;

   }

}





//----------------------------- 2.--------------------------------------------------------------------------
function checkNumber($password){

     for ($i=0; $i < strlen($password); $i++ ){     // Girami finche non hai finito tutti i caratteri di $password

 if(is_numeric($password[$i])){     // mettendo questo controllo di volta in volta is_numeric controlla ogni singolo carattere 0,1,2....e controllava se è un numerico 

    echo "La tua password contiene un numero \n";
  // break; // Interrompi non appena trovi il primo carattere usando il break
  return true;  // mi ritorna un numero quando incontra almeno un parametro che è un numero
 }


  }

}







//----------------------------- 3.--------------------------------------------------------------------------
function checkUppercase($password){

    for ($i=0; $i < strlen($password); $i++) {  

    if (ctype_upper($password[$i])){  // Controllo di quando incontri il primo carattere maiuscolo rompi il ciclo usando break

       echo "La password contiene una maiuscola \n";
     return true;
   }
 }

}








//----------------------------- 4.--------------------------------------------------------------------------
const SPECIAL_CHARS = ["!" , "@" , "#" , "$"]; // Array di caratteri speciali

function checkSpecialChar($password){

 for ($i=0; $i < strlen($password);  $i++) { 
    
    if(in_array($password[$i], SPECIAL_CHARS)){   // Facciamo un controllo sui singoli caratteri che controllano la password

 echo "La password contiene un carattere speciale \n";
    return true;

   }
 }
}











//-------------------------------------------- Funzione finale ----------------------------------------------

//   Viene eseguito un ciclo do while che continua a chiedere la password finché non vengono rispettate tutte e quattro le regole

function checkPassword($password) {


  do {
       
      $isValid = true;   //   // Variabile di controllo per il ciclo do while


      // Controllo dei 8 caratteri
      if (!checkLenght($password)) {     //  Se è vero che la password non soddisfa la regola del checkLenght (almeno 8 caratteri) entra nel if
          echo "La password deve essere lunga almeno 8 caratteri\n";

          $isValid = false;
           // Impostiamo `$isValid` su `false`, perché la password non soddisfa la regola sulla lunghezza
      }



      // Controllo numero
      if (!checkNumber($password)) {
          echo "La password deve contenere almeno un numero\n";
          $isValid = false;
      }



      // Controllo maiuscole
      if (!checkUppercase($password)) {
          echo "La password deve contenere almeno una lettera maiuscola\n";
          $isValid = false;
      }



      // Controllo carattere speciale
      if (!checkSpecialChar($password)) {
          echo "La password deve contenere almeno un carattere speciale\n";
          $isValid = false;
      }



      // Se la password è valida, esci dal ciclo
      if ($isValid) {    //  Se la variabile $isValid è ancora true allora fai qualcosa...
          echo "Password valida\n";
          break;  // escidal ciclo perche la psw è valida


      } else {
          // Se non è valida, chiedi una nuova password e ricomincia il ciclo
          $password = readline('Inserisci qui la password: ');
          echo "Password inserita: " . $password . "\n";
      }

  } while (true);
}

//   Se almeno una regola non è rispettata, verrà impostata su false per continuare il ciclo e chiedere una nuova password.


checkPassword($password);



?>
