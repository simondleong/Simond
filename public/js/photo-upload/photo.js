/* ******************************************** */
// ------------- PHOTO MODAL --------------
/* ******************************************** */

// Get the modal
let a = document.getElementById('imageModal');
let modal = document.getElementById('imageModal');
a.parentNode.removeChild(a);
document.body.insertBefore(modal, document.body.childNodes[0]);

function showImage(element , i) {

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    let img = document.getElementById(i);
    let modalImg = document.getElementById("modal-img");

    modal.style.display = "block";
    modalImg.src = element.src;
}

let span = document.getElementsByClassName("close")[0];

span.onclick = function () {
    modal.style.display = "none";
};

/* ******************************************** */
// ----------- END OF MODAL ---------------
/* ******************************************** */




/* ******************************************** */
// ----------- IMAGE SIZE VALIDATION ------
/* ******************************************** */
let maxSize     = 2048 * 1000;
let uploadBtn   = $('#upload-btn');
let uploadMsg   = $('#upload-message');
let boolArr     = (function () {
    let arr = [];

    return {
        init: function () {
            for (let i = 0; i < 4; i++) {
                arr[i] = true;
            }
        },

        check () {
            for (let i = 0; i < 4; i++) {
                if (!arr[i])
                    return false;
            }
            return true;
        },

        setTrue (i) {
            arr[i] = true;
        },

        setFalse (i) {
            arr[i] = false;
        },

        print () {
            for (let i = 0; i < 4; i++) {
                console.log(i + ' ' + arr[i]);
            }
        }
    }
})();

boolArr.init();

function isValid() {
    if (boolArr.check()) {
        uploadBtn.removeClass('hidden');
        uploadMsg.addClass('hidden');
    } else {
        uploadBtn.addClass('hidden');
        uploadMsg.removeClass('hidden');
    }

    boolArr.print();
}

function sizeCheck(element, i) {
    let fileSize = document.getElementById('file' + i).files[0].size;
    console.log(fileSize);

    if (fileSize < maxSize) {
        boolArr.setTrue(i-1);
    } else {
        boolArr.setFalse(i-1);
    }

    isValid();
}

/* ******************************************** */
// ----------- END OF VALIDATION ----------
/* ******************************************** */





/* ******************************************** */
// ----------- Add New File --------------------
/* ******************************************** */

let PHOTOCOUNT = (function() {
    let _args = {}; // private
    let photocount = 0;
    let maxPhotoCount = 4;

    return {
        init: function(Args) {
            _args           = Args;
            photocount      = _args[0];
            maxPhotoCount   = maxPhotoCount - photocount;
        },

        total: function () {
            return photocount;
        },

        calculate: function () {
            return (photocount < maxPhotoCount);
        },

        add: function () {
            photocount++;
        },

        delete: function () {
            photocount--;
        },

        id: function () {
            return (photocount+1);
        }
    }
}());

let addButton = document.getElementById('add');
let inc = document.getElementById('increment');
function clone () {
    let currID = PHOTOCOUNT.id();

    return  "          <div class=\"control-group input-group\" style=\"margin-top:10px\">\n" +
    "            <input id=\"file" + currID + "\" class=\"form-control\" type=\"file\" name=\"file[]\"\n" +
    "               onchange=\"sizeCheck(this, " + currID + ")\" required>" +
    "            <div class=\"btn-del\"> \n" +
    "              <button class=\"btn btn-danger\" type=\"button\" onclick=\"removeButton(this, " + currID + ")\">" +
    "               <i class=\"glyphicon glyphicon-remove\"></i> Remove" +
    "              </button>\n" +
    "            </div>\n" +
    "          </div>";
}

addButton.onclick =  function() {
    if (PHOTOCOUNT.calculate()) {
        inc.insertAdjacentHTML('afterend', clone());
        PHOTOCOUNT.add();
        console.log(PHOTOCOUNT.total());
    }
    else {
        alert('You have reached the maximum number of photos!');
    }
};

function removeButton (element, i) {
    $(element).parents(".control-group").remove();
    PHOTOCOUNT.delete();
    boolArr.setTrue(i-1);
    isValid();
}

/* ******************************************** */
// ----------- END -----------------------
/* ******************************************** */