var _createClass = function () {function defineProperties(target, props) {for (var i = 0; i < props.length; i++) {var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);}}return function (Constructor, protoProps, staticProps) {if (protoProps) defineProperties(Constructor.prototype, protoProps);if (staticProps) defineProperties(Constructor, staticProps);return Constructor;};}();function _classCallCheck(instance, Constructor) {if (!(instance instanceof Constructor)) {throw new TypeError("Cannot call a class as a function");}}var max_particles = 1200;
var particles = [];
var frequency = 20;
var init_num = max_particles;
var max_time = frequency * max_particles;
var time_to_recreate = false;
var data = createCanvas();
var tela = data[0];
var canvas = data[1];

// Enable repopolate
setTimeout(function () {
  time_to_recreate = true;
}.bind(undefined), max_time);

// Popolate particles
popolate(max_particles);var

FishEgg = function () {
  function FishEgg(canvas) {_classCallCheck(this, FishEgg);
    var random = Math.random();
    this.progress = 0;
    this.canvas = canvas;
    // Set position
    this.x = $(window).width() / 2 + (Math.random() * 300 - Math.random() * 300);
    this.y = $(window).height() / 2 + (Math.random() * $(window).height() / 4 - Math.random() * $(window).height() / 4);
    // Get viewport size
    this.w = $(window).width();
    this.h = $(window).height();

    // Dimension
    this.radius = 12 + Math.random() * 6;
    // Color
    this.color = "rgba(255,255,255,1)";
    // Setting
    this.fish_egg = {
      offset1: Math.random() > 0.5 ? 0.5 + Math.random() * 3 : 0.5 + Math.random() * -3,
      offset2: Math.random() > 0.5 ? 0.5 + Math.random() * 3 : 0.5 + Math.random() * -3,
      offset3: Math.random() > 0.5 ? 0.5 + Math.random() * 3 : 0.5 + Math.random() * -3,
      radius1: 0.5 + Math.random() * 5,
      radius2: 0.5 + Math.random() * 5,
      radius3: 0.5 + Math.random() * 5 };

    this.variantx1 = Math.random() * 100;
    this.variantx2 = Math.random() * 100;
    this.varianty1 = Math.random() * 100;
    this.varianty2 = Math.random() * 100;
  }_createClass(FishEgg, [{ key: "createCircle", value: function createCircle(

    x, y, r, c) {
      this.canvas.beginPath();
      this.canvas.fillStyle = c;
      this.canvas.arc(x, y, r, 0, Math.PI * 2, false);
      this.canvas.fill();
      this.canvas.closePath();
    } }, { key: "createEyes", value: function createEyes()

    {
      this.createCircle(this.x + this.fish_egg.offset2, this.y + this.fish_egg.offset2, this.fish_egg.radius2 + 4, "rgba(241, 242, 244, 0.06)");
      this.createCircle(this.x + this.fish_egg.offset3, this.y + this.fish_egg.offset3, this.fish_egg.radius3 + 2, "rgba(255, 204, 67, 0.08)");
      this.createCircle(this.x + Math.random(this.progress / 350) * this.fish_egg.offset1, this.y + Math.random(this.progress / 350) * this.fish_egg.offset1, this.fish_egg.radius1, "rgba(152, 19, 4, 0.19)");
    } }, { key: "render", value: function render()

    {
      // Create inside parts
      this.createEyes();

      this.canvas.beginPath();
      var c = '130, 151, 180';
      var rad = this.canvas.createRadialGradient(this.x, this.y, this.radius, this.x, this.y, 1);
      rad.addColorStop(0, 'rgba(' + c + ',0.09)');
      rad.addColorStop(0.9, 'rgba(' + c + ',0)');
      this.canvas.lineWidth = Math.random() * 2.2;
      this.canvas.fillStyle = rad;
      this.canvas.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
      this.canvas.fill();
      this.canvas.strokeStyle = "rgba(255, 255, 217, 0.05)";
      this.canvas.stroke();
      this.canvas.closePath();
    } }, { key: "move", value: function move()

    {
      this.x += Math.sin(this.progress / this.variantx1) * Math.cos(this.progress / this.variantx2) / 8;
      this.y += Math.sin(this.progress / this.varianty1) * Math.cos(this.progress / this.varianty2) / 8;



      if (this.x < 0 || this.x > this.w - this.radius) {
        return false;
      }

      if (this.y < 0 || this.y > this.h - this.radius) {
        return false;
      }
      this.render();
      this.progress++;
      return true;
    } }]);return FishEgg;}();var


FishLarva = function () {
  function FishLarva(canvas, progress) {_classCallCheck(this, FishLarva);
    var random = Math.random();
    this.progress = 0;
    this.canvas = canvas;
    this.speed = 0.5 + random * 1.3;

    this.x = $(window).width() / 2 + (Math.random() * 200 - Math.random() * 200);
    this.y = $(window).height() / 2 + (Math.random() * 200 - Math.random() * 200);

    this.s = 0.8 + Math.random() * 0.6;
    this.a = 0;

    this.w = $(window).width();
    this.h = $(window).height();
    this.radius = random * 1.3;
    this.color = "#f69a34";

    this.variantx1 = Math.random() * 1000;
    this.variantx2 = Math.random() * 1000;
    this.varianty1 = Math.random() * 1000;
    this.varianty2 = Math.random() * 1000;
  }_createClass(FishLarva, [{ key: "render", value: function render()

    {
      this.canvas.beginPath();
      this.canvas.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
      this.canvas.lineWidth = 2;
      this.canvas.fillStyle = this.color;
      this.canvas.fill();
      this.canvas.closePath();
    } }, { key: "move", value: function move()

    {
      // this.x += (Math.sin(this.progress/this.variantx1)*Math.cos(this.progress/this.variantx2))/this.speed;
      // this.y += (Math.sin(this.progress/this.varianty1)*Math.cos(this.progress/this.varianty2))/this.speed;
      this.x += Math.cos(this.a) * this.s;
      this.y += Math.sin(this.a) * this.s;
      this.a += Math.random() * 0.8 - 0.4;
      if (this.x < 0 || this.x > this.w - this.radius) {
        return false;
      }

      if (this.y < 0 || this.y > this.h - this.radius) {
        return false;
      }
      this.render();
      this.progress++;
      return true;
    } }]);return FishLarva;}();var



FishLarvaEgg = function () {
  function FishLarvaEgg(canvas, progress) {_classCallCheck(this, FishLarvaEgg);
    var random = Math.random();
    this.progress = 0;
    this.canvas = canvas;
    this.speed = 0.5 + random * 0.2;

    this.x = $(window).width() / 2 + (Math.random() * 200 - Math.random() * 200);
    this.y = $(window).height() / 2 + (Math.random() * 200 - Math.random() * 200);

    this.s = Math.random() * 1;
    this.a = 0;

    this.w = $(window).width();
    this.h = $(window).height();
    this.radius = random * 0.8;
    this.color = random > 0.8 ? "#82a0c4" : "#d9edf7";

    this.variantx1 = Math.random() * 100;
    this.variantx2 = Math.random() * 100;
    this.varianty1 = Math.random() * 100;
    this.varianty2 = Math.random() * 100;
  }_createClass(FishLarvaEgg, [{ key: "render", value: function render()

    {
      this.canvas.beginPath();
      this.canvas.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
      this.canvas.lineWidth = 2;
      this.canvas.fillStyle = this.color;
      this.canvas.fill();
      this.canvas.closePath();
    } }, { key: "move", value: function move()

    {
      this.x += Math.cos(this.a) * this.s;
      this.y += Math.sin(this.a) * this.s;
      this.a += Math.random() * 0.8 - 0.4;

      if (this.x < 0 || this.x > this.w - this.radius) {
        return false;
      }

      if (this.y < 0 || this.y > this.h - this.radius) {
        return false;
      }
      this.render();
      this.progress++;
      return true;
    } }]);return FishLarvaEgg;}();var


Paramecium = function () {
  function Paramecium(canvas) {_classCallCheck(this, Paramecium);
    var random = Math.random();
    this.progress = 0;
    this.canvas = canvas;
    // Set position
    this.x = $(window).width() / 2 + (Math.random() * 300 - Math.random() * 300);
    this.y = $(window).height() / 2 + (Math.random() * $(window).height() / 4 - Math.random() * $(window).height() / 4);
    // Get viewport size
    this.w = $(window).width();
    this.h = $(window).height();
    this.rotation = random * 180 * Math.PI / 180;
    // Dimension
    this.radius = 12 + Math.random() * 6;
    // Color
    this.color = "rgba(255,255,255,1)";
    // Setting
    this.variantx1 = Math.random() * 100;
    this.variantx2 = Math.random() * 100;
    this.varianty1 = Math.random() * 100;
    this.varianty2 = Math.random() * 100;
  }_createClass(Paramecium, [{ key: "createOval", value: function createOval(

    x, y, w, h) {
      var kappa = .5522848,
      ox = w / 2 * kappa, // control point offset horizontal
      oy = h / 2 * kappa, // control point offset vertical
      xe = x + w, // x-end
      ye = y + h, // y-end
      xm = x + w / 2, // x-middle
      ym = y + h / 2; // y-middle

      this.canvas.save();

      this.canvas.translate(this.w / 2, this.h / 2);

      // Rotate 1 degree
      this.canvas.rotate(this.rotation);

      // Move registration point back to the top left corner of canvas
      this.canvas.translate(-this.w / 2, -this.h / 2);

      this.canvas.beginPath();
      this.canvas.moveTo(x, ym);
      this.canvas.quadraticCurveTo(x, y, xm, y);
      this.canvas.quadraticCurveTo(xe, y, xe, ym);
      this.canvas.quadraticCurveTo(xe, ye, xm, ye);
      this.canvas.quadraticCurveTo(x, ye, x, ym);

      this.canvas.strokeStyle = 1;
      this.canvas.fillStyle = "rgba(171, 168, 168, 0.01)";
      this.canvas.fill();
      this.canvas.stroke();
      this.canvas.restore();
    } }, { key: "render", value: function render()

    {
      // Create inside parts
      this.createOval(this.x, this.y, 12, 4);
    } }, { key: "move", value: function move()

    {
      this.x += Math.sin(this.progress / this.variantx1) * Math.cos(this.progress / this.variantx2) / 4;
      this.y += Math.sin(this.progress / this.varianty1) * Math.cos(this.progress / this.varianty2) / 4;

      if (this.x < 0 || this.x > this.w - this.radius) {
        return false;
      }

      if (this.y < 0 || this.y > this.h - this.radius) {
        return false;
      }
      this.render();
      this.progress++;
      return true;
    } }]);return Paramecium;}();


/*
                                  * Function to create canvas
                                  */
function createCanvas() {
  var tela = document.createElement('canvas');
  tela.width = $(window).width();
  tela.height = $(window).height();
  $("body").append(tela);
  var canvas = tela.getContext('2d');
  return [tela, canvas];
}

/*
   * Function to clear layer canvas
   * @num:number number of particles
   */
function popolate(num) {
  for (var i = 0; i < num; i++) {
    setTimeout(
    function (x) {
      return function () {
        var random = Math.random();
        // ------------------------------------
        // Set type of planktom
        var type = new FishLarva(canvas);
        if (!time_to_recreate) {
          if (random > .97) type = new FishEgg(canvas);
          if (random < .1 && random > 0) type = new Paramecium(canvas);
        }
        if (random > .1 && random < .8) type = new FishLarvaEgg(canvas);

        // if(random < .1) this.type  = "bryozoan"
        // ------------------------------------
        // Add particle
        particles.push(type);
      };
    }(i),
    frequency * i);
  }
  return particles.length;
}

/*
   * Function to clear layer canvas
   */
function clear() {
  var grd = canvas.createRadialGradient(tela.width / 2, tela.height / 2, 0, tela.width / 2, tela.height / 2, tela.width);
  grd.addColorStop(0, "#EEEEEE");
  grd.addColorStop(1, "#FFFFFF");

  // grd.addColorStop(0, "rgba(229, 229, 229)");
  // grd.addColorStop(1, "rgba(229, 229, 229, 0.57)");
  // Fill with gradient
  canvas.fillStyle = grd;
  canvas.fillRect(0, 0, tela.width, tela.height);
}

/*
   * Function to update particles in canvas
   */
function update() {
  clear();
  particles = particles.filter(function (p) {return p.move();});
  // Recreate particles
  if (time_to_recreate) {
    if (particles.length < init_num) {popolate(1);}
  }
  requestAnimationFrame(update.bind(this));
}
// Update canvas
update();