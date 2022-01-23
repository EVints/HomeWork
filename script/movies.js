
let fieldset = document.getElementById(`fieldset`),
    userSearch = document.getElementById(`userSearch`),
    userSelectType = document.getElementById(`userSelectType`),
    movieSearchButton = document.getElementById(`movieSearchButton`),
    allFilms = document.getElementById(`allFilms`);

let mainDiv = document.getElementById(`filmPoster`);

let footer = document.getElementById(`footer`);

let howManyPages = 0;


function searchFilms(pg = 1) {


    fetch("http://www.omdbapi.com/?i=tt3896198&apikey=9b78bae6" + "&s=" + userSearch.value + "&type=" + userSelectType.value + "&page=" + pg)
        .then(r => r.json())
        .then(j => showFilms(j))
        .then(() => pages())


}



function showFilms(film) {

    let oldArr = document.querySelectorAll(`.filmPoster`);
    for (let even of oldArr) {
        even.remove();
    }

    let oldPages = document.querySelectorAll(`.pageNumber`);
    for (let even of oldPages) {
        even.remove();
    }

    let filmsArr = film.Search;
    howManyPages = Math.ceil(film.totalResults / 10);


    for (let pos of filmsArr) {

        let filmPoster = document.createElement(`div`);
        filmPoster.className = `filmPoster`;

        let newImg = document.createElement(`img`);
        newImg.src = pos.Poster;
        newImg.className = `filmImg`
        filmPoster.append(newImg);

        let divInfo = document.createElement(`div`);
        divInfo.className = `divInfo`;

        let sp1 = document.createElement(`span`);
        sp1.innerText = pos.Type;

        let sp2 = document.createElement(`span`);
        sp2.innerText = pos.Title;

        let sp3 = document.createElement(`span`);
        sp3.innerText = pos.Year;

        let button = document.createElement(`button`);
        button.innerText = `Details`;
        button.className = `filmDetailsBut`;
        button.value = pos.imdbID;

        divInfo.append(sp1, sp2, sp3, button);
        filmPoster.append(divInfo);
        allFilms.append(filmPoster);
    }
}


movieSearchButton.addEventListener(`click`, () => {
    searchFilms();
    document.querySelector(`h2`).innerText = `Page 1`

})



function pages() {
    for (i = 1; i <= howManyPages; i++) {
        let linkPage = document.createElement(`a`);
        linkPage.className = `pageNumber`;
        linkPage.innerText = i;
        linkPage.href = `#top`;
        footer.append(linkPage);
    }
}

footer.addEventListener(`click`, e => {

    let num = +e.target.innerText;
    if (num) {
        searchFilms(num);
        document.querySelector(`h2`).innerText = `Page ${num}`
    }
})