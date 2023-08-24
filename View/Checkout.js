document.addEventListener("click", TogglePanel);

function TogglePanel(sender) {
    let panel = null;

    switch (sender.target.id) {
        case "toggle-items-panel":
            panel = document.getElementById("items-content");
            break;

        case "toggle-payment-panel":
            panel = document.getElementById("payment-details");
            break;

        case "toggle-delivery-panel":
            panel = document.getElementById("delivery-details");
            break;
    }


    if (panel.style.display == "none") {
        panel.style.display = "grid";
        sender.target.innerHTML = "expand_less";
    }
    else {
        panel.style.display = "none";
        sender.target.innerHTML = "expand_more";
    }
}