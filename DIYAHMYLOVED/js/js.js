$('.page-scroll').on('click', function(e){
    var tujuan = $(this).attr('href');
    var elemenTujuan = $(tujuan);
    $('body').animate({
        scrollTop: elemenTujuan.offset().top - 50

    }, 1250, 'easeInOutExpo')
    e.preventDefault();
});