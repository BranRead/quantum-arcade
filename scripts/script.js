class Sprite {
    constructor({
                    // Position on spritesheet
                    spritesheetPosition = {
                        x: 0,
                        y: 0
                    },

                    // Position on gamemap
                    canvasPosition = {
                        x: 0,
                        y: 0
                    },

                    // key value pair of width and height (width, height)
                    dimensions,

                    image,


                    // boolean to control animation
                    animate,
                    sprite,
                    frames = { max: 1, hold: 10 },
                }) {

        this.spritesheetPosition = spritesheetPosition
        this.canvasPosition = canvasPosition
        this.dimensions = dimensions
        this.image = image
        this.image.onload = () => {

        }
        this.frames = {...frames, val: 0, elapsed: 0}
        this.image.src = image.src
        this.sprite = sprite
        this.animate = animate
        this.opacity = 1
    }

    draw(context) {
        // console.log(this.image.src)
        context.save()
        context.translate(
            this.canvasPosition.x + this.dimensions.width / 2,
            this.canvasPosition.y + this.dimensions.height / 2
        )

        context.translate(
            -this.canvasPosition.x - this.dimensions.width / 2,
            -this.canvasPosition.y - this.dimensions.height / 2
        )
        // Takes image, starting x position and starting y position to start drawing from, starting width and height for size from spritesheet
        // then takes destination position and dimensions
        // (image, sx, sy, swidth, sheigth, dx, dy, dwidth, dheight)
        context.drawImage(
            this.image,

            // sx
            this.spritesheetPosition.x + this.dimensions.width * this.frames.val,

            // sy
            this.spritesheetPosition.y,

            // swidth
            this.dimensions.width,

            // sheight
            this.dimensions.height,

            // dx
            this.canvasPosition.x,

            // dy
            this.canvasPosition.y,

            // dwidth
            this.dimensions.width,

            // dheight
            this.dimensions.height
        );
        context.restore()

        if(!this.animate) return

        if(this.frames.max > 1) {
            this.frames.elapsed++
        }

        if(this.frames.elapsed % this.frames.hold === 0) {
            if(this.frames.val < this.frames.max - 1) this.frames.val++
            else this.frames.val = 0
        }
    }
}

let animationID;

// The function to allow changing username right in the profile card

document.getElementById("changeUsername").addEventListener("click", () => {
    // console.log("Firing")
    let username = document.getElementById("displayedUsername").textContent;
    document.getElementById("displayedUsername").style.display = "none";

    document.getElementById("changeUsernameForm").style.display = "block";
    document.getElementById("changeUsernameInput").placeholder = username;
})

const pageLocation = 'http://localhost:63342/quantum-arcade-brandon/contact.php?_ijt=l8hvfsqj2lhv44nappbbc4fa04&_ij_reload=RELOAD_ON_SAVE';

if(document.location.href === pageLocation) {
    const canvas = document.getElementById("buggyScreen");
    const context = canvas.getContext("2d");
    canvas.width = 400;
    canvas.height = 100;

    const buggyImageRight = new Image();
    buggyImageRight.src = "images/crowWalkRight.png";

    const buggyImageLeft = new Image();
    buggyImageLeft.src = "images/crowWalkLeft.png";


    const buggy = new Sprite({
        spritesheetPosition: {
            x: 0,
            y: 0
        },
        canvasPosition: {
            x: 0,
            y: canvas.height / 2 - 20
        },
        dimensions: {
            width: 80,
            height: 80
        },
        image: buggyImageRight,
        animate: true,
        sprite: {
            right: buggyImageRight,
            left: buggyImageLeft
        },
        frames: {
            max: 16,
            hold: 10
        }
    })

    buggy.isGoingRight = true;

    function animation(){
        animationID = window.requestAnimationFrame(animation);
        if(buggy.isGoingRight) {
            buggy.canvasPosition.x += 1;
        } else {
            buggy.canvasPosition.x -= 1;
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


