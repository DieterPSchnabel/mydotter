<?php

return [
    "attributes" => [
        "backend" => [
            "access" => [
                "users" => [
                    "active" => "Activo",
                    "associated_roles" => "Roles asociados",
                    "confirmed" => "Confirmado",
                    "email" => "Dirección de Correo",
                    "name" => "Nombre",
                    "other_permissions" => "Otros Permisos",
                    "password" => "Contraseña",
                    "password_confirmation" => "Confirmación de la Contraseña",
                    "send_confirmation_email" => "Enviar Correo de confirmación"
                ],
                "roles" => [
                    "associated_permissions" => "Permisos asociados",
                    "name" => "Nombre",
                    "sort" => "Orden"
                ],
                "permissions" => [
                    "associated_roles" => "Roles asociados",
                    "dependencies" => "Dependencias",
                    "display_name" => "Nombre a mostrar",
                    "group" => "Grupo",
                    "groups" => [
                        "name" => "Nombre del Grupo"
                    ],
                    "group_sort" => "Orden del Grupo",
                    "name" => "Nombre",
                    "system" => "Sistema?"
                ]
            ]
        ],
        "frontend" => [
            "email" => "Dirección de Correo",
            "name" => "Nombre",
            "message" => "Message",
            "new_password" => "Nueva Contraseña",
            "new_password_confirmation" => "Confirmación de la Nueva Contraseña",
            "old_password" => "Antigua Contraseña",
            "password" => "Contraseña",
            "password_confirmation" => "Confirmación de la Contraseña",
            "phone" => "Phone"
        ]
    ],
    "custom" => [
        "attribute-name" => [
            "rule-name" => "mensaje-personalizado"
        ]
    ],
    "different" => "El campo :attribute y :other deben ser diferentes.",
    "same" => "El campo :attribute y :other deben coincidir.",
    "confirmed" => "El campo :attribute de confirmación no coincide.",
    "date_format" => "La fecha :attribute debe coincidir con el formato :format.",
    "in_array" => "El campo :attribute no existen en :other.",
    "distinct" => "El campo :attribute contiene un valor duplicado.",
    "required_unless" => "El campo :attribute es obligatorio, excepto cuando :other esta en :values.",
    "required_if" => "El campo :attribute es obligatorio cuando :other tiene valor :value.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no están presentes.",
    "required_with" => "El campo :attribute es obligatorio cuando :values están presentes.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values están presentes.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values están presentes.",
    "required" => "El campo :attribute es obligatorio.",
    "present" => "El campo :attribute debe estar presente.",
    "boolean" => "El campo :attribute debe ser booleano.",
    "filled" => "El campo :attribute es obligatorio.",
    "regex" => "El formato de :attribute no es válido.",
    "url" => "El enlace :attribute debe tener un formato válido.",
    "unique" => "El campo :attribute ya está en uso.",
    "dimensions" => "El :attribute contiene dimensiones de imagen invalidas.",
    "date" => "El campo :attribute no es una fecha válida.",
    "active_url" => "El campo :attribute no es una URL válida.",
    "max" => [
        "string" => "El texto :attribute debe tener menos de :max caracteres.",
        "file" => "El fichero :attribute no debe ser mayor que :max kilobytes.",
        "numeric" => "El número :attribute no debe ser mayor que :max.",
        "array" => "La lista :attribute debe contener menos de :max elemnetos."
    ],
    "alpha_num" => "El campo :attribute sólo debe contener letras y números.",
    "alpha_dash" => "El campo :attribute sólo debe contener letras, números y barras.",
    "alpha" => "El campo :attribute sólo debe contener letras.",
    "digits" => "El número :attribute debe tener :digits dígitos.",
    "size" => [
        "string" => "El texto :attribute debe tener :size caracteres.",
        "file" => "El fichero :attribute debe tener :size kilobytes.",
        "numeric" => "El número :attribute debe tener :size caracteres.",
        "array" => "La lista :attribute debe contener :size elemnetos."
    ],
    "after" => "El campo :attribute debe ser una fecha posterior a :date.",
    "after_or_equal" => "The :attribute must be a date after or equal to :date.",
    "before" => "El campo :attribute  debe ser una fecha anterior a :date.",
    "before_or_equal" => "The :attribute must be a date before or equal to :date.",
    "mimes" => "El fichero :attribute debe tener el formato/s :values.",
    "file" => "El :attribute debe ser un archivo.",
    "numeric" => "El campo :attribute debe ser un número.",
    "string" => "El campo :attribute debe contener texto.",
    "email" => "El campo :attribute debe contener un e-mail válido.",
    "ip" => "El campo :attribute debe contener una dirección IP válida.",
    "ipv4" => "The :attribute must be a valid IPv4 address.",
    "ipv6" => "The :attribute must be a valid IPv6 address.",
    "json" => "El campo :attribute debe contener un JSON válido.",
    "timezone" => "El campo :attribute debe contener una zona horaria válida.",
    "accepted" => "El campo :attribute debe ser aceptado.",
    "array" => "El campo :attribute debe ser una lista.",
    "image" => "El campo :attribute debe contener una imagen.",
    "integer" => "El campo :attribute debe ser un número entero.",
    "min" => [
        "string" => "El texto :attribute debe tener, al menos, :min caracteres.",
        "file" => "El fichero :attribute debe ser mayor o igual a :min kilobytes.",
        "numeric" => "El número :attribute debe ser mayor o igual a :min.",
        "array" => "La lista :attribute debe contener, al menos :min elemnetos."
    ],
    "between" => [
        "string" => "El campo :attribute debe ser entre :min y :max caracteres.",
        "file" => "El campo :attribute debe ser entre :min y :max kilobytes.",
        "numeric" => "El campo :attribute debe ser un número entre :min y :max.",
        "array" => "El campo :attribute debe contener entre :min y :max elementos."
    ],
    "digits_between" => "El número :attribute debe tener entre :min y :max dígitos.",
    "exists" => "El campo :attribute seleccionado es inválido.",
    "in" => "El :attribute seleccionado no es válido.",
    "not_in" => "El :attribute seleccionado no es válido."
];
