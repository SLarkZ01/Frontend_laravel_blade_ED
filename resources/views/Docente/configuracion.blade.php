<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - Panel Docente</title>
    <link rel="icon" href="../images/Logo Uniautonoma.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('resources/css/styles.css') }}" rel="stylesheet">
    <style>
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            color: #0d6efd;
            opacity: 0.8;
        }

        .config-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .config-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .config-icon {
            width: 50px;
            height: 50px;
            background: #f0f7ff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .help-card {
            border-left: 4px solid #0d6efd;
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .help-card:hover {
            background: #f0f7ff;
            transform: translateX(5px);
        }

        .form-floating {
            margin-bottom: 15px;
        }

        .header-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #0d6efd;
        }

        .header-card h1 {
            margin-bottom: 5px;
            color: #0d6efd;
        }

        /* Animaciones para elementos */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-card {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .animated-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar / Menú lateral -->
            <div class="col-md-2 sidebar">
                <div class="text-center py-4">
                    <div class="avatar-circle mx-auto">
                        <i class="fas fa-user fa-3x text-white"></i>
                    </div>
                    <p class="text-white mt-2">Docente</p>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('docente.p_docente') }}">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('docente.result') }}">
                            <i class="fas fa-chart-line"></i> Resultados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('docente.confi') }}">
                            <i class="fas fa-cog"></i> Configuración
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a class="nav-link" href="{{ route('user.login') }}">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-10 main-content">
                <div class="container py-4">
                    <!-- Encabezado -->
                    <div class="header-card animated-card">
                        <h1>Configuración y Ayuda</h1>
                        <p>Gestiona tu cuenta y obtén asistencia cuando la necesites</p>
                    </div>

                    <div class="row">
                        <!-- Configuración de Cuenta -->
                        <div class="col-md-6 mb-4">
                            <div class="config-section animated-card">
                                <div class="config-icon">
                                    <i class="fas fa-user-cog fa-lg"></i>
                                </div>
                                <h4>Configuración de Cuenta</h4>
                                <form>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="emailInput"
                                            placeholder="nombre@ejemplo.com" value="docente@uniautonoma.edu.co">
                                        <label for="emailInput">Correo Electrónico</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="currentPassword"
                                            placeholder="Contraseña actual">
                                        <label for="currentPassword">Contraseña Actual</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="newPassword"
                                            placeholder="Nueva contraseña">
                                        <label for="newPassword">Nueva Contraseña</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Confirmar contraseña">
                                        <label for="confirmPassword">Confirmar Nueva Contraseña</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>

                        <!-- Centro de Ayuda -->
                        <div class="col-md-6 mb-4">
                            <div class="config-section animated-card">
                                <div class="config-icon">
                                    <i class="fas fa-question-circle fa-lg"></i>
                                </div>
                                <h4>Centro de Ayuda</h4>
                                <div class="help-card">
                                    <h6><i class="fas fa-book me-2"></i>Guías y Tutoriales</h6>
                                    <p class="text-muted small mb-0">Aprende a usar todas las funciones del panel</p>
                                </div>
                                <div class="help-card">
                                    <h6><i class="fas fa-question-circle me-2"></i>Preguntas Frecuentes</h6>
                                    <p class="text-muted small mb-0">Encuentra respuestas a dudas comunes</p>
                                </div>
                                <div class="help-card">
                                    <h6><i class="fas fa-video me-2"></i>Videos Tutoriales</h6>
                                    <p class="text-muted small mb-0">Aprende visualmente con nuestros videos</p>
                                </div>
                            </div>
                        </div>

                        <!-- Reportar Problemas -->
                        <div class="col-md-6 mb-4">
                            <div class="config-section animated-card">
                                <div class="config-icon">
                                    <i class="fas fa-bug fa-lg"></i>
                                </div>
                                <h4>Reportar Problemas</h4>
                                <form>
                                    <div class="mb-3">
                                        <label for="issueType" class="form-label">Tipo de Problema</label>
                                        <select class="form-select" id="issueType">
                                            <option>Error técnico</option>
                                            <option>Problema de acceso</option>
                                            <option>Error en datos</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="issueDescription" class="form-label">Descripción del
                                            Problema</label>
                                        <textarea class="form-control" id="issueDescription" rows="4"
                                            placeholder="Describe el problema que estás experimentando..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar Reporte</button>
                                </form>
                            </div>
                        </div>

                        <!-- Sugerencias de Mejora -->
                        <div class="col-md-6 mb-4">
                            <div class="config-section animated-card">
                                <div class="config-icon">
                                    <i class="fas fa-lightbulb fa-lg"></i>
                                </div>
                                <h4>Sugerencias de Mejora</h4>
                                <form id="suggestionForm">
                                    <div class="mb-3">
                                        <label for="improvementArea" class="form-label">Área de Mejora</label>
                                        <select class="form-select" id="improvementArea">
                                            <option>Interfaz de usuario</option>
                                            <option>Funcionalidades</option>
                                            <option>Reportes y estadísticas</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="suggestionDescription" class="form-label">Descripción de la
                                            Sugerencia</label>
                                        <textarea class="form-control" id="suggestionDescription" rows="4"
                                            placeholder="Comparte tus ideas para mejorar el panel..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar Sugerencia</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('resources/js/LogicaDocente/auth.js')}}"></script>
    <script src="{{ asset('resources/js/LogicaDocente/configuracion.js')}}"></script>
</body>

</html>