
/*
    The following is mostly stolen shamelessly from https://www.w3schools.com/howto/howto_css_modal_images.asp
*/
//start up function goes here!
jQuery(document).ready(function($) {
//inser the following html into the body of the document
    let modal = new Node();
    modal.innerHTML = `<!-- The Modal -->
    <div id="whuwModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="modalImg">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
    </div>`
    document.body.appendChild(modal)
    
    // Get the modal
    //var modal = document.getElementById("whuwModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

//do the following once for every class=whuw_card
// Get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("modalImg");
    var captionText = document.getElementById("caption");
    $(".whuw_card").onclick(function() {
        modal.style.display = "block";
        modalImg.src = this.href;
        captaionText.innerHTML = this.innerHTML;
    });
    // for (let whuwCard of document.getElementsByClassName("whuw_card")) {
    //     whuwCard.onclick = function() {
    //         modal.style.display = "block";
    //         modalImg.src = this.href;
    //         captionText.innerHTML = this.innerHTML; //this should be the text for the link
    //     }
    // }
});