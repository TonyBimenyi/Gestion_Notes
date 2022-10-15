
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/css/navside.css')}}">
     <style>
         @media print {
         .sidebar{
            display: none;
         }
         .home_content{
            display: none;
         }
      }

     </style>
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CodingCollege</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name"  href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="fa-solid fa-users"></i>
            <span class="link_name">Utilisateurs</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Utilisateurs</a></li>
          <li><a href="#">Admins</a></li>
          <li><a href="#">Etudiants</a></li>
          <li><a href="#">Enseignants</a></li>
          <li><a href="#">Staff</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          {{-- <a href="{{ url('cours') }}">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Cours</span> --}}

          <a href="entree">
            <i class='bx bx-line-chart' ></i>
            <span class="link_name">Finances</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Entrees</a></li>
          <li><a href="#">Sorties</a></li>
          <li><a href="#">Minervals</a></li>
          <li><a href="#">Salaire</a></li>
          <li><a href="#">Statistiques</a></li>
        </ul>
      </li>

    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->

      </div>
      <div class="name-job">
        <div class="profile_name">{{Auth::user()->name;}}</div>
        <div class="job">{{Auth::user()->role;}}</div>
      </div>
        <a href="{{route('logout')}}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class='bx bx-log-out' ></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
  </li>
</ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>

      <span class="text">Systeme de Gestion</span>

    </div>
    @yield('da')
  </section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>


   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     var msg = '{{Session::get('alert')}}';
     var exist = '{{Session::has('alert')}}';
     if(exist){
       Swal.fire({
 icon: 'success',
 title: msg,
 showConfirmButton: false,
 timer: 2500
})
     }
   </script>

</body>
