const FILTER_PANEL = document.getElementById("filter-options");
const FILTER_BUTTON = document.getElementById("filter-button");
const SEARCH_BUTTON = document.getElementById("search-button");

FILTER_BUTTON.addEventListener("click", ToggleFilterPanel);

function ToggleFilterPanel() {
    if (FILTER_PANEL.style.display == "flex") {
        FILTER_PANEL.style.display = "none";
        SEARCH_BUTTON.style.display = "unset";
    } else {
        FILTER_PANEL.style.display = "flex";
        SEARCH_BUTTON.style.display = "none";
    }
}