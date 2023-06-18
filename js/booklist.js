function showData(data) {

    const dropFrag = document.createDocumentFragment();             // create dom frag
    const selectCat = document.getElementById("selectSec");         // where to drop the select
    const select = document.createElement("select");                // create select with classes      
    select.setAttribute("id", "selectCat");
    select.classList.add("form-select", "form-select-lg");
    select.setAttribute("area-label", ".form-select-lg example");


    const opt = document.createElement("option");                    // create selected option and insert to select
    let sHTML = "Categories";
    opt.innerHTML = sHTML;
    opt.setAttribute("selected", true);
    opt.setAttribute("disabled", true);
    select.appendChild(opt);

    const all = document.createElement("option");                   // create selected option and insert to select
    sHTML = "All";
    all.innerHTML = sHTML;
    all.setAttribute("value", "0");
    select.appendChild(all);


    for (const key in data.categories) {                            // add categories from json
        const option = document.createElement("option");
        option.value = data.categories[key].id;
        let sOpt = data.categories[key].name;
        option.innerHTML = sOpt;
        select.appendChild(option);
    }

    dropFrag.appendChild(select);
    selectCat.appendChild(dropFrag);

    select.addEventListener("change", function () {                 // filter when select option
        filter(data);
    });
}

function filter(data) {
    const catFilter = document.getElementById("selectCat");
    let books = document.getElementsByClassName("bookFlex");
    const val = catFilter.value;        // get selected value

    if (val == 0) {     // show all books if value == 0
        for (let i = 0; i < books.length; i++) {
            books[i].style.display = "flex";
        }
    }
    else {
        let bookArr = [];
        for (const key in data.categories) {                        // get books id from json
            if (data.categories[key].id == val) {
                for (let i in data.categories[key].books) {
                    bookArr[i] = data.categories[key].books[i];
                }
            }
        }

        for (let i = 0; i < books.length; i++) {                    // show books only in selected category category
            let book = books[i];
            let bookId = book.getAttribute("data-id");
            if (bookArr.includes(Number(bookId))) {
                book.style.display = "flex";
            } else {
                book.style.display = "none";
            }
        }
    }
}

fetch("data/cat.json")
    .then((response) => response.json())
    .then((data) => showData(data));


