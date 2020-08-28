@extends('layouts.master')

@section('title', 'Home')

@section('contant')

<body class="container-fluid ">
<style>
    .foot3 {
    background-image: url('https://images.unsplash.com/photo-1586024486164-ce9b3d87e09f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=585&q=80') !important;
    background-size: cover;
    height: 40rem;
    width: 100%;
    color: #fff;
    margin: 20px auto;
}
    body {
  margin: 0;
  padding: 0;
  text-align: center;
  font-family: sans-serif;
}

h3 {
  margin: 30px 0 10px;
  font-size: 34px;
  color: white;
}

.animationBox {
  margin: 30px 0 10px;
  text-align: center;
  display: inline-block;
  position: relative;
}

.animationBox svg {
  margin: 0 auto;
  width: 300px;
  height: 300px;
}

.mobileBody {
  opacity: 0;
  transition: all .4s ease-in-out;
  animation: mobileBody .4s linear forwards;
  animation-delay: .5s;
}

.userOnMobile {
  opacity: 0;
  transition: all .4s ease-in-out;
  animation: userOnMobile .4s linear forwards;
  animation-delay: 1s;
}

.line {
  stroke-dasharray: 440;
  stroke-dashoffset: 440;
  animation: line .8s linear forwards;
  fill: none;
}
h2 {
    margin: 5px 0 .5em !important;
    color: black;
}

.line1 {
  animation-delay: 1.5s;
}

.line2 {
  animation-delay: 2s;
}

.line3 {
  animation-delay: 2.5s;
  stroke-dasharray: 463;
  stroke-dashoffset: 462;
}

.user {
  opacity: 0;
  transition: all .8s ease-in-out;
  animation: user .4s linear forwards;
}

.user1 {
  animation-delay: 3s;
}

.user2 {
  animation-delay: 3.3s;
}

.user3 {
  animation-delay: 3.6s;
}


@keyframes mobileBody {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes userOnMobile {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes line {
  0% {
    stroke-dashoffset: -470;
    fill: none;
  }
  50% {
    stroke-dashoffset: 0;
    fill: none;
  }
  100% {
    stroke-dashoffset: 0;
    fill: #0d73ce;
  }
}

@keyframes user {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
.footer {
  font-size: 12px;
  margin-top: 100px;
  max-width: 585px;
  margin: 0 auto;
  color: #000;
}

.footer a {
  color: #000;
  text-decoration: none;
}
.footer p {
  font-size: 13px;
  margin: 0;
}
</style>

    <!--  -->
    <!-- start slider -->




    <!-- end slider -->
    <!-- end div 2 -->

    <div class="container wow fadeInDown">
        <div class="row box3 right">
            <div class=" col-sm-6 col-md-12 col-lg-6 right">
                <div class="col-12 hvr-underline-reveal" style="margin: 10px auto;">

                    <h2>
                         قم بانشاء حساب جديد </h2>
                    <p>
                       تواصل مع اصدقائك وقم بمشاركة لحظاتك معهم لحظة بلحظة
                    </p>
                </div>
                <br>
               <div class="col-12 hvr-underline-reveal" style="margin: 10px auto;">

                   <h2>
                        انشاء صفحة خاصة بك
                   </h2>
                   <p>
                      انشاء صفحة خاصة بك وتسويق خدماتك , او فكرتك لكي يقوم الجميع بمعرفة افكارك
                   </p>
               </div>
               <br>
                <div class="col-12 hvr-underline-reveal" style="margin: 10px auto;">

                    <h2>

                  متجركـ

                    </h2>
                    <p>
                     يمكنك الان نشر شئ لم تعد تريد استخدامه وبيعه ويمكن الكل ان يراه ويتواصل معك
                    </p>
                </div>

            </div>
            <div class="col-12 col-sm-6 col-lg-6 col-md-12 wow fadeInDown">


<div class="animationBox">
    <svg height="512pt" viewBox="-15 0 512 512.001" width="512pt" xmlns="http://www.w3.org/2000/svg">


        <g class="mobileBody">
            <g fill="#93a3af">
                <path d="m323.476562 158.132812h-13.390624v-81.386718h13.390624c5.691407 0 10.304688 4.613281 10.304688 10.304687v60.78125c0 5.6875-4.613281 10.300781-10.304688 10.300781zm0 0" />
                <path d="m10.300781 251.878906h13.394531v-40.175781h-13.394531c-5.6875 0-10.300781 4.609375-10.300781 10.300781v19.574219c0 5.6875 4.613281 10.300781 10.300781 10.300781zm0 0" />
                <path d="m10.300781 178.734375h13.394531v-101.988281h-13.394531c-5.6875 0-10.300781 4.613281-10.300781 10.304687v81.382813c0 5.691406 4.613281 10.300781 10.300781 10.300781zm0 0" />
                <path d="m10.300781 315.75h13.394531v-40.175781h-13.394531c-5.6875 0-10.300781 4.609375-10.300781 10.300781v19.574219c0 5.6875 4.613281 10.300781 10.300781 10.300781zm0 0" />
            </g>

            <path d="m21.035156 491.394531v-470.789062c0-11.378907 9.226563-20.605469 20.605469-20.605469h250.5c11.378906 0 20.605469 9.226562 20.605469 20.605469v470.792969c0 11.378906-9.226563 20.601562-20.605469 20.601562h-250.5c-11.378906 0-20.605469-9.226562-20.605469-20.605469zm0 0" fill="#7b8c98" />
            <path d="m312.742188 20.605469v470.792969c0 11.382812-9.21875 20.601562-20.601563 20.601562h-20.171875c11.382812 0 20.605469-9.21875 20.605469-20.601562v-470.792969c0-11.386719-9.222657-20.605469-20.605469-20.605469h20.171875c11.382813 0 20.601563 9.21875 20.601563 20.605469zm0 0" fill="#627687" />
            <path d="m21.035156 52.023438h291.710938v407.953124h-291.710938zm0 0" fill="#7fb7ea" />
            <path d="m292.574219 52.023438h20.171875v407.953124h-20.171875zm0 0" fill="#5f9eeb" />
            <path d="m187.0625 35.371094h-40.34375c-4.269531 0-7.726562-3.460938-7.726562-7.726563s3.457031-7.726562 7.726562-7.726562h40.34375c4.269531 0 7.726562 3.460937 7.726562 7.726562s-3.457031 7.726563-7.726562 7.726563zm0 0" fill="#627687" />
        </g>

        <g class="lines">
            <path class="line line1" stroke-width="4" stroke="#0d73ce" d="m202.78125 209.402344c-2.625 0-5.183594-1.339844-6.632812-3.753906-2.195313-3.660157-1.011719-8.40625 2.648437-10.601563l166.128906-103.804687c3.660157-2.195313 8.40625-1.007813 10.601563 2.648437 2.195312 3.660156 1.007812 8.40625-2.652344 10.601563l-166.125 103.808593c-1.246094.746094-2.617188 1.101563-3.96875 1.101563zm0 0" fill="#0d73ce" />

            <path class="line line2" stroke-width="4" stroke="#0d73ce" d="m372.398438 263.726562h-144.589844c-4.265625 0-7.722656-3.460937-7.722656-7.726562s3.457031-7.726562 7.722656-7.726562h144.589844c4.265624 0 7.726562 3.460937 7.726562 7.726562s-3.460938 7.726562-7.726562 7.726562zm0 0" fill="#0d73ce" />
            <path class="line line3" stroke-width="4" stroke="#0d73ce" d="m376.765625 427.410156c-1.351563 0-2.722656-.355468-3.96875-1.101562l-176.058594-111.417969c-3.660156-2.195313-4.847656-6.941406-2.652343-10.601563 2.199218-3.65625 6.945312-4.84375 10.601562-2.648437l176.0625 111.414063c3.660156 2.199218 4.84375 6.941406 2.648438 10.601562-1.445313 2.414062-4.007813 3.753906-6.632813 3.753906zm0 0" fill="#0d73ce" />
        </g>

        <g class="userOnMobile">
            <path d="m234.882812 257.503906c0 8.234375-1.46875 16.128906-4.160156 23.441406-9.546875 25.996094-34.523437 44.546876-63.832031 44.546876s-54.285156-18.550782-63.835937-44.546876c-2.6875-7.3125-4.15625-15.207031-4.15625-23.441406 0-37.5625 30.449218-67.992187 67.992187-67.992187s67.992187 30.429687 67.992187 67.992187zm0 0" fill="#74e2cd" />
            <path d="m230.71875 280.949219c-9.546875 25.992187-34.519531 44.546875-63.828125 44.546875s-54.28125-18.554688-63.832031-44.546875c5.617187-15.304688 16.578125-28.019531 30.617187-35.898438 9.820313-5.511719 21.152344-8.65625 33.214844-8.65625s23.394531 3.140625 33.210937 8.65625c14.042969 7.878907 25.003907 20.589844 30.617188 35.898438zm0 0" fill="#eb5777" />
            <path d="m200.101562 245.050781c-8.828124 7.898438-20.46875 12.699219-33.210937 12.699219s-24.382813-4.800781-33.214844-12.699219c9.820313-5.511719 21.152344-8.65625 33.214844-8.65625s23.394531 3.144531 33.210937 8.65625zm0 0" fill="#ce3f63" />
            <path d="m204.402344 207.875c0 20.71875-16.792969 37.511719-37.511719 37.511719s-37.511719-16.792969-37.511719-37.511719 16.792969-37.511719 37.511719-37.511719 37.511719 16.792969 37.511719 37.511719zm0 0" fill="#f8c298" />
        </g>

        <g class="user user1">
            <path d="m482.402344 79.113281c0 7.480469-1.332032 14.644531-3.773438 21.285157-8.671875 23.597656-31.347656 40.445312-57.957031 40.445312-26.605469 0-49.28125-16.84375-57.953125-40.445312-2.441406-6.640626-3.773438-13.808594-3.773438-21.285157 0-34.101562 27.640626-61.730469 61.726563-61.730469 34.089844 0 61.730469 27.628907 61.730469 61.730469zm0 0" fill="#a0d37d" />
            <path d="m478.625 100.402344c-8.667969 23.597656-31.339844 40.441406-57.949219 40.441406s-49.28125-16.84375-57.953125-40.441406c5.097656-13.898438 15.050782-25.4375 27.796875-32.59375 8.914063-5.003906 19.203125-7.859375 30.15625-7.859375 10.949219 0 21.238281 2.855469 30.152344 7.859375 12.75 7.15625 22.699219 18.695312 27.796875 32.59375zm0 0" fill="#f1dd47" />
            <path d="m450.828125 67.808594c-8.015625 7.171875-18.582031 11.53125-30.152344 11.53125-11.570312 0-22.140625-4.359375-30.15625-11.53125 8.914063-5.003906 19.203125-7.859375 30.15625-7.859375 10.949219 0 21.238281 2.855469 30.152344 7.859375zm0 0" fill="#efc40f" />
            <path d="m454.734375 34.058594c0 18.808594-15.25 34.058594-34.058594 34.058594-18.8125 0-34.058593-15.25-34.058593-34.058594s15.246093-34.058594 34.058593-34.058594c18.808594 0 34.058594 15.25 34.058594 34.058594zm0 0" fill="#f8c298" />
        </g>

        <g class="user user2">
            <path d="m482.402344 264.691406c0 7.480469-1.332032 14.644532-3.773438 21.285156-8.671875 23.597657-31.347656 40.445313-57.957031 40.445313-26.605469 0-49.28125-16.84375-57.953125-40.445313-2.441406-6.640624-3.773438-13.808593-3.773438-21.285156 0-34.101562 27.640626-61.730468 61.726563-61.730468 34.089844 0 61.730469 27.628906 61.730469 61.730468zm0 0" fill="#74e2cd" />
            <path d="m478.625 285.980469c-8.667969 23.597656-31.339844 40.441406-57.949219 40.441406s-49.28125-16.84375-57.953125-40.441406c5.097656-13.898438 15.050782-25.441407 27.796875-32.59375 8.914063-5.003907 19.203125-7.859375 30.15625-7.859375 10.949219 0 21.238281 2.855468 30.152344 7.859375 12.75 7.152343 22.699219 18.695312 27.796875 32.59375zm0 0" fill="#3a82d0" />
            <path d="m450.828125 253.386719c-8.015625 7.171875-18.582031 11.53125-30.152344 11.53125-11.570312 0-22.140625-4.359375-30.15625-11.53125 8.914063-5.003907 19.203125-7.859375 30.15625-7.859375 10.949219 0 21.238281 2.855468 30.152344 7.859375zm0 0" fill="#0d73ce" />
            <path d="m454.734375 219.636719c0 18.808593-15.25 34.054687-34.058594 34.054687-18.8125 0-34.058593-15.246094-34.058593-34.054687 0-18.8125 15.246093-34.058594 34.058593-34.058594 18.808594 0 34.058594 15.246094 34.058594 34.058594zm0 0" fill="#ffd6c0" />
        </g>

        <g class="user user3">
            <path d="m482.402344 450.269531c0 7.476563-1.332032 14.644531-3.773438 21.285157-8.671875 23.597656-31.347656 40.441406-57.957031 40.441406-26.605469 0-49.28125-16.84375-57.953125-40.441406-2.441406-6.640626-3.773438-13.808594-3.773438-21.285157 0-34.101562 27.640626-61.730469 61.726563-61.730469 34.089844 0 61.730469 27.628907 61.730469 61.730469zm0 0" fill="#faaa3c" />
            <path d="m478.625 471.558594c-8.667969 23.597656-31.339844 40.441406-57.949219 40.441406s-49.28125-16.84375-57.953125-40.441406c5.097656-13.898438 15.050782-25.441406 27.796875-32.59375 8.914063-5.003906 19.203125-7.859375 30.15625-7.859375 10.949219 0 21.238281 2.855469 30.152344 7.859375 12.75 7.152344 22.699219 18.695312 27.796875 32.59375zm0 0" fill="#74e2cd" />
            <path d="m450.828125 438.964844c-8.015625 7.171875-18.582031 11.53125-30.152344 11.53125-11.570312 0-22.140625-4.359375-30.15625-11.53125 8.914063-5.003906 19.203125-7.859375 30.15625-7.859375 10.949219 0 21.238281 2.855469 30.152344 7.859375zm0 0" fill="#4fceb7" />
            <path d="m454.734375 405.214844c0 18.808594-15.25 34.054687-34.058594 34.054687-18.8125 0-34.058593-15.246093-34.058593-34.054687 0-18.8125 15.246093-34.058594 34.058593-34.058594 18.808594 0 34.058594 15.246094 34.058594 34.058594zm0 0" fill="#ba6f3c" />
        </g>

    </svg>
</div>




            </div>

        </div>
    </div>
    <!-- end div3 -->
    <!-- start ser -->
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInDown" style="font-size: 1.5rem;
                margin: 17px auto;
                background-color: transparent;
                border: 1px solid;
                border-radius: 10px;
                text-align: center;
                padding: .5rem;">
                ما يقدمه لك  مجالـ

            </div>

        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="row box4 wow fadeInDown zoomIn	" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="col-sm-4 col-12 box4-a hvr-glow">
                    <i class="fa fa-user-circle-o col-12" style="font-size: 5rem; margin-bottom: 1rem;" aria-hidden="true"></i>
                    <h4 class="col-12">
                      انشئ صفحتك الشخصية الان
                    </h4>
                    <div class="col-12">
                     توصل مع اصدقاء جدد وقوم بصناعة علاقات جديدة اينما كنت يوفر لك  سهولة التواصل
                    </div>
                </div>
                <hr>
                <div class="col-sm-4 col-12 box4-a hvr-glow">
                    <i class="fa fa-flag col-12" style=" font-size: 5rem;  padding-bottom: 1rem; " aria-hidden="true"></i>
                    <h4 class="col-12">
                     قم بادارة نشاطك
                    </h4>

                    <div class="col-12">
                   قم بنشاء صفحة تجارية لك لكي توسع نشاط عملك وتسوقيه والاستفاده منه قدر الامكان
                    </div>
                </div>
                <hr>
                <div class="col-sm-4 col-12 box4-a hvr-glow">
                    <i class="fa fa-headphones col-12" style="font-size: 5rem; margin-bottom: 1rem; " aria-hidden="true"></i>
                    <h4 class="col-12">
                        قائمة موسيقي خاصة بك
                    </h4>
                    <div class="col-12">
                       قم بعمل قائمة موسيقي خاصة بك لتستمتع بها وانت تتصفح صفحتك الشخصية </div>
                </div>
            </div>
        </div>
        <div class="container" style="background-color: white;">
        <svg version="1.1" id="svg-animation-example" class="svg-line-drawing rtl-magazine-animation" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" width="720" height="310" viewBox="0 0 720 310" xml:space="preserve" aria-hidden="true" >
	  <defs>
		 <clipPath id="mask-page">
			<path class="stroke-alt stroke-width linecap" d="m240,275 l240,0 0,-217 -240,0z" />
		 </clipPath>
	  </defs>
	  <!-- content page -->
	  <g clip-path="url(#mask-page)">
		 <g class="ani-move-page is-animated">
			<!-- section one -->
			<path class="stroke stroke-width linecap" d="m0,275 m254,-203 l212,0 0,112 -212,0z" fill="none" />
			<path class="stroke-alt stroke-width linecap" d="m0,275 m272,-172 a13 13 180 0 1 26,0 a13 13 180 0 1 -26,0" fill="none" />
			<path class="stroke stroke-width linecap" d="m0,275 m254,-203 m22,112 l34,-44 a9 9 180 0 1 13,-1 l15,16 38,-48 a5 5 180 0 1 8.4,0 l60,77" fill="none" />
			<path class="stroke stroke-width linecap" d="m0,275 m254,-67 l212,0 m-212,10 l54,0 m25,0 l54,0 m25,0 l54,0 m-212,10 l54,0 m25,0 l54,0 m25,0 l54,0" fill="none" />
			<!-- button section one -->
			<path class="stroke stroke-width linecap" d="m350,250 a10 10 180 0 1 20,0 a10 10 180 0 1 -20,0 m6.8,-1.7 l3.2,3.2 3.2,-3.2" fill="none" />
			<path class="stroke stroke-width linecap" d="m318,290 l0,430" fill="none" />
			<path class="stroke stroke-width linecap" d="m333,306 l54,0 m-54,10 l54,0 m-54,10 l133,0 m-133,10 l133,0" fill="none" />
			<path class="stroke stroke-width linecap" d="m333,356 l133,0 0,78 -133,0 0,-78 m0,90 l54,0 m-54,10 l54,0 m-54,20 133,0 0,78 -133,0 0,-78 m0,90 l54,0 m-54,10 l54,0 m-54,20 133,0 0,78 -133,0 0,-78 m0,90 l54,0 m-54,10 l54,0 m-54,20" fill="none" />
			<!-- section two -->
			<path class="stroke stroke-width linecap" d="m0,680 m0,275 m254,-203 l212,0 0,112 -212,0z" fill="none" />
			<path class="stroke-alt stroke-width linecap" d="m0,680 m0,275 m272,-172 a13 13 180 0 1 26,0 a13 13 180 0 1 -26,0" fill="none" />
			<path class="stroke stroke-width linecap" d="m0,680 m0,275 m254,-203 m22,112 l34,-44 a9 9 180 0 1 13,-1 l15,16 38,-48 a5 5 180 0 1 8.4,0 l60,77" fill="none" />
			<path class="stroke stroke-width linecap" d="m0,680 m0,275 m254,-67 l212,0 m-212,10 l54,0 m25,0 l54,0 m25,0 l54,0 m-212,10 l54,0 m25,0 l54,0 m25,0 l54,0" fill="none" />
			<!-- button section two -->
			<path class="stroke stroke-width linecap" d="m0,680 m350,250 a10 10 180 0 1 20,0 a10 10 180 0 1 -20,0 m6.8,-1.7 l3.2,3.2 3.2,-3.2" fill="none" />
		 </g>
		 <g class="ani-move-menu is-animated">
			<g>
			   <path class="stroke stroke-width linecap" d="m254,306 l54,0 m-54,10 l54,0 m-54,10 l54,0 m-54,10 l54,0" fill="none" />
			</g>
		 </g>
	  </g>
	  <!-- fade button -->
	  <g class="ani-fade-button is-animated" opacity="0" >
		 <path class="stroke-background stroke-overlay linecap" d="m350,250 a10 10 180 0 1 20,0 a10 10 180 0 1 -20,0 m6.8,-1.7 l3.2,3.2 3.2,-3.2" fill="none" />
		 <path class="stroke-alt stroke-width linecap" d="m350,250 a10 10 180 0 1 20,0 a10 10 180 0 1 -20,0 m6.8,-1.7 l3.2,3.2 3.2,-3.2" fill="none" />
	  </g>
	  <!-- baseline -->
	  <path class="stroke stroke-width linecap" d="m0,275 l240,0 0,-230 a5 5 90 0 1 5,-5 l230,0 a5 5 90 0 1 5,5 l0,230 240,0" fill="none" />
	  <path class="stroke stroke-width linecap" d="m0,275 m240,-217 l240,0" fill="none" />
	  <path class="stroke stroke-width linecap" d="m0,275 m240,-226 m10,0 a4 4 180 0 1 8,0 a4 4 180 0 1 -8,0 m14,0 a4 4 180 0 1 8,0 a4 4 180 0 1 -8,0 m14,0 a4 4 180 0 1 8,0 a4 4 180 0 1 -8,0" fill="none" />
	  <defs>
		 <style>

			.svg-line-drawing {
			   width: 100%;
			}

			.svg-line-drawing .stroke-background {
			   stroke: #eddd3e;
			}

			.svg-line-drawing .stroke {
			   stroke: #12353C;
			}

			.svg-line-drawing .stroke-alt {
			   stroke: #ffffff;
			}

			.svg-line-drawing .stroke-width {
			   stroke-width: 2;
			}

			.svg-line-drawing .stroke-overlay {
			   stroke-width: 3;
			}

			.svg-line-drawing .linecap {
			   stroke-linecap: round;
			   stroke-linejoin: round;
			}

			.rtl-magazine-animation .ani-fade-button,
			.rtl-magazine-animation .ani-move-page,
			.rtl-magazine-animation .ani-move-menu {
			   -webkit-animation-duration: 5500ms;
					 animation-duration: 5500ms;
			   -webkit-animation-timing-function: ease;
					 animation-timing-function: ease;
			   -webkit-animation-delay: 100ms;
					 animation-delay: 100ms;
			   -webkit-animation-iteration-count: infinite;
					 animation-iteration-count: infinite;
			}

			.rtl-magazine-animation .ani-fade-button {
			   -webkit-animation-name: fade-button;
					 animation-name: fade-button;
			}

			.rtl-magazine-animation .ani-move-page {
			   -webkit-animation-name: move-page;
					 animation-name: move-page;
			}

			.rtl-magazine-animation .ani-move-menu {
			   -webkit-animation-name: move-menu;
					 animation-name: move-menu;
			}

			@-webkit-keyframes fade-button {
			   0%, 12%, 100% { opacity: 0; }
			   9%, 11% { opacity: 1; }
			}

			@keyframes fade-button {
			   0%, 12%, 100% { opacity: 0; }
			   9%, 11% { opacity: 1; }
			}

			@-webkit-keyframes move-page {
			   0%, 14%, 100% { -webkit-transform: translateY(0px); -webkit-animation-timing-function: ease-in; }
			   28% { -webkit-transform: translateY(-220px); -webkit-animation-timing-function: linear; }
			   80%, 99.9999% { -webkit-transform: translateY(-680px); -webkit-animation-timing-function: linear; }
			}

			@keyframes move-page {
			   0%, 14%, 100% { transform: translateY(0px); animation-timing-function: ease-in; }
			   28% { transform: translateY(-220px); animation-timing-function: linear; }
			   80%, 99.9999% { transform: translateY(-680px); animation-timing-function: linear; }
			}

			@-webkit-keyframes move-menu {
			   0%, 14%, 100% { -webkit-transform: translateY(0px); -webkit-animation-timing-function: ease-in; }
			   28%, 68.6957% { -webkit-transform: translateY(-220px); -webkit-animation-timing-function: linear; }
			   80% { -webkit-transform: translateY(-320px); -webkit-animation-timing-function: linear; }
			   99.9999% { -webkit-transform: translateY(-680px); -webkit-animation-timing-function: linear; }
			}

			@keyframes move-menu {
			   0%, 14%, 100% { transform: translateY(0px); animation-timing-function: ease-in; }
			   28%, 68.6957% { transform: translateY(-220px); animation-timing-function: linear; }
			   80% { transform: translateY(-320px); animation-timing-function: linear; }
			   99.9999% { transform: translateY(-680px); animation-timing-function: linear; }
			}

		 </style>
	  </defs>
   </svg>


        </div>
        <!--  -->
        <div class="container">
            <div class="row box4 wow fadeInDown">
                <div class="col-sm-4 col-12 box4-a hvr-glow">
                    <i class="fa fa-shopping-bag  col-12" style="font-size: 5rem; margin-bottom: 1rem;" aria-hidden="true"></i>
                    <h2 class="col-12">
                      يمكنك بيع و شراء
                    </h2>
                    <div class="col-12">
يمكنك بيع اشياء التي لا تعد تستخدمها  او شراء شئ تريد استخدمها
                    </div>
                </div>
                <hr>
                <div class="col-sm-4 col-12 box4-a hvr-glow">
                    <i class="fa fa-users col-12" style=" font-size: 5rem;  padding-bottom: 1rem; " aria-hidden="true"></i>
                    <h2 class="col-12">
                        اكتشاف اصدقاء جدد
                    </h2>

                    <div class="col-12">
                   يمكنك تواصل واكتشاف اصدقاء جدد في نفس مجالك

                    </div>
                </div>
                <hr>
                <div class="col-sm-4 col-12 box4-a hvr-glow">
                    <i class="fa fa-comments-o" style="font-size: 5rem; margin-bottom: 1rem; " aria-hidden="true"></i>
                    <h2 class="col-12">
                   الدردشة و التواصل
                    </h2>
                    <div class="col-12">
      يمكنك التواصل مع اصدقاء بكل سهولة بدون مشاكل
                     </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end ser -->

    <!-- end some sirves -->

    <div class="container-fluid">



        <div class="row foot2 wow fadeInDown justify-content-center center">

            <div class="col-md-4 col-12">
                <a class="btn btn-light" href="{{ route('register') }}"> سجل الان</a>
            </div>

            <div class="col-md-8 col-12" style="color: white;">
                هل أنت جاهز لبدء للانضمام لدينا ؟
            </div>
        </div>
        <!-- end foot2 -->

    </div>

    <!-- footer -->

<script>
    var svg = document.getElementById('svg-animation-example');
	var changeSvgStyleButton = window.document.getElementById('change-svg-style-button');

	var changeSvgStyle = function() {
		var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
		var anotherRandomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
		var randomStrokeWidth = Math.floor(Math.random() * 8) + 1;
		[].forEach.call(svg.querySelectorAll('.svg-line-drawing .stroke'), function (element) {
			element.setAttribute('style', 'stroke:' + randomColor + ';stroke-width: ' + randomStrokeWidth + ';');
		});
		[].forEach.call(svg.querySelectorAll('.svg-line-drawing .stroke-alt'), function (element) {
			element.setAttribute('style', 'stroke:' + anotherRandomColor + ';stroke-width: ' + randomStrokeWidth + ';');
		})
	};
    var Typer = function(element) {
  this.element = element;
  var delim = element.dataset.delim || ",";
  var words = element.dataset.words || "override these,sample typing";
  this.words = words.split(delim).filter((v) => v); // non empty words
  this.delay = element.dataset.delay || 200;
  this.loop = element.dataset.loop || "true";
  if (this.loop === "false" ) { this.loop = 1 }
  this.deleteDelay = element.dataset.deletedelay || element.dataset.deleteDelay || 800;

  this.progress = { word: 0, char: 0, building: true, looped: 0 };
  this.typing = true;

  var colors = element.dataset.colors || "";
  this.colors = colors.split(",");
  this.element.style.color = this.colors[0];
  this.colorIndex = 0;

  this.doTyping();
};

Typer.prototype.start = function() {
  if (!this.typing) {
    this.typing = true;
    this.doTyping();
  }
};
Typer.prototype.stop = function() {
  this.typing = false;
};
Typer.prototype.doTyping = function() {
  var e = this.element;
  var p = this.progress;
  var w = p.word;
  var c = p.char;
  var currentDisplay = [...this.words[w]].slice(0, c).join("");
  var atWordEnd;
  if (this.cursor) {
    this.cursor.element.style.opacity = "1";
    this.cursor.on = true;
    clearInterval(this.cursor.interval);
    this.cursor.interval = setInterval(() => this.cursor.updateBlinkState(), 400);
  }

  e.innerHTML = currentDisplay;

  if (p.building) {
    atWordEnd = p.char === this.words[w].length;
    if (atWordEnd) {
      p.building = false;
    } else {
      p.char += 1;
    }
  } else {
    if (p.char === 0) {
      p.building = true;
      p.word = (p.word + 1) % this.words.length;
      this.colorIndex = (this.colorIndex + 1) % this.colors.length;
      this.element.style.color = this.colors[this.colorIndex];
    } else {
      p.char -= 1;
    }
  }

  if (p.word === this.words.length - 1) {
    p.looped += 1;
  }

  if (!p.building && this.loop <= p.looped){
    this.typing = false;
  }

  setTimeout(() => {
    if (this.typing) { this.doTyping() };
  }, atWordEnd ? this.deleteDelay : this.delay);
};

var Cursor = function(element) {
  this.element = element;
  this.cursorDisplay = element.dataset.cursordisplay || element.dataset.cursorDisplay || "_";
  element.innerHTML = this.cursorDisplay;
  this.on = true;
  element.style.transition = "all 0.1s";
  this.interval = setInterval(() => this.updateBlinkState(), 400);
}
Cursor.prototype.updateBlinkState = function() {
  if (this.on) {
    this.element.style.opacity = "0";
    this.on = false;
  } else {
    this.element.style.opacity = "1";
    this.on = true;
  }
}

function TyperSetup() {
  var typers = {};
  for (let e of document.getElementsByClassName("typer")) {
    typers[e.id] = new Typer(e);
  }
  for (let e of document.getElementsByClassName("typer-stop")) {
    let owner = typers[e.dataset.owner];
    e.onclick = () => owner.stop();
  }
  for (let e of document.getElementsByClassName("typer-start")) {
    let owner = typers[e.dataset.owner];
    e.onclick = () => owner.start();
  }
  for (let e of document.getElementsByClassName("cursor")) {
    let t = new Cursor(e);
    t.owner = typers[e.dataset.owner];
    t.owner.cursor = t;
  }
}

TyperSetup();

</script>


</body>

<style>
@brand-default: #12353C;
@brand-highlight: #EDDD3E;
@base-sans: sans-serif;

body {
  text-align: center;
}

.btn {
	font-family: @base-sans;
	font-weight: 400;
	border: 0;
	padding: 0.5rem 1rem;
	display: inline-block;
	text-decoration: none;
	color: @brand-default;

	&:focus,
	&:hover {
		border: 0;
	}
}

.btn-primary {
	background-color: @brand-highlight;
	color: @brand-default;

	&:focus,
	&:hover {
		color: @brand-default;
		background-color: darken(@brand-highlight, 10%);
		transition: background-color 250ms ease;
		border: 0;
	}
}

* {
    font-family: font1;
    font-size: 15px;
    box-sizing: border-box
}
body{
   color: white !important;
}
.center {
    text-align: center
}

.left {
    text-align: left
}

.right {
    text-align: right
}

.box {
    height: 50px;
    margin: 10px;
    display: flex;
    flex-wrap: wrap;
    margin: 0;
    justify-content: flex-end;
    background-color: #71df77;
    align-content: center
}

.box button {
    background-color: transparent;
    border: none
}

.box button:hover {
    border: 1px solid #fff
}

.box1 {
    justify-content: flex-end;
    display: flex
}

.box span {
    font-size: 13px
}

div {
    flex-basis: 100%;
    align-items: flex-end
}

i {
    margin-right: 5px;
    font-size: 4.rem!important
}

.div1 {
    background-color: #0ff
}

.div2 {
    background-color: #e7eeee;
    order: 1;
    flex-grow: 3
}

.div3 {
    background-color: #657714;
    order: 4;
    flex-grow: 3
}

.div4 {
    background-color: #28a32e;
    order: 3;
    flex-grow: 3
}

.box2 {
    background-image: url(../img/georgie-cobbs-459520-unsplash.jpg);
    background-size: cover;
    opacity: 10;
    height: 37rem;
    backdrop-filter: inherit
}

.box2 p {
    padding: 68px;
    display: flex;
    justify-content: center;
    color: #fff;
    font-size: 31px
}

.sear {
    background-color: transparent!important
}

.box3 {
    margin: 10px
}

.box3 p {
    font-size: 1.rem!important
}

.box3 h2 {
    font-size: 1.5rem
}

.box4,
.box5,
.box6 {
    padding: 30px;
    text-align: center;
    border-radius: 20px 20px
}

.box4 .ico {
    justify-content: center;
    display: flex
}

.box5 .ico {
    justify-content: center;
    display: flex
}

.box6 .ico {
    justify-content: center;
    display: flex
}

div .con {
    font-size: 4rem
}

.box4-a {
    margin: 10px auto;
    height: 220px;
    border-radius: 20px 20px;
    padding: 26px 0
}

.box7 {
    margin: 21px auto;
    padding: 30px;
    text-align: center;
    background-image: url(../img/georgie-cobbs-459520-unsplash.jpg);
    opacity: 1;
    background-attachment: fixed;
    background-size: cover
}
#footer{
    display: none;
}
.foot button {
    background: 0 0;
    border: 1px solid;
    margin: 1rem auto;
    padding: 1rem;
    text-align: right;
    height: 70px;
    color: white;
}

.foot2 {
    background-color: #e44d3a;
    margin: 1rem auto;
    padding: 1rem
}

.foot3 {
    background-image: url(../img/dustin-lee-19667-unsplash.jpg);
    background-size: cover;
    height: 40rem;
    width: 100%;
    color: #fff;
    margin: 20px auto
}

.foot3 button {
    padding: 1rem;
    background: 0 0;
    border: 1px solid;
    color: #f8f8ff;
    font-weight: bolder;
    width: 162px
}

.foot3 button:hover {
    animation-duration: 3s;
    animation-delay: 2s;
    animation-iteration-count: infinite
}

.footr button {
    padding: .4rem 1.1rem;
    text-align: center
}

.footr a {
    display: block
}

.end {
    padding: 2rem;
    color: #fff;
    background-color: #c0b5b53d
}

.mmg {
    width: 100%;
    height: 300px
}

#btntop {
    position: fixed;
    right: 15px;
    bottom: 40px;
    font-size: 22px;
    width: 20px;
    color: #000;
    cursor: pointer
}

.seldr {
    background-image: url('https://images.unsplash.com/photo-1530362537312-c0f5a88dafc1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=753&q=80');
    background-size: cover;
    background-attachment: fixed;
    background-position: top top !important;

    margin: 0;
    height: 500px
}

#hd {
    color: gold!important;
    font-size: 2rem;
    margin-top: 80px;
    background-color: rgba(0, 0, 0, .26);
    padding: 30px
}

.pad {
    margin: 0;
    padding: 0!important
}
</style>
@endsection
