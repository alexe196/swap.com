$(document).ready(function() {
    $('.header__burger').click(function() {
        $('.header__burger, .header__mobile').toggleClass('active');
        $('body').toggleClass('lock');
    });

    $('body').on('click', '.pass__img', function(e){
        e.preventDefault();
        if ($('#password-input').attr('type') == 'password'){
            $('.pass__img--show').removeClass('active');
            $('.pass__img--hide').addClass('active');
            $('#password-input').attr('type', 'text');
        } else {
            $('.pass__img--show').addClass('active');
            $('.pass__img--hide').removeClass('active');
            $('#password-input').attr('type', 'password');
        }
        return false;
    });
})
