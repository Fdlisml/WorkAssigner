<!-- ======================= Cards ================== -->
<div class="cardBox" id="myCardBox">
    <div class="card1">
        <div class="card-left">
            <div class="container-text">
                <div class="say"><span id="say"></span>, {{ session('name') }}</div>
                <div class="desc">Good luck with your work. Spirit!</div>
                <div id="txt"></div>
                <div class="left2">
                    <p id="day"></p>
                    <p id="date"></p>/
                    <p id="month"></p>
                    <p></p>
                    <p id="year"></p>
                </div>
            </div>
        </div>

        <div class="imgBx">
            <img src="{{ asset('image/Telecommuting-pana-removebg-preview.png') }}">
        </div>
    </div>

    <div class="card2">
        <div class="container2">
            <h1><a href="{{ url('user/index/') }}">{{ $totalJobs }}</a><span>WORKS</span></h1>

            <div class="line"></div>

            <div class="status">
                <div class="work-status"><a href="{{ url('user/index/filter?prioritas=1') }}">{{ $totalJobsPrioritas['1'] }}</a></div>
                <div class="work-status"><a href="{{ url('user/index/filter?prioritas=2') }}">{{ $totalJobsPrioritas['2'] }}</a></div>
                <div class="work-status"><a href="{{ url('user/index/filter?prioritas=3') }}">{{ $totalJobsPrioritas['3'] }}</a></div>
            </div>
            <!-- day -->
            {{-- <div class="day" id="day">
               <div class="container-day">
                   <div class="cloud front">
                       <span class="left-front"></span>
                       <span class="right-front"></span>
                   </div>
                   <span class="sun sunshine"></span>
                   <span class="sun"></span>
                   <div class="cloud back">
                       <span class="left-back"></span>
                       <span class="right-back"></span>
                   </div>
               </div>
           </div> --}}
            <!-- end day -->

            <!-- night -->
            {{-- <div class="night" id="night">
               <div class="content">
                   <div class="planet">
                       <div class="ring"></div>
                       <div class="cover-ring"></div>
                       <div class="spots">
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                       </div>
                   </div>
               </div>
           </div> --}}
        </div>
    </div>
</div>
