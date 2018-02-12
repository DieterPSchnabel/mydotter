<?php

return [
    "backend" => [
        "general" => [
            "minutes" => " minuten",
            "you_have" => [
                "messages" => "{0} U heeft geen berichten|{1} U heeft 1 bericht|[2,*] U heeft :number berichten",
                "notifications" => "{0} U heeft geen notificaties|{1} U heeft 1 notificatie|[2,*] U heeft :number notificaties",
                "tasks" => "{0} U heeft geen taken|{1} U heeft 1 taak|[2,*] U heeft :number taken"
            ],
            "all_rights_reserved" => "Alle Rechten Voorbehouden.",
            "are_you_sure" => "Zeker?",
            "continue" => "Doorgaan",
            "boilerplate_link" => "Laravel 5 Boilerplate",
            "member_since" => "Lid sinds",
            "status" => [
                "offline" => "Offline",
                "online" => "Online"
            ],
            "search_placeholder" => "Zoeken...",
            "see_all" => [
                "messages" => "Alle messages bekijken",
                "notifications" => "Bekijk alles",
                "tasks" => " Alle taken bekijken"
            ],
            "timeout" => "Automatisch uitgelogd vanwege veiligheidsredenen aangezien er geen activiteit was in "
        ],
        "access" => [
            "users" => [
                "if_confirmed_off" => "(Als bevestiging uit staat)",
                "delete_user_confirm" => "Gebruiker permanent verwijderen? Overal in de applicaties waar gerefereerd wordt naar dit gebruikers-ID zal een fout ontstaan. Doorgaan op eigen risico. Dit kan niet ongedaan gemaakt worden.",
                "restore_user_confirm" => "Herstel deze gebruiker naar de originele staat?"
            ]
        ],
        "welcome" => "<p>Dit is het CoreUI thema door <a href=\"https://coreui.io/\" target=\"_blank\">creativeLabs</a>. Dit is een uitgeklede versie met alleen de stijlen and scripts om het geheel draaiende te krijgen. Download de volledige versie om componenten aan het dashboard toe te voegen.</p>\n<p>Alle functionaliteit is voor de show, met uitzondering van de <strong>Toegangs Beheer</strong> aan de linkerkant. Deze boilerplate komt standaard met een volledig functionele toegangs beheer bibliotheek om gebruikers/rollen/permissies to beheren</p>\n<p>Bedenk wel dat dit werk in uitvoering is en dat er fouten of andere problemen kunnen zijn die ik niet ben tegengekomen. Ik zal mijn best doen om deze te repareren wanneer ik deze ontvang.</p>\n<p>Hopelijk geniet je van alle werk dat ik hierin heb gestopt. Bezoek de <a href=\"https://github.com/rappasoft/laravel-5-boilerplate\" target=\"_blank\">GitHub</a> pagina voor meer informatie en om <a href=\"https://github.com/rappasoft/Laravel-5-Boilerplate/issues\" target=\"_blank\">problemen</a> te rapporteren.</p>\n<p><strong> Dit project is zeer veeleisend om bij te houden gegeven de snelheid waarmee de master Laravel branch verandert, dus elke vorm van hulp wordt gewaardeert.</strong></p>\n<p>- Anthony Rappa</p>",
        "dashboard" => [
            "title" => "Beheer Dashboard",
            "welcome" => "Welkom"
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
            "click_to_confirm" => "Klik hier om uw account te bevestigen:",
            "reset_password" => "Klik hier om uw wachtwoord te resetten",
            "greeting" => "Hallo!",
            "password_if_not_requested" => "Als u geen wachtwoord reset heeft aangevraagd hoeft geen verdere actie te ondernemen.",
            "trouble_clicking_button" => "Als u problemen heeft met de \":action_text\" button, kopieer en plak dan de onderstaande URL in uw web browser:",
            "regards" => "Groet,",
            "password_reset_subject" => "Uw Wachtwoord Reset Link",
            "thank_you_for_using_app" => "Dank u voor het gebruik van onze applicatie!",
            "error" => "Oeps!",
            "password_cause_of_email" => "U ontvangt deze email omdat we een wachtwoord reset verzoek hebben ontvangen voor uw account",
            "account_confirmed" => "Your account has been confirmed."
        ]
    ],
    "frontend" => [
        "user" => [
            "change_email_notice" => "If you change your e-mail you will be logged out until you confirm your new e-mail address.",
            "password_updated" => "Wachtwoord succesvol bijgewerkt.",
            "profile_updated" => "Profiel succesvol bijgewerkt.",
            "email_changed_notice" => "You must confirm your new e-mail address before you can log in again."
        ],
        "tests" => [
            "js_injected_from_controller" => "Javascript geinjecteerd vanuit de Controller",
            "based_on" => [
                "permission" => "Permissie Gebaseerd - ",
                "role" => "Rol Gebaseerd - "
            ],
            "using_access_helper" => [
                "array_permissions" => "Gebruik makend van Access Helper met Array van Permissies van Namen of id's waar de gebruiker ze allemaal benodigd is.",
                "array_permissions_not" => "Gebruik makend van Access Helper met Array van Permissies van Namen of id's waar de gebruiker ze niet allemaal benodigd is.",
                "array_roles" => "Gebruik makend van Access Helper met Array van Permissies van Rolnamen of id's waar de gebruiker ze allemaal benodigd is.",
                "array_roles_not" => "Gebruik makend van Access Helper met Array van Permissies van Rolnamen of id's waar de gebruiker ze niet allemaal benodigd is.",
                "permission_id" => "Gebruik makend van Access Helper met Permissie ID",
                "permission_name" => "Gebruik makend van Access Helper met Permission Naam",
                "role_id" => "Gebruik makend van Access Helper met Rol ID",
                "role_name" => "Gebruik makend van Access Helper met Rol Naam"
            ],
            "using_blade_extensions" => "Gebruik makend van Blade Extensies",
            "view_console_it_works" => "U zou 'it works!' in de console moeten zien, welke komt vanuit FrontendController@index",
            "you_can_see_because_permission" => "U kunt dit zien omdat u de permissie van ':permission'!",
            "you_can_see_because" => "U kunt dit zien omdat u de rol heeft van ':role'!"
        ],
        "general" => [
            "joined" => "Joined"
        ],
        "test" => "Test",
        "welcome_to" => "Welkom bij :place"
    ]
];
