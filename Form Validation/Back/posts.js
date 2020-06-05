let cards = document.querySelectorAll(".cards");
let post_ids = document.querySelectorAll(".post_ids");
let post_contents_tag = document.querySelectorAll(".post_contents_tag");
let post_contents = document.querySelectorAll(".post_contents");
let post_dates = document.querySelectorAll(".post_dates");

console.log(cards);

for (let u of post_contents) {
    console.log(u.textContent.length);
}

for (let id of post_ids) {
    // id.style = "display:none;"
}

for (let content of post_contents_tag) {
    // content.style = "display:none";
}

for (let date of post_dates) {
    // date.style = "display:none";
}

for (let card of cards) {
    if (card.children[0].children[2].textContent.length === 0) {
        card.style = "display:none";
    }
}