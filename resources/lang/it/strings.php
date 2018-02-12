<?php

return [
    "backend" => [
        "general" => [
            "minutes" => " minutes",
            "you_have" => [
                "messages" => "{0} Non hai messaggi|{1} Hai un messaggio|[2,Inf] Hai :number messaggi",
                "notifications" => "{0} Non hai notifiche|{1} Hai una notifica|[2,Inf] Hai :number notifiche",
                "tasks" => "{0} Non hai compiti|{1} Hai un compito|[2,Inf] Hai :number compiti"
            ],
            "all_rights_reserved" => "Tutti i diritti riservati.",
            "are_you_sure" => "Sei sicuro?",
            "continue" => "Continua",
            "boilerplate_link" => "Laravel 5 Boilerplate",
            "member_since" => "Membro dal",
            "status" => [
                "offline" => "Offline",
                "online" => "Online"
            ],
            "search_placeholder" => "Cerca...",
            "see_all" => [
                "messages" => "Visualizza tutti i messaggi",
                "notifications" => "Visualizza tutte",
                "tasks" => "Visualizza tutti i compiti"
            ],
            "timeout" => "You were automatically logged out for security reasons since you had no activity in "
        ],
        "access" => [
            "users" => [
                "if_confirmed_off" => "(Se non è confermato)",
                "delete_user_confirm" => "Sei sicuro di voler eliminare definitivamente questo utente? Ovunque ci sia un riferimento a questo utente all'interno dell'applicazione si vedrà un errore. Procedi a tuo rischio e pericolo, non si potrà annullare questa operazione.",
                "restore_user_confirm" => "Ripristinare l'utente al suo stato originario?"
            ]
        ],
        "welcome" => "<p>Quello che vedi è il tema CoreUI sviluppato da <a href=\"https://coreui.io/\" target=\"_blank\">creativeLabs</a>.\n    Si tratta di una versione ridotta al minimo che include solo gli stili e gli script necessari per il funzionamento.\n    Scarica la versione completa per aggiungere componenti alla dashboard.</p>\n<p>Tutte le funzioni che vedi sono simulate, ad eccezione della <strong>Gestione utenti</strong> sulla sinistra.\n    Questo modello comprende una libreria completa per il controllo degli accessi tramite utenti/ruoli/permessi.</p>\n<p>Questo si tratta comunque di un work-in-progress, perciò ci potrebbero essere dei bug o altri problemi che non ho ancora risolto.\n    Farò del mio meglio per risolverli mano a mano che riceverò le segnalazioni.</p>\n<p>Spero che tu gradisca quanto lavoro e impegno ho messo in questo progetto.\n    Per cortesia vai su <a href=\"https://github.com/rappasoft/laravel-5-boilerplate\" target=\"_blank\">GitHub</a>\n    per ulteriori informazioni e per segnalare qualsiasi <a href=\"https://github.com/rappasoft/Laravel-5-Boilerplate/issues\" target=\"_blank\">problema</a>.</p>\n<p><strong>This project is very demanding to keep up with given the rate at which the master Laravel branch changes, so any help is appreciated.</strong></p>\n<p>- Anthony Rappa</p>",
        "dashboard" => [
            "title" => "Dashboard Amministrazione",
            "welcome" => "Benvenuto"
        ],
        "search" => [
            "empty" => "Please enter a search term.",
            "title" => "Search Results",
            "results" => "Search Results for :query",
            "incomplete" => "You must write your own search logic for this system."
        ]
    ],
    "emails" => [
        "contact" => [
            "subject" => "A new :app_name contact form submission!",
            "email_body_title" => "You have a new contact form request: Below are the details:"
        ],
        "auth" => [
            "click_to_confirm" => "Clicca qui per confermare il tuo account:",
            "reset_password" => "Clicca qui per resettare la tua password",
            "greeting" => "Hello!",
            "password_if_not_requested" => "If you did not request a password reset, no further action is required.",
            "trouble_clicking_button" => "If you’re having trouble clicking the \":action_text\" button, copy and paste the URL below into your web browser:",
            "regards" => "Regards,",
            "password_reset_subject" => "Il tuo link per il reset della password",
            "thank_you_for_using_app" => "Thank you for using our application!",
            "error" => "Whoops!",
            "password_cause_of_email" => "You are receiving this email because we received a password reset request for your account.",
            "account_confirmed" => "Your account has been confirmed."
        ]
    ],
    "frontend" => [
        "user" => [
            "change_email_notice" => "If you change your e-mail you will be logged out until you confirm your new e-mail address.",
            "password_updated" => "Password aggiornata con successo.",
            "profile_updated" => "Profilo aggiornato con successo.",
            "email_changed_notice" => "You must confirm your new e-mail address before you can log in again."
        ],
        "tests" => [
            "js_injected_from_controller" => "Javascript iniettato da un controller",
            "based_on" => [
                "permission" => "Basato su permessi - ",
                "role" => "Basato su ruoli - "
            ],
            "using_access_helper" => [
                "array_permissions" => "Si sta usando l'Access Helper con un array di nomi o ID di permessi, l'utente li deve possedere tutti.",
                "array_permissions_not" => "Si sta usando l'Access Helper con un array di nomi o ID di permessi, l'utente non li deve possedere tutti.",
                "array_roles" => "Si sta usando l'Access Helper con un array di nomi o ID di ruoli, l'utente li deve possedere tutti.",
                "array_roles_not" => "Si sta usando l'Access Helper con un array di nomi o ID di ruoli, l'utente non li deve possedere tutti.",
                "permission_id" => "Si sta usando l'Access Helper con un ID di permesso",
                "permission_name" => "Si sta usando l'Access Helper con un nome di permesso",
                "role_id" => "Si sta usando l'Access Helper con un ID di ruolo",
                "role_name" => "Si sta usando l'Access Helper con un nome di ruolo"
            ],
            "using_blade_extensions" => "Usando estensioni Blade",
            "view_console_it_works" => "Apri la console Javascript del browser, dovresti vedere 'it works!' generato da FrontendController@index",
            "you_can_see_because_permission" => "Puoi vedere questo perché hai il permesso ':permission'!",
            "you_can_see_because" => "Puoi vedere questo perché il tuo ruolo è ':role'!"
        ],
        "general" => [
            "joined" => "Joined"
        ],
        "test" => "Test",
        "welcome_to" => "Benvenuto su :place"
    ]
];
