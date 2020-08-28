
$(window).scroll(function() {
    if ($(this).scrollTop() > 40) {
        $("#btntop").fadeIn();

    } else {
        $("#btntop").fadeOut();
    }
    $("navbar-dark").remove();
});
$("#btntop").click(function() {
    $("html,body").animate({
        scrollTop: 0
    }, 800)
});
//
$(".toggle").click(function(){
    $(".menu").addClass("open");
    $(".close").addClass("shut");
  });

  $(".close").click(function(){
    $(this).removeClass("shut");
    $(".menu").removeClass("open");
  });
//
$(document).ready(function(){

    $('.nav-tabs a').on('shown.bs.tab', function(event){
      var x = $(event.target).text();         // active tab
      var y = $(event.relatedTarget).text();  // previous tab
      $(".act span").text(x);
      $(".prev span").text(y);
    });

  });
  //
  $(document).ready(function($) {

    $('.card__share > a').on('click', function(e){
        e.preventDefault() // prevent default action - hash doesn't appear in url
           $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
        $(this).toggleClass('share-expanded');
    });

    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 40) {
            $("#btntop").fadeIn();

        } else {
            $("#btntop").fadeOut();
        }
        $("navbar-dark").remove();
    });
    $("#btntop").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 800)
    });

$(function () {
    'use strict';
    /* Toggle Navbar Menu - Small Screen */
    var clicked = false;
    var $header = $('.main-header')
        , $mobileMenu = $('.mobile-menu');
    $header.find('.toggle-menu-btn').click(function () {
        var $this = $(this);
        $this.toggleClass('active');
        if (!clicked) {
            clicked = true;
            $mobileMenu.toggleClass('active');
            setTimeout(function () {
                clicked = false;
            });
        }
    });
    $(window).on('click', function () {
        if ($header.hasClass('active')) {
            $(this).removeClass();
        }
    })
    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 50) {
            $('.main-header').addClass('scrolled');
        }
        else {
            $('.main-header').removeClass('scrolled');
        }
    });


    /* Main Section Tabs - Add Class Active */
    $('.panel-title').on('click', function () {
        const icon = this.querySelector('i');
        $(this).parent().toggleClass('active').siblings().removeClass('active');
        if (icon.classList.contains('fa-angle-down')) {
            icon.classList.remove('fa-angle-down');
            icon.classList.add('fa-angle-up');
        }
        else {
            icon.classList.remove('fa-angle-up');
            icon.classList.add('fa-angle-down');
        }
    });
});


var $formLogin = $('#login-form');
var $formLost = $('#lost-form');
var $formRegister = $('#register-form');
var $formRemember = $('#remember-form');
var $divForms = $('#div-forms');
var $modalAnimateTime = 300;
var $msgAnimateTime = 150;
var $msgShowTime = 2000;
$('#login_register_btn').click(function () {
    modalAnimate($formLogin, $formRegister)
});
$('#register_login_btn').click(function () {
    modalAnimate($formRegister, $formLogin);
});
$('#login_remember_btn').click(function () {
    modalAnimate($formRemember, $formLogin);
});
$('#remember_login_btn').click(function () {
    modalAnimate($formLogin, $formRemember);
});
$('#remember_lost_btn').click(function () {
    modalAnimate($formLogin, $formLost);
});
$('#login_lost_btn').click(function () {
    modalAnimate($formLogin, $formLost);
});
$('#lost_login_btn').click(function () {
    modalAnimate($formLost, $formLogin);
});
$('#lost_register_btn').click(function () {
    modalAnimate($formLost, $formRegister);
});
$('#register_lost_btn').click(function () {
    modalAnimate($formRegister, $formLost);
});

function modalAnimate($oldForm, $newForm) {
    var $oldH = $oldForm.height();
    var $newH = $newForm.height();
    $divForms.css("height", $oldH);
    $oldForm.fadeToggle($modalAnimateTime, function () {
        $divForms.animate({
            height: $newH
        }, $modalAnimateTime, function () {
            $newForm.fadeToggle($modalAnimateTime);
        });
    });
}

$(document).ready(function () {
    $('select').niceSelect();
});

document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");



//
$(function() { // document ready
    if ($('#sticky').length) { // make sure "#sticky" element exists
        var el = $('#sticky');
        var stickyTop = $('#sticky').offset().top; // returns number
        var stickyHeight = $('#sticky').height();

        $(window).scroll(function() { // scroll event
            var limit = $('#footer').offset().top - stickyHeight - 20;

            var windowTop = $(window).scrollTop(); // returns number

            if (stickyTop < windowTop) {
                el.css({
                    position: 'fixed',
                    top: 0
                });
            } else {
                el.css('position', 'static');
            }

            if (limit < windowTop) {
                var diff = limit - windowTop;
                el.css({
                    top: diff
                });
            }
        });
    }
});

// swiper



var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 1;
    this.period = parseInt(period, 1) || 10000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
    }

    setTimeout(function() {
    that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

// toggle
$(document).ready(function(){
  $("#tog-btn").click(function(){
    $("#ne").toggle(2000);
  });
});

window.onload = function(){

    var receiver_id = '';

    var my_id = "{{Auth::id()}}";

    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.users').click(function () {
            $('.users').removeClass('active');
            $(this).addClass('active');

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "massage/" + receiver_id,
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                }
            })
        })
    });

    $(document).on('keyup', '.input-text input', function (e) {

        var message = $(this).val();
        if (e.keyCode == 13 && message != '' && receiver_id != '') {
            $(this).val(''); // while pressed enter text box will be empty
            var datastr = "receiver_id=" + receiver_id + "&message=" + message;

            $.ajax({
                type: "post",
                url: "message", // need to create this post route
                data: datastr,
                cache: false,
                success: function (data) {
                        $('.active').trigger('click');
                },
                error: function (jqXHR, status, err) {
                },
                complete: function () {
                    $(document).ready(function(){
                        $('.active').trigger('click');
                      })
                }
            })
        }
    });

}
// toogle chat



