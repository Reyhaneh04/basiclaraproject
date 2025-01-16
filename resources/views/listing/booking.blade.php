<x-layout :cities="$cities" >


<meta name="csrf-token" content="{{ csrf_token() }}">


@if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

<div class="blocks" id="section-block">


<div class="it-movie-order-info"  >
    <!-- بخش فیلم -->
    <div class="movie-section">
        <a href="/movie/46927/ببعی-قهرمان" title="ببعی قهرمان" class="it-light-heading movie-name">
            <i class="fa fa-film movie-icon"></i> 
 {{$showtime->movie->title }}
        </a>
    </div>

    <!-- بخش سینما -->
    <div class="cinema-section">
        <a href="/places/1192/پردیس-سینمایی-مگامال" title="پردیس سینمایی مگامال" class="it-light-heading cinema-name">
            <i class="fa fa-map-marker-alt cinema-icon"></i> 
            <span>{{$showtime->cinema->name }}</span>
        </a>
    </div>

   <!-- بخش تاریخ -->
   <div class="it-order-date order-page">
        <p class="it-light-heading order-page no-gutter" style="margin-right:39%">
         {{ \Morilog\Jalali\Jalalian::fromDateTime($showtime->date)->format('Y/m/d') }}</p>
    </div>


    <div class="it-order-sans link overflow-hidden">
    <div class="sans-box">
        <div class="circle-tick">
            <i class="fa fa-check"></i> 
        </div>
        <span class="sans-time">{{$showtime->time}}</span>
        <span class="sans-room">{{$showtime->hall}}</span>
    </div>
</div>


<div class="it-order-facture" >
    <ul class="it-ticket-holder link" id="ticket-list" >
        <!-- صندلی‌های انتخاب شده به اینجا اضافه خواهند شد -->
    </ul>
    
    <div class="it-order-totall-ticket-price">
        <div class="invoice-item">
            <p class="it-text2">مبلغ کل</p>
            <div class="row flex-column no-gutters">
                <p class="it-text2 it-price" id="total-price"><span>0</span> <span class="it-toman light"></span></p>
            </div>
        </div>
      
    </div>
    <button class="it-order-sale-btn horizontal-dashed-divider" id="buyButton">
        <p class="it-light-heading no-gutter black-text">
            <span><span>خرید</span></span>
        </p>
    </button>
</div>



    </div>

<div class="t-lg-align-center" style="margin-right:60pt;width: 88%;margin-top:-400pt; "  >
    <div class="it-lg-row-box it-flex-central" style="margin-right:32%;"  >
    <div class="it-order-legend flex-wrap" >
    <div class="it-legend ml-10 empty w-33 m-bottom-16" style="right:-20pt;background-color:#2b2b31; border-radius: 50%;border: 1px solid #fff;">
        <p class="it-text" style="position: absolute; top: 0px;right:20pt;width:10pt;" >آزاد</p>
    </div>
    <div class="it-legend ml-10 empty w-33 m-bottom-16" style="background-color:darkgray;border-radius: 50%;border: 1px solid #2b2b31;">
        <p class="it-text" style="position: absolute; top: 0px; right:20pt;width:50pt">فروخته شد</p>
    </div>
</div>

</div>
    <div class="it-seats-overflow center" style="margin-right:425pt;border-radius:10pt" >
        <div id="sectionElement" class="it-lg-row-box with-curtain" style="width: 632px; height: 438px;">
        <div class="it-curtain">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 600 36" xml:space="preserve">
                <g id="show_curtain" transform="translate(0 0.003)"><path fill="#575757" d="M0,26.6c199.7-15.3,400.3-15.3,600,0V19C396.1-6.3,213.9-6.3,0,19V26.6z">

                </path> <path fill="#CBCBCB" d="M29.3,36C222,11.7,377.9,11.7,570.7,36l29.3-9.4c-199.2-25-400.8-25-600,0L29.3,36z"></path>
            </g>
        </svg>
         <p class="it-curtain-text w-100">
                                        پرده نمایش


                                </p>

                           

                            
                            
                            
                            </div> 
                            <div class="it-block-seats elements" style="width: 632px; height: 238px;">
                            <div class="it-seat" style="left: 125px; top: 0px; width: 21px; height: 21px;">
                            <input type="checkbox" data-title="true" data-type="seat"  data-zoom="1"  class="inp"   data-sold="true" id="A11"> <span class="num sold">
                                                    11

                                                </span></div>
                                          
                                                <div class="it-seat" style="left: 160px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A10"  data-sold="true"> <span class="num sold">
                                                    10

                                                </span></div><div class="it-seat" style="left: 195px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A9"  data-sold="true"> <span class="num sold">
                                                    9

                                                </span></div><div class="it-seat" style="left: 230px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A8"  data-sold="true"> <span class="num sold">
                                                    8

                                                </span></div><div class="it-seat" style="left: 265px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="A7"  data-sold="true"> <span class="num sold">
                                                    7

                                                </span></div><div class="it-seat" style="left: 300px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A6"  data-sold="true"> <span class="num sold">
                                                    6

                                                </span></div><div class="it-seat" style="left: 335px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A5"  data-sold="true"> <span class="num sold">
                                                    5

                                                </span></div><div class="it-seat" style="left: 370px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A4"> <span class="num">
                                                    4

                                                </span></div><div class="it-seat" style="left: 405px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="A3"> <span class="num">
                                                    3

                                                </span></div><div class="it-seat" style="left: 440px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp"id="A2"> <span class="num">
                                                    2

                                                </span></div><div class="it-seat" style="left: 475px; top: 0px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp"  id="A1"> <span class="num">
                                                    1

                                                </span></div><div class="it-seat" style="left: 73px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp"  id="B14"> <span class="num">
                                                    14

                                                </span></div><div class="it-seat" style="left: 108px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B13"> <span class="num">
                                                    13

                                                </span></div><div class="it-seat" style="left: 143px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B12"> <span class="num">
                                                    12

                                                </span></div><div class="it-seat" style="left: 178px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true" data-type="seat"  data-zoom="1"  class="inp" id="B11"> <span class="num">
                                                    11

                                                </span></div><div class="it-seat" style="left: 213px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B10"> <span class="num">
                                                    10

                                                </span></div><div class="it-seat" style="left: 248px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B9"> <span class="num">
                                                    9

                                                </span></div><div class="it-seat" style="left: 283px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B8"> <span class="num">
                                                    8

                                                </span></div><div class="it-seat" style="left: 318px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1" class="inp" id="B7"> <span class="num">
                                                    7

                                                </span></div><div class="it-seat" style="left: 353px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"class="inp" id="B6"> <span class="num">
                                                    6

                                                </span></div><div class="it-seat" style="left: 388px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="B5"> <span class="num">
                                                    5

                                                </span></div><div class="it-seat" style="left: 423px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="B4"> <span class="num">
                                                    4

                                                </span></div><div class="it-seat" style="left: 458px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B3"> <span class="num">
                                                    3

                                                </span></div><div class="it-seat" style="left: 493px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="B2"> <span class="num">
                                                    2

                                                </span></div><div class="it-seat" style="left: 528px; top: 35px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="B1"> <span class="num">
                                                    1

                                                </span></div><div class="it-seat" style="left: 73px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C14"> <span class="num">
                                                    14

                                                </span></div><div class="it-seat" style="left: 108px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C13"> <span class="num">
                                                    13

                                                </span></div><div class="it-seat" style="left: 143px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C12"> <span class="num">
                                                    12

                                                </span></div><div class="it-seat" style="left: 178px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C11"> <span class="num">
                                                    11

                                                </span></div><div class="it-seat" style="left: 213px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C10"> <span class="num">
                                                    10

                                                </span></div><div class="it-seat" style="left: 248px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C9"> <span class="num">
                                                    9

                                                </span></div><div class="it-seat" style="left: 283px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C8"> <span class="num">
                                                    8

                                                </span></div><div class="it-seat" style="left: 318px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true" data-type="seat"  data-zoom="1"  class="inp" id="C7"> <span class="num">
                                                    7

                                                </span></div><div class="it-seat" style="left: 353px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C6"> <span class="num">
                                                    6

                                                </span></div><div class="it-seat" style="left: 388px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C5"> <span class="num">
                                                    5

                                                </span></div><div class="it-seat" style="left: 423px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C4"> <span class="num">
                                                    4

                                                </span></div><div class="it-seat" style="left: 458px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C3"> <span class="num">
                                                    3

                                                </span></div><div class="it-seat" style="left: 493px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C2"> <span class="num">
                                                    2

                                                </span></div><div class="it-seat" style="left: 528px; top: 70px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="C1"> <span class="num">
                                                    1

                                                </span></div><div class="it-seat" style="left: 73px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="D14"> <span class="num">
                                                    14

                                                </span></div><div class="it-seat" style="left: 108px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D13"> <span class="num">
                                                    13

                                                </span></div><div class="it-seat" style="left: 143px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D12"> <span class="num">
                                                    12

                                                </span></div><div class="it-seat" style="left: 178px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D11"> <span class="num">
                                                    11

                                                </span></div><div class="it-seat" style="left: 213px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="D10"> <span class="num">
                                                    10

                                                </span></div><div class="it-seat" style="left: 248px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D9"> <span class="num">
                                                    9

                                                </span></div><div class="it-seat" style="left: 283px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D8"> <span class="num">
                                                    8

                                                </span></div><div class="it-seat" style="left: 318px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="D7"> <span class="num">
                                                    7

                                                </span></div><div class="it-seat" style="left: 353px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="D6"> <span class="num">
                                                    6

                                                </span></div><div class="it-seat" style="left: 388px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D5"> <span class="num">
                                                    5

                                                </span></div><div class="it-seat" style="left: 423px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="D4"> <span class="num">
                                                    4

                                                </span></div><div class="it-seat" style="left: 458px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="D3"> <span class="num">
                                                    3

                                                </span></div><div class="it-seat" style="left: 493px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D2"> <span class="num">
                                                    2

                                                </span></div><div class="it-seat" style="left: 528px; top: 105px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="D1"> <span class="num">
                                                    1

                                                </span></div><div class="it-seat" style="left: 73px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="E14"> <span class="num">
                                                    14

                                                </span></div><div class="it-seat" style="left: 108px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="E13"> <span class="num">
                                                    13

                                                </span></div><div class="it-seat" style="left: 143px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1" class="inp" id="E12"> <span class="num">
                                                    12

                                                </span></div><div class="it-seat" style="left: 178px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="E11"> <span class="num">
                                                    11

                                                </span></div><div class="it-seat" style="left: 213px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E10"> <span class="num">
                                                    10

                                                </span></div><div class="it-seat" style="left: 248px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E9"> <span class="num">
                                                    9

                                                </span></div><div class="it-seat" style="left: 283px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E8"> <span class="num">
                                                    8

                                                </span></div><div class="it-seat" style="left: 318px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="E7"> <span class="num">
                                                    7

                                                </span></div><div class="it-seat" style="left: 353px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E6"> <span class="num">
                                                    6

                                                </span></div><div class="it-seat" style="left: 388px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E5"> <span class="num">
                                                    5

                                                </span></div><div class="it-seat" style="left: 423px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E4"  data-sold="true"> <span class="num sold">
                                                    4

                                                </span></div><div class="it-seat" style="left: 458px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E3"  data-sold="true"> <span class="num sold">
                                                    3

                                                </span></div><div class="it-seat" style="left: 493px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E2"  data-sold="true"> <span class="num sold">
                                                    2

                                                </span></div><div class="it-seat" style="left: 528px; top: 140px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="E1"  data-sold="true"> <span class="num sold">
                                                    1

                                                </span></div><div class="it-seat" style="left: 73px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F14"> <span class="num">
                                                    14

                                                </span></div><div class="it-seat" style="left: 108px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F13"> <span class="num">
                                                    13

                                                </span></div><div class="it-seat" style="left: 143px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true" data-type="seat"  data-zoom="1"  class="inp" id="F12"> <span class="num">
                                                    12

                                                </span></div><div class="it-seat" style="left: 178px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F11"> <span class="num">
                                                    11

                                                </span></div><div class="it-seat" style="left: 213px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F10"> <span class="num">
                                                    10

                                                </span></div><div class="it-seat" style="left: 248px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F9"> <span class="num">
                                                    9

                                                </span></div><div class="it-seat" style="left: 283px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F8"> <span class="num">
                                                    8

                                                </span></div><div class="it-seat" style="left: 318px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F7"> <span class="num">
                                                    7

                                                </span></div><div class="it-seat" style="left: 353px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F6"> <span class="num">
                                                    6

                                                </span></div><div class="it-seat" style="left: 388px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F5"> <span class="num">
                                                    5

                                                </span></div><div class="it-seat" style="left: 423px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F4"> <span class="num">
                                                    4

                                                </span></div><div class="it-seat" style="left: 458px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F3"> <span class="num">
                                                    3

                                                </span></div><div class="it-seat" style="left: 493px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F2"> <span class="num">
                                                    2

                                                </span></div><div class="it-seat" style="left: 528px; top: 175px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="F1"> <span class="num">
                                                    1

                                                </span></div><div class="it-seat" style="left: 38px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G16"> <span class="num">
                                                    16

                                                </span></div><div class="it-seat" style="left: 73px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="G15"> <span class="num">
                                                    15

                                                </span></div><div class="it-seat" style="left: 108px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G14"> <span class="num">
                                                    14

                                                </span></div><div class="it-seat" style="left: 143px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G13"> <span class="num">
                                                    13

                                                </span></div><div class="it-seat" style="left: 178px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G12"> <span class="num">
                                                    12

                                                </span></div><div class="it-seat" style="left: 213px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true" data-type="seat" data-zoom="1"  class="inp" id="G11"> <span class="num">
                                                    11

                                                </span></div><div class="it-seat" style="left: 248px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G10"> <span class="num">
                                                    10

                                                </span></div><div class="it-seat" style="left: 283px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G9"> <span class="num">
                                                    9

                                                </span></div><div class="it-seat" style="left: 318px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G8"> <span class="num">
                                                    8

                                                </span></div><div class="it-seat" style="left: 353px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G7"> <span class="num">
                                                    7

                                                </span></div><div class="it-seat" style="left: 388px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat" data-zoom="1"  class="inp" id="G6"> <span class="num">
                                                    6

                                                </span></div><div class="it-seat" style="left: 423px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G5"> <span class="num">
                                                    5

                                                </span></div><div class="it-seat" style="left: 458px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G4"> <span class="num">
                                                    4

                                                </span></div><div class="it-seat" style="left: 493px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G3"> <span class="num">
                                                    3

                                                </span></div><div class="it-seat" style="left: 528px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G2"> <span class="num">
                                                    2

                                                </span></div><div class="it-seat" style="left: 563px; top: 210px; width: 21px; height: 21px;"><input type="checkbox" data-title="true"  data-type="seat"  data-zoom="1"  class="inp" id="G1"> <span class="num">
                                                    1

                                                </span></div></div></div></div></div>

                                                

                                         
                                                </x-layout>












