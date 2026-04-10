<?= $header ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Biblioteca - Sistema de Gestión</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">

    <style>
        .calendar-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            max-width: 1100px;
            margin: 0 auto;
        }

        .fc-theme-standard .fc-scrollgrid {
            border-radius: 12px;
        }

        .main-content {
            width: 100%;
            padding: 20px 40px 40px;
        }

        .badge {
            padding: 6px 16px;
            border-radius: 9999px;
            font-size: 13.5px;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans min-h-screen">

    <!-- Contenido Principal Centrado -->
    <div class="main-content">

        <!-- Estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 text-center">
                <p class="text-sm text-gray-500">Libros Reservados</p>
                <p class="text-5xl font-bold text-blue-600 mt-3">47</p>
                <p class="text-emerald-600 text-sm mt-2">↑ 12% esta semana</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 text-center">
                <p class="text-sm text-gray-500">Libros Disponibles</p>
                <p class="text-5xl font-bold text-emerald-600 mt-3">183</p>
                <p class="text-emerald-600 text-sm mt-2">↑ 8% esta semana</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 text-center">
                <p class="text-sm text-gray-500">Reservas Vencidas</p>
                <p class="text-5xl font-bold text-red-600 mt-3">9</p>
                <p class="text-red-600 text-sm mt-2">Requiere atención</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 text-center">
                <p class="text-sm text-gray-500">Usuarios Activos</p>
                <p class="text-5xl font-bold text-violet-600 mt-3">124</p>
                <p class="text-emerald-600 text-sm mt-2">↑ 5 hoy</p>
            </div>
        </div>

        <!-- Leyenda -->
        <div class="flex justify-center gap-8 mb-8">
            <div class="flex items-center gap-3">
                <span class="badge bg-blue-100 text-blue-700">Reservado</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="badge bg-emerald-100 text-emerald-700">Disponible</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="badge bg-red-100 text-red-700">Vencido</span>
            </div>
        </div>

        <!-- Calendario -->
        <div class="calendar-container p-8">
            <div id="calendar" class="mx-auto"></div>
        </div>

    </div>

    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día',
                    list: 'Lista'
                },
                events: [
                    {
                        title: "📖 Cien Años de Soledad - Ana García",
                        start: "2026-04-10",
                        end: "2026-04-12",
                        color: "#3b82f6"
                    },
                    {
                        title: "📖 Don Quijote - Luis Mendoza",
                        start: "2026-04-14",
                        end: "2026-04-18",
                        color: "#10b981"
                    },
                    {
                        title: "📖 1984 - María Torres (VENCIDO)",
                        start: "2026-04-05",
                        end: "2026-04-07",
                        color: "#ef4444"
                    },
                    {
                        title: "📖 El Principito - Carlos Ruiz",
                        start: "2026-04-20",
                        end: "2026-04-22",
                        color: "#3b82f6"
                    }
                ],
                eventDidMount: function (info) {
                    info.el.style.borderRadius = "10px";
                    info.el.style.boxShadow = "0 3px 6px rgba(0,0,0,0.08)";
                }
            });

            calendar.render();
        });
    </script>

</body>

</html>

<?= $footer ?>