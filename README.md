## Instruction

Ciao @qui, creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.

Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel Preset con autenticazione.
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:

-   Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office
-   Creazione del modello Project con relativa migrazione, seeder, controller e rotte
-   Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti
    Bonus
    Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando le form requests.

## Instruction

Ripercorrete gli steps visti a lezione e completate le operazioni CRUD (edit/update/delete)

# Bonus:

Aggiungete i messaggi di sessione quando fare il redirect dopo aver creato, aggiornato e cancellato una risorsa.

## Instruction 3

Ciao @qui, continuiamo a lavorare nella repo dei giorni scorsi e aggiungiamo un’immagine ai nostri progetti.
Ricordiamoci di creare il symlink con l’apposito comando artisan e di aggiungere l’attributo enctype="multipart/form-data" ai form di creazione e di modifica!
Ricordate di implementare anche la cancellazione dell'immagine esistente qualora il post venda eliminato completamente.
