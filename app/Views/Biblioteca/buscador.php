

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Buscar y Reservar Libros</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .book-card {
            transition: all 0.3s ease;
        }
        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .modal {
            animation: modalPop 0.3s ease-out forwards;
        }
        @keyframes modalPop {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">

    <!-- ==================== BUSCADOR ==================== -->
    <div class="flex justify-center w-full pt-10">
        <div class="relative w-2/5">
            <input id="searchInput" 
                   type="text" 
                   placeholder="Buscar por título, autor o género..."
                   class="w-full bg-white border-2 border-blue-200 focus:border-blue-600 rounded-3xl py-5 pl-14 pr-6 text-lg outline-none transition-all shadow-sm">
            
            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-2xl text-blue-500">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>

    <div class="max-w-screen-2xl mx-auto px-8 py-10">

        <!-- Hero Banner - Colores Rojo, Amarillo y Azul -->
        <div class="relative overflow-hidden rounded-3xl p-8 text-white shadow-lg mb-12
                    bg-gradient-to-r from-blue-600 via-red-500 to-yellow-400">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white opacity-10 rounded-full"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-black opacity-10 rounded-full"></div>

            <div class="relative flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold">📚 Fomentemos la lectura</h2>
                    <p class="text-white/90 mt-2 max-w-md">
                        Cada libro es una nueva historia, un nuevo mundo y una nueva oportunidad de aprender.
                    </p>
                </div>
                <div class="hidden md:block text-6xl animate-bounce">
                    📖✨
                </div>
            </div>
        </div>

        <!-- Libros Populares -->
        <div class="mb-12">
            <h3 class="text-2xl font-semibold mb-6 flex items-center gap-2">
                <i class="fas fa-fire text-yellow-500"></i>
                Libros Populares
            </h3>
            <div id="popularBooks" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6"></div>
        </div>

        <!-- Resultados de Búsqueda -->
        <div id="searchSection" class="hidden">
            <h3 class="text-2xl font-semibold mb-6">Resultados de búsqueda</h3>
            <div id="searchResults" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6"></div>
        </div>
    </div>

    <!-- ==================== MODAL ==================== -->
    <div id="bookModal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-[100] p-4">
        <div class="modal bg-white rounded-3xl max-w-3xl w-full max-h-[90vh] overflow-hidden">
            <div class="flex">
                <!-- Portada -->
                <div id="modalCover" class="w-80 bg-gray-100 flex items-center justify-center text-[180px] border-r"></div>

                <!-- Información -->
                <div class="flex-1 p-10 overflow-auto">
                    <button onclick="cerrarModal()" 
                            class="float-right text-4xl text-gray-400 hover:text-gray-600 leading-none">×</button>

                    <h1 id="modalTitle" class="text-3xl font-bold text-slate-800 pr-12"></h1>
                    <p id="modalAuthor" class="text-2xl text-slate-600 mt-2"></p>

                    <div class="my-8">
                        <p class="uppercase text-xs tracking-widest text-gray-500 mb-2">Descripción</p>
                        <p id="modalDescription" class="text-slate-700 leading-relaxed text-[17px]"></p>
                    </div>

                    <div class="flex items-center justify-between mt-10">
                        <div>
                            <p class="text-sm text-gray-500">Disponibilidad</p>
                            <p id="modalStatus" class="text-xl font-semibold"></p>
                        </div>

                        <button onclick="reservarLibro()" 
                                id="btnReservar"
                                class="px-12 py-5 bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-2xl transition-all flex items-center gap-3">
                            <i class="fas fa-calendar-check"></i>
                            Reservar Libro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Base de datos de libros
        const libros = [
            { id: 1, titulo: "Cien Años de Soledad", autor: "Gabriel García Márquez", descripcion: "La icónica novela que narra la historia de la familia Buendía a lo largo de siete generaciones en Macondo.", portada: "🟡", disponible: true },
            { id: 2, titulo: "Don Quijote de la Mancha", autor: "Miguel de Cervantes", descripcion: "Las aventuras del ingenioso hidalgo Don Quijote y su fiel escudero Sancho Panza.", portada: "🟠", disponible: true },
            { id: 3, titulo: "1984", autor: "George Orwell", descripcion: "Una distopía aterradora sobre un futuro totalitario y vigilado.", portada: "🔴", disponible: false },
            { id: 4, titulo: "El Principito", autor: "Antoine de Saint-Exupéry", descripcion: "Un hermoso cuento filosófico sobre la vida, el amor y la amistad.", portada: "🟢", disponible: true },
            { id: 5, titulo: "Rayuela", autor: "Julio Cortázar", descripcion: "Novela experimental que rompió con las estructuras tradicionales de la narrativa.", portada: "🔵", disponible: true }
        ];

        // Renderizar libros populares
        function renderPopularBooks() {
            const container = document.getElementById('popularBooks');
            container.innerHTML = '';

            libros.forEach(libro => {
                const cardHTML = `
                <div onclick="verLibro(${libro.id})" class="book-card bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer">
                    <div class="h-80 flex items-center justify-center text-8xl bg-gradient-to-br from-gray-50 to-gray-100">
                        ${libro.portada}
                    </div>
                    <div class="p-5">
                        <h4 class="font-semibold text-lg leading-tight">${libro.titulo}</h4>
                        <p class="text-sm text-gray-600 mt-1">${libro.autor}</p>
                        ${!libro.disponible ? `<span class="text-xs mt-3 inline-block px-4 py-1 bg-red-100 text-red-700 rounded-full">No disponible</span>` : ''}
                    </div>
                </div>`;
                container.innerHTML += cardHTML;
            });
        }

        // Buscador en tiempo real
        document.getElementById('searchInput').addEventListener('input', function () {
            const termino = this.value.toLowerCase().trim();
            const searchSection = document.getElementById('searchSection');
            const resultsContainer = document.getElementById('searchResults');

            if (termino === '') {
                searchSection.classList.add('hidden');
                return;
            }

            const filtrados = libros.filter(l =>
                l.titulo.toLowerCase().includes(termino) || 
                l.autor.toLowerCase().includes(termino)
            );

            let html = '';

            if (filtrados.length === 0) {
                html = `<p class="col-span-full text-center py-20 text-gray-500 text-xl">No se encontraron resultados para "<strong>${this.value}</strong>"</p>`;
            } else {
                filtrados.forEach(libro => {
                    html += `
                    <div onclick="verLibro(${libro.id})" class="book-card bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 cursor-pointer">
                        <div class="h-80 flex items-center justify-center text-8xl bg-gradient-to-br from-gray-50 to-gray-100">
                            ${libro.portada}
                        </div>
                        <div class="p-5">
                            <h4 class="font-semibold text-lg">${libro.titulo}</h4>
                            <p class="text-sm text-gray-600">${libro.autor}</p>
                        </div>
                    </div>`;
                });
            }

            resultsContainer.innerHTML = html;
            searchSection.classList.remove('hidden');
        });

        // Modal
        function verLibro(id) {
            const libro = libros.find(l => l.id === id);
            if (!libro) return;

            document.getElementById('modalTitle').textContent = libro.titulo;
            document.getElementById('modalAuthor').textContent = libro.autor;
            document.getElementById('modalDescription').textContent = libro.descripcion;
            document.getElementById('modalCover').innerHTML = `<span>${libro.portada}</span>`;

            const statusEl = document.getElementById('modalStatus');
            statusEl.innerHTML = libro.disponible 
                ? `<span class="text-blue-600">✅ Disponible</span>` 
                : `<span class="text-red-600">❌ No disponible</span>`;

            document.getElementById('btnReservar').disabled = !libro.disponible;

            document.getElementById('bookModal').classList.remove('hidden');
            document.getElementById('bookModal').classList.add('flex');
        }

        function cerrarModal() {
            const modal = document.getElementById('bookModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function reservarLibro() {
            alert("🎉 ¡Reserva realizada con éxito!\n\nEl libro ha sido reservado a tu nombre.\nPuedes recogerlo en la biblioteca dentro de las próximas 48 horas.");
            cerrarModal();
        }

        // Inicializar
        window.onload = function() {
            renderPopularBooks();
        };
    </script>

</body>
</html>

