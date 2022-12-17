(function ($) {
  $(document).ready(function () {
    var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC"];

    console.log($("#keyword-hp").val())
    $("#keyword-hp").autocomplete({
        source: availableTags
      });
  });
})(jQuery);
