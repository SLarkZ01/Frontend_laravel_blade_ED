<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Evaluación Docentes - Resultados</title>
    <link rel="icon" href="../images/Logo Uniautonoma.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- html2pdf.js para generar PDFs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
    <style>
        /* Estilos específicos para la página de resultados */
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

        .card-evaluacion {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .card-evaluacion:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .progress {
            height: 10px;
            margin-top: 5px;
        }

        .chart-container {
            position: relative;
            margin: auto;
            height: 300px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .comentario {
            border-left: 4px solid #0d6efd;
            padding: 10px 15px;
            margin-bottom: 15px;
            background-color: #f8f9fa;
            border-radius: 0 5px 5px 0;
        }

        .comentario .rating {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .comentario .text {
            margin-top: 5px;
            font-style: italic;
        }

        .star-rating {
            color: #ffc107;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        .table-evaluaciones th {
            background-color: #0d6efd;
            color: white;
            font-weight: 500;
        }

        .table-evaluaciones td,
        .table-evaluaciones th {
            text-align: center;
            vertical-align: middle;
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
                    <!-- Encabezado mejorado -->
                    <div class="header-card animated-card">
                        <h1>Resultados de Evaluación</h1>
                        <p class="text-muted">Visualiza y analiza tus resultados de evaluación docente</p>
                    </div>

                    <!-- Selector de materia -->
                    <div class="card dashboard-card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <label for="materiaSelect" class="form-label">Elige una materia para visualizar las
                                        estadísticas</label>
                                    <select class="form-select" id="materiaSelect">
                                        <option value="" selected disabled>Selecciona una materia</option>
                                        <option value="algebra">Álgebra Lineal</option>
                                        <option value="calculo">Cálculo Diferencial</option>
                                        <option value="matematicas">Matemáticas Avanzadas</option>
                                    </select>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-primary" id="generarDatosBtn">
                                        <i class="fas fa-sync-alt me-2"></i>Generar datos aleatorios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visualización de materia seleccionada -->
                    <div id="visualizacionMateria" class="mb-4" style="display: none;">
                        <h5 class="text-primary mb-3">Visualizando <span id="nombreMateria">Álgebra Lineal</span></h5>

                        <!-- Gráfico de evaluaciones -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Resumen</h5>
                                <div class="chart-container">
                                    <canvas id="evaluacionesChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Evaluaciones por semestre -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Evaluación Estudiantil S1</h5>
                                        <h2 class="display-4 text-primary" id="evaluacionS1">2.4/5.0</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Evaluación Estudiantil S2</h5>
                                        <h2 class="display-4 text-primary" id="evaluacionS2">4.4/5.0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filtros y opciones de descarga -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-3">
                                        <label for="yearSelect" class="form-label">Año:</label>
                                        <select class="form-select" id="yearSelect">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="semesterSelect" class="form-label">Semestre:</label>
                                        <select class="form-select" id="semesterSelect">
                                            <option value="1">Semestre 1</option>
                                            <option value="2">Semestre 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="chartType" class="form-label">Tipo de Gráfica:</label>
                                        <select class="form-select" id="chartType">
                                            <option value="bar">Gráfico de Barras</option>
                                            <option value="line">Gráfico de Líneas</option>
                                            <option value="radar">Gráfico de Radar</option>
                                            <option value="pie">Gráfico Circular</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Descargar Resultados:</label>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-outline-primary" onclick="downloadResults('pdf')"><i
                                                    class="fas fa-file-pdf"></i> PDF</button>
                                            <button class="btn btn-outline-success"
                                                onclick="downloadResults('excel')"><i class="fas fa-file-excel"></i>
                                                Excel</button>
                                            <button class="btn btn-outline-secondary"
                                                onclick="downloadResults('csv')"><i class="fas fa-file-csv"></i>
                                                CSV</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gráficas -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Visualización de Resultados</h5>
                                <div class="chart-container">
                                    <canvas id="mainChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla de evaluaciones -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Tabla de Evaluaciones</h5>
                                <div class="table-container">
                                    <table class="table table-striped table-hover table-evaluaciones">
                                        <thead>
                                            <tr>
                                                <th>Año</th>
                                                <th>Semestre 1</th>
                                                <th>Semestre 2</th>
                                                <th>Promedio Anual</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaEvaluaciones">
                                            <!-- Datos generados dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Comentarios de evaluaciones -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Comentarios de Estudiantes</h5>
                                <div id="comentariosContainer">
                                    <!-- Los comentarios se cargarán dinámicamente aquí -->
                                </div>
                            </div>
                        </div>

                        <!-- Fin del contenido de evaluaciones -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y scripts personalizados -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('resources/js/LogicaDocente/auth.js')}}"></script>
    <script src="{{ asset('resources/js/LogicaDocente/script.js')}}"></script>
    <script src="{{ asset('resources/js/LogicaDocente/acta-docente.js')}}"></script>