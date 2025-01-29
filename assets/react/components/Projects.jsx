import React, { useEffect, useState } from 'react';

const Projects = () => {
    const [projects, setProjects] = useState([]);

    useEffect(() => {
        fetch('/api/projects') // API Symfony
            .then(response => response.json())
            .then(data => setProjects(data));
    }, []);

    return (
        <div>
            <h1>Mes Projets</h1>
            <ul>
                {projects.map(project => (
                    <li key={project.id}>
                        <h2>{project.title}</h2>
                        <p>{project.shortDescription}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Projects;
