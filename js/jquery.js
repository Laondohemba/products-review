$(document).ready(function () {
  $("#nav_icon").click(function () {
    $(".nav_items").toggle(400);
  });
});
$(document).ready(function () {
  // Show settings list on hover
  $("#settings").hover(
    function () {
      $(".settings-list").stop(true, true).slideDown(400); // Show with a slide effect
    },
    function () {
      // Hide settings list when mouse leaves #settings or .settings-list
      $(".settings-list").stop(true, true).slideUp(400); // Hide with a slide effect
    }
  );

  // Prevent hiding when hovering over the .settings-list itself
  $(".settings-list").hover(
    function () {
      $(this).stop(true, true).slideDown(400); // Keep it open while hovering
    },
    function () {
      $(this).stop(true, true).slideUp(400); // Hide when mouse leaves
    }
  );
});
