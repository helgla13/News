
$(document).ready(function() {
    setTimeout(function()
    {
        $("#myModal").modal('show');
    },15000);
});

var a;
$(function (){
    $('.reclama').hover(
        function() {
            a = $(this).find('.price').text();
            var b = a*0.9;
            $(this).find('.price').text(b);
        },
        function() {
            $(this).find('.price').text(a);
        });
});

$(function () {
    $("#showpages").click(function () {
        $("#pageshide").show();
        $("#showpages").hide();
    })
});



