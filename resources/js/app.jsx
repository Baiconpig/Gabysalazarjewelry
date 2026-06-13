import 'bootstrap';
import DataTable from 'datatables.net-bs5';
import 'datatables.net-responsive-bs5';
import React from 'react';
import { createRoot } from 'react-dom/client';
import SearchableVideoList from './components/SearchableVideoList.jsx';

document.documentElement.classList.add('js-enabled');

const revealItems = document.querySelectorAll('.reveal');

if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.16 });

    revealItems.forEach((item) => revealObserver.observe(item));
} else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
}

const counters = document.querySelectorAll('[data-count]');

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) {
            return;
        }

        const element = entry.target;
        const target = Number(element.dataset.count);
        const suffix = element.dataset.suffix || '';
        const duration = 1200;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            element.textContent = `${Math.round(target * eased)}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
        counterObserver.unobserve(element);
    });
}, { threshold: 0.5 });

counters.forEach((counter) => counterObserver.observe(counter));

document.querySelectorAll('.js-data-table').forEach((table) => {
    new DataTable(table, {
        responsive: true,
        pageLength: 10,
        language: {
            search: 'Buscar:',
            lengthMenu: 'Mostrar _MENU_ registros',
            info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
            infoEmpty: 'Sin registros',
            infoFiltered: '(filtrado de _MAX_ registros)',
            zeroRecords: 'No se encontraron resultados',
            emptyTable: 'No hay datos disponibles',
            paginate: {
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Ultimo',
            },
        },
        columnDefs: [
            {
                targets: 'no-sort',
                orderable: false,
                searchable: false,
            },
        ],
    });
});

const videoListRoot = document.getElementById('searchable-video-list');

if (videoListRoot) {
    const videoData = document.getElementById('home-videos-data');
    const videos = JSON.parse(videoData?.textContent || '[]');
    createRoot(videoListRoot).render(<SearchableVideoList videos={videos} />);
}
