<style>
.main-footer {
	 border-bottom: 5px solid #ffee00;
}
 .main-footer .footer-content #socail-links {
	 list-style: none;
	 padding-bottom: 30px;
	 padding-top: 30px;
}
 .main-footer .footer-content #socail-links li {
	 display: inline-block;
	 padding-right: 10px;
}
 .main-footer .footer-content #socail-links li a {
	 -webkit-transition: all .3s ease-in-out;
	 border: 1px solid #131212;
	 color: #131212;
	 font-size: 22px;
	 transition: all .3s ease-in-out;
}
 .main-footer .footer-content #socail-links li a:focus {
	 background-color: #ffee00;
	 border: 1px solid #ffee00;
}
 .main-footer .footer-content #socail-links li a>i {
	 height: 40px;
	 line-height: 40px;
	 text-align: center;
	 width: 40px;
	 color: black;
}
 .main-footer .footer-content #socail-links li a:hover {
	 background-color: greenyellow ;
	 border: 1px solid ;
}
 .main-footer .footer-content p {
	 font-size: 17px;
	 color: black ;
}


</style>
         <script>
            $(function() {
                var header = $(".main-footer");
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();

                    if (scroll >= 100) {
                        header.removeClass('socail-links').addClass("bg-light");
                    } else {
                        header.removeClass("change").addClass('header');
                    }
                });
            });</script>

<div class="container-fluid">
    <div class="row end center wow fadeInDown bg-dark">
        <div class="col-12">
            subsidiary of Amin. All rights reserved 2020 <a href="{{ url('/about') }}">Campo</a>.com ©
        </div>
    </div>
</div>
