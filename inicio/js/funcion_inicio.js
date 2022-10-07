(function ($) {
    var listarUsuarios = function () {
        $.ajax({
            url: 'datos/listar/user.php',
            type: 'POST',
            data: {},
            success: function (data) {
                $('#visor').show();
                $('#mostrarData').html(data);
            }

        });
    };
    var listarProyectos = function () {
        $.ajax({
            url: 'datos/listar/proyects.php',
            type: 'POST',
            data: {},
            success: function (data) {
                $('#visor').show();
                $('#mostrarData').html(data);
            }

        });
    };
    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function () {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });
    $('#btnShowUser').on('click', function () {
        listarUsuarios();
    });
    $('#mostrarData').on('click', '#btnRegUser', function () {
        $.post("datos/registrar/formadd_user.php", function (he) {
            $('#divTamModalForms').removeClass('modal-xl');
            $('#divTamModalForms').removeClass('modal-sm');
            $('#divTamModalForms').addClass('modal-lg');
            $('#divModalForms').modal('show');
            $("#divForms").html(he);
        });
    });
    $('#btnRegAuto').on('click', function () {
        let tipo = 'auto';
        $.post("inicio/datos/registrar/formadd_user.php", { tipo: tipo }, function (he) {
            $('#divTamModalForms').removeClass('modal-xl');
            $('#divTamModalForms').removeClass('modal-sm');
            $('#divTamModalForms').addClass('modal-lg');
            $('#divModalForms').modal('show');
            $("#divForms").html(he);
        });
    });
    $("#divModalForms").on('click', '#btnAddUser', function () {
        let login = $("#txtlogin").val();
        let pass = $("#passuser").val();
        let rol = $("#slcRolUser").val();
        if (login == "") {
            $('#divModalError').modal('show');
            $('#divMsgError').html("Login  no puede estar vacio");
            return false;
        } else if (pass == "") {
            $('#divModalError').modal('show');
            $('#divMsgError').html("Contraseña no puede estar vacia");
            return false;
        } else if (rol == "0") {
            $('#divModalError').modal('show');
            $('#divMsgError').html("Debe elegir un Rol de usuario");
            return false;
        } else {
            let duser = $("#formAddUser").serialize();
            let passencrp = hex_sha512(pass);
            duser = duser + '&passu=' + passencrp;
            let url;
            if ($("#band").length) {
                url = 'inicio/registrar/newuser.php';
            } else {
                url = 'registrar/newuser.php';
            }
            $.ajax({
                type: 'POST',
                url: url,
                data: duser,
                success: function (r) {
                    if (r === '1') {
                        listarUsuarios();
                        $('#divModalForms').modal('hide');
                        $('#divModalDone').modal('show');
                        $('#divMsgDone').html("Usuario creado correctamente");
                    } else {
                        $('#divModalError').modal('show');
                        $('#divMsgError').html(r);
                    }
                }
            });
            return false;
        }

    });
    $('#mostrarData').on('click', '.editar', function () {
        let id = $(this).attr('value');
        $.post("datos/actualizar/formup_user.php", { id: id }, function (he) {
            $('#divTamModalForms').removeClass('modal-xl');
            $('#divTamModalForms').removeClass('modal-sm');
            $('#divTamModalForms').addClass('modal-lg');
            $('#divModalForms').modal('show');
            $("#divForms").html(he);
        });
    });
    $("#divModalForms").on('click', '#btnUpUser', function () {
        let login = $("#txtlogin").val();
        let rol = $("#slcRolUser").val();
        if (login == "") {
            $('#divModalError').modal('show');
            $('#divMsgError').html("Login  no puede estar vacio");
            return false;
        } else {
            let duser = $("#formAddUser").serialize();
            $.ajax({
                type: 'POST',
                url: 'actualizar/upuser.php',
                data: duser,
                success: function (r) {
                    if (r === '1') {
                        listarUsuarios();
                        $('#divModalForms').modal('hide');
                        $('#divModalDone').modal('show');
                        $('#divMsgDone').html("Usuario Actualizado correctamente");
                    } else {
                        $('#divModalError').modal('show');
                        $('#divMsgError').html(r);
                    }
                }
            });
            return false;
        }

    });
    $('#mostrarData').on('click', '.eliminar', function () {
        let id = $(this).attr('value');
        $.ajax({
            type: 'POST',
            url: 'eliminar/deluser.php',
            data: { id: id },
            success: function (r) {
                if (r === '1') {
                    listarUsuarios();
                    $('#divModalForms').modal('hide');
                    $('#divModalDone').modal('show');
                    $('#divMsgDone').html("Usuario Eliminado correctamente");
                } else {
                    $('#divModalError').modal('show');
                    $('#divMsgError').html(r);
                }
            }
        });
        return false;
    });
    $('#btnShowProyects').on('click', function () {
        listarProyectos();
    });
    $('#mostrarData').on('click', '.editarP ', function () {
        let id = $(this).attr('value');
        $.post("datos/actualizar/formup_proyect.php", { id: id }, function (he) {
            $('#divTamModalForms').removeClass('modal-xl');
            $('#divTamModalForms').removeClass('modal-sm');
            $('#divTamModalForms').removeClass('modal-lg');
            $('#divModalForms').modal('show');
            $("#divForms").html(he);
        });
    });
    $("#divModalForms").on('click', '#btnUpProj', function () {
        let duser = $("#formUpProyectn").serialize();
        $.ajax({
            type: 'POST',
            url: 'actualizar/upprojec.php',
            data: duser,
            success: function (r) {
                if (r === '1') {
                    listarProyectos();
                    $('#divModalForms').modal('hide');
                    $('#divModalDone').modal('show');
                    $('#divMsgDone').html("Actualizado correctamente");
                } else {
                    $('#divModalError').modal('show');
                    $('#divMsgError').html(r);
                }
            }
        });
        return false;
    });

    $('#mostrarData').on('click', '.asignaAJ', function () {
        let id = $(this).attr('value');
        $.post("datos/actualizar/form_asigna_aj.php", { id: id }, function (he) {
            $('#divTamModalForms').removeClass('modal-xl');
            $('#divTamModalForms').removeClass('modal-sm');
            $('#divTamModalForms').removeClass('modal-lg');
            $('#divModalForms').modal('show');
            $("#divForms").html(he);
        });
    });
    $("#divModalForms").on('click', '#btnAddAsJu', function () {
        if ($("#slcDocente").val() == '0') {
            $('#divModalError').modal('show');
            $('#divMsgError').html("Debe seleccionar un docente");
            return false;
        } else if ($("#slcRol").val() == '0') {
            $('#divModalError').modal('show');
            $('#divMsgError').html("Debe seleccionar un rol");
            return false;
        } else {
            let duser = $("#formAddAsJu").serialize();
            $.ajax({
                type: 'POST',
                url: 'registrar/asignaaj.php',
                data: duser,
                success: function (r) {
                    if (r === '1') {
                        listarProyectos();
                        $('#divModalForms').modal('hide');
                        $('#divModalDone').modal('show');
                        $('#divMsgDone').html("Actualizado correctamente");
                    } else {
                        $('#divModalError').modal('show');
                        $('#divMsgError').html(r);
                    }
                }
            });
        }
        return false;
    });
})(jQuery);

document.getElementById("btnEntrarLogin").onclick = validarLogin;

function validarLogin() {
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    var isVisible = "show";
    if (usuario == "") {
        var myModal = new bootstrap.Modal(document.getElementById("divModalError"), {});
        document.getElementById("divMsgError").innerHTML = "Debe ingresar usuario";
        myModal.show();
        return false;
    } else if (clave == "") {
        var myModal = new bootstrap.Modal(document.getElementById("divModalError"), {});
        document.getElementById("divMsgError").innerHTML = "Debe ingresar clave";
        myModal.show();
        return false;
    } else {
        var url = 'config/login.php';
        let user = document.getElementById("usuario").value;
        let pass = hex_sha512(document.getElementById("clave").value);
        const data = new FormData();
        data.append('usuario', user);
        data.append('password', pass);
        fetch(url, {
            method: 'POST',
            body: data,
        })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw "Error en la llamada Ajax";
                }

            })
            .then(function (r) {
                if (r.status == 1) {
                    window.location.href = "inicio/panel_control.php";
                } else {
                    var myModal = new bootstrap.Modal(document.getElementById("divModalError"), {});
                    document.getElementById("divMsgError").innerHTML = 'Error: ' + r.msg;
                    myModal.show();
                }
            })
            .catch(function (err) {
                var myModal = new bootstrap.Modal(document.getElementById("divModalError"), {});
                document.getElementById("divMsgError").innerHTML = 'Error: ' + err;
                myModal.show();
            });
    }
    return true;
}