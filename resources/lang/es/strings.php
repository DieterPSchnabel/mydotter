<?php

return [
    "backend" => [
        "general" => [
            "minutes" => " minutos",
            "you_have" => [
                "messages" => "{0} No tiene nuevos mensajes|{1} Tiene 1 nuevo mensaje|[2,Inf] Tiene :number mensajes nuevos",
                "notifications" => "{0} No tiene nuevas notificaciones|{1} Tiene 1 nueva notificación|[2,Inf] Tiene :number notificaciones",
                "tasks" => "{0} No tiene nuevas tareas|{1} Tiene 1 nueva tarea|[2,Inf] Tiene :number nuevas tareas"
            ],
            "all_rights_reserved" => "Todos los derechos reservados.",
            "are_you_sure" => "Está seguro?",
            "continue" => "Continuar",
            "boilerplate_link" => "Laravel 5 Boilerplate",
            "member_since" => "Miembro desde",
            "status" => [
                "offline" => "Desconectado",
                "online" => "Conectado"
            ],
            "search_placeholder" => "Buscar...",
            "see_all" => [
                "messages" => "Ver todos los mensajes",
                "notifications" => "Ver todo",
                "tasks" => "Ver todas las tareas"
            ],
            "timeout" => "Usted ha sido automaticamente desconectado por razones de seguridad ya que no tuvo actividad en "
        ],
        "access" => [
            "users" => [
                "if_confirmed_off" => "(Si la confirmación está desactivada)",
                "delete_user_confirm" => "Estás seguro de querer eliminar este Usuario de forma permanente? Esto puede producir un error grave en aquéllas partes de la aplicación que hagan referencia al mismo. Proceda con cautela. Esta operación no puede ser revertida.",
                "restore_user_confirm" => "Restaurar este Usuario a su estado original?"
            ]
        ],
        "welcome" => "<p>Este es tema CoreUI por <a href=\"https://coreui.io/\" target=\"_blank\">creativeLabs</a>. Esta versión no está completa, descargue la versión completa para añadir mas componentes.</p>\n<p>Toda la funcionalidad es de prueba, a excepción de <strong>Administración de acceso</strong> a la izquierda. Esta plantilla viene pre-configurada y funcional para total gestión de usuarios/roles/permisos.</p>\n<p>Tenga presente que esta plantilla sigue estando en desarrollo y puene contener errores. Hare lo que este en mis manos para enmendarlos.</p>\n<p>Espero que disfrute y aprecie el trabajo depositado en este proyecto. Por favor, visite <a href=\"https://github.com/rappasoft/laravel-5-boilerplate\" target=\"_blank\">GitHub</a> para mas información o reportar error <a href=\"https://github.com/rappasoft/Laravel-5-Boilerplate/issues\" target=\"_blank\">aquí</a>.</p>\n<p><strong>Este proyecto es muy demandante para mantenerse al día con la frecuencia en que el master branch de laravel va cambiando, por tanto cualquier ayuda será apreciada.</strong></p>\n<p>- Anthony Rappa</p>",
        "dashboard" => [
            "title" => "Panel de Administración",
            "welcome" => "Bienvenido"
        ],
        "search" => [
            "empty" => "Favor escribir un término de busqueda.",
            "title" => "Resultados de la Busqueda",
            "results" => "Resultados de la busqueda para :query",
            "incomplete" => "Debes escribir tu propia lógica de busqueda para este sistema."
        ]
    ],
    "emails" => [
        "contact" => [
            "subject" => "A new :app_name contact form submission!",
            "email_body_title" => "You have a new contact form request: Below are the details:"
        ],
        "auth" => [
            "click_to_confirm" => "Pulse aquí para verificar su cuenta:",
            "reset_password" => "Pulse aquí para reiniciar su contraseña",
            "greeting" => "Hola!",
            "password_if_not_requested" => "Si usted no hizo la solicitud, ninguna acción es requerida.",
            "trouble_clicking_button" => "Si está presentando problemas haciendo clic en el botón \":action_text\", copia y pega el enlace en su navegador:",
            "regards" => "Saludos,",
            "password_reset_subject" => "Su enlace de reinicio de contraseña",
            "thank_you_for_using_app" => "Gracias por utilizar nuestra aplicación!",
            "error" => "Ups!",
            "password_cause_of_email" => "Usted está recibiendo este correo porque hemos recibido una solicitud de reinicio de contraseña para su cuenta.",
            "account_confirmed" => "Your account has been confirmed."
        ]
    ],
    "frontend" => [
        "user" => [
            "change_email_notice" => "If you change your e-mail you will be logged out until you confirm your new e-mail address.",
            "password_updated" => "Contraseña actualizada satisfactoriamente.",
            "profile_updated" => "Perfil actualizado satisfactoriamente.",
            "email_changed_notice" => "You must confirm your new e-mail address before you can log in again."
        ],
        "tests" => [
            "js_injected_from_controller" => "Javascript inyectado desde el Controlador",
            "based_on" => [
                "permission" => "Basado en el Permiso - ",
                "role" => "Basado en el Rol - "
            ],
            "using_access_helper" => [
                "array_permissions" => "Uso de Access Helper con lista de nombres de Permisos o ID's donde el usuario tiene que tenerlos todos.",
                "array_permissions_not" => "Uso de Access Helper con lista de nombres de Permisos o ID's donde el usuario no tiene por que tenerlos todos.",
                "array_roles" => "Uso de Access Helper con lista de nombres de Roles o ID's donde el usuario tiene que tenerlos todos.",
                "array_roles_not" => "Uso de Access Helper con lista de nombres de Roles o ID's donde el usuario no tiene que tenerlos todos.",
                "permission_id" => "Uso de Access Helper mediante ID de Permiso",
                "permission_name" => "Uso de Access Helper mediante nombre de Permiso",
                "role_id" => "Uso de Access Helper mediante ID de Rol",
                "role_name" => "Uso de Access Helper mediante nombre de Rol"
            ],
            "using_blade_extensions" => "Usando las extensiones de Blade",
            "view_console_it_works" => "Mire la consola del navegador, deberia ver 'Funciona!!' que tiene su origen en FrontendController@index",
            "you_can_see_because_permission" => "Puede ver esto, por que dispone del Permiso ':permission'!",
            "you_can_see_because" => "Puede ver esto, por que dispone del Rol ':role'!"
        ],
        "general" => [
            "joined" => "Joined"
        ],
        "test" => "Prueba",
        "welcome_to" => "Bienvenido a :place"
    ]
];
