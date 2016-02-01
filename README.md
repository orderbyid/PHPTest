Progetto: Prontoprodotti

Il progetto è stato sviluppato con Symfony 2.8
Ambiente di sviluppo: Netbeans - Database: MySql 
Sono state utilizzate le estensioni jQuery dataTable e moment.js per aggiungere funzionalità alla tabella e ordinamento per data.
è stato configurato il modulo "mod_rewrite" nel file .htaccess per permettere url puliti.

Configurazione:
Installare i bundle di Symfony tramite Composer.
Per configurare il database, utilizzare il dump presente nella cartella del progetto (cha contiene dei dati di test)
oppure generare le tabelle con il comando "schema:update"
La pagina principale risponde alla rotta /product/list