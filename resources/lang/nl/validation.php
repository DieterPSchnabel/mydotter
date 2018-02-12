<?php

return [
    "attributes" => [
        "backend" => [
            "access" => [
                "users" => [
                    "active" => "Actief",
                    "associated_roles" => "Geassocieerde Rollen",
                    "confirmed" => "Bevestigd",
                    "email" => "E-mail Adres",
                    "first_name" => "Voornaam",
                    "last_name" => "Achternaam",
                    "name" => "Naam",
                    "other_permissions" => "Overige Permissies",
                    "password" => "Wachtwoord",
                    "password_confirmation" => "Wachtwoord bevestiging",
                    "send_confirmation_email" => "Stuur Bevestigings E-mail"
                ],
                "roles" => [
                    "associated_permissions" => "Geassocieerde Permissies",
                    "name" => "Naam",
                    "sort" => "Sorteren"
                ],
                "permissions" => [
                    "associated_roles" => "Geassocieerde Rollen",
                    "dependencies" => "Afhankelijkheden",
                    "display_name" => "Weergave Naam",
                    "group" => "Groep",
                    "groups" => [
                        "name" => "Groep Naam"
                    ],
                    "group_sort" => "Groep Sorteren",
                    "name" => "Naam",
                    "system" => "Systeem?"
                ]
            ]
        ],
        "frontend" => [
            "email" => "E-mail Adres",
            "first_name" => "Voornaam",
            "name" => "Naam",
            "last_name" => "Achternaam",
            "message" => "Message",
            "new_password" => "Nieuw Wachtwoord",
            "new_password_confirmation" => "Nieuw Wachtwoord Bevestigen",
            "old_password" => "Oud Wachtwoord",
            "password" => "Wachwoord",
            "password_confirmation" => "Wachtwoord Bevestiging",
            "phone" => "Phone"
        ]
    ],
    "custom" => [
        "attribute-name" => [
            "rule-name" => "Individueel-bericht"
        ]
    ],
    "different" => ":attribute en :other mogen niet gelijk zijn.",
    "same" => ":attribute en :other moeten overeenkomen.",
    "confirmed" => ":attribute bevestiging komt niet overeen.",
    "date_format" => ":attribute komt niet overeen met het formaat :format.",
    "in_array" => ":attribute veld bestaat niet in :other.",
    "distinct" => ":attribute bevat een duplicate waarde.",
    "required_unless" => ":attribute veld is verplicht behalve wanneer:other :values is.",
    "required_if" => ":attribute veld is verplicht wanneer :other :value is.",
    "required_without" => ":attribute veld is verplicht wanneer :values niet aanwezig is.",
    "required_with" => ":attribute veld is verplicht wanneer :values aanwezig is.",
    "required_with_all" => ":attribute veld is verplicht wanneer :values aanwezig is.",
    "required_without_all" => ":attribute veld is verplicht wanneer geen van :values aanwezig zijn.",
    "required" => ":attribute veld is verplicht.",
    "present" => ":attribute veld is verplicht.",
    "boolean" => ":attribute veld moet waar of onwaar zijn.",
    "filled" => ":attribute veld is verplicht.",
    "regex" => ":attribute formaat is ongeldig.",
    "url" => ":attribute formaat is ongeldig.",
    "unique" => ":attribute is al in gebruik.",
    "dimensions" => ":attribute heeft ongeldige afbeelding dimensies.",
    "date" => ":attribute bevat geen geldige datum.",
    "active_url" => ":attribute is geen geldige URL.",
    "max" => [
        "string" => ":attribute mag niet groter zijn dan :max karakters.",
        "file" => ":attribute mag niet groter zijn dan :max kilobytes.",
        "numeric" => ":attribute mag niet groter zijn dan :max.",
        "array" => ":attribute mag niet meer dan :max items bevatten."
    ],
    "alpha_num" => ":attribute mag alleen letters, cijfers bevatten",
    "alpha_dash" => ":attribute mag alleen letters, cijfers en koppeltekens bevatten.",
    "alpha" => ":attribute mag alleen letters bevatten.",
    "digits" => ":attribute moet :digits cijfers bevatten.",
    "size" => [
        "string" => ":attribute moet :size karakters bevatten.",
        "file" => ":attribute moet :size kilobytes zijn.",
        "numeric" => ":attribute moet :size zijn.",
        "array" => ":attribute moet :size items bevatten."
    ],
    "after" => ":attribute moet een datum na :date zijn.",
    "after_or_equal" => "The :attribute must be a date after or equal to :date.",
    "before" => ":attribute moet een datum voor :date zijn.",
    "before_or_equal" => "The :attribute must be a date before or equal to :date.",
    "mimes" => ":attribute moet een bestand zijn van het type: :values.",
    "file" => ":attribute moet een bestand zijn.",
    "numeric" => ":attribute moet numeriek zijn.",
    "string" => ":attribute moet een string zijn.",
    "email" => ":attribute moet een geldig e-mail adres zijn.",
    "ip" => ":attribute moet een geldig IP adres zijn.",
    "ipv4" => "The :attribute must be a valid IPv4 address.",
    "ipv6" => "The :attribute must be a valid IPv6 address.",
    "json" => ":attribute moet een geldige JSON string zijn.",
    "timezone" => ":attribute moet een geldige tijdzone bevatten.",
    "accepted" => ":attribute moet geaccepteerd worden.",
    "array" => ":attribute moet een array zijn.",
    "image" => ":attribute moet een afbeelding zijn.",
    "integer" => ":attribute moet een heel getal zijn .",
    "min" => [
        "string" => ":attribute moet minimaal :min karakters zijn.",
        "file" => ":attribute moet minimaal :min kilobytes zijn.",
        "numeric" => ":attribute moet minimaal :min zijn.",
        "array" => ":attribute moet ten minste :min items bevatten."
    ],
    "between" => [
        "string" => ":attribute moet tussen de :min en :max karakters hebben.",
        "file" => ":attribute moet tussen :min and :max kilobytes liggen.",
        "numeric" => ":attribute moet tussen :min en :max liggen.",
        "array" => ":attribute moet tussen :min en :max items hebben."
    ],
    "digits_between" => ":attribute moet tussen :min and :max cijfers bevatten.",
    "exists" => "Het geselecteerde :attribute is ongeldig.",
    "in" => "geselecteerd :attribute is ongeldig.",
    "not_in" => "Het geselcteerde :attribute is ongeldig."
];
