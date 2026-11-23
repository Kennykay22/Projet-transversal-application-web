
import './styles/app.css';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';


//image, API NASA 
const nasaContainer = document.querySelector('#nasa-apod');

if (nasaContainer) {
    fetch('https://science.nasa.gov/wp-json/wp/v2/apod-basic/?api_key=DEMO_KEY&per_page=1&_fields=title,hdurl,alt,explanation')
        .then((response) => {
            if (!response.ok) {
                throw new Error('NASA API error');
            }

            return response.json();
        })
        .then((data) => {
            const apod = data[0];

            nasaContainer.innerHTML = '';

            const title = document.createElement('h3');
            title.textContent = apod.title;

            const image = document.createElement('img');
            image.src = apod.hdurl;
            image.alt = apod.alt || apod.title;
            image.classList.add('nasa-image');

            const description = document.createElement('p');
            description.textContent = new DOMParser()
            .parseFromString(apod.explanation, 'text/html')
            .body.textContent;

            nasaContainer.append(title, image, description);
        })
        .catch(() => {
            nasaContainer.textContent = 'Impossible de charger l’image NASA pour le moment.';
        });
}