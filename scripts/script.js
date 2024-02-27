

let animationID;

// The function to allow changing username right in the profile card

document.getElementById("changeUsername").addEventListener("click", () => {
    let userNameDisplay = document.getElementById("displayedUsername");
    if(userNameDisplay.style.display === "none"){
        document.getElementById("changeUsernameForm").style.display = "none";
        userNameDisplay.style.display = "block";
    } else {
        userNameDisplay.style.display = "none";
        let username = userNameDisplay.textContent;

        document.getElementById("changeUsernameForm").style.display = "block";
        document.getElementById("changeUsernameInput").placeholder = username;
    }
})


const canvas = document.getElementById("buggyScreen");

if(canvas != null) {
    const context = canvas.getContext("2d");
    canvas.width = 700;
    canvas.height = 100;

    const buggyImageRight = new Image();
    buggyImageRight.src = "images/raccoonWalkRight.png";

    const buggyImageLeft = new Image();
    buggyImageLeft.src = "images/raccoonWalkLeft.png";


    const buggy = new Sprite({
        spritesheetPosition: {
            x: 0,
            y: 0
        },
        canvasPosition: {
            x: 0,
            y: 0
        },
        dimensions: {
            width: 120,
            height: 60
        },
        image: buggyImageRight,
        animate: true,
        sprite: {
            right: buggyImageRight,
            left: buggyImageLeft
        },
        frames: {
            max: 8,
            hold: 8
        }
    })

    buggy.isGoingRight = true;

    function animation(){
        animationID = window.requestAnimationFrame(animation);
        if(buggy.isGoingRight) {
            buggy.canvasPosition.x += 2;
        } else {
            buggy.canvasPosition.x -= 2;
        }

        if(buggy.canvasPosition.x > canvas.width){
            buggy.isGoingRight = false;
            buggy.image = buggy.sprite.left;
        } else if (buggy.canvasPosition.x < 0 - buggy.dimensions.width) {
            buggy.isGoingRight = true;
            buggy.image = buggy.sprite.right;
        }
        context.clearRect(0, 0, canvas.width, canvas.height);
        buggy.draw(context);
    }

    animation();
}


