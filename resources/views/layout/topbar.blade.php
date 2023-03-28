<script type="text/javascript">
   window.addEventListener("load", () => {
  clock();
  function clock() {
    const today = new Date();

    // get time components
    const hours = today.getHours();
    const minutes = today.getMinutes();
    const seconds = today.getSeconds();

    //add '0' to hour, minute & second when they are less 10
    const hour = hours < 10 ? "0" + hours : hours;
    const minute = minutes < 10 ? "0" + minutes : minutes;
    const second = seconds < 10 ? "0" + seconds : seconds;

    //make clock a 12-hour time clock
    const hourTime = hour > 12 ? hour - 12 : hour;

    // if (hour === 0) {
    //   hour = 12;
    // }
    //assigning 'am' or 'pm' to indicate time of the day
    const ampm = hour < 12 ? "AM" : "PM";

    // get date components
    const month = today.getMonth();
    const year = today.getFullYear();
    const day = today.getDate();

    //declaring a list of all months in  a year
    const monthList = [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Augustus",
      "September",
      "Oktober",
      "November",
      "Desember"
    ];

    //get current date and time
    const date =  day + " "+ monthList[month] + " " + ", " + year;
    const time = hourTime + ":" + minute + ":" + second + " "+ampm;

    //combine current date and time
    const dateTime = date + " - " + time;

    //print current date and time to the DOM
    document.getElementById("date-time").innerHTML = dateTime;
    setTimeout(clock, 1000);
  }
});
    </script>
 <!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
     <i class="fa fa-bars"></i>
 </button>

 <!-- Topbar Search -->
 <div
     class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
     <div id="clock">
        <div class="d-flex text-gray-800">
            <h4 class="me-2">Tanggal</h4>
            <h4 id="date-time" class="text-gray-800"></h3>
        </div>
      </div>
 </div>

 <!-- Topbar Navbar -->
 <ul class="navbar-nav ml-auto">

     <!-- Nav Item - Search Dropdown (Visible Only XS) -->
     <li class="nav-item dropdown no-arrow d-sm-none">
         <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-search fa-fw"></i>
         </a>
         <!-- Dropdown - Messages -->
         <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
             aria-labelledby="searchDropdown">
             <form class="form-inline mr-auto w-100 navbar-search">
                 <div class="input-group">
  <input type="text" class="form-control bg-light border-0 small"
      placeholder="Search for..." aria-label="Search"
      aria-describedby="basic-addon2">
  <div class="input-group-append">
      <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
      </button>
  </div>
                 </div>
             </form>
         </div>
     </li>



     <div class="topbar-divider d-none d-sm-block"></div>

     <!-- Nav Item - User Information -->
     <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, {{ Auth()->user()->nama }}!</span>
             {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                 <i class="fa fa-user-circle img-profile rounded-circle fa-lg mt-3 me-2" aria-hidden="true"></i>
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="userDropdown">

             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
             </a>
         </div>
     </li>

 </ul>
