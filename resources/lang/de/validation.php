<?php

return [
    "accepted" => ":attribute muss akzeptiert werden.",
    "active_url" => ":attribute ist keine gültige URL.",
    "after" => ":attribute muss ein Datun nach dem :date sein.",
    "after_or_equal" => "Das :attribute muss ein Datum nach oder gleich :date sein.",
    "alpha" => ":attribute darf nur Buchstaben enthalten.",
    "alpha_dash" => ":attribute darf nur Buchstaben, Nummern und Bindestriche enthalten.",
    "alpha_num" => ":attribute darf nur Buchstaben und Nummern enthalten.",
    "array" => ":attribute muss ein Array sein.",
    "attributes" => [
        "backend" => [
            "access" => [
                "permissions" => [
                    "associated_roles" => "Zugeordnete Rollen",
                    "dependencies" => "Abhängigkeiten",
                    "display_name" => "Anzeige-Name",
                    "first_name" => "Vorname",
                    "group" => "Gruppe",
                    "group_sort" => "Gruppen-Sortierung",
                    "groups" => [
                        "name" => "Gruppen-Name"
                    ],
                    "name" => "Name",
                    "system" => "System?"
                ],
                "roles" => [
                    "associated_permissions" => "Zugeordnerte Berechtigungen",
                    "name" => "Name",
                    "sort" => "Sortierung"
                ],
                "users" => [
                    "active" => "Aktiv",
                    "associated_roles" => "Zugeordnerte Rollen",
                    "confirmed" => "Bestätigt",
                    "email" => "E-Mailadresse",
                    "first_name" => "Vorname",
                    "name" => "Name",
                    "other_permissions" => "Andere Berechtigungen",
                    "password" => "Kennwort",
                    "password_confirmation" => "Kennwort (Wdh.)",
                    "send_confirmation_email" => "Bestätigungs E-Mail senden"
                ]
            ]
        ],
        "frontend" => [
            "email" => "E-Mailadresse",
            "first_name" => "Vorname",
            "message" => "Message",
            "name" => "Name",
            "new_password" => "Neues Kennwort",
            "new_password_confirmation" => "Neues Kennwort (Wdh.)",
            "old_password" => "Altes Kennwort",
            "password" => "Kennwort",
            "password_confirmation" => "Kennwort (Wdh.)",
            "phone" => "Phone"
        ]
    ],
    "before" => ":attribute muss ein Datum vor dem :date sein.",
    "before_or_equal" => "Das :attribute muss ein Datum vor oder gleich dem :date sein.",
    "between" => [
        "array" => ":attribute muss zwischen :min und :max Einträge enthalten.",
        "file" => ":attribute muss zwischen :min und :max Kilobytes gross sein.",
        "numeric" => ":attribute muss zwischen :min und :max sein.",
        "string" => ":attribute muss zwischen :min und :max Zeichen lang sein."
    ],
    "boolean" => ":attribute darf nur Wahr oder Falsch sein.",
    "confirmed" => ":attribute Wiederholung stimmt nicht überein.",
    "custom" => [
        "attribute-name" => [
            "rule-name" => "Individuelle-Nachricht"
        ]
    ],
    "date" => ":attribute ist kein gültiges Datum.",
    "date_format" => ":attribute ist nicht im Format: :format.",
    "different" => ":attribute und :other müssen unterschiedlich sein.",
    "digits" => ":attribute muss :digits Ziffern enthalten.",
    "digits_between" => ":attribute muss zwischen :min und :max Ziffern enthalten.",
    "dimensions" => "Das :attribute hat ungültige Bildabmessungen.",
    "distinct" => "Das :attribute Feld hat einen Wert, der bereits verwendet wurde.",
    "email" => ":attribute muss eine gültige E-Mailadresse sein.",
    "exists" => ":attribute ist ungültig.",
    "file" => "Das :attribute muss eine Datei sein.",
    "filled" => ":attribute ist erforderlich.",
    "image" => ":attribute muss ein Bild sein.",
    "in" => ":attribute ist ungültig.",
    "in_array" => "Das :attribute-Feld existiert nicht in :other.",
    "integer" => ":attribute muss eine Ganzzahl sein.",
    "ip" => ":attribute muss eine gültige IP-Adresse sein.",
    "ipv4" => "The :attribute must be a valid IPv4 address.",
    "ipv6" => "The :attribute must be a valid IPv6 address.",
    "json" => ":attribute muss eine gültige JSON-Zeichenkette sein.",
    "max" => [
        "array" => ":attribute darf nicht mehr Einträge enthalten als :max Einträge.",
        "file" => ":attribute darf nicht grösser sein als :max Kilobytes.",
        "numeric" => ":attribute darf nicht grösser sein als :max.",
        "string" => ":attribute darf nicht grösser sein als :max Zeichen."
    ],
    "mimes" => ":attribute muss eine Datei des folgenden Typs sein: :values.",
    "min" => [
        "array" => ":attribute muss mindestens :min Einträge enthalten.",
        "file" => ":attribute muss mindestens :min Kilobytes gross sein.",
        "numeric" => ":attribute muss mindestens :min sein.",
        "string" => ":attribute muss mindestens :min Zeichen lang sein."
    ],
    "not_in" => ":attribute ist ungültig.",
    "numeric" => ":attribute muss eine Zahl sein.",
    "present" => "Das :attribute-Feld muss vorhanden sein.",
    "regex" => ":attribute enthält ein ungültiges Format.",
    "required" => ":attribute ist erforderlich.",
    "required_if" => ":attribute ist erforderlich, wenn :other folgenden Wert hat: :value.",
    "required_unless" => ":attribute ist erforderlich, ausser :other enthält :values.",
    "required_with" => ":attribute ist erforderlich, wenn :values vorhanden ist.",
    "required_with_all" => ":attribute ist erforderlich, wenn :values vorhanden ist.",
    "required_without" => ":attribute ist erforderlich, wenn :values nicht vorhanden ist.",
    "required_without_all" => ":attribute ist erforderlich, wenn keine von :values vorhanden ist.",
    "same" => ":attribute und :other müssen gleich sein.",
    "size" => [
        "array" => ":attribute muss :size Einträge enthalten.",
        "file" => ":attribute muss :size Kilobytes gross sein.",
        "numeric" => ":attribute muss :size gross ein.",
        "string" => ":attribute muss :size Zeichen enthalten."
    ],
    "string" => ":attribute muss eine Zeichenkette sein.",
    "timezone" => ":attribute muss eine gültige Zeitzone sein.",
    "unique" => ":attribute ist schon vergeben.",
    "url" => ":attribute Format ist ungültig."
];
