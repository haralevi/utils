const host = '//' + window.location.host;

const fetchUrl = host + '/ajax/get_gallery.php';

const fetchData = new FormData();
fetchData.append('rate', 1);
fetchData.append('range', 7);
fetchData.append('page', 1);

const labelFetch = 'labelFetch';

console.time(labelFetch);

fetch(fetchUrl, {method: 'POST', body: fetchData})
    .then(data => data.json())
    .then(data => {
        console.timeEnd(labelFetch);

        const imgArr = data.ps.map(img => `<a href="${host}/work/${img.ip}" target="_blank"><img src="${img.iu}"></a>`);
        const imgHtml = imgArr.reduce((html, img) => `${html}<br>${img}`);

        const labelImgHtml = 'labelImgHtml';
        console.time(labelImgHtml);
        document.getElementById('imgHtml').innerHTML = imgHtml;
        console.timeEnd(labelImgHtml);
    });