<?php

return [
    "attributes" => [
        "backend" => [
            "access" => [
                "users" => [
                    "active" => "Attivo",
                    "associated_roles" => "Ruoli associati",
                    "confirmed" => "Confermato",
                    "email" => "Indirizzo e-mail",
                    "name" => "Nome",
                    "other_permissions" => "Altri permessi",
                    "password" => "Password",
                    "password_confirmation" => "Conferma password",
                    "send_confirmation_email" => "Invia e-mail di conferma"
                ],
                "roles" => [
                    "associated_permissions" => "Permessi associati",
                    "name" => "Nome",
                    "sort" => "Ordina"
                ],
                "permissions" => [
                    "associated_roles" => "Ruoli associati",
                    "dependencies" => "Dipendenze",
                    "display_name" => "Nome visualizzato",
                    "group" => "Gruppo",
                    "groups" => [
                        "name" => "Nome gruppo"
                    ],
                    "group_sort" => "Ordina gruppo",
                    "name" => "Nome",
                    "system" => "Sistema?"
                ]
            ]
        ],
        "frontend" => [
            "email" => "Indirizzo e-mail",
            "name" => "Nome",
            "message" => "Message",
            "new_password" => "Nuova password",
            "new_password_confirmation" => "Conferma nuova password",
            "old_password" => "Vecchia password",
            "password" => "Password",
            "password_confirmation" => "Conferma password",
            "phone" => "Phone"
        ]
    ],
    "custom" => [
        "attribute-name" => [
            "rule-name" => "custom-message"
        ]
    ],
    "different" => ":attribute e :other devono essere diversi.",
    "same" => ":attribute e :other devono essere identici.",
    "confirmed" => "La conferma di :attribute non corrisponde.",
    "date_format" => ":attribute non corrisponde al formato :format.",
    "in_array" => "The :attribute field does not exist in :other.",
    "distinct" => "The :attribute field has a duplicate value.",
    "required_unless" => ":attribute è richiesto se :other non è tra :values.",
    "required_if" => ":attribute è richiesto quando :other è :value.",
    "required_without" => ":attribute è richiesto quando :values non è presente.",
    "required_with" => ":attribute è richiesto quando :values è presente.",
    "required_with_all" => ":attribute è richiesto quando :values è presente.",
    "required_without_all" => ":attribute è richiesto quando nessuno tra :values è presente.",
    "required" => ":attribute è richiesto.",
    "present" => "The :attribute field must be present.",
    "boolean" => ":attribute può essere solo vero o falso.",
    "filled" => ":attribute è obbligatorio.",
    "regex" => "Il formato di :attribute non è valido.",
    "url" => "Il formato di :attribute non è valido.",
    "unique" => ":attribute è già stato utilizzato.",
    "dimensions" => "The :attribute has invalid image dimensions.",
    "date" => ":attribute non è una data valida.",
    "active_url" => ":attribute non è un URL valido.",
    "max" => [
        "string" => ":attribute non può superare i :max caratteri.",
        "file" => ":attribute non può superare i :max kilobytes.",
        "numeric" => ":attribute non può essere più grande di :max.",
        "array" => ":attribute non può avere più di :max elementi."
    ],
    "alpha_num" => ":attribute può contenere solo lettere e numeri.",
    "alpha_dash" => ":attribute può contenere solo lettere, numeri e trattini.",
    "alpha" => ":attribute può contenere solo lettere.",
    "digits" => ":attribute deve avere :digits cifre.",
    "size" => [
        "string" => ":attribute deve contenere :size caratteri.",
        "file" => ":attribute deve essere di :size kilobytes.",
        "numeric" => ":attribute deve essere :size.",
        "array" => ":attribute deve contenere :size elementi."
    ],
    "after" => ":attribute deve essere una data successiva a :date.",
    "after_or_equal" => "The :attribute must be a date after or equal to :date.",
    "before" => ":attribute deve essere una data precedente al :date.",
    "before_or_equal" => "The :attribute must be a date before or equal to :date.",
    "mimes" => ":attribute deve essere un file di questo formato: :values.",
    "file" => "The :attribute must be a file.",
    "numeric" => ":attribute deve essere un numero.",
    "string" => ":attribute deve essere una stringa.",
    "email" => ":attribute deve essere un indirizzo email valido.",
    "ip" => ":attribute deve essere un indirizzo IP valido.",
    "ipv4" => "The :attribute must be a valid IPv4 address.",
    "ipv6" => "The :attribute must be a valid IPv6 address.",
    "json" => ":attribute deve essere una stringa JSON valida.",
    "timezone" => ":attribute deve essere un fuso orario valido.",
    "accepted" => ":attribute deve essere accettato.",
    "array" => ":attribute deve essere un array.",
    "image" => ":attribute deve essere un'immagine.",
    "integer" => ":attribute deve essere un numero intero.",
    "min" => [
        "string" => ":attribute deve contenere almeno :min caratteri.",
        "file" => ":attribute deve essere di almeno :min kilobytes.",
        "numeric" => ":attribute deve essere almeno :min.",
        "array" => ":attribute deve avere almeno :min elementi."
    ],
    "between" => [
        "string" => ":attribute deve avere tra :min e :max caratteri.",
        "file" => ":attribute deve essere tra :min e :max kilobytes.",
        "numeric" => ":attribute deve avere un valore tra :min e :max.",
        "array" => ":attribute deve contenere tra :min e :max elementi."
    ],
    "digits_between" => ":attribute deve avere tra :min e :max cifre.",
    "exists" => "La selezione per :attribute non è valida.",
    "in" => "La selezione per :attribute non è valida.",
    "not_in" => "Il valore selezionato per :attribute non è valido."
];
