<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:#009877;">
        
    </div>
   

    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color:#009877;">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu" style="color:#ffffff;"></span>
        </button>
        <h4 class="Task-Management-Platform Task-Management-Platform-big-screen" style="color:#ffffff;">Student Management System</h4>
        <h4 class="Task-Management-Platform Task-Management-Platform-short-screen pl-2" style="color:#ffffff;">TMP</h4>
        <ul class="navbar-nav navbar-nav-right">

           
            <div class="Timestamp-BG"><span id="date"></span><span id="clock"><span></div>

            <li class="dropdown-notifications nav-item dropdown">
                <!-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="fa fa-bell" onclick="reset()"></i>
                    <span id="notification-icon"></span>
                    <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                </a> -->
                <div class="dropdown-menu notification-menu dropdown-container dropdown-menu-right navbar-dropdown notification-top-section" aria-labelledby="notificationDropdown">
                    <div class="dropdown-container">
                        <div class="dropdown-toolbar">
                          <div class="dropdown-toolbar-actions">
                            <a id="clear">Clear</a>
                          </div>
                          <p class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</p>
                        </div>
                        <hr>
                        <div class="row">
                            
                        </div>
                        <!-- <div class="dropdown-footer text-center">
                          <a href="#">View All</a>
                        </div> -->
                    </div>
                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>

<script>
    $(document).ready(function(){
        setInterval('updateClock()', 1000);
        getTodayDate();
    });

function getTodayDate(){
    const monthNames = ["Jan", "Feb", "March", "April", "May", "June",
          "July", "August", "Sept", "Oct", "Nov", "Dec"
    ];
    const d = new Date();
    const date = d.getDate() + " " +monthNames[d.getMonth()] + ', '+ d.getFullYear()+ ' ';
    $("#date").html(date);
}

function updateClock (){
 	var currentTime = new Date ( );
  	var currentHours = currentTime.getHours ( );
  	var currentMinutes = currentTime.getMinutes ( );
  	var currentSeconds = currentTime.getSeconds ( );

  	// Pad the minutes and seconds with leading zeros, if required
  	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  	currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  	// Choose either "AM" or "PM" as appropriate
  	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  	// Convert the hours component to 12-hour format if needed
  	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  	// Convert an hours component of "0" to "12"
  	currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  	// Compose the string for display
  	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


   	$("#clock").html(currentTimeString);
 }
</script>

<?php /**PATH C:\xampp\htdocs\student_management_system\resources\views/backend/layouts/header.blade.php ENDPATH**/ ?>