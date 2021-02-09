@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="custom_canvas">
    <div class="desktop-only">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="col-12 my-3">
                        <div class="col-12 my-3">
                            <label for="header-opt"
                                >Please Select A Header:</label
                            >
                            <select
                                name=""
                                id="header-opt"
                                class="form-control"
                            >
                                <option value="" disabled selected>
                                    Please Select
                                </option>
                                <option value="caution">Caution</option>
                                <option value="notice">Notice</option>
                                <option value="please">Please</option>
                                <option value="restricted-area">
                                    Restricted Area
                                </option>
                                <option value="safety-first">
                                    Safety First
                                </option>
                                <option value="security">Security</option>
                                <option value="think-quality">
                                    Think Quality
                                </option>
                                <option value="warning-white">Warning</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="text-1">Text One:</label>
                            <input
                                type="text"
                                id="text-1"
                                class="form-control"
                            />
                        </div>
                        <div class="col-12 my-2">
                            <button class="btn btn-primary" id="inc-txt-1">
                                +
                            </button>
                            <button class="btn btn-primary" id="dec-txt-1">
                                -
                            </button>
                            <button class="btn btn-primary" id="pos-up-one">
                                Up
                            </button>
                            <button class="btn btn-primary" id="pos-down-one">
                                Down
                            </button>
                            <button class="btn btn-primary" id="pos-left-one">
                                Left
                            </button>
                            <button class="btn btn-primary" id="pos-right-one">
                                Right
                            </button>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" id="save-btn">
                                Save Locally
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <!-- 
                        " -->

                    <canvas
                        id="headerCanvas"
                        width="270"
                        height="250"
                        style="
                            position: absolute;
                            left: 0;
                            top: 20px;
                            z-index: 0;
                        "
                    ></canvas>
                    <canvas
                        id="canvasTwo"
                        width="270"
                        height="150"
                        style="
                            position: absolute;
                            left: 0;
                            top: 120px;
                            z-index: 12;
                        "
                    ></canvas>
                    <!--  -->
                </div>
            </div>
        </div>

        <br />

        <!-- <label for="text-2">Text Two:</label> -->
        <!-- <input type="text" id="text-2" /> -->
        <!-- <button id="inc-txt-2">+</button>
      <button id="dec-txt-2">-</button> -->

        <!-- Hidden Anchor Tag for saving Canvas with custom filename -->
        <div class="hidden">
            <a href="" id="link"></a>
            <img
                src="/images/frontend_images/custom/caution.gif"
                alt="header-img"
                id="caution-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/notice.gif"
                alt="header-img"
                id="notice-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/emergency.gif"
                alt="header-img"
                id="emergency-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/please.gif"
                alt="header-img"
                id="please-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/restricted-area.gif"
                alt="header-img"
                id="restricted-area-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/safety-first.gif"
                alt="header-img"
                id="safety-first-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/think-quality.gif"
                alt="header-img"
                id="think-quality-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/security.gif"
                alt="header-img"
                id="security-header-img"
                crossorigin
            />
            <img
                src="/images/frontend_images/custom/warning-white.gif"
                alt="header-img"
                id="warning-white-header-img"
                crossorigin
            />
        </div>
    </div>
</div>

<script>
    //   Draws the header image.

    window.addEventListener("load", () => {
        var saveBtn = document.getElementById("save-btn");
        var headerOpt = document.getElementById("header-opt");
        var newBGColor = "#ffffff";

        headerOpt.addEventListener("change", (e) => {
            switch (e.target.value) {
                case "notice":
                    img = document.getElementById("notice-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "emergency":
                    img = document.getElementById("emergency-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "please":
                    img = document.getElementById("please-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "restricted-area":
                    img = document.getElementById("restricted-area-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "safety-first":
                    img = document.getElementById("safety-first-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "security":
                    img = document.getElementById("security-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "think-quality":
                    img = document.getElementById("think-quality-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "warning-white":
                    img = document.getElementById("warning-white-header-img");
                    newBGColor = "#ffffff";
                    break;
                case "caution":
                    img = document.getElementById("caution-header-img");
                    newBGColor = "yellow";
                default:
                    break;
            }
            init(newBGColor);
        });

        function init(color) {
            // Header Canvas = 2
            var headerCanvas = document.getElementById("headerCanvas");
            //   TextOne Canvas = 1
            var canvas = document.getElementById("canvasTwo");

            var oldText;
            var ctx = canvas.getContext("2d");

            var ctx2 = headerCanvas.getContext("2d");

            var plusBtnOne = document.getElementById("inc-txt-1");
            var minusBtnOne = document.getElementById("dec-txt-1");
            // var plusBtnTwo = document.getElementById("inc-txt-2");
            // var minusBtnTwo = document.getElementById("dec-txt-2");
            var posUpOne = document.getElementById("pos-up-one");
            var posDownOne = document.getElementById("pos-down-one");
            var posLeftOne = document.getElementById("pos-left-one");
            var posRightOne = document.getElementById("pos-right-one");

            var textOne = document.getElementById("text-1");
            // var textTwo = document.getElementById("text-2");
            var initialFontSize = 20;
            var x1 = 10;
            var y1 = 30;
            var lh = 30;

            var initialTextOne = "Custom Signs!";
            var initialTextTwo = "Write anything here!";
            var fontSize = initialFontSize;
            let textOneString = initialTextOne;
            // let textTwoString = initialTextTwo;

            oldTextOne = textOneString.toUpperCase();
            // oldTextTwo = textTwoString;

            // Header Canvas
            function drawHeader() {
                return ctx2.drawImage(
                    img,
                    0,
                    0,
                    img.width,
                    img.height,
                    10,
                    10,
                    250,
                    70
                );
            }
            function bgColor(context, x, y, w, h) {
                context.fillStyle = color;
                context.fillRect(x, y, w, h);
            }
            bgColor(ctx2, 0, 0, 500, 500);

            drawHeader();

            // drawTextOne(fontSize, textOneString);

            // drawTextTwo(fontSize, textTwoString);
            ctx.fillText(textOneString.toUpperCase(), 10, 250);

            wrapText(
                ctx,
                textOneString.toUpperCase(),
                x1,
                y1,
                260,
                lh,
                fontSize
            );

            // Text 1 - DOM

            plusBtnOne.addEventListener("click", () => {
                if (getWidth(oldTextOne)) {
                    fontSize += 1;
                    console.log(fontSize);
                    if (fontSize == 30) lh += 5;
                    // drawTextOne(fontSize, textOneString.toUpperCase(), true);
                    wrapText(
                        ctx,
                        textOneString.toUpperCase(),
                        x1,
                        y1,
                        260,
                        lh,
                        fontSize
                    );
                }
            });

            minusBtnOne.addEventListener("click", () => {
                if (fontSize > 15) {
                    fontSize -= 1;
                    wrapText(
                        ctx,
                        textOneString.toUpperCase(),
                        x1,
                        y1,
                        260,
                        lh,
                        fontSize
                    );
                    // drawTextOne(fontSize, textOneString.toUpperCase());
                }
            });

            posUpOne.addEventListener("click", () => {
                y1 -= 2;
                clearText();
                wrapText(
                    ctx,
                    textOneString.toUpperCase(),
                    x1,
                    y1,
                    260,
                    lh,
                    fontSize
                );
            });

            posDownOne.addEventListener("click", () => {
                y1 += 2;
                clearText();
                wrapText(
                    ctx,
                    textOneString.toUpperCase(),
                    x1,
                    y1,
                    260,
                    lh,
                    fontSize
                );
            });

            posLeftOne.addEventListener("click", () => {
                x1 -= 2;
                clearText();
                wrapText(
                    ctx,
                    textOneString.toUpperCase(),
                    x1,
                    y1,
                    260,
                    lh,
                    fontSize
                );
            });
            posRightOne.addEventListener("click", () => {
                x1 += 2;

                console.log(x1);
                clearText();
                wrapText(
                    ctx,
                    textOneString.toUpperCase(),
                    x1,
                    y1,
                    260,
                    lh,
                    fontSize
                );
            });

            // Input - Text 1
            textOne.addEventListener("input", () => {
                textOneString = textOne.value;
                //   textOneString.toUpperCase() = "Hey how is it doing? Am I great?";

                wrapText(
                    ctx,
                    textOneString.toUpperCase(),
                    x1,
                    y1,
                    260,
                    lh,
                    fontSize
                );
                //   drawTextOne(fontSize, textOneString.toUpperCase());
            });

            saveBtn.addEventListener("click", (e) => {
                var link = document.getElementById("link");
                ctx2.drawImage(canvas, 10, 100);

                var fileName = toSnakeCase(textOneString.toUpperCase());
                link.setAttribute("download", `${fileName}.png`);

                link.setAttribute(
                    "href",
                    headerCanvas
                        .toDataURL("image/png")

                        .replace("image/png", "image/octet-stream")
                );
                link.click();
                return;
            });

            // For Text Two Input
            // textTwo.addEventListener("change", () => {
            //   textTwoString = textTwo.value;
            //   //   drawTextTwo(fontSize, textTwoString);
            // });

            function drawTextOne(size, text, draw = false) {
                var w = ctx.measureText(oldTextOne).width;
                var h = size * 2;
                console.log(w);
                ctx.clearRect(x1, Number(y1 + 15), Number(w + 20), -h);
                ctx.fillStyle = "yellow";
                ctx.fillRect(x1, Number(y1 + 15), Number(w + 20), -h);

                ctx.fillStyle = "black";
                ctx.font = `700 ${size}px Arial`;

                ctx.fillText(text, x1, y1);
                oldTextOne = text;
                w = ctx.measureText(oldTextOne).width;

                if (w > 200 && draw == true) {
                    let reducedSize = Number(size - 5);
                    console.log("Overflow Text");
                    drawTextOne(reducedSize, text);
                }
            }

            // function drawTextTwo(size, text) {
            //   var w = ctx.measureText(oldTextTwo).width;
            //   ctx.clearRect(10, 470, w, -40);
            //   ctx.fillStyle = "yellow";
            //   ctx.fillRect(10, 470, w, -40);
            //   ctx.fillStyle = "black";
            //   ctx.font = size + "px Arial";
            //   ctx.fillText(text, 10, 450);
            //   oldTextTwo = text;
            // }

            function getWidth(text) {
                return ctx.measureText(text).width;
            }

            function clearText() {
                var w = ctx.measureText(oldTextOne).width;
                var h = fontSize * 2;

                let x = Number(x1 - 2);
                let y = Number(y1 + 20);
                y = 150;
                let width = 270;
                let height = h;
                height = 150;
                // console.log(w);

                if (fontSize >= 24) {
                    let y = Number(y1 + 100);
                }

                ctx.clearRect(x, y, width, -height);
                bgColor(ctx, x, y, width + 2, -height);
            }

            // From codepen
            function wrapText(context, text, x, y, maxWidth, lineHeight, size) {
                //   console.log(text);
                clearText();
                var words = text.split(" ");
                var line = "";
                context.fillStyle = "black";
                //   context.textAlign = "center";

                context.font = `700 ${size}px Arial`;

                for (var n = 0; n < words.length; n++) {
                    var testLine = line + words[n] + " ";
                    var metrics = context.measureText(testLine);
                    var testWidth = metrics.width;
                    if (testWidth > maxWidth && n > 0) {
                        context.fillText(line, x, y);
                        line = words[n] + " ";
                        y += lineHeight;
                    } else {
                        line = testLine;
                    }
                }

                context.fillText(line, x, y);
            }

            //   Converting the string to snake_code for image name c:
            const toSnakeCase = (str) =>
                str &&
                str
                    .match(
                        /[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g
                    )
                    .map((x) => x.toLowerCase())
                    .join("_");
        }
    });
</script>

<style>
    #custom_canvas {
        min-height: 100vh;
    }
    #headerCanvas {
        border: 1px solid black;
        border-radius: 5px;
    }
</style>
@endsection
