document.getElementById("changeUsername").addEventListener("click", () => {
    // console.log("Firing")
    let username = document.getElementById("displayedUsername").textContent;
    document.getElementById("displayedUsername").style.display = "none";


    document.getElementById("changeUsernameForm").style.display = "block";
    document.getElementById("changeUsernameInput").placeholder = username;
})