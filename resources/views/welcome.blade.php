<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inscripciones EPG</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Elimina el padding de las columnas para que la imagen llegue a los bordes */
        .no-padding {
            padding-left: 0;
            padding-right: 0;
        }

        /* Asegúrate de que la imagen de fondo cubra toda el área disponible */
        .full-width-img {
            width: 100%;
            height: 100vh;
            /* Utiliza el 100% de la altura de la pantalla */
            object-fit: cover;
            /* Cubre el área sin perder las proporciones */
        }

        /* Estilos para la columna de los botones y la imagen pequeña */
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Centra los elementos verticalmente */
            align-items: center;
            /* Centra los elementos horizontalmente */
        }

        /* Ajustes para el botón y los enlaces */
        .btn-main {
            width: 100%;
            /* Hace que el botón ocupe todo el ancho de la columna */
            margin-bottom: 1rem;
            /* Añade un margen en la parte inferior */
        }

        .btn-custom {
            width: 600px;
        }
    </style>
</head>

<body>
    <div class="container-fluid row no-gutters no-padding">
        <div class="row no-gutters">

            <!-- Columna para la imagen grande -->
            <div class="col-md-7 no-padding">
                <img src="img/epg.jpg" alt="Imagen Grande" class="full-width-img">
            </div>


            <!-- Columna para botones e imagen pequeña -->
            <div class="col-md-5 sidebar">

                <div>
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/dashboard') }}">Gestionar Inscripciones</a>
                        @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        @endauth
                    </div>
                    @endif
                </div>
                <img src="img/epglogo.png" alt="Imagen Pequeña" class="img-fluid mt-2">
                <br>
                <div>
                    <button type="button" class="btn btn-outline-primary btn-main" data-toggle="modal"
                        data-target=".modal-maestria">Maestrias</button>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-primary btn-main" data-toggle="modal"
                        data-target=".modal-doctorado">Doctorados</button>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-primary btn-main" data-toggle="modal"
                        data-target=".modal-segundaEspecialidad">Segunda Especialidad</button>
                </div>
                <!-- Imagen pequeña (logo u otra imagen) -->

            </div>

        </div>
    </div>
    <!--
        <div class="container">
            <div class="row justify-content-center mt-5">
            <div class="col-md-8 botones text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-maestria">Maestrias</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".modal-doctorado">Doctorados</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-segundaEspecialidad">Segunda Especialidad</button>
            </div>
            </div>
        </div> -->

    <!-- Modal - Formulario para Maestria -->
    <div class="modal fade modal-maestria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="formulario" method="POST" action="{{ route('guardar.inscripcion') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h3>1. Elegir programa</h3>
                            <input type="hidden" name="id_programa" id="id_programa">
                            <select id="selectPrograma" class="form-control" onchange="mostrarFacultad()">
                                <option value="" selected disabled>Selecciona el programa</option>
                                @foreach($programas_maestria as $programa)
                                <option value="{{ $programa->id }}" data-facultad="{{ $programa->facultad->nombre }}">{{
                                    $programa->nombre }}</option>
                                @endforeach
                            </select>
                            @error('selectPrograma')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="infoFacultad" class="form-group" style="display: none;">
                                <br>
                                <p>El programa seleccionado pertenece a la Facultad <span id="textoFacultad"></span>
                                </p>
                            </div>


                            <script>

                                document.getElementById('selectPrograma').addEventListener('change', function () {
                                    var selectValue = this.value;
                                    document.getElementById('id_programa').value = selectValue;
                                });
                                function mostrarFacultad() {
                                    var selectPrograma = document.getElementById("selectPrograma");
                                    var textoFacultad = document.getElementById("textoFacultad");
                                    var infoFacultad = document.getElementById("infoFacultad");
                                    var selectedOption = selectPrograma.options[selectPrograma.selectedIndex];

                                    if (selectedOption) {
                                        var facultad = selectedOption.getAttribute("data-facultad");
                                        textoFacultad.textContent = facultad;
                                        infoFacultad.style.display = "block"; // Muestra el div con la información de la facultad
                                    } else {
                                        infoFacultad.style.display = "none"; // Oculta el div cuando no hay opción seleccionada
                                    }

                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <h3>2. Datos Personales</h3>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder=" Nombres">
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id='ap' name='ap' placeholder=" Apellido Paterno">
                            @error('ap')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id='am' name='am' placeholder=" Apellido Materno">
                            @error('am')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id='correo' name='correo' placeholder=" @ Email">
                            @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">DNI: </label>
                            <input type="text" class="form-control" id='dni' name='dni'>
                            @error('dni')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular: </label>
                            <input type="text" id='celular' name='celular' class="form-control">
                            @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                            @error('fecha_nacimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento: </label>
                            <input type="text" id='departamento' name='departamento' class="form-control">
                            @error('departamento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia: </label>
                            <input type="text" id='provincia' name='provincia' class="form-control">
                            @error('provincia')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="distrito">Distrito: </label>
                            <input type="text" id='distrito' name='distrito' class="form-control">
                            @error('distrito')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección: </label>
                            <input type="text" id='direccion' name='direccion' class="form-control">
                            @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="masculino"
                                    value="Masculino">
                                @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="form-check-label" for="inlineRadio1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="femenino" value="Femenino">
                                @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror <label class="form-check-label" for="inlineRadio2">Femenino</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Codigo del Voucher: </label>
                            <input type="text" id='cod_voucher' name='cod_voucher' class="form-control">
                            @error('cod_voucher')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Voucher: </label>
                            <input type="file" accept=".pdf" class="form-control-file" id='voucher' name='voucher'>
                            @error('voucher')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small id="emailHelp" class="form-text text-muted">Subir la imagen del voucher adjunta en un
                                archivo pdf</small>
                        </div>
                        <!--<div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>-->
                        <button id="boton-enviar" type="submit" class="btn btn-primary mx-auto d-block">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Formulario para Doctorado -->
    <div class="modal fade modal-doctorado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <h3>1. Elegir programa</h3>
                            <select id="selectPrograma1" class="form-control" onchange="mostrarFacultad1()">
                                <option value="" selected disabled>Selecciona el programa</option>
                                @foreach($programas_doctorado as $programa)
                                <option value="{{ $programa->id }}" data-facultad1="{{ $programa->facultad->nombre }}">
                                    {{
                                    $programa->nombre }}</option>
                                @endforeach
                            </select>

                            <div id="infoFacultad1" class="form-group" style="display: none;">
                                <br>
                                <p>El programa seleccionado pertenece a la Facultad <span id="textoFacultad1"></span>
                                </p>
                            </div>


                            <script>
                                function mostrarFacultad1() {
                                    var selectPrograma1 = document.getElementById("selectPrograma1");
                                    var textoFacultad1 = document.getElementById("textoFacultad1");
                                    var infoFacultad1 = document.getElementById("infoFacultad1");
                                    var selectedOption1 = selectPrograma1.options[selectPrograma1.selectedIndex];

                                    if (selectedOption1) {
                                        var facultad1 = selectedOption1.getAttribute("data-facultad1");
                                        textoFacultad1.textContent = facultad1;
                                        infoFacultad1.style.display = "block"; // Muestra el div con la información de la facultad
                                    } else {
                                        infoFacultad1.style.display = "none"; // Oculta el div cuando no hay opción seleccionada
                                    }

                                }
                            </script>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombres: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellidos: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Electronico:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">DNI: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Direccion: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Codigo del Voucher: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Voucher: </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            <small id="emailHelp" class="form-text text-muted">Subir la imagen del voucher adjunta en un
                                archivo pdf</small>
                        </div>

                        <!--<div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>-->
                        <button type="submit" class="btn btn-primary mx-auto d-block">Enviar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal - Formulario para Segunda Especialidad -->
    <div class="modal fade modal-segundaEspecialidad" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <h3>1. Elegir programa</h3>
                            <select id="selectPrograma2" class="form-control" onchange="mostrarFacultad2()">
                                <option value="" selected disabled>Selecciona el programa</option>
                                @foreach($programas_se as $programa)
                                <option value="{{ $programa->id }}" data-facultad2="{{ $programa->facultad->nombre }}">
                                    {{
                                    $programa->nombre }}</option>
                                @endforeach
                            </select>

                            <div id="infoFacultad2" class="form-group" style="display: none;">
                                <br>
                                <p>El programa seleccionado pertenece a la Facultad <span id="textoFacultad2"></span>
                                </p>
                            </div>


                            <script>
                                function mostrarFacultad2() {
                                    var selectPrograma2 = document.getElementById("selectPrograma2");
                                    var textoFacultad2 = document.getElementById("textoFacultad2");
                                    var infoFacultad2 = document.getElementById("infoFacultad2");
                                    var selectedOption2 = selectPrograma2.options[selectPrograma2.selectedIndex];

                                    if (selectedOption2) {
                                        var facultad2 = selectedOption2.getAttribute("data-facultad2");
                                        textoFacultad2.textContent = facultad2;
                                        infoFacultad2.style.display = "block"; // Muestra el div con la información de la facultad
                                    } else {
                                        infoFacultad2.style.display = "none"; // Oculta el div cuando no hay opción seleccionada
                                    }

                                }
                            </script>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombres: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellidos: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Electronico:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">DNI: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Direccion: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Codigo del Voucher: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Voucher: </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            <small id="emailHelp" class="form-text text-muted">Subir la imagen del voucher adjunta en un
                                archivo pdf</small>
                        </div>
                        <!--<div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>-->
                        <button type="submit" class="btn btn-primary mx-auto d-block">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--<select id="facultad">
            <option value="ingenieria">Ingeniería</option>
            <option value="ciencias">Ciencias</option>
            <option value="humanidades">Humanidades</option>
        </select>-->

    <!--<select id="programas">
            Opciones se agregarán dinámicamente aquí
        </select>-->
</body>

<script>
    // Función para mostrar una alerta con SweetAlert2
    function mostrarAlerta(mensaje, tipo) {
        Swal.fire({
            title: 'Alerta',
            text: mensaje,
            icon: tipo,
            confirmButtonText: 'Aceptar'
        });
    }

    function verificarCodigoVoucher() {
        var codVoucher = document.getElementById('cod_voucher').value;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            type: 'POST',
            url: '/verificar-cod-voucher',
            data: { cod_voucher: codVoucher, _token: token },
            success: function (response) {
                if (response.error) {
                    mostrarAlerta('El código del voucher ya ha sido registrado previamente', 'error');
                } else {
                    document.getElementById('formulario').submit();
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }


    // Función para verificar si el DNI ya ha sido registrado antes de enviar el formulario
    function verificarDNI() {
        // Obtener el valor del DNI desde el campo de entrada
        var dni = document.getElementById('dni').value;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Realizar una solicitud AJAX para verificar el DNI
        $.ajax({
            type: 'POST',
            url: '/verificar-dni', // Utiliza la URL absoluta de la ruta
            data: {
                dni: dni,
                _token: token
            },
            success: function (response) {
                console.log(response);
                // Si el DNI ya está registrado, mostrar una alerta
                if (response.error) {
                    mostrarAlerta('El DNI ingresado ya ha sido registrado previamente', 'error');
                }else{
                    verificarCodigoVoucher();
                }
            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
    }

    // Asignar la función verificarDNI al evento clic del botón "Enviar"
    document.getElementById('boton-enviar').addEventListener('click', function (event) {
        event.preventDefault(); // Prevenir el envío del formulario
        verificarDNI(); // Verificar el DNI antes de enviar el formulario
    });
</script>

<!-- Enlaces a JavaScript de Bootstrap y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>