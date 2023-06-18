function getBookId() {
    const aKeyValue = window.location.search.substring(1).split("&");
    const bookId = aKeyValue[0].split("=")[1];
    return bookId;
}
// we want to do const cause we dot want anyone to change the data
function showSelectedBook(data) {
    const selectedBookId = getBookId();
    let bookCat = "Categories:";

    for (const key in data.categories) {
        for (let i in data.categories[key].books) {
            if (data.categories[key].books[i] == selectedBookId)
                bookCat += " " + data.categories[key].name + ", ";
        }
    }

    let len = bookCat.length;
    const sHTML = bookCat.slice(0, len-2)

    document.getElementById("catInsert").innerHTML = sHTML;
}


fetch("data/cat.json")
    .then((response) => response.json())
    .then((data) => showSelectedBook(data));

// we need to change the function we want to use the data in