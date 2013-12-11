
var $sentDialog = $("#sentDialog");

  $("#contactForm").on("submit", function () {
    $sentDialog.modal('show');
    return false;
  });