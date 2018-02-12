<?php

return [
    "frontend" => [
        "auth" => [
            "confirmation" => [
                "resent" => "Un nuevo correo de verificación le ha sido enviado.",
                "confirm" => "Revise su correo y verifique su cuenta!",
                "not_found" => "El código de verificación especificado no existe.",
                "success" => "Su cuenta ha sido verificada satisfactoriamente!",
                "already_confirmed" => "Su cuenta ya ha sido verificada.",
                "pending" => "Your account is currently pending approval.",
                "resend" => "Su cuenta no ha sido verificada todavía. Por favor, revise su e-mail, o <a href=\"http://rappasoft.loc:81/account/confirm/resend/:user_uuid\">pulse aquí</a> para re-enviar el correo de verificación.",
                "created_pending" => "Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.",
                "created_confirm" => "Su cuenta ha sido creada. Le hemos enviado un e-mail con un enlace de verificación.",
                "mismatch" => "El código de verificación no coincide."
            ],
            "registration_disabled" => "Registration is currently closed.",
            "email_taken" => "El correo especificado ya está registrado.",
            "password" => [
                "change_mismatch" => "La contraseña antigua no coincide.",
                "reset_problem" => "There was a problem resetting your password. Please resend the password reset email."
            ],
            "deactivated" => "Su cuenta ha sido desactivada."
        ]
    ],
    "backend" => [
        "access" => [
            "users" => [
                "email_error" => "Ya hay un Usuario con la dirección de E-Mail especificada.",
                "not_found" => "El Usuario requerido no existe.",
                "update_password_error" => "Hubo un problema al cambiar la contraseña. Intentelo de nuevo.",
                "cant_confirm" => "There was a problem confirming the user account.",
                "create_error" => "Hubo un problema al crear el Usuario. Intentelo de nuevo.",
                "delete_error" => "Hubo un problema al eliminar el Usuario. Intentelo de nuevo.",
                "social_delete_error" => "There was a problem removing the social account from the user.",
                "restore_error" => "Hubo un problema al restaurar el Usuario. Intentelo de nuevo.",
                "mark_error" => "Hubo un problema al modificar el Usuario. Intentelo de nuevo.",
                "update_error" => "Hubo un problema al modificar el Usuario. Intentelo de nuevo.",
                "already_confirmed" => "This user is already confirmed.",
                "not_confirmed" => "This user is not confirmed.",
                "cant_restore" => "This user is not deleted so it can not be restored.",
                "delete_first" => "This user must be deleted first before it can be destroyed permanently.",
                "cant_delete_admin" => "You can not delete the super administrator.",
                "cant_delete_own_session" => "You can not delete your own session.",
                "cant_delete_self" => "No puede eliminarse usted mismo.",
                "cant_deactivate_self" => "No puede desactivarse a sí mismo.",
                "cant_unconfirm_admin" => "You can not un-confirm the super administrator.",
                "cant_unconfirm_self" => "You can not un-confirm yourself.",
                "role_needed_create" => "Los Usuarios deben tener al menos un Rol.",
                "role_needed" => "Debes elegir al menos un Rol.",
                "session_wrong_driver" => "Your session driver must be set to database to use this feature."
            ],
            "roles" => [
                "already_exists" => "Este Rol ya existe. Por favor, especifique un nombre de Rol diferente.",
                "not_found" => "El Rol requerido no existe.",
                "create_error" => "Hubo un problema al crear el Rol. Intentelo de nuevo.",
                "delete_error" => "Hubo un problema al eliminar el Rol. Intentelo de nuevo.",
                "update_error" => "Hubo un problema al modificar el Rol. Intentelo de nuevo.",
                "has_users" => "No puede eliminar un Rol que tenga usuarios asignados.",
                "cant_delete_admin" => "No puede eliminar el Rol de Administrador.",
                "needs_permission" => "Debe seleccionar al menos un permiso para cada Rol."
            ]
        ]
    ]
];
