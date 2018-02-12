<?php

return [
    "frontend" => [
        "auth" => [
            "confirmation" => [
                "resent" => "Una nuova e-mail di conferma è stata inviata all'indirizzo registrato.",
                "confirm" => "Conferma il tuo account!",
                "not_found" => "Questo codice di conferma non esiste.",
                "success" => "Il tuo account è stato confermato con successo!",
                "already_confirmed" => "Il tuo account è già confermato",
                "pending" => "Your account is currently pending approval.",
                "resend" => "Il tuo account non è confermato. Per cortesia clicca sul link di conferma nell'email che ti abbiamo mandato, o <a href=\"http://rappasoft.loc:81/account/confirm/resend/:user_uuid\">clicca qui</a> per rimandare l'email di conferma.",
                "created_pending" => "Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.",
                "created_confirm" => "Il tuo account è stato creato con successo. Ti abbiamo inviato un'email per confermare il tuo account.",
                "mismatch" => "Il tuo codice di conferma non corrisponde"
            ],
            "registration_disabled" => "Registration is currently closed.",
            "email_taken" => "Questo indirizzo e-mail è stato già utilizzato.",
            "password" => [
                "change_mismatch" => "Questa non è la tua vecchia password.",
                "reset_problem" => "There was a problem resetting your password. Please resend the password reset email."
            ],
            "deactivated" => "Il tuo account è stato disattivato."
        ]
    ],
    "backend" => [
        "access" => [
            "users" => [
                "email_error" => "Questo indirizzo e-mail appartiene ad un altro utente.",
                "not_found" => "Questo utente non esiste.",
                "update_password_error" => "C'è stato un problema durante il cambio di password per l'utente. Si prega di riprovare.",
                "cant_confirm" => "There was a problem confirming the user account.",
                "create_error" => "C'è stato un problema durante la creazione dell'utente. Si prega di riprovare.",
                "delete_error" => "C'è stato un problema durante l'eliminazione dell'utente. Si prega di riprovare.",
                "social_delete_error" => "There was a problem removing the social account from the user.",
                "restore_error" => "C'è stato un problema durante il ripristino dell'utente. Si prega di riprovare.",
                "mark_error" => "C'è stato un problema durante l'aggiornamento dell'utente. Si prega di riprovare.",
                "update_error" => "C'è stato un problema durante l'aggiornamento dell'utente. Si prega di riprovare",
                "already_confirmed" => "This user is already confirmed.",
                "not_confirmed" => "This user is not confirmed.",
                "cant_restore" => "This user is not deleted so it can not be restored.",
                "delete_first" => "This user must be deleted first before it can be destroyed permanently.",
                "cant_delete_admin" => "You can not delete the super administrator.",
                "cant_delete_own_session" => "You can not delete your own session.",
                "cant_delete_self" => "Non puoi cancellare te stesso.",
                "cant_deactivate_self" => "Non puoi eseguire questa operazione su te stesso.",
                "cant_unconfirm_admin" => "You can not un-confirm the super administrator.",
                "cant_unconfirm_self" => "You can not un-confirm yourself.",
                "role_needed_create" => "Devi scegliere almeno un ruolo.",
                "role_needed" => "Devi scegliere almeno un ruolo",
                "session_wrong_driver" => "Your session driver must be set to database to use this feature."
            ],
            "roles" => [
                "already_exists" => "Questo ruolo esiste già. Si prega di scegliere un nome diverso.",
                "not_found" => "Questo ruolo non esiste.",
                "create_error" => "C'è stato un problema durante la creazione di questo ruolo. Si prega di riprovare più tardi.",
                "delete_error" => "C'è stato un problema durante l'eliminazione di questo ruolo. Si prega di riprovare più tardi.",
                "update_error" => "C'è stato un problema durante l'aggiornamento di questo ruolo. Si prega di riprovare più tardi.",
                "has_users" => "Non è possibile cancellare un ruolo associato a degli utenti.",
                "cant_delete_admin" => "Non è possibile eliminare il ruolo di Amministratore.",
                "needs_permission" => "Bisogna selezionare almeno un permesso per questo ruolo."
            ]
        ]
    ]
];
