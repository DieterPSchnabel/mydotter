<?php

return [
    "accepted" => "Le champ :attribute doit être accepté.",
    "active_url" => "Le champ :attribute n'est pas une URL valide.",
    "after" => "Le champ :attribute doit être une date postérieure au :date.",
    "after_or_equal" => "Le champ :attribute doit être une date postérieure ou égale au :date.",
    "alpha" => "Le champ :attribute doit seulement contenir des lettres.",
    "alpha_dash" => "Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num" => "Le champ :attribute doit seulement contenir des chiffres et des lettres.",
    "array" => "Le champ :attribute doit être un tableau.",
    "attributes" => [
        "backend" => [
            "access" => [
                "permissions" => [
                    "associated_roles" => "Rôles associés",
                    "dependencies" => "Dépendances",
                    "display_name" => "Nom affiché",
                    "first_name" => "Prénom",
                    "group" => "Groupe",
                    "group_sort" => "Ordre du groupe",
                    "groups" => [
                        "name" => "Nom du groupe"
                    ],
                    "last_name" => "Nom",
                    "name" => "Nom complet",
                    "system" => "Système"
                ],
                "roles" => [
                    "associated_permissions" => "Permissions associées",
                    "name" => "Nom",
                    "sort" => "Ordre"
                ],
                "users" => [
                    "active" => "Actif",
                    "associated_roles" => "Rôles associés",
                    "confirmed" => "Confirmé",
                    "email" => "Adresse email",
                    "first_name" => "Prénom",
                    "last_name" => "Nom",
                    "name" => "Nom complet",
                    "other_permissions" => "Autres permissions",
                    "password" => "Mot de passe",
                    "password_confirmation" => "Confirmation du mot de passe",
                    "send_confirmation_email" => "Envoyer un email de confirmation"
                ]
            ]
        ],
        "frontend" => [
            "email" => "Adresse email",
            "first_name" => "Prénom",
            "last_name" => "Nom",
            "message" => "Message",
            "name" => "Nom complet",
            "new_password" => "Nouveau mot de passe",
            "new_password_confirmation" => "Confirmation du nouveau mot de passe",
            "old_password" => "Ancien mot de passe",
            "password" => "Mot de passe",
            "password_confirmation" => "Confirmation",
            "phone" => "Téléphone"
        ]
    ],
    "before" => "Le champ :attribute doit être une date antérieure au :date.",
    "before_or_equal" => "Le champ :attribute doit être une date antérieure ou égale au :date.",
    "between" => [
        "array" => "Le tableau :attribute doit contenir entre :min et :max éléments.",
        "file" => "La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.",
        "numeric" => "La valeur de :attribute doit être comprise entre :min et :max.",
        "string" => "Le texte :attribute doit contenir entre :min et :max caractères."
    ],
    "boolean" => "Le champ :attribute doit être vrai ou faux.",
    "confirmed" => "Le champ de confirmation :attribute ne correspond pas.",
    "custom" => [
        "attribute-name" => [
            "rule-name" => "custom-message"
        ]
    ],
    "date" => "Le champ :attribute n'est pas une date valide.",
    "date_format" => "Le champ :attribute ne correspond pas au format :format.",
    "different" => "Les champs :attribute et :other doivent être différents.",
    "digits" => "Le champ :attribute doit contenir :digits chiffres.",
    "digits_between" => "Le champ :attribute doit contenir entre :min et :max chiffres.",
    "dimensions" => "Les dimensions de l'image :attribute ne sont pas conformes.",
    "distinct" => "Le champ :attribute doit être une valeur unique.",
    "email" => "Le champ :attribute doit être une adresse email valide.",
    "exists" => "Le champ :attribute n'existe pas.",
    "file" => "Le champ :attribute doit être un fichier.",
    "filled" => "Le champ :attribute est obligatoire.",
    "image" => "Le champ :attribute doit être une image.",
    "in" => "Le champ :attribute est invalide.",
    "in_array" => "Le champ :attribute n'existe pas dans :other.",
    "integer" => "Le champ :attribute doit être un entier.",
    "ip" => "Le champ :attribute doit être une adresse IP valide.",
    "ipv4" => "Le champ :attribute doit être une adresse IPv4 valide.",
    "ipv6" => "Le champ :attribute doit être une adresse IPv6 valide.",
    "json" => "Le champ :attribute doit être un document JSON valide.",
    "max" => [
        "array" => "Le tableau :attribute ne peut contenir plus de :max éléments.",
        "file" => "La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.",
        "numeric" => "La valeur de :attribute ne peut être supérieure à :max.",
        "string" => "Le texte de :attribute ne peut contenir plus de :max caractères."
    ],
    "mimes" => "Le champ :attribute doit être un fichier de type : :values.",
    "mimetypes" => "Le champ :attribute doit être un fichier de type : :values.",
    "min" => [
        "array" => "Le tableau :attribute doit contenir au moins :min éléments.",
        "file" => "La taille du fichier de :attribute doit être supérieure à :min kilo-octets.",
        "numeric" => "La valeur de :attribute doit être supérieure ou égale à :min.",
        "string" => "Le texte :attribute doit contenir au moins :min caractères."
    ],
    "not_in" => "Le champ :attribute sélectionné n'est pas valide.",
    "numeric" => "Le champ :attribute doit contenir un nombre.",
    "present" => "Le champ :attribute doit être présent.",
    "regex" => "Le format du champ :attribute est invalide.",
    "required" => "Le champ :attribute est obligatoire.",
    "required_if" => "Le champ :attribute est obligatoire lorsque :other est :value.",
    "required_unless" => "Le champ :attribute est obligatoire sauf si :other est :value.",
    "required_with" => "Le champ :attribute est obligatoire lorsque :values a une valeur.",
    "required_with_all" => "Le champ :attribute est obligatoire lorsque :values existe.",
    "required_without" => "Le champ :attribute est obligatoire lorsque :values n'a pas de valeur.",
    "required_without_all" => "Le champ :attribute est obligatoire lorsque :values n'existe pas.",
    "same" => "Les champs :attribute et :other doivent être identiques.",
    "size" => [
        "array" => "Le tableau :attribute doit contenir :size éléments.",
        "file" => "La taille du fichier de :attribute doit être de :size kilo-octets.",
        "numeric" => "Le champ :attribute doit avoir une taille de :size.",
        "string" => "Le texte de :attribute doit contenir :size caractères."
    ],
    "string" => "Le champ :attribute doit être une chaîne de caractères.",
    "timezone" => "Le champ :attribute doit être un fuseau horaire valide.",
    "unique" => "La valeur du champ :attribute est déjà utilisée.",
    "uploaded" => "Le fichier du champ :attribute n'a pu être téléchargé.",
    "url" => "Le format de 'URL de :attribute n'est pas valide."
];
