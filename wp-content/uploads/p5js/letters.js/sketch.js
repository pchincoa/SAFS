let str = "El amor ya no es contemporáneo";
let str_arr = [];
let str_col = [];
let hu = 0;

let font;
let sdgreg;

function preload() {
   font = loadFont("HelveticaNowDisplay-Bold.ttf");
}

function setup() {
   createCanvas(1000, 1000, WEBGL);
   colorMode(HSB, 360, 255);
   let strs = str.split(" ");
   for (let i = 0; i < strs.length * 20; i++) {
      let x = random(-width / 2, width / 2);
      let y = random(-height / 2, height / 2);
      let z = random(-width * 5, width / 2);
      str_arr.push(new Type(strs[i % strs.length], x, y, z));
   }
}

function draw() {
   background(255);
   orbitControl();
   for (let i = 0; i < str_arr.length; i++) {
      str_arr[i].update();
      str_arr[i].display();
   }
}

class Type {
   constructor(_str, _x, _y, _z) {
      this.str = _str;
      this.col = hu += 10;
      this.x = _x;
      this.y = _y;
      this.z = _z;
   }

   update() {
      this.z += 10;
      if (this.z > width / 2) {
         this.z = -width * 5;
      }
   }

   display() {
      push();
      //rotateX(PI);   // uncomment this line to save an image or re-create the thumbnail
      translate(this.x, this.y, this.z);
      textAlign(CENTER, CENTER);
      textFont(font);
      textSize(100);
      fill(this.col * 2 % 360, 200, 255);
      text(this.str, 0, 0);
      hu++
      pop();
   }
}

function windowResized() {
   resizeCanvas(windowWidth, windowHeight);
}