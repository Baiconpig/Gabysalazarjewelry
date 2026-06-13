import { useState } from 'react';

const defaultVideos = [
    {
        id: 1,
        title: 'Anillos de compromiso personalizados',
        category: 'Compromiso',
        duration: '02:45',
        description: 'Proceso de diseno, seleccion de piedra y fabricacion artesanal.',
    },
    {
        id: 2,
        title: 'Restauracion de joyas familiares',
        category: 'Restauracion',
        duration: '03:10',
        description: 'Como una pieza heredada recupera brillo sin perder su historia.',
    },
    {
        id: 3,
        title: 'Joyas para ocasiones especiales',
        category: 'Alta joyeria',
        duration: '01:58',
        description: 'Piezas exclusivas creadas para celebrar momentos memorables.',
    },
    {
        id: 4,
        title: 'Taller propio desde 1994',
        category: 'Legado',
        duration: '04:20',
        description: 'La confianza de mas de tres decadas de oficio y atencion cercana.',
    },
];

function filterVideos(videos, searchText) {
    const query = searchText.trim().toLowerCase();

    if (!query) {
        return videos;
    }

    return videos.filter((video) => {
        return [
            video.title,
            video.category,
            video.description,
            video.duration,
        ].some((value) => String(value || '').toLowerCase().includes(query));
    });
}

function SearchInput({ value, onChange }) {
    return (
        <label className="video-search">
            <span>Buscar videos</span>
            <input
                className="form-control"
                type="search"
                value={value}
                placeholder="Compromiso, restauracion, legado..."
                onChange={(event) => onChange(event.target.value)}
            />
        </label>
    );
}

function VideoList({ videos, emptyHeading }) {
    if (videos.length === 0) {
        return (
            <div className="video-empty">
                <h3>{emptyHeading}</h3>
                <p>Prueba con otro termino relacionado con joyeria, legado o servicios.</p>
            </div>
        );
    }

    return (
        <div className="video-list">
            {videos.map((video) => (
                <a className="video-card" key={video.id} href={video.videoUrl || '#'} target="_blank" rel="noreferrer">
                    <div className="video-thumb" aria-hidden="true">
                        <span>{video.duration}</span>
                    </div>
                    <div>
                        <p className="video-category">{video.category}</p>
                        <h3>{video.title}</h3>
                        <p>{video.description}</p>
                    </div>
                </a>
            ))}
        </div>
    );
}

export default function SearchableVideoList({ videos = defaultVideos }) {
    const [searchText, setSearchText] = useState('');
    const foundVideos = filterVideos(videos, searchText);

    return (
        <>
            <SearchInput
                value={searchText}
                onChange={(newText) => setSearchText(newText)}
            />
            <VideoList
                videos={foundVideos}
                emptyHeading={`No matches for "${searchText}"`}
            />
        </>
    );
}
