<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Evaluación Docentes - Panel Docente</title>
    <link rel="icon" href="../images/Logo Uniautonoma.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
    <style>
        /* Estilos específicos para el panel docente mejorado */
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
            border: none;
            overflow: hidden;
        }

        .card-evaluacion:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-evaluacion .card-body {
            padding: 1.5rem;
        }

        .progress {
            height: 10px;
            margin-top: 8px;
            border-radius: 10px;
            background-color: rgba(13, 110, 253, 0.1);
        }

        .progress-bar {
            border-radius: 10px;
            background-color: #0d6efd;
        }

        .pendiente-badge {
            font-size: 1.5rem;
            color: #0d6efd;
            font-weight: bold;
        }

        .curso-card {
            border-left: 4px solid #0d6efd;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .curso-card:hover {
            transform: translateX(5px);
            background-color: #f0f7ff !important;
        }

        .resumen-criterio {
            margin-bottom: 18px;
        }

        .chart-container {
            position: relative;
            margin: auto;
            height: 250px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        .stats-highlight {
            font-size: 2.5rem;
            font-weight: 600;
            color: #0d6efd;
        }

        .filter-container {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .chart-type-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .chart-type-btn {
            border: 1px solid #dee2e6;
            background-color: white;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .chart-type-btn.active {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
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

        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .alert-success {
            background-color: #d1e7dd;
            border-left: 4px solid #0f5132;
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
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="resultados.html">
                            <i class="fas fa-chart-line"></i> Resultados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configuracion.html">
                            <i class="fas fa-cog"></i> Configuración
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a class="nav-link" href="#">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-10 main-content">
                <div class="container py-4">
                    <!-- Encabezado mejorado -->
                    <div class="header-card">
                        <h1>Panel de Docente</h1>
                        <p>Bienvenido al sistema de evaluación docente</p>
                    </div>

                    <!-- Alerta de periodo activo -->
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2 fa-lg"></i>
                        <div>
                            <strong>Periodo de evaluación activo</strong>
                            <p class="mb-0">El periodo de evaluación docente está activo hasta 2025-06-30. Te quedan 15
                                días para completar la autoevaluación</p>
                        </div>
                    </div>

                    <!-- Tarjetas de evaluaciones -->
                    <div class="row mt-4">
                        <div class="col-md-3 mb-3">
                            <div class="card card-evaluacion">
                                <div class="card-body">
                                    <h5 class="card-title">Evaluación Estudiantil</h5>
                                    <h2 class="display-4 text-primary">4.4/5.0</h2>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 88%"
                                            aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="card-text text-muted mt-2">Promedio de 45 evaluaciones</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card card-evaluacion">
                                <div class="card-body">
                                    <h5 class="card-title">Evaluación Administrativa</h5>
                                    <h2 class="display-4 text-primary">4.5/5.0</h2>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 92%"
                                            aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="card-text text-muted mt-2">Calificación de coordinación</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card card-evaluacion">
                                <div class="card-body">
                                    <h5 class="card-title">Autoevaluación</h5>
                                    <div class="text-center">
                                        <span class="pendiente-badge">Pendiente</span>
                                        <p class="card-text text-muted mt-3">No has completado tu autoevaluación</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card card-evaluacion">
                                <div class="card-body">
                                    <h5 class="card-title">Evaluación Global</h5>
                                    <h2 class="display-4 text-primary">4.45/5.0</h2>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="card-text text-muted mt-2">Promedio general de evaluaciones</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filtros y gráfico principal -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Evolución de Evaluaciones</h5>
                                    <p class="card-text text-muted">Visualiza tu progreso a lo largo del tiempo</p>

                                    <div class="filter-container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="yearFilter" class="form-label">Año:</label>
                                                <select class="form-select" id="yearFilter">
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025" selected>2025</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="semesterFilter" class="form-label">Semestre:</label>
                                                <select class="form-select" id="semesterFilter">
                                                    <option value="1" selected>Semestre 1</option>
                                                    <option value="2">Semestre 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <button id="updateChartBtn" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>

                                        <div class="chart-type-selector mt-3">
                                            <button class="chart-type-btn active" data-type="bar">Barras</button>
                                            <button class="chart-type-btn" data-type="line">Líneas</button>
                                            <button class="chart-type-btn" data-type="radar">Radar</button>
                                            <button class="chart-type-btn" data-type="pie">Circular</button>
                                        </div>
                                    </div>

                                    <div class="chart-container">
                                        <canvas id="mainChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resumen de criterios -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Resumen de Evaluaciones</h5>
                                    <p class="card-text text-muted">Distribución de calificaciones por criterio</p>

                                    <div class="resumen-criterio">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Métodos de enseñanza</span>
                                            <span>4.6/5.0</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="resumen-criterio">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Puntualidad y asistencia</span>
                                            <span>4.8/5.0</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 96%"
                                                aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="resumen-criterio">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Comunicación</span>
                                            <span>4.3/5.0</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 86%"
                                                aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS y scripts personalizados -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('resources/js/LogicaDocente/auth.js')}}"></script>
    <script src="{{ asset('resources/js/LogicaDocente/script.js')}}"></script>
    <script>
        // Inicializar el gráfico principal
        document.addEventListener('DOMContentLoaded', function () {
            // Configuración del gráfico principal
            const ctx = document.getElementById('mainChart').getContext('2d');

            const data = {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Evaluación Estudiantil',
                    data: [4.2, 4.3, 4.1, 4.4, 4.5, 4.4],
                    backgroundColor: 'rgba(13, 110, 253, 0.5)',
                    borderColor: '#0d6efd',
                    borderWidth: 1
                }, {
                    label: 'Evaluación Administrativa',
                    data: [4.3, 4.4, 4.3, 4.5, 4.6, 4.5],
                    backgroundColor: 'rgba(25, 135, 84, 0.5)',
                    borderColor: '#198754',
                    borderWidth: 1
                }]
            };

            currentChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 3,
                            max: 5,
                            ticks: {
                                stepSize: 0.5
                            }
                        }
                    }
                }
            });

            // Cambiar tipo de gráfico
            document.querySelectorAll('.chart-type-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const type = this.getAttribute('data-type');
                    document.querySelectorAll('.chart-type-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    // Actualizar tipo de gráfico
                    currentChart.destroy();
                    currentChart = new Chart(ctx, {
                        type: type,
                        data: data,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    min: 3,
                                    max: 5,
                                    ticks: {
                                        stepSize: 0.5
                                    }
                                }
                            }
                        }
                    });
                });
            });


            // Fin de la inicialización de gráficos
        });
    </script>
</body>

</html>