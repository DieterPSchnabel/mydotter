<?php

return [
    "frontend" => [
        "auth" => [
            "confirmation" => [
                "resent" => "Een nieuwe bevestigings email is naar het ingegeven adres verstuurd.",
                "confirm" => "Bevestig uw account!",
                "not_found" => "De bevestigingscode bestaat niet.",
                "success" => "Uw account is succesvol bevestigd!",
                "already_confirmed" => "Uw account is reeds bevestigd",
                "pending" => "Your account is currently pending approval.",
                "resend" => "Uw account kon niet worden bevestigd. Klik op de informatie link in de email die u heeft ontvangen, of <a href=\"http://rappasoft.loc:81/account/confirm/resend/:user_uuid\">klik hier</a> om de bevestigingsemail opnieuw te versturen.",
                "created_pending" => "Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.",
                "created_confirm" => "Uw account is succesvol aangemaakt. Een bevestigings email is verzonden.",
                "mismatch" => "Uw bevestigingscode komt niet overeen."
            ],
            "registration_disabled" => "Registration is currently closed.",
            "email_taken" => "Dat emailadres is al in gebruik.",
            "password" => [
                "change_mismatch" => "Dat is niet uw oude wachtwoord",
                "reset_problem" => "There was a problem resetting your password. Please resend the password reset email."
            ],
            "deactivated" => "Uw account is gedactiveerd."
        ]
    ],
    "backend" => [
        "access" => [
            "users" => [
                "email_error" => "Dit email-adres is al in gebruik.",
                "not_found" => "Die gebruiker bestaat niet.",
                "update_password_error" => "Er is een probleem opgetreden bij het aanpassen van het wachtwoord van de gebruiker. Probeer het nogmaals.",
                "cant_confirm" => "There was a problem confirming the user account.",
                "create_error" => "Er is een probleem opgetreden bij het creëren van de gebruiker. Probeer het nogmaals.",
                "delete_error" => "Er is een probleem opgetreden bij het verwijderen van de gebruiker. Probeer het nogmaals.",
                "social_delete_error" => "There was a problem removing the social account from the user.",
                "restore_error" => "Er is een probleem opgetreden bij het herstellen van de gebruiker. Probeer het nogmaals.",
                "mark_error" => "Er is een probleem opgetreden bij het bijwerken van de gebruiker. Probeer het nogmaals.",
                "update_error" => "Er is een probleem opgetreden bij het bijwerken van de gebruiker. Probeer het nogmaals.",
                "already_confirmed" => "This user is already confirmed.",
                "not_confirmed" => "This user is not confirmed.",
                "cant_restore" => "This user is not deleted so it can not be restored.",
                "delete_first" => "This user must be deleted first before it can be destroyed permanently.",
                "cant_delete_admin" => "You can not delete the super administrator.",
                "cant_delete_own_session" => "You can not delete your own session.",
                "cant_delete_self" => "U kunt uzelf niet verwijderen.",
                "cant_deactivate_self" => "U kunt uzelf niet deactiveren",
                "cant_unconfirm_admin" => "You can not un-confirm the super administrator.",
                "cant_unconfirm_self" => "You can not un-confirm yourself.",
                "role_needed_create" => "U moet ten minste één rol kiezen. De gebruiker is aangemaakt maar gedeactiveerd.",
                "role_needed" => "U moet ten minste één rol kiezen.",
                "session_wrong_driver" => "Your session driver must be set to database to use this feature."
            ],
            "roles" => [
                "already_exists" => "Die rol bestaat al. Kies een andere naam.",
                "not_found" => "Die rol bestaat niet.",
                "create_error" => "Er is een probleem opgetreden bij het creëren van deze rol. Probeer het nogmaals.",
                "delete_error" => "Er is een probleem opgetreden bij het verwijderen van deze rol. Probeer het nogmaals.",
                "update_error" => "Er is een probleem opgetreden bij het bijwerken van deze rol. Probeer het nogmaals.",
                "has_users" => "Een rol met gebruikers kan niet worden verwijdert.",
                "cant_delete_admin" => "De Administrator rol kan niet worden verwijdert.",
                "needs_permission" => "Kies ten minste één permissie voor deze rol."
            ]
        ]
    ]
];
