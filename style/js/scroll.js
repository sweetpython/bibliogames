// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btnUp").style.display = "block";
    } else {
        document.getElementById("btnUp").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

if (window.location.hash == "#galleryBooksPskov") {
    $('#pot').modal('show');
}

$('#galleryBooksPskov').modal('show')

function popModal() {
    // code to pop up modal dialog
  }

  if ( $('#galleryBooksPskov').length > 0 ) {
    $(location.hash).modal('show');
}