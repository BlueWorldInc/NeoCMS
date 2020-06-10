console.log("Page location is " + window.location.href);

if (window.location.href === "http://localhost/NEOCMS/Back/posts.php" || window.location.href === "http://localhost/NEOCMS/Back/posts.php#" || true) {


    let optionsMenu = document.querySelector(".optionsMenu");
    let optionsList = document.querySelector(".optionsList");
    let cleanShow = document.querySelector("#cleanShow");
    let showId = document.querySelector("#showId");
    let showDate = document.querySelector("#showDate");
    let showEdit = document.querySelector("#showEdit");

    let cards = document.querySelectorAll(".cards");

    optionsMenu.classList.remove("hide");
    optionsMenu.addEventListener("click", openOptionsMenu);
    cleanShow.addEventListener("change", cleanShowToggle);
    showId.addEventListener("change", showIdToggle);
    showDate.addEventListener("change", showDateToggle);
    showEdit.addEventListener("change", showEditToggle);

    function openOptionsMenu() {
        optionsList.classList.toggle("hide");
    }

    function cleanShowToggle() {
        if (cleanShow.checked) {
            for (let card of cards) {
                if (card.children[0].children[2].textContent.length === 0) {
                    card.style = "display:none";
                }
            }
            for (let card of cards) {
                card.children[0].children[1].style = "display: none";
            }
            showDate.checked = false;
            showDateToggle();
            showId.checked = false;
            showIdToggle();
            showEdit.checked = false;
            showEditToggle();
        } else {
            for (let card of cards) {
                if (card.children[0].children[2].textContent.length === 0) {
                    card.style = "display: initial";
                }
            }
            for (let card of cards) {
                card.children[0].children[1].style = "display: initial";
            }
        }

    }

    function showIdToggle() {
        if (showId.checked) {
            for (let card of cards) {
                card.children[0].children[0].style = "display:initial";
            }
        } else {
            for (let card of cards) {
                card.children[0].children[0].style = "display:none";
            }
        }
    }

    function showDateToggle() {
        // console.log(cards);
        if (showDate.checked) {
            for (let card of cards) {
                card.children[0].children[4].style = "display:initial";
            }
        } else {
            for (let card of cards) {
                card.children[0].children[4].style = "display:none";
            }
        }
    }

    function showEditToggle() {
        console.log(cards);
        if (showEdit.checked) {
            for (let card of cards) {
                card.children[0].children[6].style = "margin-left: auto; width:10%; background-color:#e2e6ea; display:initial";
            }
        } else {
            for (let card of cards) {
                card.children[0].children[6].style = "margin-left: auto; width:10%; background-color:#e2e6ea; display:none";
            }
        }
    }

    function init() {
        cleanShow.checked = true;
        cleanShowToggle();
        showDate.checked = false;
        showDateToggle();
        showId.checked = false;
        showIdToggle();
        showEdit.checked = true;
        showEditToggle();
    }

    init();
}